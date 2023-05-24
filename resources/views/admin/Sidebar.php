<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= BASE_URL(''); ?>" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="https://www.facebook.com/nguyennhatloc" class="nav-link" target="_blank">Liên hệ</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= BASE_URL('Admin/Home'); ?>" class="brand-link">
                <img src="<?= BASE_URL('public/admin/template/'); ?>dist/img/AdminLTELogo.png" alt="<?= $NNL->site('tenweb'); ?>" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"><?= $NNL->site('tenweb'); ?></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= BASE_URL('public/admin/template/'); ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="NNL">
                    </div>
                    <div class="info">
                        <a href="<?= BASE_URL('admin'); ?>" class="d-block"><?= $getUser['username']; ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item has-treeview menu-open">
                            <a href="<?= BASE_URL('admin'); ?>" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-header">ĐƠN HÀNG</li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL('admin/orders-vps'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-cart-plus"></i>
                                <p>
                                    Đơn hàng vps <span class="badge badge-info right"><?= $NNL->num_rows("SELECT * FROM `license_vps` WHERE `status` = 'xuly' "); ?></span>
                                </p>
                            </a>
                        </li>

                        <li class="nav-header">QUẢN LÝ</li>

                        <li class="nav-item">
                            <a href="<?= BASE_URL('admin/Users'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Thành viên
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cart-plus"></i>
                                <p>
                                    Bán Vps
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/country" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Quốc Gia</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= BASE_URL('admin/category-vps'); ?>" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh mục vps</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= BASE_URL('admin/operating'); ?>" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Hệ điều hành</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= BASE_URL('admin/vps'); ?>" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Đăng Bán</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= BASE_URL('admin/history-vps-reg'); ?>" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lịch Sử Đã Nhận</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= BASE_URL('admin/history-vps'); ?>" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lịch Sử Đã Hoàn tất</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item ">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-gift"></i>
                                <p>
                                    Ưu Đãi
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= BASE_URL('admin/coupon'); ?>" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Giảm Giá</p>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>
                        <li class="nav-item ">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-history"></i>
                                <p>
                                    Lịch Sử
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href=""
                                        class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Biến động số dư</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href=""
                                        class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lịch sử Nạp Thẻ</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href=""
                                        class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lịch sử Nạp Bank</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">CÀI ĐẶT</li>
                        <li class="nav-item">
                            <a href="<?=BASE_URL('admin/notification')?>"
                                class="nav-link ">
                                <i class="nav-icon fas fa-bell"></i>
                                <p>
                                    Thông Báo
                                </p>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a href="/admin/question-list" class="nav-link ">
                                <i class="nav-icon fas fa-question-circle"></i>
                                <p>
                                    FAQ
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL('admin/card'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>
                                    Thẻ cào
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL('admin/bank'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-university"></i>
                                <p>
                                    Ngân hàng
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL('admin/settings'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Cấu hình
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>