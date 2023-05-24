<?php
define("IN_SITE", true);
require_once(__DIR__.'/core/DB.php');
require_once(__DIR__.'/core/helpers.php');

    function insert_options($key, $value)
    {
        global $NNL;
         if (!$NNL->get_row("SELECT * FROM `options` WHERE `key` = '$key' ")) {
            $NNL->query("INSERT INTO `options` (`key`, `value`) VALUES ('$key', '$value')");
        }
    }

    insert_options('id_chat', '1');
    insert_options('token_tele', '1');
  
    
    die('Success!');