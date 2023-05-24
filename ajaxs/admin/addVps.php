<?php
define("IN_SITE", true);
require_once("../../core/DB.php");
require_once("../../core/helpers.php");
//thêm vps
    $isInsert = $NNL->insert("product", [
        'stt' => trim($_POST['stt']),
        'name' => trim($_POST['name']),
        'money' => $_POST['money'],
        'sale' => $_POST['sale'],
        'cpu' => $_POST['cpu'],
        'memory' => $_POST['memory'],
        'ssd_storage' => $_POST['ssd_storage'],
        'bandwidth' => $_POST['bandwidth'],
        'address' => $_POST['address'],
        'view'   => 0,
        'createdate' => time(),
        'updatedate' => time(),
        'status' => check_string($_POST['status']),
    ]);
    if ($isInsert) {
        nnl_success_time("Thêm thành công",BASE_URL('admin/product'),1000);
    } else {
        nnl_error("Thêm thất bại");
    }
