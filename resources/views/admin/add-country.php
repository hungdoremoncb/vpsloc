<?php
$title = 'Thêm danh mục | ' . $NNL->site('tenweb');
require_once __DIR__ . "../../../../core/is_user.php";
require_once __DIR__ . "/Header.php";
require_once __DIR__ . "/Sidebar.php";
?>

<?php
if (isset($_POST['addcate']) && $getUser['level'] == 'admin') {
    if ($NNL->site('status_demo') == 1) {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $NNL->insert("country", array(
        'name' => xss($_POST['name']),
        'status' => xss($_POST['status']),
    ));
    admin_msg_success("Thêm thành công", BASE_URL('admin/country'), 500);
}

?>


<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm Quốc Gia</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12 connectedSortable">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-cart-plus mr-1"></i>
                                Thêm Quốc Gia
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn bg-success btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn bg-warning btn-sm" data-card-widget="maximize"><i
                                        class="fas fa-expand"></i>
                                </button>
                                <button type="button" class="btn bg-danger btn-sm" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Quốc Gia</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Nhập tên quốc gia" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Trạng thái</label>
                                    <select class="form-control" name="status" required>
                                        <option value="1">Hiển thị</option>
                                        <option value="0">Ẩn</option>
                                    </select>
                                </div>

                            </div>
                            <div class="card-footer clearfix">
                                <button name="addcate" class="btn btn-info btn-icon-left m-b-10" type="submit"><i
                                        class="fas fa-plus mr-1"></i>Thêm Ngay</button>
                            </div>
                        </form>
                    </div>
                </section>

            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<!-- Modal -->

<!-- Modal -->
<script type="text/javascript">
function Keyword() {
    $.ajax({
        url: "get-name.php",
        type: "post",
        dataType: "text",
        data: {
            name: $('#name').val()
        },
        success: function(result) {
            $('#cname').val(result);
        }
    });
};
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