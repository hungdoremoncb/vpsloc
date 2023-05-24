<?php
$title = "Nạp Auto Qua Ngân Hàng/Ví điện tử";
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
                    Nạp auto qua ngân hàng/ví điện tử
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
                    <div class="main-content ">
                        <div class="section">
                            <div class="section-header">
                                <h2 class="section-title">Chọn phương thức nạp</h2>
                            </div>
                            <div class="section-body">
                                <div class="row row-eq-height">
                                    <?php foreach ($NNL->get_list("SELECT * FROM `bank`") as $row) : ?>
                                        <div class="col-md-4">
                                            <a class="panel panel-default panel-support panel-department-box">
                                                <div class="panel-body">
                                                    <center>
                                                        <img class="mb-3" src="<?= $row['logo'] ?>" width="200px" height="100px">
                                                    </center>
                                                    <ul class="list-group mb-2">
                                                        <li class="list-group-item">Số tài khoản: <b id="copySTK<?= $row['id'] ?>" style="color: green;"><?= $row['stk'] ?></b> <button onclick="copy()" data-clipboard-target="#copySTK<?= $row['id'] ?>" class="copy btn btn-primary btn-sm"><i class="fas fa-copy"></i></button>
                                                        </li>
                                                        <li class="list-group-item">Chủ tài khoản: <b><?= $row['bank_name'] ?></b>
                                                        </li>
                                                        <li class="list-group-item">Ngân hàng: <b><?= $row['name'] ?></b></li>
                                                        <li class="list-group-item">Nội dung nạp: <b id="copyNoiDung<?= $row['id'] ?>" style="color: red;"><?= $NNL->site('noidung_naptien'), $getUser['id'] ?></b>
                                                            <button onclick="copy()" data-clipboard-target="#copyNoiDung<?= $row['id'] ?>" class="copy btn btn-primary btn-sm"><i class="fas fa-copy"></i></button>
                                                        </li>
                                                    </ul>

                                                </div>
                                                <div class="panel-footer">
                                                    <span class="btn btn-sm btn-primary-faded btn-block"><i class="fa fa-spinner fa-spin"></i>
                                                        Xử lý giao dịch tự động trong vài giây...</span>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="row row-eq-height">
                                    <div class="col-lg-6">
                                        <div class="card ribbon-box">
                                            <div class="card-body">
                                                <div class="mb-5">
                                                    <div class="section-header">
                                                        <h2 class="section-title">LỊCH SỬ NẠP AUTO BANK</h2>
                                                    </div>

                                                </div>
                                                <link rel="stylesheet" type="text/css" href="<?=BASE_URL('')?>public/client/css/datatable.css">
                                                <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.js"></script>

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

                                                        var table = jQuery("#tableEmailsList").DataTable({
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
                                                        var table = jQuery('#tableEmailsList').removeClass('hidden').DataTable();
                                                        table.order(0, 'desc');
                                                        table.draw();

                                                        jQuery('.table-container').removeClass('loading');
                                                        jQuery('#tableLoading').addClass('hidden');
                                                    });
                                                </script>
                                                <div class="table-container loading clearfix">
                                                    <table id="tableEmailsList" class="table table-list">
                                                        <thead>
                                                            <tr>
                                                                <th><button type="button" class="btn-table-collapse"></button>MÃ GIAO DỊCH<span class="sorting-arrows"></span></th>
                                                                <th>TIỀN NẠP<span class="sorting-arrows"></span></th>
                                                                <th>NỘI DUNG<span class="sorting-arrows"></span></th>
                                                                <th>THỜI GIAN<span class="sorting-arrows"></span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 1;
                                                            foreach ($NNL->get_list("SELECT * FROM `bank_auto` WHERE `username` = '" . $getUser['username'] . "' ORDER BY `id` DESC") as $row) : ?>
                                                                <tr>
                                                                    <td><button type="button" class="btn-table-collapse"></button><?= $row['tranId'] ?></td>
                                                                    <td><?= format_cash($row['amount']) ?>đ</td>
                                                                    <td><?= $row['comment'] ?></td>
                                                                    <td><?= $row['thoigian'] ?></td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                    <div class="loader loader-table" id="tableLoading">
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
                                    <div class="col-lg-6">
                                        <div class="card ribbon-box">
                                            <div class="card-body">
                                                <div class="mb-5">
                                                    <div class="section-header">
                                                        <h2 class="section-title">LỊCH SỬ NẠP AUTO MOMO</h2>
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
                                                                <th><button type="button" class="btn-table-collapse"></button>MÃ GIAO DỊCH<span class="sorting-arrows"></span></th>
                                                                <th>TIỀN NẠP<span class="sorting-arrows"></span></th>
                                                                <th>NỘI DUNG<span class="sorting-arrows"></span></th>
                                                                <th>THỜI GIAN<span class="sorting-arrows"></span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 1;
                                                            foreach ($NNL->get_list("SELECT * FROM `momo` WHERE `username` = '" . $getUser['username'] . "' ORDER BY `id` DESC") as $row) : ?>
                                                                <tr>
                                                                    <td><button type="button" class="btn-table-collapse"></button><?= $row['tranId'] ?></td>
                                                                    <td><?= format_cash($row['amount']) ?>đ</td>
                                                                    <td><?= $row['comment'] ?></td>
                                                                    <td><?= $row['time'] ?></td>
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
            </div>
        </div>
        <?php
        require_once(__DIR__ . "/layout/page-end.php");
        require_once(__DIR__ . "/layout/footer.php");
        ?>
        <script type="text/javascript">
            new ClipboardJS(".copy");

            function copy() {
                cuteToast({
                    type: "success",
                    message: "Đã sao chép vào bộ nhớ tạm",
                    timer: 5000
                });
            }
        </script>