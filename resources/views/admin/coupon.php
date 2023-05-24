<?php
$title = 'Danh mục vps | ' . $NNL->site('tenweb');
require_once __DIR__ . "../../../../core/is_user.php";
require_once __DIR__ . "/Header.php";
require_once __DIR__ . "/Sidebar.php";

?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DANH SÁCH MÃ GIẢM GIÁ</h1>
                </div>
            </div>

        </div>
    </section>
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <section class="col-lg-6">
            </section>
            <section class="col-lg-6 text-right">
                <div class="mb-3">
                <a class="btn btn-primary btn-icon-left m-b-10" href="<?= BASE_URL('admin/coupon-add') ?>" type="button"><i class="fas fa-plus-circle mr-1"></i>Thêm mới</a>
                </div>
            </section>
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">DANH SÁCH MÃ GIẢM GIÁ</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5px;">#</th>
                                        <th>Mã giảm giá</th>
                                        <th>Số tiền đơn hàng áp dụng tối thiểu</th>
                                        <th>% giảm</th>
                                        <th>Số lần giới hạn nhập</th>
                                        <th>Đã dùng</th>
                                        <th>Ngày hết hạn</th>
                                       
                                        <th style="width: 20%">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($NNL->get_list("SELECT * FROM `discount` ORDER BY `id` DESC") as $row) { ?>
                                        <tr>
                                            <td><?= $row['id']; ?></td>
                                            <td><?= $row['code']; ?></td>
                                            <td><b><?= format_cash($row['payment_limit']); ?></b></td>
                                            <td><b style="color: green;"><?= format_cash($row['discount']); ?>%</b></td>
                                            <td><b style="color: blue;"><?= $row['limit_number']; ?></b></td>
                                            <td><b style="color: red;"><?= $row['number_used']; ?></b></td>
                                            <td><?= $row['expiration_date']; ?></td>
                                           

                                            <td>
                                                <button style="color:white;" onclick="RemoveRow('<?= $row['id']; ?>')" class="btn btn-danger btn-sm btn-icon-left m-b-10" type="button">
                                                    <i class="fas fa-trash mr-1"></i><span class="">Delete</span>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                                    </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
    function RemoveRow(id) {
        cuteAlert({
            type: "question",
            title: "Xác Nhận Xóa Mã Giảm",
            message: "Bạn có đồng ý xóa mã giảm này không ?",
            confirmText: "Đồng Ý",
            cancelText: "Hủy"
        }).then((e) => {
            if (e) {
                $.ajax({
                    url: "<?= BASE_URL('ajaxs/admin/removeCoupon.php') ?>",
                    method: "POST",
                    data: {
                        id: id
                    },
                    success: function(respone) {
                        $("#thongbao").html(respone);
                    },
                });
            }
        })
    }
</script>

<script>
    $(function() {
        $("#datatable").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $("#datatable1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $("#datatable2").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>

<?php
require_once __DIR__ . "/Footer.php";
?>