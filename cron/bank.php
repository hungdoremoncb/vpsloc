<?php

define("IN_SITE", true);
require_once("../core/DB.php");
require_once("../core/helpers.php");


/* START CHỐNG SPAM */

$token_mbbank = $NNL->site('api_mbbank');

if ($NNL->site('status_mbbank') == '1') {
    $result = curl_get("https://api.sieuthicode.net/historyapimbbank/$token_mbbank");
    $result = json_decode($result, true);
    foreach ($result['TranList'] as $data) {
        $tid = explode('\\', $data['tranId'])[0];
        $description    = check_string($data['description']);
        $amount         = check_string($data['creditAmount']);
        $user_id        = parse_order_id($description, $NNL->site('noidung_naptien'));         // TÁCH NỘI DUNG CHUYỂN TIỀN
        // XỬ LÝ AUTO
        if ($getUser = $NNL->get_row(" SELECT * FROM `users` WHERE `id` = '$user_id' ")) {
            if ($NNL->num_rows(" SELECT * FROM `bank_auto` WHERE `tranId` = '$tid'") == 0) {
                $create = $NNL->insert("bank_auto", array(
                    'username'      => $getUser['username'],
                    'tranId'        => $tid,
                    'comment'       => $description,
                    'amount'        => $amount
                ));
                if ($create) {
                    $real_amount = $amount + $amount * $NNL->site('ck_bank') / 100;
                    $isCheckMoney = $NNL->cong("users", "money", $real_amount, " `username` = '" . $getUser['username'] . "' ");
                    if ($isCheckMoney) {
                        $NNL->cong("users", "total_money", $real_amount, " `username` = '" . $getUser['username'] . "' ");
                        $NNL->insert("dongtien", array(
                            'sotientruoc'   => $getUser['money'],
                            'sotienthaydoi' => $real_amount,
                            'sotiensau'     => $getUser['money'] + $real_amount,
                            'thoigian'      => gettime(),
                            'noidung'       => 'Nạp tiền tự động qua Mbbank (#' . $tid . ' - '.$description.' - '.$amount.')',
                            'username'      => $getUser['username']
                        ));
                        echo '[<b style="color:green">-</b>] Xử lý thành công 1 hoá đơn.' . PHP_EOL;
                    } 
                }
            }
        }
    }
}