<?php
define("IN_SITE", true);
require_once("../../core/DB.php");
require_once("../../core/helpers.php");
require_once("../../core/is_user.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = xss($_POST['id']);
    if(!$row = $NNL->get_row("SELECT * FROM `category_vps` WHERE `id`='$id' AND `nguoiban`='".$getUser['username']."'"))
    {
        nnl_error("Vps không tồn tại");
    }
    $NNL->remove("category_vps", " `id` = '$id' ");
    nnl_success_time("Xóa vps thành công", BASE_URL('ctv/vps'), 1000);
}
