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
                    <h1>Danh mục vps</h1>
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
                        <a class="btn btn-primary btn-icon-left m-b-10" href="<?=BASE_URL('admin/category-add')?>"
                            type="button"><i class="fas fa-plus-circle mr-1"></i>Thêm chuyên mục</a>
                    </div>
                </section>
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">DANH MỤC VPS</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable1" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>TÊN DANH MỤC</th>
                                            <th>SLUG</th>
                                            <th>TRẠNG THÁI</th>
                                            <th>THAO TÁC</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($NNL->get_list(" SELECT * FROM `category` ORDER BY id DESC ") as $row) {

                                            ?>
                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$row['title'];?></td>
                                            <td><?=$row['slug'];?></td>
                                            <td><?=display_2($row['status']);?></td>
                                            <td>
                                                <a href="/admin/edit-category/<?=$row['id']?>" class="btn btn-primary">
                                                   <i class="fa fa-edit"></i> SỬA
                                                </a>
                                                <button class="btn btn-danger" onclick="RemoveRow(<?=$row['id']?>)">
                                                <i class="fa fa-trash"></i> XÓA
                                                </button>
                                            </td>
                                        </tr>
                                        <?php }?>
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
        title: "Xác Nhận Xóa Danh Mục",
        message: "Bạn có đồng ý xóa danh mục này không ?",
        confirmText: "Đồng Ý",
        cancelText: "Hủy"
    }).then((e) => {
        if (e) {
            $.ajax({
                url: "<?=BASE_URL('ajaxs/admin/removeCate.php')?>",
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