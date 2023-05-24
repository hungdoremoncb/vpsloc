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
                    <h1>Hệ Điều Hành</h1>
                </div>
            </div>

        </div>
    </section>
    <section class="content">
        <div class="row">
            <section class="col-lg-6">
            </section>
            <section class="col-lg-6 text-right">
                <div class="mb-3">
                    <a class="btn btn-primary btn-icon-left m-b-10" href="<?= BASE_URL('admin/add-operating') ?>" type="button"><i class="fas fa-plus-circle mr-1"></i>Thêm Mới</a>
                </div>
            </section>
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Hệ Điều Hành</h3>
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
                                        <th>ID</th>
                                        <th>SẮP XẾP VỊ TRÍ</th>
                                        <th>TÊN HỆ ĐIỀU HÀNH</th>
                                        <th>TRẠNG THÁI</th>
                                        <th>THAO TÁC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($NNL->get_list(" SELECT * FROM `operating_system` ORDER BY `stt` ASC ") as $row) {

                                    ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $row['stt']; ?></td>
                                            <td><?= $row['name']; ?></td>
                                            <td><?= display_2($row['status']); ?></td>
                                            <td>
                                                <button class="btn btn-danger" onclick="RemoveRow(<?= $row['id'] ?>)">
                                                    XÓA
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
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
    function RemoveRow(id) {
        cuteAlert({
            type: "question",
            title: "Xác Nhận Xóa Danh Mục",
            message: "Bạn có đồng ý xóa hệ điều hành này không ?",
            confirmText: "Đồng Ý",
            cancelText: "Hủy"
        }).then((e) => {
            if (e) {
                $.ajax({
                    url: "<?= BASE_URL('ajaxs/admin/removeOperating.php') ?>",
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