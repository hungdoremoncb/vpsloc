<?php
    require_once("../core/DB.php");
    require_once("../core/helpers.php");
    $id = $NNL->site('Partner_ID');
    $DATA = curl_get("https://gachthe1s.com/chargingws/v2/getfee?partner_id=$id");

    $return = json_decode($DATA);

    $data = "<option>Chọn mệnh giá</option>";

    if(isset($_POST['loai']) && empty($_POST['loai']))
    {
        return die($data);
    }

    $loai = $_POST['loai'];

    foreach($return as $key => $value)
    {
        if($value->telco == $loai)
        {
            $data .= "<option value=".$value->value.">".format_cash($value->value)." đ (".$value->fees."%) thực nhận (".format_cash($value->value-($value->value/100*$value->fees))." đ)</option>";
        }
    }

    return die($data);
?>