<?php

define("IN_SITE", true);
require_once("../core/DB.php");
require_once("../core/helpers.php");


/* START CHỐNG SPAM */
$token_momo = $NNL->site('api_momo');
if ($NNL->site('status_momo') == '1') {
    $result = curl_get("https://api.sieuthicode.net/historyapimomo/$token_momo");
    $result = json_decode($result, true);
    foreach ($result['momoMsg']['tranList'] as $data) {
        $tid            = check_string($data['tranId']);
        $partnerId            = check_string($data['partnerId']);
        $partnerName            = check_string($data['partnerName']);
        $description    = check_string($data['comment']);
        $amount         = check_string($data['amount']);
        $time         = check_string($data['millisecond']);
        $user_id        = parse_order_id($description, $NNL->site('noidung_naptien'));         // TÁCH NỘI DUNG CHUYỂN TIỀN
        // XỬ LÝ AUTO
     

        if ($getUser = $NNL->get_row(" SELECT * FROM `users` WHERE `id` = '$user_id' ")) {
            if ($NNL->num_rows(" SELECT * FROM `momo` WHERE `tranId` = '$tid' AND `comment` = '$description' ") == 0) {
                $create = $NNL->insert("momo", array(
                    'tranId'        => $tid,
                    'username'      => $getUser['username'],
                    'comment'       => $description,
                    'partnerId'     => $partnerId,
                    'amount'        => $amount,
                    'partnerName'   => $partnerName
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
                            'noidung'       => 'Nạp tiền tự động qua Ví Momo (#' . $tid . ' - '.$description.' - '.$amount.')',
                            'username'      => $getUser['username']
                        ));
                        echo '[<b style="color:green">-</b>] Xử lý thành công 1 hoá đơn.' . PHP_EOL;
                    } 
                }
            }
        }
    }
}
