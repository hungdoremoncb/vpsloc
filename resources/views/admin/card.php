<?php
$title = 'Thẻ cào | ' . $NNL->site('tenweb');
require_once(__DIR__ . "../../../../core/is_user.php");
require_once(__DIR__ . "/Header.php");
require_once(__DIR__ . "/Sidebar.php");
?>
<?php

if (isset($_POST['btnSaveOption']) && $getUser['level'] == 'admin') {
    if ($NNL->site('status_demo') == 'ON') {
        msg_error("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    foreach ($_POST as $key => $value) {
        $NNL->update("options", array(
            'value' => $value
        ), " `key` = '$key' ");
    }
    msg_success('Lưu thành công', '', 500);
}
?>



<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Nạp thẻ cào</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">CẤU HÌNH NẠP THẺ</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Partner ID [<a href="https://gachthe1s.com/" target="_blank">GACHTHE1S.COM</a>]</label>
                                <div class="col-sm-9 mb-3">
                                    <div class="form-line">
                                        <input type="text" name="Partner_ID" value="<?= $NNL->site('Partner_ID'); ?>" class="form-control">
                                    </div>
                                </div>
                                <label class="col-sm-3 col-form-label">Partner Key [<a href="https://gachthe1s.com/" target="_blank">GACHTHE1S.COM</a>]</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="Partner_Key" value="<?= $NNL->site('Partner_Key'); ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Lưu ý nạp tiền</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea class="textarea" name="luuy_naptien"><?= $NNL->site('luuy_naptien'); ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" name="btnSaveOption" class="btn btn-primary btn-block">
                                <span>LƯU</span></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">LỊCH SỬ NẠP THẺ</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>USERNAME</th>
                                        <th>SERI</th>
                                        <th>PIN</th>
                                        <th>LOẠI THẺ</th>
                                        <th>MỆNH GIÁ</th>
                                        <th>THỰC NHẬN</th>
                                        <th>THỜI GIAN</th>
                                        <th>TRẠNG THÁI</th>
                                        <th>GHI CHÚ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($NNL->get_list(" SELECT * FROM `cards` WHERE `username` IS NOT NULL ORDER BY id DESC ") as $row) {
                                    ?>
                                        <tr>
                                            <td><?= $i; ?> <?php $i++; ?></td>
                                            <td><a href="<?= BASE_URL('Admin/User/Edit/' . $NNL->getUser2($row['username'])['id']); ?>"><?= $row['username']; ?></a></td>
                                            <td><?= $row['seri']; ?></td>
                                            <td><?= $row['pin']; ?></td>
                                            <td><?= loaithe($row['loaithe']); ?></td>
                                            <td><?= format_cash($row['menhgia']); ?></td>
                                            <td><?= format_cash($row['thucnhan']); ?></td>
                                            <td><span class="badge badge-dark"><?= $row['createdate']; ?></span></td>
                                            <td><?= status($row['status']); ?></td>
                                            <td><?= $row['note']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>




<script>
    $(function() {
        // Summernote
        $('.textarea').summernote()
    })
</script>
<script>
    $(function() {
        $("#datatable").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>



<?php
require_once(__DIR__ . "/Footer.php");
?>