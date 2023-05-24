<?php
define("IN_SITE", true);
require_once("../../core/DB.php");
require_once("../../core/helpers.php");
require_once("../../core/is_user.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //đăng nhập

  
    if (empty($_SESSION['login'])) {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Vui lòng đăng nhập để thực hiện'
        ]));
    }
    if (empty($_POST['opera']) || !isset($_POST['opera'])) {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Vui lòng chọn hệ điều hành'
        ]));
    }
    if (empty($_POST['country']) || !isset($_POST['country'])) {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Vui lòng chọn quốc gia'
        ]));
    }
     $id = xss($_POST['id']);
    $opera = xss($_POST['opera']);
    $country = xss($_POST['country']);
    $row = $NNL->get_row(" SELECT * FROM `category_vps` WHERE `id` = '$id' AND `display`='SHOW' ");
    if (!$row) {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Sản phẩm không tồn tại trong hệ thống'
        ]));
    }
    $check_opera = $NNL->get_row(" SELECT * FROM `operating_system` WHERE `id` = '$opera' AND `status`='1'");
    if (!$check_opera) {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Hệ điều hành không hợp lệ'
        ]));
    }
    $check_country = $NNL->get_row(" SELECT * FROM `country` WHERE `id` = '$country' AND `status`='1'");
    if (!$check_country) {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Quốc gia không hợp lệ'
        ]));
    }
     if (isset($_POST['coupon'])) {
        $code = xss($_POST['coupon']);
        $coupon = $NNL->get_row("SELECT * FROM `discount` WHERE `code` = '$code' ");
        if ($coupon) {
            $d = getdate();
            $today = $d['year'] . "-" . $d['mon'] . "-" . $d['mday'];
            if (strtotime($coupon['expiration_date']) <= strtotime($today)) {
                $discount = 0;
            } else if ($coupon['limit_number'] - $coupon['number_used'] == 0) {
                $discount = 0;
            } else {
                $discount = $coupon['discount'];
            }
        }
    }
    $total = $row['gia'];
    if (isset($discount)) {
        $total = $total - $total*$discount/100;
        if($coupon['payment_limit'] > $row['gia'] ){
            $total = $row['gia'];
        }
        if ($total <= 0) {
            $total = 0;
        }
    }
    if ($total > $getUser['money']) {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Bạn không đủ ' . format_cash($total) . 'đ, vui lòng nạp thêm'
        ]));
    }
    $isMoney = $NNL->tru("users", "money", $total, " `username` = '" . $getUser['username'] . "' ");
    if ($isMoney) {

        /* GHI LOG DÒNG TIỀN */
        $NNL->insert("dongtien", array(
            'sotientruoc'   => $getUser['money'],
            'sotienthaydoi' => $row['gia'],
            'sotiensau'     => $getUser['money'] - $row['gia'],
            'thoigian'      => gettime(),
            'noidung'       => 'Mua VPS (#' . $row['namevps'] . ')',
            'username'      => $getUser['username']
        ));

        /* UPDATE ĐÃ BÁN */
        $NNL->update("category_vps", array(
            'daban'     => $row['daban'] + 1
        ), " `id` = '" . xss($_POST['id']) . "' ");
        /* UPDATE COUPON */
        if ($coupon) {
            $NNL->update("discount", array(
                'number_used'     => $coupon['number_used'] + 1
            ), " `id` = '" . xss($coupon['id']) . "' ");
        }
        /* THÊM TOOL */
        $NNL->insert("license_vps", array(
            'nguoiban'   => 'NULL',
            'user'       => check_string($getUser['username']),
            'vps_id'     => $_POST['id'],
            'gia'        => $row['gia'],
            'ip'         => "Đang xử lý",
            'tk'         => "Đang xử lý",
            'mk'         => "Đang xử lý",
            'opera'         => $check_opera['name'],
            'country'         => $check_country['name'],
            'status'     => "xuly",
              'create_date'       => gettime(),
            'update_date'       => time()+(86400*30)
        ));

        $data = '&text=@' . $row['nguoiban'] . ': VỪA CÓ 1 ĐƠN #VPS ' . $row['namevps'] . ' ||| #CPU ' . $row['cpu'] . ' CORE ||| #RAM ' . $row['ram'] . ' GB ||| #LOCATION ' . $row['vitri'] . ' ||| #GIÁ ' . format_cash($row['gia']) . ' VNĐ 🥰';
        BotTele($data);
        die(json_encode([
            'status'    => 'success',
            'msg'       => 'Thanh toán thành công'
        ]));
    }
}
