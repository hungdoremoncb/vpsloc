<?php
$title = "Chi Tiết Sản Phẩm";
require_once(__DIR__ . "/layout/header.php");
require_once(__DIR__ . "/layout/nav.php")
?>
<?php
if (isset($_GET['id'])) {
    $row = $NNL->get_row("SELECT * FROM `product` WHERE `id` = '" . check_string($_GET['id']) . "'");
    if (!$row) {
        die('<script type="text/javascript">if(!alert("Sản phẩm không tồn tại !")){location.href = "' . BASE_URL('') . '";}</script>');
    }
} else {
}
?>

<body>
    <!-- START MAIN CONTENT -->
    <div class="main_content">

        <!-- START SECTION SHOP -->
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-8">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                                <div class="product-image">
                                    <div class="product_img_box">
                                        <img id="product_img" src='<?= BASE_URL(''), $row['images'] ?>' data-zoom-image="<?= BASE_URL(''), $row['images'] ?>" alt="product_img1" />
                                        <a href="#" class="product_img_zoom" title="Zoom">
                                            <span class="linearicons-zoom-in"></span>
                                        </a>
                                    </div>
                                    <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4" data-slides-to-scroll="1" data-infinite="false">
                                        <?php $a = explode(PHP_EOL, $row['list_images']);
                                        foreach ($a as $b) {; ?>
                                            <div class="item">
                                                <a href="#" class="product_gallery_item" data-image="<?= BASE_URL(''), $b ?>" data-zoom-image="<?= BASE_URL(''), $b ?>">
                                                    <img src="<?= BASE_URL(''), $b ?>" alt="product_small_img2" />
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="pr_detail">
                                    <div class="product_description">
                                        <h4 class="product_title"><a href="#"><?= $row['name'] ?></a></h4>
                                        <div class="product_price">
                                            <span class="price"><?= sale($row['money'], $row['sale']) ?>đ</span>
                                            <?php if ($row['sale'] > 0) { ?>
                                                <del>$<?= format_cash($row['money']) ?></del>
                                                <div class="on_sale">
                                                    <span><?= $row['sale'] ?>% Off</span>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="rating_wrap">
                                            <div class="rating">
                                                <div class="product_rate" style="width:80%"></div>
                                            </div>
                                            <span class="rating_num">(21)</span>
                                        </div>
                                        <div class="pr_desc">

                                        </div>
                                        <div class="product_sort_info mt-4">
                                            <ul>
                                                <li><i class="linearicons-shield-check"></i> 1 Year AL Jazeera Brand
                                                    Warranty</li>
                                                <li><i class="linearicons-sync"></i> 30 Day Return Policy</li>
                                                <li><i class="linearicons-bag-dollar"></i> Cash on Delivery available
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="cart_extra">
                                        <input type="hidden" id="product_id" value="<?=$row['id']?>">
                                        <div class="cart-product-quantity">
                                            <div class="quantity">
                                               <input type="button" value="-" class="minus">
                                                <input type="text" name="quantity" id="quantity" value="1" title="Qty" class="qty" size="4">
                                                <input type="button" value="+" class="plus">
                                            </div>
                                        </div>
                                        <div class="cart_btn">
                                            <button class="btn btn-fill-out btn-addtocart" type="button" id="addCart"><i class="icon-basket-loaded"></i> Thêm vào giỏ hàng</button>
                                            <a class="add_compare" href="#"><i class="icon-shuffle"></i></a>
                                            <a class="add_wishlist" href="#"><i class="icon-heart"></i></a>
                                        </div>
                                    </div>
                                    <hr />
                                    <ul class="product-meta">
                                        <li>Mã sản phẩm: <a href="#">#<?= $row['id'] ?></a></li>
                                        <li>Danh mục: <a href="#"><?= CategoryProduct($row['category'], 'name') ?></a></li>
                                        <li>Tags: <a href="#" rel="tag">Cloth</a>, <a href="#" rel="tag">printed</a>
                                        </li>
                                    </ul>

                                    <div class="product_share">
                                        <span>Share:</span>
                                        <ul class="social_icons">
                                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                            <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                            <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                                            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-xl-3 col-lg-4 mt-4 pt-2 mt-lg-0 pt-lg-0">
                        <div class="sidebar">
                            <div class="widget">
                                <h5 class="widget_title">Có thể bạn sẽ thích</h5>
                                <ul class="widget_recent_post">
                                    <?php foreach ($NNL->get_list("SELECT * FROM `product` WHERE `status` = 1 ORDER BY `stt` DESC LIMIT 3 ") as $product) { ?>
                                        <li>
                                            <div class="post_img">
                                                <a href="#"><img src="<?= BASE_URL(''), $product['images'] ?>" alt="shop_small1"></a>
                                            </div>
                                            <div class="post_content">
                                                <h6 class="product_title"><a href="shop-product-detail-left-sidebar.html"><?= $product['name'] ?></a>
                                                </h6>
                                                <div class="product_price"><span class="price">$55.00</span><del>$95.00</del></div>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:68%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>

                            <div class="widget">
                                <div class="shop_banner">
                                    <div class="banner_img overlay_bg_20">
                                        <img src="assets/images/sidebar_banner_img.jpg" alt="sidebar_banner_img">
                                    </div>
                                    <div class="shop_bn_content2 text_white">
                                        <h5 class="text-uppercase shop_subtitle">New Collection</h5>
                                        <h3 class="text-uppercase shop_title">Sale 30% Off</h3>
                                        <a href="#" class="btn btn-white rounded-0 btn-sm text-uppercase">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="tab-style3">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="Description-tab" data-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Thông tin sản phẩm</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Additional-info-tab" data-toggle="tab" href="#Additional-info" role="tab" aria-controls="Additional-info" aria-selected="false">Chi tiết sản phẩm</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Reviews-tab" data-toggle="tab" href="#Reviews" role="tab" aria-controls="Reviews" aria-selected="false">Đánh giá</a>
                                    </li>
                                </ul>
                                <div class="tab-content shop_info_tab">
                                    <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                                        <?=base64_decode($row['content'])?>
                                    </div>
                                    <div class="tab-pane fade" id="Additional-info" role="tabpanel" aria-labelledby="Additional-info-tab">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>Capacity</td>
                                                <td>5 Kg</td>
                                            </tr>
                                            <tr>
                                                <td>Color</td>
                                                <td>Black, Brown, Red,</td>
                                            </tr>
                                            <tr>
                                                <td>Water Resistant</td>
                                                <td>Yes</td>
                                            </tr>
                                            <tr>
                                                <td>Material</td>
                                                <td>Artificial Leather</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                                        <div class="comments">
                                            <h5 class="product_tab_title">2 Review For <span>Blue Dress For Woman</span>
                                            </h5>
                                            <ul class="list_none comment_list mt-4">
                                                <li>
                                                    <div class="comment_img">
                                                        <img src="assets/images/user1.jpg" alt="user1" />
                                                    </div>
                                                    <div class="comment_block">
                                                        <div class="rating_wrap">
                                                            <div class="rating">
                                                                <div class="product_rate" style="width:80%"></div>
                                                            </div>
                                                        </div>
                                                        <p class="customer_meta">
                                                            <span class="review_author">Alea Brooks</span>
                                                            <span class="comment-date">March 5, 2018</span>
                                                        </p>
                                                        <div class="description">
                                                            <p>Lorem Ipsumin gravida nibh vel velit auctor aliquet.
                                                                Aenean sollicitudin, lorem quis bibendum auctor, nisi
                                                                elit consequat ipsum, nec sagittis sem nibh id elit.
                                                                Duis sed odio sit amet nibh vulputate</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="comment_img">
                                                        <img src="assets/images/user2.jpg" alt="user2" />
                                                    </div>
                                                    <div class="comment_block">
                                                        <div class="rating_wrap">
                                                            <div class="rating">
                                                                <div class="product_rate" style="width:60%"></div>
                                                            </div>
                                                        </div>
                                                        <p class="customer_meta">
                                                            <span class="review_author">Grace Wong</span>
                                                            <span class="comment-date">June 17, 2018</span>
                                                        </p>
                                                        <div class="description">
                                                            <p>It is a long established fact that a reader will be
                                                                distracted by the readable content of a page when
                                                                looking at its layout. The point of using Lorem Ipsum is
                                                                that it has a more-or-less normal distribution of
                                                                letters</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="review_form field_form">
                                            <h5>Add a review</h5>
                                            <form class="row mt-3">
                                                <div class="form-group col-12">
                                                    <div class="star_rating">
                                                        <span data-value="1"><i class="far fa-star"></i></span>
                                                        <span data-value="2"><i class="far fa-star"></i></span>
                                                        <span data-value="3"><i class="far fa-star"></i></span>
                                                        <span data-value="4"><i class="far fa-star"></i></span>
                                                        <span data-value="5"><i class="far fa-star"></i></span>
                                                    </div>
                                                </div>
                                                <div class="form-group col-12">
                                                    <textarea required="required" placeholder="Your review *" class="form-control" name="message" rows="4"></textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input required="required" placeholder="Enter Name *" class="form-control" name="name" type="text">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input required="required" placeholder="Enter Email *" class="form-control" name="email" type="email">
                                                </div>

                                                <div class="form-group col-12">
                                                    <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Submit Review</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION SHOP -->

        <!-- START SECTION SUBSCRIBE NEWSLETTER -->
        <div class="section bg_default small_pt small_pb">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="heading_s1 mb-md-0 heading_light">
                            <h3>Subscribe Our Newsletter</h3>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="newsletter_form">
                            <form>
                                <input type="text" required="" class="form-control rounded-0" placeholder="Enter Email Address">
                                <button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- START SECTION SUBSCRIBE NEWSLETTER -->

    </div>
    <!-- END MAIN CONTENT -->

    <script type="text/javascript">
        $("#addCart").on("click", function() {
            $('#addCart').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop(
                'disabled',
                true);
            $.ajax({
                url: "<?= base_url('ajaxs/client/cart.php'); ?>",
                method: "POST",
                dataType: "JSON",
                data: {
                    action: "addCart",
                    id: $("#product_id").val(),
                    quantity: $("#quantity").val()
                },
                success: function(respone) {
                    if (respone.status == 'success') {
                        cuteToast({
                            type: "success",
                            message: respone.msg,
                            timer: 5000
                        });
                        setTimeout("location.href = '';", 1000);
                    } else {
                        cuteToast({
                            type: "error",
                            message: respone.msg,
                            timer: 5000
                        });
                    }
                    $('#addCart').html('<i class="fas fa-sign-in-alt"></i> Thêm vào giỏ hàng').prop('disabled', false);
                },
                error: function() {
                    cuteToast({
                        type: "error",
                        message: 'Không thể xử lý',
                        timer: 5000
                    });
                    $('#addCart').html('<i class="fas fa-sign-in-alt"></i> Thêm vào giỏ hàng').prop('disabled', false);
                }

            });
        });
    </script>
    <?php require_once(__DIR__ . "/layout/footer.php") ?>