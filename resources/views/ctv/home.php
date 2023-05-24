<?php
$title = 'DASHBROAD | ' . $NNL->site('tenweb');
require_once(__DIR__ . "../../../../core/is_user.php");
require_once(__DIR__ . "/header.php");
require_once(__DIR__ . "/sidebar.php");

?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard CTV</h1>
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
        <div class="row">
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= format_cash($NNL->num_rows("SELECT * FROM `category_vps` WHERE `nguoiban` = '" . $getUser['username'] . "' ")); ?></h3>
                        <p>Vps đang bán</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                   
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= format_cash($NNL->num_rows("SELECT * FROM `license_vps` WHERE `nguoiban` = '" . $getUser['username'] . "' AND `status`='hoantat'")) ?></h3>
                        <p>Vps đã bán ra</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                   
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= format_cash($NNL->get_row("SELECT SUM(`gia`) FROM `license_vps` WHERE `nguoiban` = '" . $getUser['username'] . "' AND `status`='hoantat'")['SUM(`gia`)']); ?>đ </h3>
                        <p>Doanh thu đơn hàng</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    
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
                                    <?= format_cash($NNL->get_row("SELECT SUM(`gia`) FROM `license_vps` WHERE `nguoiban` = '" . $getUser['username'] . "' AND `status`='hoantat' AND YEAR(time) = " . date('Y') . " AND MONTH(time) = " . date('m') . " ")['SUM(`gia`)']); ?>đ </span>
                                <span class="text-muted">DOANH THU ĐƠN HÀNG</span>
                            </p>
                        </div>
                        <!-- /.d-flex -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <p class="text-warning text-xl">
                                <i class="ion ion-ios-cart-outline"></i>
                            </p>
                            <p class="d-flex flex-column text-right">
                                <span class="font-weight-bold">
                                    <?= format_cash($NNL->get_row("SELECT COUNT(id) FROM `license_vps` WHERE `nguoiban` = '" . $getUser['username'] . "' AND `status` = 'hoantat' AND YEAR(time) = " . date('Y') . " AND MONTH(time) = " . date('m') . " ")['COUNT(id)']); ?> </span>
                                <span class="text-muted">VPS ĐÃ BÁN</span>
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
                                    <?= format_cash($NNL->get_row("SELECT SUM(`gia`) FROM `license_vps` WHERE `nguoiban` = '" . $getUser['username'] . "' AND `status`='hoantat' AND WEEK(time, 1) = WEEK(CURDATE(), 1) ")['SUM(`gia`)']); ?>đ </span>
                                <span class="text-muted">DOANH THU ĐƠN HÀNG</span>
                            </p>
                        </div>
                        <!-- /.d-flex -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <p class="text-warning text-xl">
                                <i class="ion ion-ios-cart-outline"></i>
                            </p>
                            <p class="d-flex flex-column text-right">
                                <span class="font-weight-bold">
                                    <?= format_cash($NNL->get_row("SELECT COUNT(id) FROM `license_vps` WHERE `nguoiban` = '" . $getUser['username'] . "' AND `status` = 'hoantat' AND WEEK(time, 1) = WEEK(CURDATE(), 1) ")['COUNT(id)']); ?> </span>
                                <span class="text-muted">VPS ĐÃ BÁN</span>
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
                                    <?= format_cash($NNL->get_row("SELECT SUM(`gia`) FROM `license_vps` WHERE `nguoiban` = '" . $getUser['username'] . "' AND `status`='hoantat' AND `time` >= DATE(NOW()) AND `time` < DATE(NOW()) + INTERVAL 1 DAY ")['SUM(`gia`)']); ?>đ </span>
                                <span class="text-muted">DOANH THU ĐƠN HÀNG</span>
                            </p>
                        </div>
                        <!-- /.d-flex -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <p class="text-warning text-xl">
                                <i class="ion ion-ios-cart-outline"></i>
                            </p>
                            <p class="d-flex flex-column text-right">
                                <span class="font-weight-bold">
                                    <?= format_cash($NNL->get_row("SELECT COUNT(id) FROM `license_vps` WHERE `nguoiban` = '" . $getUser['username'] . "' AND `status`='hoantat' AND `time` >= DATE(NOW()) AND `time` < DATE(NOW()) + INTERVAL 1 DAY ")['COUNT(id)']); ?> </span>
                                <span class="text-muted">VPS ĐÃ BÁN</span>
                            </p>
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
require_once(__DIR__ . "/footer.php");
?>