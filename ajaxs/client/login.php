<?php
define("IN_SITE", true);
require_once("../../core/DB.php");
require_once("../../core/helpers.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //đăng nhập
    if (isset($_POST['action']) && $_POST['action'] = 'Login') {
        $username = xss($_POST['username']);
        $password = xss($_POST['password']);
        if (empty($username)) {
            die(json_encode([
                'status'    => 'error',
                'msg'       => 'Tài khoản không được để trống'
            ]));
        }
        if (empty($password)) {
            die(json_encode([
                'status'    => 'error',
                'msg'       => 'Mật khẩu không được để trống'
            ]));
        }
        
        if (check_username($username) != true) {
            die(json_encode(['status' => 'error', 'msg' => 'Tài khoản sai định dạng']));
        }
        $getUser = $NNL->get_row("SELECT * FROM `users` WHERE `username` = '$username' ");
        if (!$getUser) {
            die(json_encode([
                'status'    => 'error',
                'msg'       => 'Thông tin đăng nhập không chính xác'
            ]));
        }
        $Check = $NNL->get_row("SELECT * FROM `users` WHERE `username` = '$username' AND `password`='" . sha1($password) . "' ");
        if (!$Check) {
            die(json_encode([
                'status'    => 'error',
                'msg'       => 'Thông tin đăng nhập không chính xác'
            ]));
        }
        if ($getUser['banned'] == 1) {
            die(json_encode([
                'status'    => 'error',
                'msg'       => 'Tài khoản của bạn đã bị khoá truy cập'
            ]));
        }


        setcookie("token", $getUser['token'], time() + 86400, "/");
        $_SESSION['login'] = $getUser['token'];
        die(json_encode([
            'status' => 'success',
            'msg'    => 'Đăng nhập thành công'
        ]));
    }
}
