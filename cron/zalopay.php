<?php

define("IN_SITE", true);
require_once("../core/DB.php");
require_once("../core/helpers.php");

$token_zalopay = $NNL->site('api_zalopay');

if ($NNL->site('status_zalopay') == '1') {
    $result = curl_get("https://api.sieuthicode.net/historyapizalopay/$token_zalopay");
    $result = json_decode($result, true);
    foreach ($result['zalopayMsg']['tranList'] as $data) {
        $tid            = check_string($data['trans_id']);
        $sign            = check_string($data['sign']);
        $description    = check_string($data['description']);
        $amount         = check_string($data['trans_amount']);
        $user_id        = parse_order_id($description, $NNL->site('noidung_naptien'));         // TÁCH NỘI DUNG CHUYỂN TIỀN
        // XỬ LÝ AUTO
        if ($sign != 1) continue;

        if ($getUser = $NNL->get_row(" SELECT * FROM `users` WHERE `id` = '$user_id' ")) {
            if ($NNL->num_rows(" SELECT * FROM `bank_auto` WHERE `tranId` = '$tid' AND `comment` = '$description' ") == 0) {
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
                            'noidung'       => 'Nạp tiền tự động qua Ví Zalopay (#' . $tid . ' - '.$description.' - '.$amount.')',
                            'username'      => $getUser['username']
                        ));
                        echo '[<b style="color:green">-</b>] Xử lý thành công 1 hoá đơn.' . PHP_EOL;
                    } 
                }
            }
        }
    }
}

