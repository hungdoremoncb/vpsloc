<?php
      $title = 'Quản lý thông báo | '.$NNL->site('tenweb');
      require_once(__DIR__."../../../../core/is_user.php");
      require_once(__DIR__."/Header.php");
      require_once(__DIR__."/Sidebar.php");
?>
<?php
if (isset($_POST['AddNoti']) && $getUser['level'] == 'admin') {
    $isInsert = $NNL->insert("notifications", [
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        'status' => $_POST['status'],
        'create_date' => gettime()
    ]);
    if ($isInsert) {
        die('<script type="text/javascript">if(!alert("Thêm thành công !")){location.href = "' . BASE_URL('admin/notification') . '";}</script>');
    } else {
        die('<script type="text/javascript">if(!alert("Thêm thất bại !")){window.history.back().location.reload();}</script>');
    }
}
?>



<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý thông báo</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">THÔNG BÁO</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                         <form action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề</label>
                                    <input type="text" class="form-control" name="title" placeholder="Nhập tiêu đề" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Thông báo</label>
                                    <textarea id="summernote" name="content"></textarea>
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
                                <button name="AddNoti" class="btn btn-info btn-icon-left m-b-10" type="submit"><i class="fas fa-plus mr-1"></i>Thêm Ngay</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">DANH SÁCH THÔNG BÁO</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered table-striped table-hover">
                                <thead>
                                        <tr>
                                            <th style="width: 5px;">STT</th>
                                            <th>Tiêu đề</th>
                                            <th>Nội dung</th>
                                            <th>Thời gian</th>
                                            <th style="width: 20%">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0;
                                        foreach ($NNL->get_list("SELECT * FROM `notifications` ORDER BY `id` DESC") as $row) { ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                
                                                <td>
                                                    <?= $row['title'] ?>
                                                </td>
                                                <td>
                                                    <?= $row['content'] ?>
                                                </td>
                                                <td>
                                                    <?= $row['create_date'] ?>
                                                </td>
                                                <td>
                                                    <button style="color:white;" onclick="RemoveRow(<?= $row['id'] ?>)" class="btn btn-danger btn-sm btn-icon-left m-b-10" type="button">
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
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>




<script type="text/javascript">
 
    
     function RemoveRow(id) {
        cuteAlert({
            type: "question",
            title: "Xác Nhận Xóa Thông Báo",
            message: "Bạn có đồng ý xóa thông báo này không ?",
            confirmText: "Đồng Ý",
            cancelText: "Hủy"
        }).then((e) => {
            if (e) {
                $.ajax({
                    url: "<?= BASE_URL('ajaxs/admin/removeNoti.php') ?>",
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
    $("#datatable3").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
});
</script>
<script>
$(function() {
   $('#summernote').summernote({
        placeholder: 'Điền nội dung',
        tabsize: 2,
        height: 400,
    });
})
</script>


<?php 
    require_once(__DIR__."/Footer.php");
?>