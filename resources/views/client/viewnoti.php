<?php
$title = "Trang Chủ";
require_once(__DIR__ . "/layout/header.php");
require_once(__DIR__ . '/../../../core/is_user.php');
?>
<?php
if (isset($_GET['id'])) {
    $row = $NNL->get_row("SELECT * FROM `notifications` WHERE `id` = '" . xss($_GET['id']) . "'");
    if (!$row) {
        die('<script type="text/javascript">if(!alert("Không tồn tại !")){location.href = "' . BASE_URL('') . '";}</script>');
    }
}else{
    die('<script type="text/javascript">if(!alert("Không tồn tại !")){location.href = "' . BASE_URL('') . '";}</script>');
}
?>
<body class="lagom lagom-layout-left page-homepage page-user-logged" data-phone-cc-input="1">
    <?php require_once(__DIR__ . "/layout/navbar-mb.php"); ?>
    <div class="app-main ">
        <?php require_once(__DIR__ . "/layout/navbar-pc.php"); ?>
        <div class="main-header">
            <div class="container">
                <h1 class="main-header-title">
                    <?=$noti['title']?>
                </h1>
                <div class="main-header-bottom">
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?=BASE_URL('')?>"> Trang chủ
                            </a>
                        </li>
                        <li>
                            <a href="#"> Thông Báo
                            </a>
                        </li>
                        <li class="active"><?=$noti['title']?>
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="main-body">
            <div class="container">
                <div class="main-grid">
                    <div class="main-content ">
                        
                        <div class="tab-content margin-bottom">
                            <div class="tab-pane active" id="Overview">
                                <div class="product-details clearfix">
                                    <div class="row row-eq-height row-eq-height-sm">
                                        
                                        <div class="col-md-12">
                                            <div class="product-info">
                                               <?=$noti['content']?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <?php
        require_once(__DIR__ . "/layout/page-end.php");
        require_once(__DIR__ . "/layout/footer.php");
        ?>