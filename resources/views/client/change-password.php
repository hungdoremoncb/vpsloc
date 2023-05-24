<?php
$title = "Thay Đổi Mật Khẩu";
require_once(__DIR__ . "/layout/header.php");
require_once(__DIR__ . '/../../../core/is_user.php');
CheckLogin();
?>

<body class="lagom lagom-layout-left page-homepage page-user-logged" data-phone-cc-input="1">
    <?php require_once(__DIR__ . "/layout/navbar-mb.php"); ?>
    <div class="app-main ">
        <?php require_once(__DIR__ . "/layout/navbar-pc.php"); ?>
        <div class="main-header">
            <div class="container">
                <h1 class="main-header-title">
                    Thông tin cá nhân
                </h1>
                <div class="main-header-bottom">
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?= BASE_URL('') ?>"> Trang chủ
                            </a>
                        </li>
                        <li class="active">Thông tin cá nhân
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="main-body">
            <div class="container">
                <div class="main-grid">
                    <div class="main-sidebar ">
                        <?php require_once(__DIR__ . "/layout/menu.php"); ?>
                    </div>
                    <div class="main-content ">
                        <div class="row">
                            <div class="col-md-7">
                                <form class="using-password-strength" method="post"  role="form">
                                    <div class="panel panel-default panel-form">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label for="inputExistingPassword" class="control-label">Mật khẩu cũ</label>
                                                <input type="password" class="form-control" name="existingpw" id="inputExistingPassword" autocomplete="off" />
                                            </div>
                                            <div id="newPassword1" class="form-group">
                                                <label for="inputNewPassword1" class="control-label">Mật khẩu mới</label>
                                                <div class="input-password-strenght">
                                                    <input type="password" class="form-control" name="newpw" id="inputNewPassword1" autocomplete="off" />
                                                    <span class="text-small text-lighter"><span id="passwordStrengthTextLabel">at least 5 characters</span><i data-toggle="tooltip" title="<strong>Tips for a good password</strong><br />Use both upper and lowercase characters<br />Include at least one symbol (# $ ! % &amp; etc...)<br />Don't use dictionary words" data-html="true" data-container="body" class="ls ls-info-circle"></i></span>
                                                </div>

                                                <div class="password-content password-content-group">
                                                    <button type="button" class="btn btn-default btn-sm generate-password" data-targetfields="inputNewPassword1,inputNewPassword2">
                                                        <i class="ls ls-refresh"></i>Random mật khẩu
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
                                                            var pwstrength = ((pwlength * 10) - 20) + (numeric * 10) + (numsymbols * 15) + (upper * 10);
                                                            if (pwstrength < 0) pwstrength = 0;
                                                            if (pwstrength > 100) pwstrength = 100;

                                                            $newPassword1.removeClass('has-error has-warning has-success');
                                                            jQuery("#passwordStrengthBar .progress-bar").removeClass("progress-bar-danger progress-bar-warning progress-bar-success").css("width", pwstrength + "%").attr('aria-valuenow', pwstrength);

                                                            if (pwstrength < pwStrengthErrorThreshold) {
                                                                $newPassword1.addClass('has-error');
                                                                jQuery("#passwordStrengthTextLabel").html(langPasswordWeak).css("color", "#be0f1a");
                                                                jQuery("#passwordStrengthBar .progress-bar").addClass("progress-bar-danger");
                                                            } else if (pwstrength < pwStrengthWarningThreshold) {
                                                                $newPassword1.addClass('has-warning');
                                                                jQuery("#passwordStrengthTextLabel").html(langPasswordModerate).css("color", "#c59301");
                                                                jQuery("#passwordStrengthBar .progress-bar").addClass("progress-bar-warning");
                                                            } else {
                                                                $newPassword1.addClass('has-success');
                                                                jQuery("#passwordStrengthTextLabel").html(langPasswordStrong).css("color", "#198810");
                                                                jQuery("#passwordStrengthBar .progress-bar").addClass("progress-bar-success");
                                                            }
                                                        } else {
                                                            $('#passwordStrengthBar').hide();
                                                            jQuery("#passwordStrengthTextLabel").html(langPasswordTooShort);
                                                            jQuery("#passwordStrengthBar .progress-bar").removeClass("progress-bar-danger progress-bar-warning progress-bar-success").removeAttr('style');
                                                        }
                                                        validatePassword2();
                                                    });

                                                    function validatePassword2() {
                                                        var password1 = jQuery("#inputNewPassword1").val();
                                                        var password2 = jQuery("#inputNewPassword2").val();
                                                        var $newPassword2 = jQuery("#newPassword2");

                                                        if (password2 && password1 !== password2) {
                                                            $newPassword2.removeClass('has-success').addClass('has-error');
                                                            jQuery("#inputNewPassword2Msg").html('<p class="help-block" id="nonMatchingPasswordResult">The passwords entered do not match</p>');
                                                            jQuery('input[type="submit"]').attr('disabled', 'disabled');
                                                        } else {
                                                            if (password2) {
                                                                $newPassword2.removeClass('has-error').addClass('has-success');
                                                                jQuery('input[type="submit"]').removeAttr('disabled');
                                                            } else {
                                                                $newPassword2.removeClass('has-error has-success');
                                                            }
                                                            jQuery("#inputNewPassword2Msg").html('');
                                                        }
                                                    }

                                                    jQuery(document).ready(function() {
                                                        jQuery('.using-password-strength input[type="submit"]').attr('disabled', 'disabled');
                                                        jQuery("#inputNewPassword2").keyup(function() {
                                                            validatePassword2();
                                                        });
                                                    });
                                                </script>
                                            </div>
                                            <div id="newPassword2" class="form-group">
                                                <label for="inputNewPassword2" class="control-label">Xác thực lại mật khẩu mới</label>
                                                <input type="password" class="form-control" name="confirmpw" id="inputNewPassword2" autocomplete="off" />
                                                <div id="inputNewPassword2Msg">
                                                    <p class="help-block"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <input class="btn btn-primary" onclick="changePassword()" type="button" value="Thay đổi" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function changePassword() {
                cuteAlert({
                    type: "question",
                    title: "Xác Nhận Thay Đổi",
                    message: "Bạn có chắc chắn muốn thay đổi mật khẩu không ?",
                    confirmText: "Đồng Ý",
                    cancelText: "Hủy"
                }).then((e) => {
                    if (e) {
                        $.ajax({
                            url: "<?= BASE_URL("ajaxs/client/changeInfo.php"); ?>",
                            method: "POST",
                            dataType: "JSON",
                            data: {
                                action: "changePassword",
                                password: $('#inputExistingPassword').val(),
                                newpassword: $('#inputNewPassword1').val(),
                                renewpassword: $('#inputNewPassword2').val()
                            },
                            success: function(respone) {
                                if (respone.status == 'success') {
                                    cuteToast({
                                        type: "success",
                                        message: respone.msg,
                                        timer: 5000
                                    });
                                    setTimeout("location.href = '<?= BASE_URL('client/logout'); ?>';", 100);
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