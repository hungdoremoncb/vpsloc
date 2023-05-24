<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'QUẢN LÝ TOOL | '.$CMSNT->site('tenweb');
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
?>

<?php
if(isset($_POST['ThemTool']) && $getUser['level'] == 'admin' )
{
    if($CMSNT->site('status_demo') == 'ON')
    {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $CMSNT->insert("category", array(
        'img'       => '/assets/storage/images/',
        'title'     => check_string($_POST['title']),
        'bidanh'    => check_string($_POST['bidanh']),
        'gia'       => check_string($_POST['gia']),
        'link'      => check_string($_POST['link']),
        'chitiet'   => '',
        'version'   => check_string($_POST['version']),
        'display'   => check_string($_POST['display']),
        'server'    => '0'
    ));
    admin_msg_success("Thêm thành công", '', 500);
}
?>


<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chuyên Mục Tool</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">THÊM TOOL</h3>
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
                                        <input type="text" name="title" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Bi danh</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="bidanh" class="form-control" required>
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
                                <label class="col-sm-3 col-form-label">Link Tải</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="link" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Version</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="version" class="form-control" required>
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

                            <button type="submit" name="ThemTool" class="btn btn-primary btn-block">
                                <span>THÊM NGAY</span></button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">DANH SÁCH TOOL</h3>
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
                                        <th>STT</th>
                                        <th>TÊN TOOL</th>
                                        <th>BÍ DANH</th>
                                        <th>GIÁ</th>
                                        <th>LINK</th>
                                        <th>VERSION</th>
                                        <th>HIỂN THỊ</th>
                                        <th>THAO TÁC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach($CMSNT->get_list(" SELECT * FROM `category` ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=$row['title'];?></td>
                                        <td><?=$row['bidanh'];?></td>
                                        <td style="color:red;"><?=format_cash($row['gia']);?> VNĐ</td>
                                        <td style="color:green;"><?=$row['link'];?></td>
                                        <td><?=$row['version'];?></td>
                                        <td><?=display($row['display']);?></td>
                                        <td>
                                            <a class="btn btn-primary"
                                                href="<?=BASE_URL('Admin/Category/Edit/');?><?=$row['id'];?>"><i
                                                class="fas fa-edit"></i>
                                            <span>EDIT</span></a>
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
    require_once(__DIR__."/Footer.php");
?>