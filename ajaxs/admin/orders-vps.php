<?php
define("IN_SITE", true);
require_once("../../core/DB.php");
require_once("../../core/helpers.php");
require_once("../../core/is_user.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = xss($_POST['id']);
    $row = $NNL->get_row("SELECT * FROM `license_vps` WHERE `id` = '$id' AND `status` = 'xuly' ");
    if (!$row) {
        nnl_error("Đơn hàng này đã bị người khác nhận rồi !");
    }
    $NNL->update("license_vps", array(
        'nguoiban'  => $getUser['username'],
        'ip'        => 'Đang thực khởi tạo',
        'tk'        => 'Đang thực khởi tạo',
        'mk'        => 'Đang thực khởi tạo',
        'status'    => 'nhandon',
    ), " `id` = '$id' ");
    nnl_success_time("Nhận thành công",BASE_URL('admin/orders-vps'),1000);
}
