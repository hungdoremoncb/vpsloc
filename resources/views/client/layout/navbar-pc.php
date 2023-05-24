<div class="main-top">
    <div class="container">
        <ul class="top-nav">
            <li menuItemName="Notifications" class="dropdown" id="Secondary_Navbar-Notifications">
                <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                    <i class="fas fa-test lm lm-bell"></i>
                    <span class="item-text">Thông báo</span>
                    <span class="nav-badge badge badge-primary badge-dot badge-icon"><span>NEW</span></span>
                </a>
                <ul class="dropdown-menu has-scroll  client-alerts">

                    <li menuItemName="Alert_0" class=" " id="Secondary_Navbar-Notifications-Alert_0">
                    <li class="client-alerts-header">Thông báo</li>
            </li>

            <li menuItemName="Alert_1" class=" " id="Secondary_Navbar-Notifications-Alert_1">
                <?php foreach ($NNL->get_list("SELECT * FROM `notifications` ORDER BY `id` DESC") as $noti): ?>
                <a href="<?=BASE_URL('client/viewnoti/'),$noti['id']?>">
                    <i class="lm lm-bell text-danger text-danger"></i>
                    <div><?=$noti['title']?></div>
                </a>
                <?php endforeach?>
            </li>
        </ul>
        </li>
        <li menuItemName="Account" class="dropdown  my-account" id="Secondary_Navbar-Account">
            <?php if (empty($getUser)) { ?>
                <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                    <i class="fas fa-test lm lm-user"></i>
                    <span class="item-text">Quản lý tài khoản</span>
                    <b class="ls ls-caret"></b> </a>
                <ul class="dropdown-menu has-scroll  ">
                    <li menuItemName="Login" class=" " id="Secondary_Navbar-Account-Login">
                        <a href="<?= BASE_URL('client/login') ?>">
                            <i class="fas fa-test lm lm-user"></i>
                            Đăng nhập
                        </a>
                    </li>
                    <li menuItemName="Register" class=" " id="Secondary_Navbar-Account-Register">
                        <a href="<?= BASE_URL('client/register') ?>">
                            <i class="fas fa-test ls ls-sign-in"></i>
                            Đăng ký
                        </a>
                    </li>
                    <li menuItemName="Divider-159" class="nav-divider " id="Secondary_Navbar-Account-Divider-159">
                        -----
                    </li>
                    <li menuItemName="Forgot Password?" class=" " id="Secondary_Navbar-Account-Forgot_Password?">
                        <a href="<?=BASE_URL('client/reset-password')?>">
                            <i class="fas fa-test ls ls-refresh"></i>
                            Quên mật khẩu?
                        </a>
                    </li>
                </ul>

            <?php } else { ?>
                <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                    <div class="client-avatar client-avatar-sm">
                        <img src="<?= BASE_URL('public/client/images/avt.jpg') ?>" alt="Avatar">
                    </div>
                    <div class="active-client">
                        <span class="item-text"><?= $getUser['username'] ?></span>
                    </div>
                    <b class="ls ls-caret"></b>
                </a>
                <ul class="dropdown-menu has-scroll dropdown-menu-right ">
                    <li class="dropdown-header dropdown-header--account">
                        <div class="client-avatar client-avatar-sm">
                            <img src="<?= BASE_URL('public/client/images/avt.jpg') ?>" alt="Avatar">
                        </div>
                        <div class="dropdown-header-info">
                            <div class="dropdown-header-desc">
                                <?= $getUser['email'] ?>
                            </div>
                            <div class="dropdown-header-title">
                                <?= $getUser['username'] ?>
                            </div>
                        </div>
                    </li>
                    <li menuItemName="Divider-81" class="nav-divider " id="Secondary_Navbar-Account-Divider-81">
                        -----
                    </li>
                    <li menuItemName="Account Details" class=" " id="Secondary_Navbar-Account-Account_Details">
                        <a>
                            <i class="fas fa-test ls ls-shield"></i>
                            <?= format_cash($getUser['money']) ?>đ
                        </a>
                    </li>
                    <?php if ($getUser['level'] == 'admin') : ?>
                        <li menuItemName="User Management" class=" " id="Secondary_Navbar-Account-User_Management">
                            <a href="<?= BASE_URL('admin') ?>">
                                <i class="fas fa-test ls ls-configure"></i>
                                Trang quản trị
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if ($getUser['level'] == 'ctv') : ?>
                        <li menuItemName="User Management" class=" " id="Secondary_Navbar-Account-User_Management">
                            <a href="<?= BASE_URL('ctv') ?>">
                                <i class="fas fa-test ls ls-configure"></i>
                                Trang cộng tác viên
                            </a>
                        </li>
                    <?php endif; ?>
                    <li menuItemName="Your Profile" class=" " id="Secondary_Navbar-Account-Your_Profile">
                        <a href="<?= BASE_URL('client/profile') ?>">
                            <i class="fas fa-test ls ls-user"></i>
                            Thông tin tài khoản
                        </a>
                    </li>
                    <li menuItemName="Payment Methods" class=" " id="Secondary_Navbar-Account-Payment_Methods">
                        <a href="<?= BASE_URL('client/log-balance') ?>">
                            <i class="fas fa-test ls ls-wallet"></i>
                            Biến động số dư
                        </a>
                    </li>
                    <li menuItemName="Change Password" class=" " id="Secondary_Navbar-Account-Change_Password">
                        <a href="<?= BASE_URL('client/change-password') ?>">
                            <i class="fas fa-test ls ls-padlock"></i>
                            Thay đổi mật khẩu
                        </a>
                    </li>
                    <li menuItemName="Logout" class=" " id="Secondary_Navbar-Account-Logout">
                        <a href="<?= BASE_URL('client/logout') ?>">
                            <i class="fas fa-test ls ls-arrow-left-wall"></i>
                            Đăng xuất
                        </a>
                    </li>
                </ul>
            <?php } ?>
        </li>
        </ul>
    </div>
</div>