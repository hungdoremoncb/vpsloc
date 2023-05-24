<?php
$title = "Cấu hình vps";
require_once(__DIR__ . "/layout/header.php");
require_once(__DIR__ . '/../../../core/is_user.php');
?>
<?php
if (isset($_GET['id'])) {
    $row = $NNL->get_row("SELECT * FROM `category_vps` WHERE `id` = '" . xss($_GET['id']) . "'");
    if (!$row) {
        nnl_error_time("Sản phẩm không tồn tại", BASE_URL(''), 500);
    }
} else {
    nnl_error_time("Sản phẩm không tồn tại", BASE_URL(''), 500);
}
?>

<body class="lagom lagom-layout-left page-homepage page-user-logged" data-phone-cc-input="1">
    <?php require_once(__DIR__ . "/layout/navbar-mb.php"); ?>
    <div class="app-main ">
        <?php require_once(__DIR__ . "/layout/navbar-pc.php"); ?>
        <div class="main-header">
            <div class="container">
                <h1 class="main-header-title">
                    Thiết lập cấu hình VPS
                </h1>
                <p>Cấu hình VPS linh hoạt có kích thước phù hợp với mọi ứng dụng.</p>
            </div>
        </div>
        <div class="main-body">
            <div class="container">
                <script type="text/javascript" src="<?= BASE_URL('') ?>public/client/js/or"></script>
                <script>
                    var _localLang = {
                        'addToCart': 'Sepete Ekle',
                        'addedToCartRemove': 'Sepete Eklendi (Sil)'
                    }
                </script>
                <form id="frmConfigureProduct">
                    <input type="hidden" name="configure" value="true" />
                    <input type="hidden" name="i" value="0" />
                    <div class="main-grid">
                        <div class="main-content main-content-m-w">
                            <div class="section">
                                <div class="alert alert-lagom alert-primary alert-danger hidden" role="alert" id="containerProductValidationErrors">
                                    <span class="alert-icon ls ls-exclamation-circle"></span>
                                    <div class="alert-body">
                                        <h6 class="alert-title">Devam etmeden önce lütfen aşağıdaki hataları düzeltin:</h6>
                                        <ul id="containerProductValidationErrorsList"></ul>
                                    </div>
                                </div>
                                <div class="section-body">
                                    <div class="panel panel-form product-config-info">
                                        <div class="panel-body">
                                            <h2><?= $row['namevps'] ?></h2>
                                            <div class="product-info">
                                                <ul class="package-features">
                                                    <li><b><?= $row['cpu'] ?></b> CPU Cores</li>
                                                    <li><b><?= $row['ram'] ?> GB</b> Memory</li>
                                                    <li><b><?= $row['bandwidth'] ?></b> Bandwidth </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="section">
                                <div class="product-configurable-options" id="productConfigurableOptions">
                                    <!-- <div class="section">
                                        <div class="section-header">
                                            <h2 class="section-title">Vị trí</h2>
                                        </div>
                                        <div class="section-body">
                                            <div class="panel-check-group row row-eq-height" data-inputs-container>
                                                <div class="col-sm-4">
                                                    <div class="panel panel-check checked" data-virtual-input>
                                                        <div class="check">
                                                            <label>
                                                                <input type="radio" class="icheck-control" name="configoption[14]" value="59" checked="checked" />
                                                                <div class="check-content">
                                                                    <h6 class="check-title">
                                                                        New York City, USA
                                                                    </h6>
                                                                    <p class="check-subtitle ">
                                                                        $0.00 </p>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="panel panel-check " data-virtual-input>
                                                        <div class="check">
                                                            <label>
                                                                <input type="radio" class="icheck-control" name="configoption[14]" value="61" />
                                                                <div class="check-content">
                                                                    <h6 class="check-title">
                                                                        Ashburn, USA
                                                                    </h6>
                                                                    <p class="check-subtitle ">
                                                                        $0.00 </p>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="panel panel-check " data-virtual-input>
                                                        <div class="check">
                                                            <label>
                                                                <input type="radio" class="icheck-control" name="configoption[14]" value="62" />
                                                                <div class="check-content">
                                                                    <h6 class="check-title">
                                                                        Dallas, USA
                                                                    </h6>
                                                                    <p class="check-subtitle ">
                                                                        $0.00 </p>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="panel panel-check " data-virtual-input>
                                                        <div class="check">
                                                            <label>
                                                                <input type="radio" class="icheck-control" name="configoption[14]" value="63" />
                                                                <div class="check-content">
                                                                    <h6 class="check-title">
                                                                        Chicago, USA
                                                                    </h6>
                                                                    <p class="check-subtitle ">
                                                                        $0.00 </p>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="panel panel-check " data-virtual-input>
                                                        <div class="check">
                                                            <label>
                                                                <input type="radio" class="icheck-control" name="configoption[14]" value="64" />
                                                                <div class="check-content">
                                                                    <h6 class="check-title">
                                                                        Los Angeles, USA
                                                                    </h6>
                                                                    <p class="check-subtitle ">
                                                                        $0.00 </p>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="panel panel-check " data-virtual-input>
                                                        <div class="check">
                                                            <label>
                                                                <input type="radio" class="icheck-control" name="configoption[14]" value="66" />
                                                                <div class="check-content">
                                                                    <h6 class="check-title">
                                                                        Maidenhead, England
                                                                    </h6>
                                                                    <p class="check-subtitle ">
                                                                        $0.00 </p>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="section">
                                        <div class="section-header">
                                            <h2 class="section-title">Hệ điều hành</h2>
                                        </div>
                                        <div class="section-body">
                                            <div class="panel-check-group row row-eq-height" data-inputs-container>
                                                <?php foreach ($NNL->get_list("SELECT * FROM `operating_system` order by `stt` ASC") as $operating) : ?>
                                                    <div class="col-sm-4">
                                                        <div class="panel panel-check checked" data-virtual-input>
                                                            <div class="check">
                                                                <label>
                                                                    <input type="radio" class="icheck-control" name="opera<?=$row['id']?>" value="<?= $operating['id'] ?>" />
                                                                    <div class="check-content">
                                                                        <h6 class="check-title">
                                                                            <?= $operating['name'] ?>
                                                                        </h6>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="section">
                                        <div class="section-header">
                                            <h2 class="section-title">Quốc gia</h2>
                                        </div>
                                        <div class="section-body">
                                            <div class="panel-check-group row row-eq-height" data-inputs-container>
                                            <?php 
                                                    $dataCate = $NNL->get_row("SELECT * FROM `category` WHERE `id`='".$row['category']."'");
                                                    $detail = json_decode($dataCate['detail'],true);
                                                    foreach ($detail['data'] as $country):
                                                ?>
                                                <div class="col-sm-4">
                                                    <div class="panel panel-check " data-virtual-input>
                                                        <div class="check">
                                                            <label>
                                                                <input type="radio" class="icheck-control" id="country<?= $row['id'] ?>" name="configoption[14]" value="<?=$country['country_id']?>" />
                                                                <div class="check-content">
                                                                    <h6 class="check-title">
                                                                        <?=$country['country_name']?>
                                                                    </h6>
                                                                   
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="section section-module-output col-md-8"></div>
                        </div>
                        <div class="main-sidebar main-sidebar-lg">
                            <div class="sidebar-sticky sidebar-sticky-summary" id="orderSummary">
                                <div class="panel panel-summary panel-summary-default order-summary m-b-0x">
                                  
                                    <div class="panel-heading">
                                        <h2 class="panel-title">Thông tin đơn hàng</h2>
                                    </div>
                                    <div id="producttotal" data-summary-style="default">
                                        <div class="panel-body">
                                            <div class="summary-content content">
                                                <ul class="summary-list">
                                                    <li class="list-item list-item-main">
                                                        <span class="item-name main-item"><?= $row['namevps'] ?></span>
                                                        <span class="item-value"><?= format_cash($row['gia']) ?> VND</span>
                                                    </li>
                                                    <li class="list-item faded">
                                                        <span class="item-name">Phí cài đặt:</span>
                                                        <span class="item-value">0đ</span>
                                                    </li>
                                                    <li class="list-item faded">
                                                        <span class="item-name">Hàng tháng:</span>
                                                        <span class="item-value"><?= format_cash($row['gia']) ?> VND</span>
                                                    </li>

                                                </ul>

                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <div class="form-group">
                                                <label for="inputNs2prefix">Mã giảm giá</label>
                                                <input type="text" class="form-control" id="coupon" onchange="totalPayment()" onkeyup="totalPayment()" placeholder="Nếu có">
                                            </div>
                                            <div class="price price-left-h">
                                                <span class="price-total">Tổng tiền thanh toán</span>
                                                <div class="price-amount amt" id="total"><?= format_cash($row['gia']) ?> VND</div>
                                            </div>
                                            <div class="summary-actions">
                                                <a class="btn btn-lg btn-primary w-100" onclick="PaymentVps(<?=$row['id'] ?>)">
                                                    <span><i class="ls ls-share"></i>Thanh Toán</span>
                                                    
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </form>
                
                
            </div>
        </div>
        <script>
            function PaymentVps(id) {
                cuteAlert({
                    type: "question",
                    title: "Xác Nhận Thanh Toán",
                    message: "Bạn có chắc chắn muốn mua loại này không ?",
                    confirmText: "Đồng Ý",
                    cancelText: "Hủy"
                }).then((e) => {
                    if (e) {
                        $.ajax({
                            url: "<?= BASE_URL("ajaxs/client/buy.php"); ?>",
                            method: "POST",
                            dataType: "JSON",
                            data: {
                                id: id,
                                coupon: $("#coupon").val(),
                                opera: $("input[name='opera"+id+"']:checked").val(),
                                country: $("input[id='country" + id + "']:checked").val()
                            },
                            success: function(respone) {
                                if (respone.status == 'success') {
                                    cuteToast({
                                        type: "success",
                                        message: respone.msg,
                                        timer: 5000
                                    });
                                    setTimeout("location.href = '<?= BASE_URL('client/history-vps'); ?>';", 100);
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
                                cuteAlert({
                                        type: "error",
                                        title: "Error",
                                        message: 'Vui lòng chọn hệ điều hành',
                                        buttonText: "Okay"
                                    });
                            }
                        });
                    }
                })
            }
            function totalPayment() {
                $('#total').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...');
                $.ajax({
                    url: "/ajaxs/client/totalPayment.php",
                    method: "POST",
                    data: {
                        id: <?= $row['id'] ?>,
                        coupon: $("#coupon").val(),

                    },
                    success: function(data) {
                        $("#total").html(data);
                    },
                    error: function() {
                        cuteToast({
                            type: "error",
                            message: 'Không thể tính kết quả thanh toán',
                            timer: 5000
                        });
                    }
                });
            }
        </script>
        <?php
        require_once(__DIR__ . "/layout/page-end.php");
        require_once(__DIR__ . "/layout/footer.php");
        ?>