<?php
$title = "Nạp Thẻ Cào Tự Động";
require_once(__DIR__ . "/layout/header.php");
require_once(__DIR__ . '/../../../core/is_user.php');
CheckLogin();
?>
<?php
if (isset($_GET['id'])) {
    $row = $NNL->get_row("SELECT * FROM `license_vps` WHERE `id` = '" . xss($_GET['id']) . "' AND `user`='" . $getUser['username'] . "'");
    if (!$row) {
        die('<script type="text/javascript">if(!alert("Không tồn tại !")){location.href = "' . BASE_URL('') . '";}</script>');
    }
}
?>

<body class="lagom lagom-layout-left page-homepage page-user-logged" data-phone-cc-input="1">
    <?php require_once(__DIR__ . "/layout/navbar-mb.php"); ?>
    <div class="app-main ">
        <?php require_once(__DIR__ . "/layout/navbar-pc.php"); ?>

        <div class="main-header">
            <div class="container">
                <h1 class="main-header-title">
                    Nạp thẻ cào
                </h1>
                <div class="main-header-bottom">
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?= BASE_URL('') ?>"> Trang chủ
                            </a>
                        </li>
                        <li class="active">
                            Nạp thẻ cào
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="main-body">
            <div class="container">
                <div class="main-grid">
                    <div class="main-sidebar ">
                        <div class="sidebar-sticky">
                            <div class="sidebar sidebar-primary">
                                <div class="panel panel-summary panel-summary-primary">
                                    <div class="panel-body">
                                        <div class="summary-total">
                                            <?= $NNL->site('luuy_naptien') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-content ">
                        <div class="panel panel-lg panel-default">
                            <div class="panel-body">
                                <form method="post" class="m-w-sm m-a">
                                    <div class="form-group">
                                        <label for="paymentmethod" class="control-label">Nhà mạng:</label>
                                        <select name="paymentmethod" id="loaithe" class="form-control">
                                            <option value="">Chọn nhà mạng</option>
                                            <option value="VIETTEL">VIETTEL</option>
                                            <option value="VINAPHONE">VINAPHONE</option>
                                            <option value="MOBIFONE">MOBIFONE</option>
                                            <option value="VNMB">Vietnammobile</option>
                                            <option value="ZING">Zing</option>
                                            <option value="GARENA2">Garena</option>
                                            <option value="GATE">GATE</option>
                                            <option value="VCOIN">Vcoin</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="paymentmethod" class="control-label">Mệnh giá:</label>
                                        <select name="paymentmethod" id="menhgia" class="form-control">
                                            <option value="">Chọn mệnh giá</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="paymentmethod" class="control-label">Seri:</label>
                                        <input type="text" class="form-control" id="seri">
                                    </div>
                                    <div class="form-group">
                                        <label for="paymentmethod" class="control-label">Mã thẻ:</label>
                                        <input type="text" class="form-control" id="pin">
                                    </div>
                                    <div class="form-actions">
                                        <button type="button" id="NapThe" value="Add Funds" class="btn btn-lg btn-block btn-primary" data-btn-loader>
                                            <span>Nạp Ngay</span>
                                            <div class="loader loader-button hidden">

                                                <div class="spinner spinner-sm spinner-light">
                                                    <div class="rect1"></div>
                                                    <div class="rect2"></div>
                                                    <div class="rect3"></div>
                                                    <div class="rect4"></div>
                                                    <div class="rect5"></div>
                                                </div>

                                            </div>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="section">
                    <div class="section-body">
                        <div class="row row-eq-height">
                            <link rel="stylesheet" type="text/css" href="<?= BASE_URL('') ?>public/client/css/datatable.css">
                            <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.js"></script>
                            <div class="col-lg-12">
                                <div class="card ribbon-box">
                                    <div class="card-body">
                                        <div class="mb-5">
                                            <div class="section-header">
                                                <h2 class="section-title">LỊCH SỬ NẠP THẺ</h2>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            function checkAll() {
                                                let checkAll = $('#selectAll');
                                                let checkboxes = $('.domids').not(':disabled');
                                                checkAll.on('ifChecked ifUnchecked', function(e) {
                                                    if (e.type == 'ifChecked') {
                                                        checkboxes.iCheck('check');
                                                    } else {
                                                        checkboxes.iCheck('uncheck');
                                                    }
                                                });
                                                checkboxes.on('ifChanged', function(e) {
                                                    if (checkboxes.filter(':checked').length > 0) {
                                                        $('#domainSelectedCounter').addClass('badge-primary');
                                                        $('.bottom-action-sticky').removeClass('hidden');
                                                    } else {
                                                        $('#domainSelectedCounter').removeClass('badge-primary');
                                                        $('.bottom-action-sticky').addClass('hidden');
                                                    }
                                                    $('#domainSelectedCounter').text(checkboxes.filter(':checked').length);
                                                    if (checkboxes.filter(':checked').length == checkboxes.length) {
                                                        checkAll.prop('checked', 'checked');
                                                    } else {
                                                        checkAll.removeProp('checked');
                                                    }
                                                    checkAll.iCheck('update');
                                                });
                                            };

                                            var alreadyReady = false; // The ready function is being called twice on page load.

                                            var saveState = true;

                                            jQuery(document).ready(function() {

                                                var table = jQuery("#tablemomo").DataTable({
                                                    "dom": '<"listtable"fit>pl',
                                                    "info": false,
                                                    "responsive": true,
                                                    "oLanguage": {
                                                        "sEmptyTable": "No Records Found",
                                                        "sInfo": "Showing _START_ to _END_ of _TOTAL_ entries",
                                                        "sInfoEmpty": "Showing 0 to 0 of 0 entries",
                                                        "sInfoFiltered": "(filtered from _MAX_ total entries)",
                                                        "sInfoPostFix": "",
                                                        "sInfoThousands": ",",
                                                        "sLengthMenu": "Show _MENU_ entries",
                                                        "sLoadingRecords": "Loading...",
                                                        "sProcessing": "Processing...",
                                                        "sSearch": "",
                                                        "sZeroRecords": "No Records Found",
                                                        "oPaginate": {
                                                            "sFirst": "First",
                                                            "sLast": "Last",
                                                            "sNext": "Next",
                                                            "sPrevious": "Previous"
                                                        }
                                                    },
                                                    "pageLength": 10,
                                                    "order": [
                                                        [0, "asc"]
                                                    ],
                                                    "lengthMenu": [
                                                        [10, 25, 50, -1],
                                                        [10, 25, 50, "All"]
                                                    ],
                                                    "aoColumnDefs": [{
                                                            "bSortable": false,
                                                            "aTargets": [-1]
                                                        },
                                                        {
                                                            "sType": "string",
                                                            "aTargets": []
                                                        }
                                                    ],
                                                    "stateSave": saveState,
                                                    "autoWidth": false,
                                                });

                                                alreadyReady = true;
                                                if ($('#table-search').length > 0 && $('.dataTables_filter').length > 0) {
                                                    var searchTableVal = $('.dataTables_filter input').val();
                                                    $('#table-search').val(searchTableVal);
                                                    var searchVal = $('#table-search').val();
                                                    table.search(searchVal, true).draw();
                                                }

                                                $('#table-search').on('keyup', function() {
                                                    table.search(this.value, true).draw();
                                                });
                                                table.on('draw.dt', function() {
                                                    $('body').find('input:not(.icheck-input):not(.switch__checkbox)').iCheck({
                                                        checkboxClass: 'checkbox-styled',
                                                        radioClass: 'radio-styled',
                                                        increaseArea: '40%'
                                                    });
                                                    checkAll();

                                                });

                                                $('[data-inactive-services-checkbox]').on('change', function() {
                                                    if ($(this)[0].checked === true) {
                                                        table.column(0).search("lagomshowservice", true, false, false).draw();
                                                    } else {
                                                        table.column(0).search("", true, false, false).draw();
                                                    }
                                                });

                                            });
                                        </script>
                                        <script type="text/javascript">
                                            jQuery(document).ready(function() {
                                                var table = jQuery('#tablemomo').removeClass('hidden').DataTable();
                                                table.order(0, 'desc');
                                                table.draw();

                                                jQuery('.table-container').removeClass('loading');
                                                jQuery('#tableLoadingMomo').addClass('hidden');
                                            });
                                        </script>
                                        <div class="table-container loading clearfix">
                                            <table id="tablemomo" class="table table-list">
                                                <thead>
                                                    <tr>
                                                        <th><button type="button" class="btn-table-collapse"></button>ID<span class="sorting-arrows"></span></th>
                                                        <th>Loại thẻ<span class="sorting-arrows"></span></th>
                                                        <th>Mã thẻ<span class="sorting-arrows"></span></th>
                                                        <th>Serial<span class="sorting-arrows"></span></th>
                                                        <th>Mệnh giá<span class="sorting-arrows"></span></th>
                                                        <th>Nhận được<span class="sorting-arrows"></span></th>
                                                        <th>Thời gian<span class="sorting-arrows"></span></th>
                                                        <th>Trạng thái</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1;
                                                    foreach ($NNL->get_list("SELECT * FROM `cards` WHERE `username` = '" . $getUser['username'] . "' ") as $cards) : ?>
                                                        <tr>
                                                            <td><button type="button" class="btn-table-collapse"></button><?= $i++; ?></td>
                                                            <td><?= $cards['loaithe']; ?></td>
                                                            <td><?= $cards['pin']; ?></td>
                                                            <td><?= $cards['seri']; ?></td>
                                                            <td><?= format_cash($cards['menhgia']); ?> VND</td>
                                                            <td><?= format_cash($cards['thucnhan']); ?> VND</td>
                                                            <td><span class="badge badge-danger"><?= $cards['createdate']; ?></span></td>
                                                            <td><?= status($cards['status']); ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                            <div class="loader loader-table" id="tableLoadingMomo">
                                                <div class="spinner ">
                                                    <div class="rect1"></div>
                                                    <div class="rect2"></div>
                                                    <div class="rect3"></div>
                                                    <div class="rect4"></div>
                                                    <div class="rect5"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $("#NapThe").on("click", function() {
                $('#NapThe').html('ĐANG XỬ LÝ').prop('disabled',
                    true);
                $.ajax({
                    url: "<?= BASE_URL("ajaxs/client/card.php"); ?>",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        loaithe: $("#loaithe").val(),
                        menhgia: $("#menhgia").val(),
                        seri: $("#seri").val(),
                        pin: $("#pin").val()
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            cuteToast({
                                type: "success",
                                message: response.msg,
                                timer: 5000
                            });
                            setTimeout("location.href = '<?= BASE_URL('client/recharge/card'); ?>';", 100);
                        } else {
                            cuteToast({
                                type: "error",
                                message: response.msg,
                                timer: 5000
                            });
                        }
                        $('#NapThe').html(
                                'Nạp Thẻ')
                            .prop('disabled', false);
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $("#loaithe").change(function() {
                    $.ajax({
                        type: 'POST',
                        url: '<?= BASE_URL('api/amount.php'); ?>',
                        data: {
                            loai: $("#loaithe").val()
                        },
                        success: function(response) {
                            $("#menhgia").html(response);
                        },
                    });
                });
            });
        </script>
        <?php
        require_once(__DIR__ . "/layout/page-end.php");
        require_once(__DIR__ . "/layout/footer.php");
        ?>