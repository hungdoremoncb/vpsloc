<?php
$title = "Lịch Sử Đơn Hàng Mua VPS";
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
                    <h1 class="main-header-title">Lịch sử mua vps </h1>
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
                            <a href="<?=BASE_URL('')?>"> Trang chủ
                            </a>
                        </li>
                        <li class="active">
                            Lịch sử mua vps
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="main-body">
            <div class="container">
                <div class="main-grid">
                    
                    <div class="main-content ">




                        <link rel="stylesheet" type="text/css" href="/lagom/assets/css/dataTables.responsive.css">
                        <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.js"></script>

                        <script type="text/javascript">
                            if (typeof(buildFilterRegex) !== "function") {
                                function buildFilterRegex(filterValue) {
                                    if (filterValue.indexOf('&') === -1) {
                                        return '[~>]\\s*' + jQuery.fn.dataTable.util.escapeRegex(filterValue) + '\\s*[<~]';
                                    } else {
                                        var tempDiv = document.createElement('div');
                                        tempDiv.innerHTML = filterValue;
                                        return '\\s*' + jQuery.fn.dataTable.util.escapeRegex(tempDiv.innerText) + '\\s*';
                                    }
                                }
                            }
                            jQuery(document).ready(function() {
                                jQuery(".view-filter-btns .dropdown-menu a").click(function(e) {
                                    var filterValue = jQuery(this).find("span").data('value');
                                    var filterText = jQuery(this).find("span").html().trim();
                                    var filterStatusClass = jQuery(this).find("span").data('status-class');
                                    var filterStatusColor = jQuery(this).data('status-color');
                                    var dataTable = jQuery('#tableServicesList').DataTable();
                                    var filterValueRegex;

                                    $(this).closest('.dropdown-menu').find('.active').removeClass('active');
                                    $(this).parent().addClass('active');
                                    $(this).closest('.view-filter-btns').find('.dropdown-toggle span:not(.status)').text(filterText);
                                    if (filterValue == "all") {
                                        dataTable.column(3).search('').draw();
                                        $(this).closest('.view-filter-btns').find('.dropdown-toggle span.status').addClass('hidden');
                                    } else {
                                        if (filterStatusColor != undefined) {
                                            $(this).closest('.view-filter-btns').find('.dropdown-toggle span.status').attr('style', '--status-color:' + filterStatusColor).removeClass('hidden');
                                        } else {
                                            $(this).closest('.view-filter-btns').find('.dropdown-toggle span.status').addClass('status-' + filterStatusClass).removeClass('hidden');
                                        }

                                        if (filterValue != undefined) {
                                            filterValueRegex = buildFilterRegex(filterValue);
                                        } else {
                                            filterValueRegex = buildFilterRegex(filterText);
                                        }

                                        dataTable.column(3)
                                            .search(filterValueRegex, true, false, false)
                                            .draw();
                                    }
                                    // Prevent jumping to the top of the page
                                    // when no matching tag is found.
                                    e.preventDefault();

                                });

                            });
                        </script>

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

                                var table = jQuery("#tableServicesList").DataTable({
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
                                            "aTargets": []
                                        },
                                        {
                                            "sType": "string",
                                            "aTargets": [3]
                                        }
                                    ],
                                    "stateSave": saveState,
                                    "autoWidth": false,
                                });

                                // highlight remembered filter on page re-load
                                var rememberedFilterTerm = table.state().columns[3].search.search;

                                if (rememberedFilterTerm && !alreadyReady) {
                                    // This should only run on the first "ready" event.
                                    jQuery(".view-filter-btns a span").each(function(index) {
                                        if (buildFilterRegex(jQuery(this).text().trim()) == rememberedFilterTerm) {
                                            var filterValue = jQuery(this).data('value');
                                            var filterStatusClass = jQuery(this).data('status-class');
                                            var filterStatusColor = jQuery(this).parent().data('status-color');

                                            $(this).closest('li').addClass('active');
                                            $(this).closest('.view-filter-btns').find('.dropdown-toggle span:not(.status)').text(jQuery(this).text());
                                            if (filterStatusColor != undefined) {
                                                $(this).closest('.view-filter-btns').find('.dropdown-toggle span.status').attr('style', '--status-color:' + filterStatusColor).removeClass('hidden');
                                            } else {
                                                $(this).closest('.view-filter-btns').find('.dropdown-toggle span.status').addClass('status-' + filterStatusClass).removeClass('hidden');
                                            }
                                        }
                                    });
                                }
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

                                table.column(0).search("", true, false, false).draw();
                            });
                        </script>
                        <script type="text/javascript">
                            jQuery(document).ready(function() {
                                var table = jQuery('#tableServicesList').removeClass('hidden').DataTable();
                                table.order([0, 'asc'], [3, 'asc']);
                                table.draw();
                                jQuery('.table-container').removeClass('loading');
                                jQuery('#tableLoading').addClass('hidden');
                            });
                        </script>
                        <div class="table-container loading">
                            <div class="table-top">
                                <div class="d-flex">
                                    <label>View</label>
                                    <div class="dropdown view-filter-btns" data-table-filters>
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                            <span class="status hidden"></span>
                                            <span>All Entries</span>
                                            <i class="ls ls-caret"></i>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#"><span data-value="all">All Entries</span></a></li>

                                            <li data-status="Active"><a href="#"><span class="status status-active" data-value="Active" data-status-class="active">Active</span></a></li>
                                        </ul>
                                    </div>
                                </div>


                                <label class="d-flex" data-inactive-services>
                                    <span data-inactive-services-text="hide" class="hidden">Hide <b>0</b> inactive services</span>
                                    <span data-inactive-services-text="hidden"><b>0</b> inactive services has been hidden</span>
                                    <div class="switch switch--sm">
                                        <input class="switch__checkbox" type="checkbox" name="hideInactiveSercices" value="1" data-inactive-services-checkbox>
                                        <span class="switch__container"><span class="switch__handle"></span></span>
                                    </div>
                                </label>
                            </div>
                            <table id="tableServicesList" class="table table-list">
                                <thead>
                                    <tr>
                                        <th data-priority="1"><button type="button" class="btn-table-collapse"></button>Sản phẩm<span class="sorting-arrows"></span></th>
                                        <th data-priority="5">Giá tiền<span class="sorting-arrows"></span></th>
                                        <th data-priority="6">Cpu<span class="sorting-arrows"></span></th>
                                        <th data-priority="7">Ram<span class="sorting-arrows"></span></th>
                                        <th data-priority="8">Location<span class="sorting-arrows"></span></th>
                                        <th data-priority="10">HĐH<span class="sorting-arrows"></span></th>
                                         <th data-priority="11">COUNTRY<span class="sorting-arrows"></span></th>
                                        <th data-priority="9">Hạn sử dụng<span class="sorting-arrows"></span></th>
                                        <th data-priority="4">Thời gian mua<span class="sorting-arrows"></span></th>
                                        <th data-priority="3">Trạng thái<span class="sorting-arrows"></span></th>
                                        <th data-priority="2">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; foreach($NNL->get_list(" SELECT * FROM `license_vps` WHERE `user` = '".$getUser['username']."' ORDER BY id DESC ") as $row):?>
                                    <tr data-url="<?=BASE_URL('client/history-vps/view/'),$row['id']?>">
                                        <td>
                                        <button type="button" class="btn-table-collapse"></button>
                                            <b><?=getCategory($row['vps_id'],'namevps')?></b>
                                        </td>
                                        <td class="text-nowrap" data-order="8.99"><?=format_cash($row['gia'])?>đ <br /> <span class="small">Tháng</span> </td>
                                        <td class="text-nowrap"><?=getCategory($row['vps_id'],'cpu')?> CORE</td>
                                        <td class="text-nowrap"><?=getCategory($row['vps_id'],'ram')?> GB</td>
                                        <td class="text-nowrap"><?=getCategory($row['vps_id'],'vitri')?></td>
                                        <td class="text-nowrap"><?=$row['opera']?></td>
                                         <td class="text-nowrap"><?=$row['country']?></td>
                                        <td class="text-nowrap"><?=check_exp($row['update_date'])?></td>
                                        <td class="text-nowrap"><?=$row['time']?></td>
                                        <td class="text-nowrap"><?=status($row['status'])?></td>
                                        <td class="cell-action">
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-icon dropdown-toggle" data-toggle="dropdown">
                                                    <i class="lm lm-more"></i>
                                                </a>
                                                <ul class="dropdown-menu  pull-right" role="menu">
                                                    <li><a href="<?=BASE_URL('client/history-vps/view/'),$row['id']?>">Thông Tin</a>
                                                    </li>
                                                    <li><a href="">Gia Hạn</a>
                                                    </li>
                                                     <li><a href="javascript:" onclick="Huy(<?=$row['id']?>)">Hủy</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
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
            function Huy(id) {
                cuteAlert({
                    type: "question",
                    title: "Xác Nhận Hủy Gói",
                    message: "Bạn có chắc chắn muốn hủy gói này, tiền sẽ tự động hoàn khi hệ thống chưa xác nhận đơn?",
                    confirmText: "Đồng Ý",
                    cancelText: "Hủy"
                }).then((e) => {
                    if (e) {
                        $.ajax({
                            url: "<?= BASE_URL("ajaxs/client/huyvps.php"); ?>",
                            method: "POST",
                            dataType: "JSON",
                            data: {
                                id: id
                            },
                            success: function(respone) {
                                if (respone.status == 'success') {
                                    cuteToast({
                                        type: "success",
                                        message: respone.msg,
                                        timer: 5000
                                    });
                                    setTimeout("location.href = '/client/history-vps';", 100);
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