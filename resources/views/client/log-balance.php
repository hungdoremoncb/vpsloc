<?php
$title = "Biến Động Số Dư";
require_once(__DIR__ . "/layout/header.php");
require_once(__DIR__ . '/../../../core/is_user.php');
CheckLogin();
?>

<body class="lagom lagom-layout-left page-homepage page-user-logged" data-phone-cc-input="1">
    <?php require_once(__DIR__ . "/layout/navbar-mb.php"); ?>
    <div class="app-main ">
        <?php require_once(__DIR__ . "/layout/navbar-pc.php"); ?>
        <div class="main-header">
            <div class="container">
                <div class="main-header-top">
                    <h1 class="main-header-title">Biến động số dư </h1>
                    <div class="search-group">
                        <div class="search-field">
                            <i class="search-field-icon lm lm-search"></i>
                            <input type="text" id="table-search" class="form-control" placeholder="Tìm kiếm...">
                        </div>

                    </div>
                </div>
        
                <div class="main-header-bottom">
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?= BASE_URL('') ?>"> Trang chủ
                            </a>
                        </li>
                        <li class="active">Thông tin cá nhân
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="main-body">
            <div class="container">
                <div class="main-grid">
                    <div class="main-sidebar ">
                        <?php require_once(__DIR__ . "/layout/menu.php"); ?>
                    </div>
                    <div class="main-content ">
                        <link rel="stylesheet" type="text/css" href="/lagom/assets/css/dataTables.responsive.css">
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
                                        <th><button type="button" class="btn-table-collapse"></button>STT<span class="sorting-arrows"></span></th>
                                        <th>Số tiền trước<span class="sorting-arrows"></span></th>
                                        <th>Số tiền thay đổi<span class="sorting-arrows"></span></th>
                                        <th>Số tiền hiện tại<span class="sorting-arrows"></span></th>
                                        <th>Nội dung<span class="sorting-arrows"></span></th>
                                        <th>Thời gian<span class="sorting-arrows"></span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($NNL->get_list("SELECT * FROM `dongtien` WHERE `username` = '".$getUser['username']."' ORDER BY `id` DESC") as $row):?>
                                    <tr>
                                        <td><button type="button" class="btn-table-collapse"></button><?=$i++?></td>
                                        <td><?=format_cash($row['sotientruoc'])?></td>
                                        <td><?=format_cash($row['sotienthaydoi'])?></td>
                                        <td><?=format_cash($row['sotiensau'])?></td>
                                        <td><?=$row['noidung']?></td>
                                        <td><?=$row['thoigian']?></td>
                                    </tr>
                                    <?php endforeach;?>
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
        </div>

        <script>
            function changePassword() {
                cuteAlert({
                    type: "question",
                    title: "Xác Nhận Thay Đổi",
                    message: "Bạn có chắc chắn muốn thay đổi mật khẩu không ?",
                    confirmText: "Đồng Ý",
                    cancelText: "Hủy"
                }).then((e) => {
                    if (e) {
                        $.ajax({
                            url: "<?= BASE_URL("ajaxs/client/changeInfo.php"); ?>",
                            method: "POST",
                            dataType: "JSON",
                            data: {
                                action: "changePassword",
                                password: $('#inputExistingPassword').val(),
                                newpassword: $('#inputNewPassword1').val(),
                                renewpassword: $('#inputNewPassword2').val()
                            },
                            success: function(respone) {
                                if (respone.status == 'success') {
                                    cuteToast({
                                        type: "success",
                                        message: respone.msg,
                                        timer: 5000
                                    });
                                    setTimeout("location.href = '<?= BASE_URL('client/logout'); ?>';", 100);
                                } else {
                                    cuteAlert({
                                        type: "error",
                                        title: "Error",
                                        message: respone.msg,
                                        buttonText: "Okay"
                                    });
                                }
                            },
                            error: function() {
                                alert(html(response));
                                location.reload();
                            }
                        });
                    }
                })
            }
        </script>
        <?php
        require_once(__DIR__ . "/layout/page-end.php");
        require_once(__DIR__ . "/layout/footer.php");
        ?>