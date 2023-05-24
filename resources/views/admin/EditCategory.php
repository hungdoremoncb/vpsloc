<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'CHỈNH SỬA TOOL | '.$CMSNT->site('tenweb');
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
?>

<?php

if(isset($_GET['id']) && $getUser['level'] == 'admin')
{
    $row = $CMSNT->get_row(" SELECT * FROM `category` WHERE `id` = '".check_string($_GET['id'])."'  ");
    if(!$row)
    {
        admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 500);
    }
}
else
{
    admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 0);
}

if(isset($_POST['LuuTool']) && $getUser['level'] == 'admin' )
{
    if($CMSNT->site('status_demo') == 'ON')
    {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $CMSNT->update("category", array(
        'title' => check_string($_POST['title']),
        'bidanh' => check_string($_POST['bidanh']),
        'version' => check_string($_POST['version']),
        'gia' => check_string($_POST['gia']),
        'link' => check_string($_POST['link']),
        'chitiet' => '',
        'display' => check_string($_POST['display']),
        'server' => '0'
    ), " `id` = '".check_string($_GET['id'])."' ");
    admin_msg_success("Lưu thành công", '', 500);
}

?>


<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chỉnh Sửa Tool <?=$row['title'];?></h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-primary">
                <div class="card-header">
                        <h3 class="card-title">SỬA TOOL</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tên Tool</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" value="<?=$row['title'];?>" name="title" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Bi danh</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" value="<?=$row['bidanh'];?>" name="bidanh" class="form-control" required>
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
                                <label class="col-sm-3 col-form-label">Link Tải</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" value="<?=$row['link'];?>" name="link" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Version</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" value="<?=$row['version'];?>" name="version" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Hiển thị</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="display" required>
                                        <option value="<?=$row['display'];?>"><?=$row['display'];?></option>
                                        <option value="SHOW">SHOW</option>
                                        <option value="HIDE">HIDE</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" name="LuuTool" class="btn btn-primary btn-block">
                                <span>LƯU NGAY</span></button>
                            <a class="btn btn-danger btn-block" href="<?=BASE_URL('Admin/Category');?>">
                                <span>TRỞ LẠI</span></a>
                        </form>
                    </div>
                </div>
            </div>
                
            <!-- <div class="col-md-6">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">CHI TIẾT DANH MỤC</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <img width="100%" src="<?=$row['img'];?>" />
                    </div>
                </div>
            </div> -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>







<?php 
    require_once(__DIR__."/Footer.php");
?>