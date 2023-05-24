<?php
define("IN_SITE", true);
require_once("../../core/DB.php");
require_once("../../core/helpers.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //đăng ký
    $username = xss($_POST['username']);
    $email = xss($_POST['email']);
    $password = xss($_POST['password']);
    $repassword = xss($_POST['repassword']);
    if (empty($email)) {
        die(json_encode(['status' => 'error', 'msg' => 'Email không được để trống']));
    }
    if (empty($username)) {
        die(json_encode(['status' => 'error', 'msg' => 'Tài khoản không được để trống']));
    }
    if (empty($password)) {
        die(json_encode(['status' => 'error', 'msg' => 'Mật khẩu không được để trống']));
    }
    if (empty($repassword)) {
        die(json_encode(['status' => 'error', 'msg' => 'Nhập lại mật khẩu không được để trống']));
    }


    if (check_email($email) != true) {
        die(json_encode(['status' => 'error', 'msg' => 'Định dạng Email không đúng']));
    }
    if (check_username($username) != true) {
        die(json_encode(['status' => 'error', 'msg' => 'Định dạng tài khoản không đúng']));
    }
    if ($password != $repassword) {
        die(json_encode(['status' => 'error', 'msg' => 'Nhập lại mật khẩu không đúng']));
    }
    if ($NNL->num_rows("SELECT * FROM `users` WHERE `email` = '$email' ") > 0) {
        die(json_encode(['status' => 'error', 'msg' => 'Địa chỉ email đã tồn tại trong hệ thống']));
    }
    if ($NNL->num_rows("SELECT * FROM `users` WHERE `username` = '$username' ") > 0) {
        die(json_encode(['status' => 'error', 'msg' => 'Tài khoản đã tồn tại trong hệ thống']));
    }


    $token = md5(random('QWERTYUIOPASDGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm0123456789', 6) . time());
    $isCreate = $NNL->insert("users", [
        'token'         => $token,
        'username'      => $username,
        'email'         => $email,
        'password'      => sha1($password),
        'ip'            => myip(),
        'banned'            => 0,
        'createdate'   => gettime(),
        'time'   => time(),
    ]);
    if ($isCreate) {
        setcookie("token", $token, time() + 86400, "/");
        $_SESSION['login'] = $token;
        die(json_encode(['status' => 'success', 'msg' => 'Đăng ký thành công']));
    } else {
        die(json_encode(['status' => 'error', 'msg' => 'Tạo tài khoản thất bại, vui lòng thử lại']));
    }
}
