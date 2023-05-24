<?php
$title = 'Danh mục vps | ' . $NNL->site('tenweb');
require_once __DIR__ . "../../../../core/is_user.php";
require_once __DIR__ . "/Header.php";
require_once __DIR__ . "/Sidebar.php";

?>
<?php

if (isset($_POST['SaveSettings'])) {
    if ($NNL->site('status_demo') != 0) {
        die('<script type="text/javascript">if(!alert("Không được dùng chức năng này vì đây là trang web demo.")){window.history.back().location.reload();}</script>');
    }
    foreach ($_POST as $key => $value) {
        $NNL->update("settings", array(
            'value' => $value
        ), " `name` = '$key' ");
    }
    die('<script type="text/javascript">if(!alert("Lưu thành công !")){window.history.back().location.reload();}</script>');
}
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Danh sách FAQ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?=BASE_URL('admin/');?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Danh sách FAQ</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-6">
                </section>
                <section class="col-lg-6 text-right">
                    <div class="mb-3">
                        <a class="btn btn-primary btn-icon-left m-b-10" href="<?=BASE_URL('admin/question-add');?>"
                            type="button"><i class="fas fa-plus-circle mr-1"></i>Thêm câu hỏi và câu trả lời</a>
                    </div>
                </section>
             
                <section class="col-lg-12 connectedSortable">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-question-circle mr-1"></i>
                                DANH SÁCH CÂU HỎI & TRẢ LỜI
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
                        <div class="card-body">
                            <table id="datatable1" class="table table-striped table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th style="width: 5px;">ID</th>
                                        <th>Câu hỏi</th>
                                        <th>Trả lời</th>
                                        <th>Trạng thái</th>
                                        <th style="width: 20%">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($NNL->get_list("SELECT * FROM `questions` ") as $row) {?>
                                    <tr>
                                        <td><?=$row['id'];?></td>
                                        <td>
                                            <b><?=$row['question'];?></b>
                                        </td>
                                        <td>
                                            <textarea class="form-control" readonly><?=$row['answer'];?></textarea>
                                        </td>
                                        <td><?=display_status_product($row['status']);?></td>
                                        <td>
                                            <a aria-label="" href="<?=base_url('admin/question-edit/'.$row['id']);?>"
                                                style="color:white;" class="btn btn-info btn-sm btn-icon-left m-b-10"
                                                type="button">
                                                <i class="fas fa-edit mr-1"></i><span class="">Edit</span>
                                            </a>
                                            <button style="color:white;"
                                                onclick="RemoveRow('<?=$row['id'];?>')"
                                                class="btn btn-danger btn-sm btn-icon-left m-b-10" type="button">
                                                <i class="fas fa-trash mr-1"></i><span class="">Delete</span>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                   
                </section>
            </div>
        </div>
    </div>
</div>
<?php
require_once __DIR__ . "/Footer.php";
?>
<script type="text/javascript">
function postRemove(id) {
    $.ajax({
        url: "<?=BASE_URL("ajaxs/admin/removeQuestion.php");?>",
        method: "POST",
        dataType: "JSON",
        data: {
            id: id
        },
        success: function(respone) {
            $("#thongbao").html(respone);
        },
        error: function() {
            location.reload();
        }
    });
}
function RemoveRow(id) {
    cuteAlert({
        type: "question",
        title: "Xác nhận xoá hàng",
        message: "Bạn có chắc chắn muốn xóa câu hỏi ID (" + id + ") không ?",
        confirmText: "Đồng Ý",
        cancelText: "Hủy"
    }).then((e) => {
        if (e) {
            postRemove(id);
            location.reload();
        }
    })
}

</script>
<script>
$(function() {
    $('#datatable1').DataTable();
});
</script>