<?php
$title = 'Cấu hình | ' . $NNL->site('tenweb');
require_once(__DIR__ . "../../../../core/is_user.php");
require_once(__DIR__ . "/Header.php");
require_once(__DIR__ . "/Sidebar.php");
?>
<?php
if (isset($_POST['btnSaveOption']) && $getUser['level'] == 'admin') {
    if ($NNL->site('status_demo') == 'ON') {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    foreach ($_POST as $key => $value) {
        $NNL->update("options", array(
            'value' => $value
        ), " `key` = '$key' ");
    }
    admin_msg_success('Lưu thành công', '', 500);
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cấu hình</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">CẤU HÌNH THÔNG TIN WEBSITE</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tên website</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="tenweb" value="<?= $NNL->site('tenweb'); ?>" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Mô tả website</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="mota" value="<?= $NNL->site('mota'); ?>" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Từ khóa tìm kiếm</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="tukhoa" value="<?= $NNL->site('tukhoa'); ?>" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Logo website</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="logo" value="<?= $NNL->site('logo'); ?>" class="form-control">
                                    </div>
                                </div>
                            </div>

                          

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Ảnh giới thiệu website</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="anhbia" value="<?= $NNL->site('anhbia'); ?>" class="form-control">
                                    </div>
                                </div>
                            </div>

                           
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email SMTP</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="email" value="<?= $NNL->site('email'); ?>" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Pass Email SMTP</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="pass_email" value="<?= $NNL->site('pass_email'); ?>" class="form-control" placeholder="Pass email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Chat ID Telegram</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="id_chat" value="<?= $NNL->site('id_chat'); ?>" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Token Telegram</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="token_tele" value="<?= $NNL->site('token_tele'); ?>" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ON/OFF Website</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="baotri" required>
                                        <option value="<?= $NNL->site('baotri'); ?>"><?= $NNL->site('baotri'); ?>
                                        </option>
                                        <option value="ON">ON</option>
                                        <option value="OFF">OFF</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Thông báo</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea class="textarea" name="thongbao" rows="6"><?= $NNL->site('thongbao'); ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="btnSaveOption" class="btn btn-primary btn-block">
                                <span>LƯU</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(function() {
        // Summernote
        $('.textarea').summernote()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });
    })
</script>

<?php
require_once(__DIR__ . "/Footer.php");
?>