<?php
$title = "Đăng Ký";
require_once(__DIR__ . "/layout/header.php");
?>

<body class="lagom page-login register-page lagom-not-portal lagom-layout-left page-clientregister page-type-full" data-phone-cc-input="1">
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
                <div class="login login-lg">
                    <div class="login-header">
                        <a class="logo" href="/lagom/index.php"><img src="/lagom/templates/lagom2/assets/img/logo/logo_big.1001211479.svg" title="RS STUDIO" alt="RS STUDIO" /></a>
                    </div>
                    <div class="login-wrapper">
                        <div class="login-body register" id="registration">
                            <h1 class="login-title">Đăng ký</h1>
                            <script type="text/javascript" src="/lagom/assets/js/StatesDropdown.js"></script>
                            <script>
                                window.langPasswordStrength = "Password Strength";
                                window.langPasswordWeak = "Weak";
                                window.langPasswordModerate = "Moderate";
                                window.langPasswordStrong = "Strong";
                                window.langPasswordTooShort = "at least 5 characters";
                            </script>
                            <div id="preview"></div>
                            
                            <form id="submit_form" role="form" name="orderfrm" id="frmCheckout">
                                <div class="section section-sm" id="containerNewUserSignup">
                                    <div class="section section-sm">
                                        <div class="section-header">
                                            <h2 class="section-title">Thông tin đăng ký</h2>
                                        </div>
                                        <div class="section-body" id="personalInformation">
                                            <div class="row">
                                            
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label for="inputEmail" class="label-required">
                                                            Địa chỉ Email
                                                        </label>
                                                        <input type="email" id="email" class="form-control" placeholder="Nhập email" value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label for="inputPhone" class="label-required">
                                                            Tài khoản đăng nhập </label>
                                                        <input type="text" id="username" class="form-control" placeholder="Nhập tài khoản" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="section section-sm" id="containerNewUserSecurity">
                                    <h5 class="section-title">Bảo mật tài khoản</h5>
                                    <div id="containerPassword" class="row">
                                        <div id="passwdFeedback" style="display: none;" class="alert alert-lagom alert-info text-center col-md-12"></div>
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback" id="newPassword1">
                                                <div class="password-content password-content-top password-content-group">
                                                    <label for="inputNewPassword1" class="label-required">
                                                        Mật khẩu
                                                    </label>
                                                    <div class="progress m-t-0" id="passwordStrengthBar" style="display: none">
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">New Password Rating: 0%</span>
                                                        </div>
                                                    </div>
                                                    <span class="text-small text-lighter password-content-text"><span id="passwordStrengthTextLabel">
                                                            Ít nhất 5 ký tự</span><i data-toggle="tooltip" title="<strong>Tips for a good password</strong><br />Use both upper and lowercase characters<br />Include at least one symbol (# $ ! % &amp; etc...)<br />Don't use dictionary words" data-html="true" data-container="body" class="ls ls-info-circle m-l-1x"></i></span>
                                                </div>
                                                <div class="input-password-strenght">
                                                    <input type="password" name="password" id="inputNewPassword1" data-error-threshold="50" data-warning-threshold="75" class="form-control" placeholder="" autocomplete="off">
                                                </div>

                                                <div class="password-content password-content-group">
                                                    <button type="button" class="btn btn-default btn-sm generate-password" data-targetfields="inputNewPassword1,inputNewPassword2">
                                                        <i class="ls ls-refresh"></i>Tự động tạo mật khẩu
                                                    </button>
                                                </div>

                                                <script type="text/javascript">
                                                    jQuery("#inputNewPassword1").keyup(function() {


                                                        if (typeof window.langPasswordWeak === 'undefined') {
                                                            window.langPasswordWeak = "Weak";
                                                        }
                                                        if (typeof window.langPasswordModerate === 'undefined') {
                                                            window.langPasswordModerate = "Moderate";
                                                        }
                                                        if (typeof window.langPasswordStrong === 'undefined') {
                                                            window.langPasswordStrong = "Strong";
                                                        }
                                                        if (typeof window.tooShort === 'undefined') {
                                                            window.langPasswordTooShort = "at least 5 characters";
                                                        }

                                                        var pwStrengthErrorThreshold = 50;
                                                        var pwStrengthWarningThreshold = 75;

                                                        var $newPassword1 = jQuery("#newPassword1");
                                                        var pw = jQuery("#inputNewPassword1").val();
                                                        var pwlength = (pw.length);
                                                        if (pwlength > 4) {
                                                            $('#passwordStrengthBar').show();
                                                            if (pwlength > 5) pwlength = 5;
                                                            var numnumeric = pw.replace(/[0-9]/g, "");
                                                            var numeric = (pw.length - numnumeric.length);
                                                            if (numeric > 3) numeric = 3;
                                                            var symbols = pw.replace(/\W/g, "");
                                                            var numsymbols = (pw.length - symbols.length);
                                                            if (numsymbols > 3) numsymbols = 3;
                                                            var numupper = pw.replace(/[A-Z]/g, "");
                                                            var upper = (pw.length - numupper.length);
                                                            if (upper > 3) upper = 3;
                                                            var pwstrength = ((pwlength * 10) - 20) + (numeric *
                                                                10) + (numsymbols * 15) + (upper * 10);
                                                            if (pwstrength < 0) pwstrength = 0;
                                                            if (pwstrength > 100) pwstrength = 100;

                                                            $newPassword1.removeClass(
                                                                'has-error has-warning has-success');
                                                            jQuery("#passwordStrengthBar .progress-bar")
                                                                .removeClass(
                                                                    "progress-bar-danger progress-bar-warning progress-bar-success"
                                                                ).css("width", pwstrength + "%").attr(
                                                                    'aria-valuenow', pwstrength);

                                                            if (pwstrength < pwStrengthErrorThreshold) {
                                                                $newPassword1.addClass('has-error');
                                                                jQuery("#passwordStrengthTextLabel").html(
                                                                    langPasswordWeak).css("color", "#be0f1a");
                                                                jQuery("#passwordStrengthBar .progress-bar")
                                                                    .addClass("progress-bar-danger");
                                                            } else if (pwstrength < pwStrengthWarningThreshold) {
                                                                $newPassword1.addClass('has-warning');
                                                                jQuery("#passwordStrengthTextLabel").html(
                                                                    langPasswordModerate).css("color",
                                                                    "#c59301");
                                                                jQuery("#passwordStrengthBar .progress-bar")
                                                                    .addClass("progress-bar-warning");
                                                            } else {
                                                                $newPassword1.addClass('has-success');
                                                                jQuery("#passwordStrengthTextLabel").html(
                                                                    langPasswordStrong).css("color", "#198810");
                                                                jQuery("#passwordStrengthBar .progress-bar")
                                                                    .addClass("progress-bar-success");
                                                            }
                                                        } else {
                                                            $('#passwordStrengthBar').hide();
                                                            jQuery("#passwordStrengthTextLabel").html(
                                                                langPasswordTooShort);
                                                            jQuery("#passwordStrengthBar .progress-bar")
                                                                .removeClass(
                                                                    "progress-bar-danger progress-bar-warning progress-bar-success"
                                                                ).removeAttr('style');
                                                        }
                                                        validatePassword2();
                                                    });

                                                    function validatePassword2() {
                                                        var password1 = jQuery("#inputNewPassword1").val();
                                                        var password2 = jQuery("#inputNewPassword2").val();
                                                        var $newPassword2 = jQuery("#newPassword2");

                                                        if (password2 && password1 !== password2) {
                                                            $newPassword2.removeClass('has-success').addClass('has-error');
                                                            jQuery("#inputNewPassword2Msg").html(
                                                                '<p class="help-block" id="nonMatchingPasswordResult">The passwords entered do not match</p>'
                                                            );
                                                            jQuery('input[type="submit"]').attr('disabled', 'disabled');
                                                        } else {
                                                            if (password2) {
                                                                $newPassword2.removeClass('has-error').addClass(
                                                                    'has-success');
                                                                jQuery('input[type="submit"]').removeAttr('disabled');
                                                            } else {
                                                                $newPassword2.removeClass('has-error has-success');
                                                            }
                                                            jQuery("#inputNewPassword2Msg").html('');
                                                        }
                                                    }

                                                    jQuery(document).ready(function() {
                                                        jQuery('.using-password-strength input[type="submit"]')
                                                            .attr('disabled', 'disabled');
                                                        jQuery("#inputNewPassword2").keyup(function() {
                                                            validatePassword2();
                                                        });
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback" id="newPassword2">
                                                <label for="inputNewPassword2" class="label-required">
                                                    Xác thực mật khẩu
                                                </label>
                                                <input type="password" name="password2" id="inputNewPassword2" class="form-control" placeholder="" autocomplete="off">
                                                <div id="inputNewPassword2Msg"></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                               

                                <div class="form-actions">
                                    <button class="btn btn-lg btn-primary btn-block" type="button" id="btnRegister">Đăng ký</button>
                                </div>
                            </form>

                        </div>
                        <div class="login-footer">
                            <div class="text-center text-light">Đã có tài khoản? <a href="<?=BASE_URL('client/login')?>">Đăng Nhập</a> <span class="text-lowercase">Hoặc</span> <a href="<?=BASE_URL('client/reset-password')?>">Quên mật khẩu</a></div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <form action="#" id="frmGeneratePassword" class="form-horizontal">
        <div class="modal fade" id="modalGeneratePassword" style="display: none">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="lm lm-close"></i></button>
                        <h5 class="modal-title">
                            Generate Password
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-lagom alert-danger hidden" id="generatePwLengthError">
                            Please enter a number between 8 and 64 for the password length
                        </div>
                        <div class="form-group row align-items-center">
                            <label for="generatePwLength" class="col-md-4 control-label">Password Length</label>
                            <div class="col-md-8">
                                <input type="number" min="8" max="64" value="12" step="1" class="form-control input-inline input-inline-100" id="inputGeneratePasswordLength">
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <label for="generatePwOutput" class="col-md-4 control-label">Generated Password</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="inputGeneratePasswordOutput">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-default btn-sm">
                                    <i class="ls ls-plus"></i>
                                    Generate new password
                                </button>
                                <button type="button" class="btn btn-default btn-sm copy-to-clipboard" data-clipboard-target="#inputGeneratePasswordOutput">
                                    <i class="ls ls-copy"></i>
                                    Copy
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-primary" id="btnGeneratePasswordInsert" data-clipboard-target="#inputGeneratePasswordOutput">
                            Copy to clipboard and Insert
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script type="text/javascript">
        $("#btnRegister").on("click", function() {
            $('#btnRegister').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop('disabled',
                true);
            $.ajax({
                url: "<?= BASE_URL('ajaxs/client/register.php'); ?>",
                method: "POST",
                dataType: "JSON",
                data: {
                    action: "register",
                    username: $("#username").val(),
                    email: $("#email").val(),
                    password: $("#inputNewPassword1").val(),
                    repassword: $("#inputNewPassword2").val(),

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
                    $('#btnRegister').html('Đăng Ký').prop('disabled', false);
                },
                error: function() {
                    cuteToast({
                        type: "error",
                        message: 'Không thể xử lý',
                        timer: 5000
                    });
                    $('#btnRegister').html('Đăng Ký').prop('disabled', false);
                }

            });
        });
    </script>
    <?php require_once(__DIR__ . "/layout/footer.php") ?>