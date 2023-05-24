<?php
define("IN_SITE", true);
require_once("../../core/DB.php");
require_once("../../core/helpers.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_SESSION['login'])) {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Vui lòng đăng nhập để thực hiện'
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

    if ($row = $NNL->get_row("SELECT * FROM `category_vps` WHERE `id` = '" . xss($_POST['id']) . "' ")) {
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
        die(format_cash($total));
    }
    die(format_cash(0));
}
