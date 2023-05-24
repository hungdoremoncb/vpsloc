<?php
$title = "Trang Chủ";
require_once(__DIR__ . "/layout/header.php");
require_once(__DIR__ . '/../../../core/is_user.php');
?>
<?php
if (isset($_GET['id'])) {
    $row = $NNL->get_row("SELECT * FROM `license_vps` WHERE `id` = '" . xss($_GET['id']) . "' AND `user`='".$getUser['username']."'");
    if (!$row) {
        die('<script type="text/javascript">if(!alert("Không tồn tại !")){location.href = "' . BASE_URL('') . '";}</script>');
    }
}
?>
<body class="lagom lagom-layout-left page-homepage page-user-logged" data-phone-cc-input="1">
    <?php require_once(__DIR__ . "/layout/navbar-mb.php"); ?>
    <div class="app-main ">
        <?php require_once(__DIR__ . "/layout/navbar-pc.php"); ?>
        <div class="main-header">
            <div class="container">
                <h1 class="main-header-title">
                    Chi tiết đơn hàng vps
                </h1>
                <div class="main-header-bottom">
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?=BASE_URL('')?>"> Trang chủ
                            </a>
                        </li>
                        <li>
                            <a href="<?=BASE_URL('client/history-vps')?>"> Đơn hàng vps
                            </a>
                        </li>
                        <li class="active">Chi tiết đơn hàng
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
                                        <div class="col-md-6">
                                            <div class="product-icon">
                                                <div class="product-content">
                                                    <div class="product-image">
                                                        <svg class="svg-icon svg-icon-on-dark" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="64px" height="64px" viewBox="0 0 64 64" style="enable-background:new 0 0 64 64;" xml:space="preserve">
                                                            <line class="svg-icon-outline-s" x1="32" y1="1.5" x2="32" y2="8.4" />
                                                            <polygon class="svg-icon-prime svg-icon-stroke" points="17,23 32,31.7 47,23 47,16.9 17,16.9" />
                                                            <polygon class="svg-icon-prime-l svg-icon-stroke" points="32,25.2 17,16.6 32,7.9 47,16.6" />
                                                            <line class="svg-icon-outline-s" x1="32" y1="32.7" x2="32" y2="62.5" />
                                                            <polyline class="svg-icon-outline-s" points="58.5,16.9 32,32.2 5.5,16.9" />
                                                            <polygon class="svg-icon-outline-s" points="32,63 5,47.4 5,16.6 32,1 59,16.6 59,47.4" />
                                                        </svg>
                                                    </div>
                                                    <h2 class="product-name"><?=getCategory($row['vps_id'],'namevps')?></h2>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="product-info">
                                                <ul class="list-info list-info-v">
                                                    <li>
                                                        <span class="list-info-title">Trạng thái</span>
                                                        <span class="list-info-text"><?=status($row['status'])?></span>
                                                    </li>
                                                    <li>
                                                        <span class="list-info-title">Thời gian mua</span>
                                                        <span class="list-info-text"><?=$row['time']?></span>
                                                    </li>
                                                    <li>
                                                        <span class="list-info-title">IP</span>
                                                        <span class="list-info-text"><?=$row['ip']?></span>
                                                    </li>
                                                    <li>
                                                        <span class="list-info-title">Tài khoản</span>
                                                        <span class="list-info-text"><?=$row['tk']?></span>
                                                    </li>
                                                    <li>
                                                        <span class="list-info-title">Mật khẩu</span>
                                                        <span class="list-info-text"><?=$row['mk']?></span>
                                                    </li>
                                                    <li>
                                                        <span class="list-info-title">Thanh toán</span>
                                                        <span class="list-info-text"> <span class="status status-active">Đã thanh toán</span></span>
                                                    </li>
                                                </ul>
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
        <script>
            function PaymentVps(id) {
                cuteAlert({
                    type: "question",
                    title: "Xác Nhận Thanh Toán",
                    message: "Bạn có chắc chắn muốn mua loại này không ?",
                    confirmText: "Đồng Ý",
                    cancelText: "Hủy"
                }).then((e) => {
                    if (e) {
                        $.ajax({
                            url: "<?= BASE_URL("ajaxs/client/buy.php"); ?>",
                            method: "POST",
                            dataType: "JSON",
                            data: {
                                id: id
                            },
                            success: function(respone) {
                                if (respone.status == 'success') {
                                    cuteToast({
                                        type: "success",
                                        message: respone.msg,
                                        timer: 5000
                                    });
                                    setTimeout("location.href = '<?= BASE_URL(''); ?>';", 100);
                                } else {
                                    cuteAlert({
                                        type: "error",
                                        title: "Error",
                                        message: respone.msg,
                                        buttonText: "Okay"
                                    });
                                }
                            },
                            error: function() {
                                alert(html(response));
                                location.reload();
                            }
                        });
                    }
                })
            }
        </script>
        <?php
        require_once(__DIR__ . "/layout/page-end.php");
        require_once(__DIR__ . "/layout/footer.php");
        ?>