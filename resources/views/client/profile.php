<?php
$title = "Thông Tin Cá Nhân";
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
                            <a href="<?=BASE_URL('')?>"> Trang chủ
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
                        <?php require_once(__DIR__ . "/layout/menu.php");?>
                    </div>
                    <div class="main-content ">
                        <div class="section">
                            <div class="section-header">
                                <h3 class="section-title">Thông tin</h3>
                            </div>
                            <div class="section-body">
                                <form method="post" action="/lagom/user/profile/save">
                                    <input type="hidden" name="token" value="0193fc2d5c26e814ea5974c8e294e6cdb828ae41" />
                                    <div class="panel panel-default panel-form">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputFirstName" class="control-label">
                                                            Tài khoản
                                                        </label>
                                                        <input type="text" name="firstname" readonly value="<?=$getUser['username']?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputLastName" class="control-label">
                                                            Số dư
                                                        </label>
                                                        <input type="text" name="lastname" readonly value="<?=format_cash($getUser['money'])?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputLastName" class="control-label">
                                                            Tổng nạp
                                                        </label>
                                                        <input type="text" name="lastname" readonly value="<?=format_cash($getUser['total_money'])?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputLastName" class="control-label">
                                                            Ngày tham gia
                                                        </label>
                                                        <input type="text" name="lastname" readonly value="<?=$getUser['createdate']?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="section">
                            <h3 class="section-title d-flex align-center">
                                Thay đổi địa chỉ email
                            </h3>
                            <div class="section-body">
                                <form method="post" action="/lagom/user/profile/email/save">
                                    <input type="hidden" name="token" value="0193fc2d5c26e814ea5974c8e294e6cdb828ae41" />
                                    <div class="panel panel-default panel-form">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputEmail" class="control-label">
                                                            Email
                                                        </label>
                                                        <input type="hidden" id="token" value="<?=$getUser['token']?>" class="form-control">
                                                        <input type="email" id="email" value="<?=$getUser['email']?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input class="btn btn-primary" type="button"onclick="changeEmail()" value="Thay đổi" />
                                        <input class="btn btn-default" type="reset" value="Cancel" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function changeEmail() {
                cuteAlert({
                    type: "question",
                    title: "Xác Nhận Thay Đổi",
                    message: "Bạn có chắc chắn muốn thay đổi địa chỉ email không ?",
                    confirmText: "Đồng Ý",
                    cancelText: "Hủy"
                }).then((e) => {
                    if (e) {
                        $.ajax({
                            url: "<?= BASE_URL("ajaxs/client/changeInfo.php"); ?>",
                            method: "POST",
                            dataType: "JSON",
                            data: {
                                action: "changeEmail",
                                token: $('#token').val(),
                                email: $('#email').val()
                            },
                            success: function(respone) {
                                if (respone.status == 'success') {
                                    cuteToast({
                                        type: "success",
                                        message: respone.msg,
                                        timer: 5000
                                    });
                                    setTimeout("location.href = '<?= BASE_URL('client/profile'); ?>';", 100);
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