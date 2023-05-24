<?php
define("IN_SITE", true);
require_once("../../core/DB.php");
require_once("../../core/helpers.php");
require_once("../../core/is_user.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $loaithe = xss($_POST['loaithe']);
    $menhgia = xss($_POST['menhgia']);
    $seri = xss($_POST['seri']);
    $pin = xss($_POST['pin']);

    if (empty($_SESSION['login'])) {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Vui lòng đăng nhập để thực hiện'
        ]));
    }
    if (empty($loaithe)) {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Vui lòng chọn loại thẻ'
        ]));
    }
    if (empty($menhgia)) {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Vui lòng chọn mệnh giá'
        ]));
    }
    if (empty($seri)) {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Vui lòng nhập seri thẻ'
        ]));
    }
    if (empty($pin)) {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Vui lòng nhập mã thẻ'
        ]));
    }
    if (strlen($seri) < 5 || strlen($pin) < 5) {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Mã thẻ hoặc seri không đúng định dạng!'
        ]));
    }

    if ($NNL->site('recaptcha') == 'ON') {
        if (!isset($_POST['captcha'])) {
            msg_error("Vui lòng xác thực captcha !", BASE_URL('nap-the-cao/'), 1500);
        }
        if (empty($_POST['captcha'])) {
            msg_error2("Vui lòng xác thực captcha !");
        }
        $response = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $NNL->site('captcha_private') . '&response=' . $_POST['captcha'] . '&remoteip=' . $_SERVER['REMOTE_ADDR']));
        if ($response->success == false) {
            msg_error("Captcha không chính xác", BASE_URL('nap-the-cao/'), 1500);
        }
    }

    // RANDOM YÊU CẦU ID (KHÔNG THAY ĐỔI)
    $request_id = rand(100000000, 999999999);

    // ĐẶT GIÁ TRỊ MẢNG THÀNH NULL TRÁNH LỖI
    $POSTGET = array();

    // YÊU CẦU ID
    $POSTGET['request_id'] = $request_id;

    // MÃ THẺ NẠP TỪ POST USER
    $POSTGET['code'] = $pin;

    // PARTENER ID (CONFIG TRONG PHẦN CONFIG.PHP)
    $POSTGET['partner_id'] = $NNL->site('Partner_ID');

    // SERI THẺ CÀO TỪ POST USER
    $POSTGET['serial'] = $seri;

    // NHÀ MẠNG TỪ POST USER
    $POSTGET['telco'] = $loaithe;

    // LỆNH (MẶC ĐỊNH: NẠP THẺ)
    $POSTGET['command'] = "charging";

    // SẮP XẾP MẢNG
    ksort($POSTGET);

    //CHỮ KÝ KHI ĐỔI THẺ
    // $sign = $NNL->site('Partner_id');

    //Đặt chữ ký MD5 vào item
    // foreach ($POSTGET as $item) 
    // {
    //     $sign .= $item;
    // }

    // CHUYỂN CHỮ KÝ SANG ĐỊNH DẠNG MD5 (BẮT BUỘC)
    $mysign = md5($NNL->site('Partner_Key') . $pin . $seri);

    // MỆNH GIÁ THẺ TỪ POST USER
    $POSTGET['amount'] = $menhgia;

    // CHỮ KÝ MD5
    $POSTGET['sign'] = $mysign;

    // XUẤT RA URL ĐỂ GỬI LÊN TSR
    $data = http_build_query($POSTGET);

    // CHẠY CURL
    $ch = curl_init();

    // QUÁ TRÌNH GỬI LÊN GACHTHE1S (ĐỪNG THAY ĐỔI)
    curl_setopt($ch, CURLOPT_URL, 'https://gachthe1s.com/chargingws/v2');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $SERVER_NAME = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    curl_setopt($ch, CURLOPT_REFERER, $SERVER_NAME);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);

    // ĐÓNG GỬI LÊN GACHTHE1S
    curl_close($ch);

    // XUẤT RA JSON (STD CLASS)
    $return = json_decode($result);

    if (isset($return->status)) {
        if ($return->status == 99) {
            $NNL->insert("cards", array(
                'code' => $request_id,
                'seri' => $seri,
                'pin'  => $pin,
                'loaithe' => $loaithe,
                'menhgia' => $menhgia,
                'thucnhan' => '0',
                'username' => $getUser['username'],
                'status' => 'xuly',
                'note' => '',
                'createdate' => gettime()
            ));
            die(json_encode([
                'status'    => 'success',
                'msg'       => 'Gửi thẻ thành công, vui lòng đợi kết quả'
            ]));
        } else{
            die(json_encode([
                'status'    => 'error',
                'msg'       => ''.$return->message.''
            ]));
        }
    } else {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Lỗi Hệ Thống Nạp Thẻ Vui Lòng Báo Admin Để Xử Lý'
        ]));
    }
}
