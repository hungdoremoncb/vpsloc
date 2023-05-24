<?php
  $title = 'Chỉnh sửa thành viên | '.$NNL->site('tenweb');
  require_once(__DIR__."../../../../core/is_user.php");
  require_once(__DIR__."/Header.php");
  require_once(__DIR__."/Sidebar.php");
?>
<?php

if(isset($_GET['id']) && $getUser['level'] == 'admin')
{
    $row = $NNL->get_row(" SELECT * FROM `users` WHERE `id` = '".check_string($_GET['id'])."'  ");
    if(!$row)
    {
        admin_msg_error("Người dùng này không tồn tại", BASE_URL(''), 500);
    }
}
else
{
    admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 0);
}

if(isset($_POST['btnCongTien']) && isset($_POST['value']) && isset($row['username']) && $getUser['level'] == 'admin')
{
    $value = check_string($_POST['value']);
    $ghichu = check_string($_POST['ghichu']);
    if($value <= 0)
    {
        admin_msg_error("Vui lòng nhập số tiền hợp lệ", "", 2000);
    }
    $create = $NNL->insert("dongtien", [
        'sotientruoc' => $row['money'],
        'sotienthaydoi' => $value,
        'sotiensau' => $row['money'] + $value,
        'thoigian' => gettime(),
        'noidung' => 'Admin '. $getUser['username'] .' cộng tiền ('.$ghichu.')',
        'username' => $row['username']
    ]);
    if($create)
    {
        $NNL->cong("users", "money", $value, " `username` = '".$row['username']."' ");
        admin_msg_success("Cộng tiền thành công!", "", 2000);
    }
    else
    {
        admin_msg_error("Vui lòng liên hệ kỹ thuật Zalo 0964290613", "", 12000);
    } 
}

if(isset($_POST['btnTruTien']) && isset($_POST['value']) && isset($row['username']) && $getUser['level'] == 'admin')
{
    $value = check_string($_POST['value']);
    $ghichu = check_string($_POST['ghichu']);
    if($value <= 0)
    {
        admin_msg_error("Vui lòng nhập số tiền hợp lệ", "", 2000);
    }
    $create = $NNL->insert("dongtien", [
        'sotientruoc' => $row['money'],
        'sotienthaydoi' => $value,
        'sotiensau' => $row['money'] - $value,
        'thoigian' => gettime(),
        'noidung' => 'Admin '. $getUser['username'] .' trừ tiền ('.$ghichu.')',
        'username' => $row['username']
    ]);
    if($create)
    {
        $NNL->tru("users", "money", $value, " `username` = '".$row['username']."' ");
        admin_msg_success("Trừ tiền thành công!", "", 2000);
    }
    else
    {
        admin_msg_error("Vui lòng liên hệ kỹ thuật Zalo 0964290613", "", 12000);
    }
    
}
if(isset($_POST['btnSaveUser']) && isset($_GET['id']) && $getUser['level'] == 'admin')
{
    $token = check_string($_POST['token']);
    $level = check_string($_POST['level']);
    $banned = check_string($_POST['banned']);

   $NNL->update("users", array(
            'token'         => $token,
            'level'         => $level,
            'banned'        => $banned
        ), " `id` = '".$row['id']."' ");
   
    admin_msg_success("Thay đổi user thành công", "", 1000);
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chỉnh sửa thành viên</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">CHỈNH SỬA THÀNH VIÊN</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="inputEmail3"
                                            value="<?=$row['username'];?>" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="password"
                                            value="<?=$row['password'];?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Token</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="token"
                                            value="<?=$row['token'];?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Số dư</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="number" class="form-control" id="inputPassword3" name="money"
                                            value="<?=$row['money'];?>" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Cấp độ</label>
                                <div class="col-sm-10">
                                    <select class="custom-select" name="level">
                                        <option value="ctv" <?= $row['level'] == 'ctv' ? 'selected' : ''; ?>>Cộng tác viên
                                        </option>
                                        <option value="admin" <?= $row['level'] == 'admin' ? 'selected' : ''; ?>>Admin
                                        </option>
                                        <option value="" <?= $row['level'] == '' ? 'selected' : ''; ?>>Thành viên
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">WebHook</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="ref" value="<?=$row['ref'];?>"
                                            placeholder="https://web.telegram.org/z/#-698875550">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Trạng thái</label>
                                <div class="col-sm-10">
                                    <select class="custom-select" name="banned">
                                        <?php if($row['banned'] == "0"){ ?>
                                            <option value="0">Hoạt động</option>
                                            <option value="1">Banned</option>
                                        <?php } ?>
                                        <?php if($row['banned'] == "1"){ ?>
                                            <option value="1">Banned</option>
                                            <option value="0">Hoạt động</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Ngày đăng ký</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="inputEmail3"
                                            value="<?=$row['createdate'];?>" disabled>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" name="btnSaveUser" class="btn btn-primary btn-block waves-effect">
                                <span>LƯU</span>
                            </button>

                            <a type="button" href="<?=BASE_URL('Admin/UsersSearch');?>"
                                class="btn btn-danger btn-block waves-effect">
                                <span>TRỞ LẠI</span>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">CỘNG TIỀN</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Số tiền cộng</label>
                                <div class="col-sm-8">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="value" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Ghi chú</label>
                                <div class="col-sm-8">
                                    <div class="form-line">
                                        <textarea class="form-control" name="ghichu" rows="3"
                                            placeholder="Nhập ghi chú cộng tiền nếu có"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="btnCongTien" class="btn btn-primary btn-block waves-effect">
                                <span>XÁC NHẬN</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-outline card-danger">
                    <div class="card-header">
                        <h3 class="card-title">TRỪ TIỀN</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Số tiền trừ</label>
                                <div class="col-sm-8">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="value" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Ghi chú</label>
                                <div class="col-sm-8">
                                    <div class="form-line">
                                        <textarea class="form-control" name="ghichu" rows="3"
                                            placeholder="Nhập ghi chú trừ tiền nếu có"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="btnTruTien" class="btn btn-primary btn-block waves-effect">
                                <span>XÁC NHẬN</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">DÒNG TIỀN</h3>
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
                                        <th>SỐ TIỀN TRƯỚC</th>
                                        <th>SỐ TIỀN THAY ĐỔI</th>
                                        <th>SỐ TIỀN HIỆN TẠI</th>
                                        <th>THỜI GIAN</th>
                                        <th>NỘI DUNG</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach($NNL->get_list(" SELECT * FROM `dongtien` WHERE `username` = '".$row['username']."' ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=format_cash($row['sotientruoc']);?></td>
                                        <td><?=format_cash($row['sotienthaydoi']);?></td>
                                        <td><?=format_cash($row['sotiensau']);?></td>
                                        <td><span class="badge badge-dark px-3"><?=$row['thoigian'];?></span></td>
                                        <td><?=$row['noidung'];?></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>SỐ TIỀN TRƯỚC</th>
                                        <th>SỐ TIỀN THAY ĐỔI</th>
                                        <th>SỐ TIỀN HIỆN TẠI</th>
                                        <th>THỜI GIAN</th>
                                        <th>NỘI DUNG</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<script>
$(function() {
    $("#datatable").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
});
</script>






<?php 
     require_once(__DIR__."/Footer.php");
?>