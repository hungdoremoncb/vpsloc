<?php
define("IN_SITE", true);
require_once "../../core/DB.php";
require_once "../../core/helpers.php";
require_once "../../core/is_user.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //đăng nhập
    if (empty($_SESSION['login'])) {
        die(json_encode([
            'status' => 'error',
            'msg' => 'Vui lòng đăng nhập để thực hiện',
        ]));
    }

    if(!isset($_POST['id']) || empty($_POST['id'])){
        die(json_encode([
            'status' => 'error',
            'msg' => 'Vui lòng chọn gói hủy',
        ]));
    }
    $id = xss($_POST['id']);
    $row = $NNL->get_row(" SELECT * FROM `license_vps` WHERE `id` = '$id' AND `user`='" . $getUser['username'] . "' AND `status`='xuly' ");
    if (!$row) {
        die(json_encode([
            'status' => 'error',
            'msg' => 'Không thể hủy gói này',
        ]));
    }
    $real_amount = $row['gia'];
    $NNL->cong("users", "money", $real_amount, " `username` = '" . $row['user'] . "' ");
    $NNL->insert("dongtien", array(
        'sotientruoc' => $getUser['money'],
        'sotienthaydoi' => $real_amount,
        'sotiensau' => $getUser['money'] + $real_amount,
        'thoigian' => gettime(),
        'noidung' => 'Hoàn tiền do khách hàng hủy gói vps (#' . getRowRealtime('category_vps', $row['vps_id'], 'namevps') . ')',
        'username' => $getUser['username'],
    ));
    $NNL->remove("license_vps", " `id` = '" . $row['id'] . "' ");

    die(json_encode([
        'status' => 'success',
        'msg' => 'Đã hủy gói thành công',
    ]));

}
