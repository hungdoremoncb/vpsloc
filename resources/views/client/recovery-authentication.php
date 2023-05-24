<?php
$title = "Đặt lại mật khẩu";
require_once(__DIR__ . "/layout/header.php");
?>

<body class="lagom page-login lagom-not-portal lagom-layout-left page-login page-type-full" data-phone-cc-input="1">
    <div class="app-main ">
        <div class="main-body main-body-has-sidebar main-body-has-sidebar-left">
            <div class="main-body-sidebar main-body-sidebar-secondary">
                <div class="sidebar-logo logo-container">
                    <a class="logo" href="<?= BASE_URL('') ?>"><img src="<?= BASE_URL('public/client/images/logo.png') ?>" title="Siêu Thị Code" alt="Siêu Thị Code" /></a>
                </div>
                <div class="sidebar-content mt-0">
                    <h3 class="sidebar-title">Hệ Thống Bán Vps</h3>
                    <div class="sidebar-swiper swiper-container">
                        <div class="swiper-wrapper">
                            <div class="sidebar-news swiper-slide">
                                <span class="sidebar-news-date"><?=date('d-m-Y')?></span>
                               
                                <div class="sidebar-news-desc">
                                    <p>Dịch vụ cho thuê VPS Pro nhất với cấu hình mạnh mẽ, sử dụng như một máy chủ vật lý, CPU Intel Xeon E5 26xx tối ưu và ổ cứng SSD chuyên dụng, hỗ trợ kỹ thuật 24/7/365.
                                      
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-body-content">
                <div class="login">
                    <div class="login-header">
                        <a class="logo" href="<?=BASE_URL('')?>"><img src="<?= BASE_URL('public/client/images/logo.png') ?>" title="Siêu Thị Code" alt="Siêu Thị Code" /></a>
                    </div>
                    <div class="login-wrapper">
                        <div class="login-body">
                            <h1 class="login-title">Xác nhận khổi phục</h1>
                            <form class="login-form" method="post" role="form">
                                <div class="form-group">
                                    <label>OTP</label>
                                    <input type="number" class="form-control input-lg" id="otp" placeholder="Nhập otp" autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu mới</label>
                                    <input type="password" class="form-control input-lg" id="password" placeholder="Nhập mật khẩu mới" autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Xác nhận lại mật khẩu</label>
                                    <input type="password" class="form-control input-lg" id="repassword" placeholder="Xác nhận lại mật khẩu" autofocus>
                                </div>
                               
                                <button class="btn btn-lg btn-primary btn-block mt-3" id="btnReset" type="button">Xác Nhận</button>
                            
                            </form>
                        </div>
                        <div class="login-footer">
                            <div class="text-light">Bạn chưa có tài khoản? <a href="<?=BASE_URL('client/register')?>">Đăng ký ngay</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $("#btnReset").on("click", function() {
            $('#btnReset').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop(
                'disabled',
                true);
            $.ajax({
                url: "<?= BASE_URL('ajaxs/client/resetpassword.php'); ?>",
                method: "POST",
                dataType: "JSON",
                data: {
                    action: "resetpassword",
                    otp: $("#otp").val(),
                    password: $("#password").val(),
                    repassword: $("#repassword").val()
                },
                success: function(respone) {
                    if (respone.status == 'success') {
                        cuteToast({
                            type: "success",
                            message: respone.msg,
                            timer: 5000
                        });
                        setTimeout("location.href = '<?= BASE_URL('client/login'); ?>';", 2000);
                    } else {
                        cuteToast({
                            type: "error",
                            message: respone.msg,
                            timer: 5000
                        });
                    }
                    $('#btnReset').html('Xác Nhận').prop('disabled', false);
                },
                error: function() {
                    cuteToast({
                        type: "error",
                        message: 'Không thể xử lý',
                        timer: 5000
                    });
                    $('#btnReset').html('Xác Nhận').prop('disabled', false);
                }

            });
        });
    </script>
    <?php require_once(__DIR__ . "/layout/footer.php") ?>