<?php
define("IN_SITE", true);
require_once("../../core/DB.php");
require_once("../../core/helpers.php");
require_once("../../core/is_user.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($getUser['level'] != 'admin') {
        nnl_error_time("Kh�0�0ng th�6�9 th�6�5c hi�6�3n", BASE_URL('/'), 1000);
    }
    $id = xss($_POST['id']);
    $NNL->remove("category", " `id` = '$id' ");
    nnl_success_time("X��a danh m�6�3c th��nh c�0�0ng", BASE_URL('admin/category-vps'), 1000);
}
