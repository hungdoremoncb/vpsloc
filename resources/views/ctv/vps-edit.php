<?php
  $title = 'Chỉnh sửa vps | ' . $NNL->site('tenweb');
  require_once(__DIR__ . "../../../../core/is_user.php");
  require_once(__DIR__ . "/header.php");
  require_once(__DIR__ . "/sidebar.php");
?>

<?php
if(isset($_GET['id']) && $getUser['level'] == 'ctv')
{
    $id = xss($_GET['id']);
    $row = $NNL->get_row(" SELECT * FROM `category_vps` WHERE `id` = '$id' AND `nguoiban` = '".$getUser['username']."' ");
    if(!$row)
    {
        admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 500);
    }
}
else
{
    admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 0);
}

if(isset($_POST['LuuVps']) && $getUser['level'] == 'ctv' )
{
    if($NNL->site('status_demo') == 'ON')
    {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $NNL->update("category_vps", array(
        'namevps' => check_string($_POST['namevps']),
        'gia' => check_string($_POST['gia']),
        'cpu' => check_string($_POST['cpu']),
        'ram' => check_string($_POST['ram']),
        'category' => check_string($_POST['category']),
        'vitri' => check_string($_POST['vitri']),
        'bandwidth' => check_string($_POST['bandwidth']),
        'display' => check_string($_POST['display'])
    ), " `id` = '".check_string($_GET['id'])."' ");
    admin_msg_success("Lưu thành công", '', 500);
}

?>


<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chỉnh Sửa Vps <?=$row['namevps'];?></h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-primary">
                <div class="card-header">
                        <h3 class="card-title">SỬA VPS</h3>
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
                                        <input type="text" value="<?=$row['namevps'];?>" name="namevps" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Danh mục</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <select class="form-control" name="category" required>
                                                        <?php foreach ($NNL->get_list("SELECT * FROM `category` WHERE `id`='" . $row['category'] . "'") as $category) { ?>
                                                            <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                                                        <?php } ?>
                                                        <?php foreach ($NNL->get_list("SELECT * FROM `category` ORDER BY `id` ASC") as $brand) { ?>
                                                            <option value="<?= $brand['id']; ?>"><?= $brand['title']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Giá</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="number" value="<?=$row['gia'];?>" name="gia" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">CPU</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="number" value="<?=$row['cpu'];?>" name="cpu" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">RAM</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="number" value="<?=$row['ram'];?>" name="ram" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Vị trí</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" value="<?=$row['vitri'];?>" name="vitri" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Giá</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="number" value="<?=$row['gia'];?>" name="gia" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">BĂNG THÔNG</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" value="<?=$row['bandwidth'];?>" name="bandwidth" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Hiển thị</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" id="display" name="display" required>
                                        <?php $show = "HIDE"; if($row['display'] == "SHOW"){$show = "SHOW";}?>
                                        <option value="<?=$row['display'];?>"><?=$show;?></option>
                                        <option value="SHOW">SHOW</option>
                                        <option value="HIDE">HIDE</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" name="LuuVps" class="btn btn-primary btn-block">
                                <span>LƯU NGAY</span></button>
                            <a class="btn btn-danger btn-block" href="<?=BASE_URL('ctv/vps');?>">
                                <span>TRỞ LẠI</span></a>
                        </form>
                    </div>
                </div>
            </div>
          
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<?php 
    require_once(__DIR__."/footer.php");
?>