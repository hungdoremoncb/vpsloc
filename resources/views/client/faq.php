<?php
$title = "FAQ";
require_once(__DIR__ . "/layout/header.php");
require_once(__DIR__ . '/../../../core/is_user.php');
?>

<body class="lagom lagom-layout-left page-homepage page-user-logged" data-phone-cc-input="1">
    <?php require_once(__DIR__ . "/layout/navbar-mb.php"); ?>
    <div class="app-main ">
        <?php require_once(__DIR__ . "/layout/navbar-pc.php"); ?>


        <div class="main-body">
            <div class="container">
                <div class="section-content m-w-lg m-a">
                    <div class="panel-group panel-group-condensed panel-faq accordion" id="accordion">
                        <?php foreach ($NNL->get_list("SELECT * FROM `questions` WHERE `status` = 1 ") as $row) {?>
                        <div class="panel panel-accordion">
                            <div id="toggle-<?=$row['id'];?>" class="panel-heading" data-toggle="collapse" data-target="#id-<?=$row['id'];?>"
                                aria-expanded="true" aria-controls="id-<?=$row['id'];?>">
                                <h4 class="panel-title"><i class="lm lm-plus"></i><?=$row['question'];?></h4>
                            </div>
                            <div id="id-<?=$row['id'];?>" class="panel-collapse collapse" aria-labelledby="toggle-1"
                                data-parent="#accordion">
                                <div class="panel-body">
                                <?=$row['answer'];?>
                                </div>
                            </div>
                            <div class="hidden-md hidden-lg"></div>
                        </div>
                        <?php }?>
                    </div>
                </div>

            </div>
        </div>
        <?php
        require_once(__DIR__ . "/layout/page-end.php");
        require_once(__DIR__ . "/layout/footer.php");
        ?>