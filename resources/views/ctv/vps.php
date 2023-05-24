<?php
$title = 'Vps | ' . $NNL->site('tenweb');
require_once(__DIR__ . "../../../../core/is_user.php");
require_once(__DIR__ . "/header.php");
require_once(__DIR__ . "/sidebar.php");
?>

<?php
if(isset($_POST['ThemVps']) && $getUser['level'] == 'ctv' )
{
    if($NNL->site('status_demo') == 'ON')
    {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $insert = $NNL->insert("category_vps", array(
        'nguoiban'  => check_string($getUser['username']),
        'namevps'   => check_string($_POST['namevps']),
        'gia'       => check_string($_POST['gia']),
        'category' => check_string($_POST['category']),
        'cpu'       => check_string($_POST['cpu']),
        'ram'       => check_string($_POST['ram']),
        'vitri'     => check_string($_POST['vitri']),
        'bandwidth' => check_string($_POST['bandwidth']),
        'display'   => check_string($_POST['display'])
    ));
    if($insert)
    {
        admin_msg_success("Thêm thành công", '', 500);
    }
    admin_msg_warning("Vui lòng kiểm tra lại dữ liệu!", '', 2000);
}
?>


<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chuyên Mục Vps</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">THÊM VPS</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Loại Vps</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="namevps" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                   <label class="col-sm-3 col-form-label">Danh mục</label>
                                   <div class="col-sm-9">
                                        <div class="form-line">
                                             <select class="form-control" name="category" required>
                                        <?php foreach ($NNL->get_list("SELECT * FROM `category` ORDER BY `id` ASC") as $row) { ?>
                                            <option value="<?= $row['id']; ?>"><?= $row['title']; ?></option>
                                        <?php } ?>
                                    </select>
                                        </div>
                                   </div>
                                   
                                </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Giá</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="number" name="gia" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">CPU</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="number" name="cpu" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">RAM</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="number" name="ram" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Vị trí</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="vitri" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Băng thông</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="bandwidth" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Hiển thị</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="display" required>
                                        <option value="SHOW">SHOW</option>
                                        <option value="HIDE">HIDE</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" name="ThemVps" class="btn btn-primary btn-block">
                                <span>THÊM NGAY</span></button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">DANH SÁCH VPS</h3>
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
                                        <th>STT</th>
                                        <th>LOẠI VPS</th>
                                        <th>GIÁ</th>
                                        <th>CPU</th>
                                        <th>RAM</th>
                                        <th>VỊ TRÍ</th>
                                        <th>BĂNG THÔNG</th>
                                        <th>HIỂN THỊ</th>
                                        <th>THAO TÁC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach($NNL->get_list(" SELECT * FROM `category_vps` ORDER BY id DESC ") as $row){
                                    if($row['nguoiban'] == $getUser['username']){
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=$row['namevps'];?></td>
                                        <td><?=$row['gia'];?></td>
                                        <td><?=$row['cpu'];?></td>
                                        <td><?=$row['ram'];?></td>
                                        <td><?=$row['vitri'];?></td>
                                        <td><?=$row['bandwidth'];?></td>
                                        <td><?=display($row['display']);?></td>
                                        <td>
                                            <a href="<?=BASE_URL('ctv/vps-edit/'),$row['id']?>"class="btn btn-outline-info">
                                               CHỈNH SỬA
                                            </a>
                                            <a onclick="del(<?=$row['id'];?>)" class="btn btn-outline-danger">
                                               XÓA
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } }?>
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
<div id="thongbao"></div>

<script type="text/javascript">
     function del(id) {
        cuteAlert({
            type: "question",
            title: "Xác Nhận VPS",
            message: "Bạn có đồng ý xóa vps ID " + id + " không ?",
            confirmText: "Đồng Ý",
            cancelText: "Hủy"
        }).then((e) => {
            if (e) {
                $.ajax({
                    url: "<?= BASE_URL("ajaxs/ctv/removeVps.php"); ?>",
                    method: "POST",
                    data: {
                        action: "xoavps",
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
    require_once(__DIR__."/footer.php");
?>