<?php
$title = 'Chỉnh sửa vps | ' . $NNL->site('tenweb');
require_once(__DIR__ . "../../../../core/is_user.php");
require_once(__DIR__ . "/Header.php");
require_once(__DIR__ . "/Sidebar.php");
?>

<?php
if (isset($_GET['id']) && $getUser['level'] == 'admin') {
    $id = check_string($_GET['id']);
    $row = $NNL->get_row(" SELECT * FROM `license_vps` WHERE `id` = '$id' AND `nguoiban` = '" . $getUser['username'] . "' ");
    if (!$row) {
        admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 500);
    }
} else {
    admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 0);
}

if (isset($_POST['Save']) && $getUser['level'] == 'admin') {
    if ($NNL->site('status_demo') == 'ON') {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $id = check_string($_GET['id']);
    $status = check_string($_POST['status']);
    $ip = $_POST['ip'];
    $tk = $_POST['tk'];
    $mk = $_POST['mk'];
    if (empty($status)) {
        admin_msg_warning("Vui lòng chọn trạng thái", "", 2000);
    }
    $row = $NNL->get_row("SELECT * FROM `license_vps` WHERE `id` = '$id' AND `nguoiban` = '" . $getUser['username'] . "' ");
    if (!$row) {
        admin_msg_warning("Đơn hàng nãy đã hoàn tất, không thể điều chỉnh trạng thái khác", "", 2000);
    }
    $NNL->update("license_vps", array(
        'nguoiban'      => $getUser['username'],
        'ip'            => $ip,
        'tk'            => $tk,
        'mk'            => $mk,
        'status'        => $status
    ), " `id` = '$id' ");
    admin_msg_success("Lưu thành công", BASE_URL('admin/history-vps'), 500);
}

?>


<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chỉnh Sửa Vps #<?= $row['id']; ?></h1>
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
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">IP</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" value="<?= $row['ip']; ?>" name="ip" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tài khoản</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" value="<?= $row['tk']; ?>" name="tk" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Mật khẩu</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" value="<?= $row['mk']; ?>" name="mk" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Trạng thái</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="status" required>
                                        <option value="xuly" <?= $row['status'] == 'xuly' ? 'selected' : ''; ?>>Xử lý
                                        </option>
                                         <option value="nhandon" <?= $row['status'] == 'nhandon' ? 'selected' : ''; ?>>Đang reg vps
                                        </option>
                                        <option value="hoantat" <?= $row['status'] == 'hoantat' ? 'selected' : ''; ?>>Hoàn tất
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" name="Save" class="btn btn-primary btn-block">
                                <span>LƯU NGAY</span></button>
                            <a class="btn btn-danger btn-block" href="<?= BASE_URL('admin/history-vps'); ?>">
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
require_once(__DIR__ . "/Footer.php");
?>