<?php
$title = 'DASHBROAD | ' . $NNL->site('tenweb');
require_once(__DIR__ . "../../../../core/is_user.php");
require_once(__DIR__ . "/Header.php");
require_once(__DIR__ . "/Sidebar.php");
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="alert alert-dark">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <b>Thông tin cập nhập: <span style="color: yellow;">Nguyễn Nhật Lộc</span></b>
                <ul>
                    <li>14/08/2022: Tiến hành cải tiến trang quản trị và ctv</li>
                    <li>13/08/2022: Làm tại toàn bộ website</li>
                </ul>
            </div>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= format_cash($NNL->num_rows("SELECT * FROM `category_vps` WHERE `display`='SHOW'")) ?>
                            </h3>
                            <p>Vps đang bán</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= format_cash($NNL->num_rows("SELECT * FROM `license_vps` WHERE `status`='hoantat'")) ?>
                            </h3>
                            <p>Vps đã bán ra</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= format_cash($NNL->num_rows("SELECT * FROM `users`")) ?></h3>
                            <p>Tổng thành viên</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= format_cash($NNL->get_row("SELECT SUM(`gia`) FROM `license_vps` WHERE `status`='hoantat'")['SUM(`gia`)']); ?>đ
                            </h3>
                            <p>Doanh thu đơn hàng</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Thống kê tháng <?= date('m') ?></h3>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                <p class="text-success text-xl">
                                    <i class="ion ion-ios-refresh-empty"></i>
                                </p>
                                <p class="d-flex flex-column text-right">
                                    <span class="font-weight-bold">
                                        <?= format_cash($NNL->get_row("SELECT SUM(`gia`) FROM `license_vps` WHERE `status`='hoantat' AND YEAR(time) = " . date('Y') . " AND MONTH(time) = " . date('m') . " ")['SUM(`gia`)']); ?>đ
                                    </span>
                                    <span class="text-muted">DOANH THU ĐƠN HÀNG</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                <p class="text-warning text-xl">
                                    <i class="ion ion-ios-cart-outline"></i>
                                </p>
                                <p class="d-flex flex-column text-right">
                                    <span class="font-weight-bold">
                                        <?= format_cash($NNL->get_row("SELECT COUNT(id) FROM `license_vps` WHERE `status` = 'hoantat' AND YEAR(time) = " . date('Y') . " AND MONTH(time) = " . date('m') . " ")['COUNT(id)']); ?>
                                    </span>
                                    <span class="text-muted">VPS ĐÃ BÁN</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                            <div class="d-flex justify-content-between align-items-center mb-0">
                                <p class="text-danger text-xl">
                                    <i class="ion ion-ios-people-outline"></i>
                                </p>
                                <p class="d-flex flex-column text-right">
                                    <span class="font-weight-bold">
                                        <?= format_cash($NNL->get_row("SELECT COUNT(id) FROM `users` WHERE YEAR(createdate) = " . date('Y') . " AND MONTH(createdate) = " . date('m') . " ")['COUNT(id)']); ?>
                                    </span>
                                    <span class="text-muted">KHÁCH HÀNG MỚI</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Thống kê tuần</h3>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                <p class="text-success text-xl">
                                    <i class="ion ion-ios-refresh-empty"></i>
                                </p>
                                <p class="d-flex flex-column text-right">
                                    <span class="font-weight-bold">
                                        <?= format_cash($NNL->get_row("SELECT SUM(`gia`) FROM `license_vps` WHERE `status`='hoantat' AND WEEK(time, 1) = WEEK(CURDATE(), 1) ")['SUM(`gia`)']); ?>đ
                                    </span>
                                    <span class="text-muted">DOANH THU ĐƠN HÀNG</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                <p class="text-warning text-xl">
                                    <i class="ion ion-ios-cart-outline"></i>
                                </p>
                                <p class="d-flex flex-column text-right">
                                    <span class="font-weight-bold">
                                        <?= format_cash($NNL->get_row("SELECT COUNT(id) FROM `license_vps` WHERE `status` = 'hoantat' AND WEEK(time, 1) = WEEK(CURDATE(), 1) ")['COUNT(id)']); ?>
                                    </span>
                                    <span class="text-muted">VPS ĐÃ BÁN</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                            <div class="d-flex justify-content-between align-items-center mb-0">
                                <p class="text-danger text-xl">
                                    <i class="ion ion-ios-people-outline"></i>
                                </p>
                                <p class="d-flex flex-column text-right">
                                    <span class="font-weight-bold">
                                        <?= format_cash($NNL->get_row("SELECT COUNT(id) FROM `users` WHERE WEEK(createdate, 1) = WEEK(CURDATE(), 1) ")['COUNT(id)']); ?></span>
                                    <span class="text-muted">KHÁCH HÀNG MỚI</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Thống kê hôm nay</h3>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                <p class="text-success text-xl">
                                    <i class="ion ion-ios-refresh-empty"></i>
                                </p>
                                <p class="d-flex flex-column text-right">
                                    <span class="font-weight-bold">
                                        <?= format_cash($NNL->get_row("SELECT SUM(`gia`) FROM `license_vps` WHERE `status`='hoantat' AND `time` >= DATE(NOW()) AND `time` < DATE(NOW()) + INTERVAL 1 DAY ")['SUM(`gia`)']); ?>đ
                                    </span>
                                    <span class="text-muted">DOANH THU ĐƠN HÀNG</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                <p class="text-warning text-xl">
                                    <i class="ion ion-ios-cart-outline"></i>
                                </p>
                                <p class="d-flex flex-column text-right">
                                    <span class="font-weight-bold">
                                        <?= format_cash($NNL->get_row("SELECT COUNT(id) FROM `license_vps` WHERE `status`='hoantat' AND `time` >= DATE(NOW()) AND `time` < DATE(NOW()) + INTERVAL 1 DAY ")['COUNT(id)']); ?>
                                    </span>
                                    <span class="text-muted">VPS ĐÃ BÁN</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                            <div class="d-flex justify-content-between align-items-center mb-0">
                                <p class="text-danger text-xl">
                                    <i class="ion ion-ios-people-outline"></i>
                                </p>
                                <p class="d-flex flex-column text-right">
                                    <span class="font-weight-bold">
                                        <?= format_cash($NNL->get_row("SELECT COUNT(id) FROM `users` WHERE `createdate` >= DATE(NOW()) AND `createdate` < DATE(NOW()) + INTERVAL 1 DAY ")['COUNT(id)']); ?>
                                    </span>
                                    <span class="text-muted">KHÁCH HÀNG MỚI</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                        </div>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">DÒNG TIỀN</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
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
                                            <th>SỐ TIỀN TRƯỚC</th>
                                            <th>SỐ TIỀN THAY ĐỔI</th>
                                            <th>SỐ TIỀN HIỆN TẠI</th>
                                            <th>THỜI GIAN</th>
                                            <th>NỘI DUNG</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    $i = 0;
                                    foreach ($NNL->get_list(" SELECT * FROM `dongtien` ORDER BY id DESC limit 50 ") as $row) {
                                      
                                    ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><a
                                                    href="<?= BASE_URL('Admin/User/Edit/' . $user['id']); ?>"><?= $row['username']; ?></a>
                                            </td>
                                            <td><?= format_cash($row['sotientruoc']); ?>đ</td>
                                            <td><?= format_cash($row['sotienthaydoi']); ?>đ</td>
                                            <td><?= format_cash($row['sotiensau']); ?>đ</td>
                                            <td><span class="badge badge-dark"><?= $row['thoigian']; ?></span></td>
                                            <td><?= $row['noidung']; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>STT</th>
                                            <th>USERNAME</th>
                                            <th>SỐ TIỀN TRƯỚC</th>
                                            <th>SỐ TIỀN THAY ĐỔI</th>
                                            <th>SỐ TIỀN HIỆN TẠI</th>
                                            <th>THỜI GIAN</th>
                                            <th>NỘI DUNG</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>





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