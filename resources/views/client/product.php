<?php
$title = "Danh Sách VPS";
require_once(__DIR__ . "/layout/header.php");
require_once(__DIR__ . '/../../../core/is_user.php');
?>
<?php
if (isset($_GET['slug'])) {
    $row = $NNL->get_row("SELECT * FROM `category` WHERE `slug` = '" . xss($_GET['slug']) . "'");
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
                    <?=$row['title']?>
                </h1>
                <p>Cấu hình VPS linh hoạt có kích thước phù hợp với mọi ứng dụng.</p>
            </div>
        </div>
        <div class="main-body">
            <div class="container">
                <script type="text/javascript" src="/js/order.min.js?v=2.1.1"></script>
                <div class="main-grid">
                    <!-- <div class="main-sidebar hidden-xs hidden-sm hidden-md ">
                        <div class="sidebar-sticky">

                        </div>
                    </div> -->
                    <div class="main-content">
                        
                        <div class="section products" id="products">
                            <div class="row row-eq-height row-eq-height-sm">
                                <?php foreach ($NNL->get_list("SELECT * FROM `category_vps` WHERE `category`='".$row['id']."' ORDER BY id DESC ") as $product) : ?>
                                    <div class="col">
                                        <div class="package" id="product4">
                                            <div class="package-side package-side-left">
                                                <div class="package-header">
                                                    <h3 class="package-title"><?= $product['namevps'] ?></h3>
                                                    <div class="package-price">
                                                        <div class="price">
                                                            <div class="price-starting-from"><?= $product['vitri'] ?></div>
                                                            <div class="price-amount">
                                                                <?= format_cash($product['gia']) ?>đ
                                                            </div>
                                                            <div class="price-cycle ">
                                                                Tháng </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="package-body">
                                                    <div class="package-content">
                                                        <p>
                                                        <ul class="package-features">
                                                            <li><b><?= $product['cpu'] ?></b> vCPU</li>
                                                            <li><b><?= $product['ram'] ?> GB</b> Memory</li>
                                                            <li><b><?= $product['bandwidth'] ?></b> Bandwidth</li>

                                                        </ul><br />
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="package-footer package-side package-side-right">
                                                <a href="<?=BASE_URL('client/confproduct/'),$product['id'];?>" class="btn btn-lg btn-primary btn-order-now  " id="product4-order-button">
                                                     <i class="lm lm-basket"></i> Đặt Hàng
                                                
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal modal-lg fade modal-recomendations" id="recommendationsModal" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="lm lm-close"></i></button>
                                <h3 class="modal-title">
                                    Added to Cart
                                </h3>
                            </div>
                            <div class="modal-body has-scroll">
                                <div class="product-recommendations-container">
                                    <div class="product-recommendations">
                                        <h5 class="recommendation-title">Based on your order, we recommend:</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer m-t-3x">
                                <a class="btn btn-primary btn-block btn-lg" href="#" id="btnContinueRecommendationsModal" data-dismiss="modal" role="button">
                                    <span><i class="ls ls-share"></i>Devam Et</span>
                                    <div class="loader loader-button hidden">

                                        <div class="spinner spinner-sm">
                                            <div class="rect1"></div>
                                            <div class="rect2"></div>
                                            <div class="rect3"></div>
                                            <div class="rect4"></div>
                                            <div class="rect5"></div>
                                        </div>

                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-recommendation clonable w-hidden hidden">
                        <div class="header">
                            <div class="cta">
                                <div class="price">
                                    <span class="w-hidden hidden">ÜCRETSİZ!</span>
                                    <span class="breakdown-price"></span>
                                    <span class="setup-fee"><small>&nbsp;Kurulum Ücreti</small></span>
                                </div>
                                <button type="button" class="btn btn-sm btn-add">
                                    <span class="text">Sepete Ekle</span>
                                    <span class="arrow"><i class="fas fa-chevron-right"></i></span>
                                </button>
                            </div>
                            <div class="expander">
                                <i class="fas fa-chevron-right rotate" data-toggle="tooltip" data-placement="right" title="Click to learn more."></i>
                            </div>
                            <div class="content">
                                <div class="headline truncate"></div>
                                <div class="tagline truncate">
                                    A description (tagline) is not available for this product.
                                </div>
                            </div>
                        </div>
                        <div class="body clearfix">
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require_once(__DIR__ . "/layout/page-end.php");
        require_once(__DIR__ . "/layout/footer.php");
        ?>