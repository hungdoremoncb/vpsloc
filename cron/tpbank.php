<?php

define("IN_SITE", true);
require_once("../core/DB.php");
require_once("../core/helpers.php");


/* START CHỐNG SPAM */

$token_tpbank = $NNL->site('api_tpbank');

if ($NNL->site('status_tpbank') == '1') {
    $result = curl_get("https://api.sieuthicode.net/historyapitpb/$token_tpbank");
    $result = json_decode($result, true);
    foreach ($result['transactionInfos'] as $data) {
        $tid            = check_string($data['id']);
        $description    = check_string($data['description']);
        $amount         = check_string($data['amount']);
        $user_id        = parse_order_id($description, $NNL->site('noidung_naptien'));         // TÁCH NỘI DUNG CHUYỂN TIỀN
        // XỬ LÝ AUTO
        if ($getUser = $NNL->get_row(" SELECT * FROM `users` WHERE `id` = '$user_id' ")) {
            if ($NNL->num_rows(" SELECT * FROM `bank_auto` WHERE `tranId` = '$tid' ") == 0) {
                $create = $NNL->insert("bank_auto", array(
                    'username'      => $getUser['username'],
                    'tranId'        => $tranId,
                    'comment'       => $comment,
                    'amount'        => $amount
                ));
                if ($create) {
                    $real_amount = $amount + $amount * $NNL->site('ck_bank') / 100;
                    $isCheckMoney = $NNL->cong("users", "money", $real_amount, " `username` = '" . $getUser['username'] . "' ");
                    if ($isCheckMoney) {
                        $NNL->cong("users", "total_money", $real_amount, " `username` = '" . $getUser['username'] . "' ");
                        $NNL->insert("dongtien", array(
                            'sotientruoc'   => $row['money'],
                            'sotienthaydoi' => $real_amount,
                            'sotiensau'     => $row['money'] + $real_amount,
                            'thoigian'      => gettime(),
                            'noidung'       => 'Nạp tiền tự động qua TPBank (#' . $tid . ' - '.$description.' - '.$amount.')',
                            'username'      => $row['username']
                        ));
                        echo '[<b style="color:green">-</b>] Xử lý thành công 1 hoá đơn.' . PHP_EOL;
                    } 
                }
            }
        }
    }
}
