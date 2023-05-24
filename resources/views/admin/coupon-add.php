<?php
$title = 'Thêm mã giảm giá | ' . $NNL->site('tenweb');
require_once __DIR__ . "../../../../core/is_user.php";
require_once __DIR__ . "/Header.php";
require_once __DIR__ . "/Sidebar.php";

?>
<?php
if (isset($_POST['Addcoupon']) && $getUser['level'] == 'admin') {
    $d = getdate();
    $today = $d['year'] . "/" . $d['mon'] . "/" . $d['mday'];
    $isInsert = $NNL->insert("discount", [
        'code' => xss($_POST['code']),
        'discount' => xss($_POST['discount']),
        'limit_number' => xss($_POST['limit_number']),
        'payment_limit' => xss($_POST['payment_limit']),
        'expiration_date' => xss($_POST['expiration_date']),
        'number_used' => 0,
        'created' => $today
    ]);
    if ($isInsert) {
        die('<script type="text/javascript">if(!alert("Thêm thành công !")){location.href = "' . BASE_URL('admin/coupon') . '";}</script>');
    } else {
        die('<script type="text/javascript">if(!alert("Thêm thất bại")){window.history.back().location.reload();}</script>');
    }
}
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Thêm mã giảm giá mới</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                        <li class="breadcrumb-item active">Thêm mã giảm giá mới</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-6">
                    <div class="mb-3">
                        <a class="btn btn-danger btn-icon-left m-b-10" href="<?= BASE_URL('admin/coupon') ?>" type="button"><i class="fas fa-undo-alt mr-1"></i>Quay Lại</a>
                    </div>
                </section>
                <section class="col-lg-6">
                </section>
                <section class="col-lg-12 connectedSortable">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-cart-plus mr-1"></i>
                                THÊM MÃ GIẢM GIÁ MỚI
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn bg-success btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn bg-warning btn-sm" data-card-widget="maximize"><i class="fas fa-expand"></i>
                                </button>
                                <button type="button" class="btn bg-danger btn-sm" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mã giảm giá</label>
                                            <input type="text" class="form-control" name="code" placeholder="Mã giảm giá" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Ngày Hết Hạn</label>
                                            <input type="date" class="form-control" name="expiration_date" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Số tiền đơn hàng tối thiểu được áp dụng</label>
                                            <input type="text" class="form-control" name="payment_limit" placeholder="Đơn hàng tối thiểu được áp dụng" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">% giảm giá</label>
                                            <input type="number" class="form-control" name="discount" placeholder="% giảm giá" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Số lần giới hạn nhập</label>
                                            <input type="text" class="form-control" name="limit_number" placeholder="Số lần giới hạn nhập" required>
                                        </div>
                                    </div>
                                    
                                   

                                </div>
                            </div>
                            <div class="card-footer clearfix">
                                <button name="Addcoupon" class="btn btn-info btn-icon-left m-b-10" type="submit"><i class="fas fa-plus mr-1"></i>Thêm Ngay</button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<?php
require_once __DIR__ . "/Footer.php";
?>