<?php
require_once("../core/DB.php");
require_once("../core/helpers.php");

if (isset($_GET['status']) && $_GET['code'] && $_GET['serial'] && $_GET['trans_id'] && $_GET['telco'] && $_GET['callback_sign']) {
    // TRẠNG THÁI
    $status = $_GET['status'];
    // SERIAL THẺ NẠP
    $serial = $_GET['serial'];
    // MÃ THẺ NẠP
    $code = $_GET['code'];
    // MÃ REQUEST
    $request_id = $_GET['request_id'];
    // TRẠNG THÁI TIN NHẮN (THẤT BẠI - THÀNH CÔNG) TỪ THESIEURE
    $message = $_GET['message'];
    // MỆNH GIÁ GỐC THẺ NẠP
    $real_money = $_GET['value'];
    // MỆNH GIÁ THỰC NHẬN
    $geted_money = $_GET['amount'];
    // NHÀ MẠNG THẺ CÀO
    $nhamang = $_GET['telco'];
    // ĐƠN GIAO DỊCH BÊN THESIEURE
    $trans_id = $_GET['trans_id'];
    // KIỂM TRA CHỮ KÝ MD5
    $check_sign = md5($NNL->site('Partner_Key') . $code . $serial);

    // KIỂM TRA CHỮ KÝ HỢP LỆ TRÁNH TRƯỜNG HỢP BUG
    if ($_GET['callback_sign'] == $check_sign) {
        $row = $NNL->get_row(" SELECT * FROM `cards` WHERE `code` = '$request_id' AND `status` = 'xuly' ");
        if (!$row) {
            die("Cái quát đờ phắc gì vậy?");
        }
        $row_user = $NNL->get_row(" SELECT * FROM `users` WHERE `username` = '" . $row['username'] . "' ");
        if ($status == 1) {
            $thucnhan = $geted_money;

            /* CẬP NHẬT TRẠNG THÁI THẺ CÀO */
            $NNL->update("cards", array(
                'status'    => 'thanhcong',
                'note'      => 'Đúng Mệnh Giá',
                'thucnhan'  => $thucnhan
            ), " `id` = '" . $row['id'] . "' ");

            /* CỘNG TIỀN USER */
            $NNL->cong("users", "money", $thucnhan, " `id` = '" . $row_user['id'] . "' ");
            $NNL->cong("users", "total_money", $thucnhan, " `id` = '" . $row_user['id'] . "' ");

            /* GHI LOG DÒNG TIỀN */
            $NNL->insert("dongtien", array(
                'sotientruoc' => $row_user['money'],
                'sotienthaydoi' => $thucnhan,
                'sotiensau' => $row_user['money'] + $thucnhan,
                'thoigian' => gettime(),
                'noidung' => 'Nạp tiền tự động qua card seri (' . $row['seri'] . ')',
                'username' => $row_user['username']
            ));
        } else if ($status == 2) {
            $thucnhan = $geted_money / 2;
            if ($row_user['level'] == 'ctv') {
                $thucnhan = $real_money / 2;
            }

            /* CẬP NHẬT TRẠNG THÁI THẺ CÀO */
            $NNL->update("cards", array(
                'status'    => 'thanhcong',
                'note'      => 'Sai Mệnh Giá',
                'thucnhan'  => $thucnhan
            ), " `id` = '" . $row['id'] . "' ");

            /* CỘNG TIỀN USER */
            $NNL->cong("users", "money", $thucnhan, " `id` = '" . $row_user['id'] . "' ");
            $NNL->cong("users", "total_money", $thucnhan, " `id` = '" . $row_user['id'] . "' ");

            /* GHI LOG DÒNG TIỀN */
            $NNL->insert("dongtien", array(
                'sotientruoc' => $row_user['money'],
                'sotienthaydoi' => $thucnhan,
                'sotiensau' => $row_user['money'] + $thucnhan,
                'thoigian' => gettime(),
                'noidung' => 'Nạp tiền tự động qua thẻ cào seri (' . $row['seri'] . ')',
                'username' => $row_user['username']
            ));
        } else {
            /* CẬP NHẬT TRẠNG THÁI THẺ CÀO */
            $NNL->update("cards", array(
                'status'    => 'thatbai',
                'note'      => 'Thẻ sai',
                'thucnhan'  => '0'
            ), " `id` = '" . $row['id'] . "' ");
        }
    } else {
        echo "Cái quát đờ phắc gì vậy?";
    }
} else {
    echo "Cái quát đờ phắc gì vậy?";
}
