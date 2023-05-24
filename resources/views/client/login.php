<?php
$title = "Đăng Nhập";
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
                            <h1 class="login-title">Đăng nhập</h1>
                            <form class="login-form" method="post" role="form">
                                <input type="hidden" name="token" value="7c628b8b84a179589fabbd97bdc028539c0bedd2" />
                                <div class="form-group">
                                    <label for="inputEmail">Tài khoản</label>
                                    <input type="text" class="form-control input-lg" id="username" placeholder="Nhập tài khoản" autofocus>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex space-between">
                                        <label for="inputPassword">Mật khẩu</label>
                                        <a href="<?=BASE_URL('client/reset-password')?>">Quên mật khẩu?</a>
                                    </div>
                                    <input type="password" class="form-control input-lg" id="password" placeholder="Nhập mật khẩu" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label class="checkbox m-b-2x">
                                        <input class="icheck-control" type="checkbox" name="rememberme" /> Remember Me
                                    </label>
                                </div>
                                <button class="btn btn-lg btn-primary btn-block " id="btnLogin" type="button">Đăng nhập</button>
                            
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
        $("#btnLogin").on("click", function() {
            $('#btnLogin').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop(
                'disabled',
                true);
            $.ajax({
                url: "<?= BASE_URL('ajaxs/client/login.php'); ?>",
                method: "POST",
                dataType: "JSON",
                data: {
                    action: "Login",
                    username: $("#username").val(),
                    password: $("#password").val()
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
                        cuteToast({
                            type: "error",
                            message: respone.msg,
                            timer: 5000
                        });
                    }
                    $('#btnLogin').html('Đăng Nhập').prop('disabled', false);
                },
                error: function() {
                    cuteToast({
                        type: "error",
                        message: 'Không thể xử lý',
                        timer: 5000
                    });
                    $('#btnLogin').html('Đăng Nhập').prop('disabled', false);
                }

            });
        });
    </script>
    <?php require_once(__DIR__ . "/layout/footer.php") ?>