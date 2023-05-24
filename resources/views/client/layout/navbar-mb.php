<div class="app-nav app-nav-default">
    <div class="app-nav-header">
        <div class="container">
            <button class="app-nav-toggle navbar-toggle" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="logo hidden-sm hidden-xs hidden-md" href="<?=BASE_URL('')?>"><img src="<?= BASE_URL('public/client/images/logo.png') ?>" title="RS STUDIO" alt="RS STUDIO" /></a>
            <a class="logo visible-xs visible-sm visible-md" href="<?=BASE_URL('')?>"><img src="<?= BASE_URL('public/client/images/logo.png') ?>" title="RS STUDIO" alt="RS STUDIO" /></a>
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
                            <span>LockWorth</span>
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
    <div class="app-nav-menu" id="main-menu">
        <div class="container">
            <ul class="menu menu-primary" data-nav>
                <li menuItemName="Store" class="dropdown" id="Primary_Navbar-Store">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        <svg class="svg-icon {if $onDark}svg-icon-on-dark{/if}" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="64px" height="64px" viewBox="0 0 64 64" style="enable-background:new 0 0 64 64;" xml:space="preserve">
                            <line class="svg-icon-outline-s" x1="32" y1="1.5" x2="32" y2="8.4" />
                            <polygon class="svg-icon-prime svg-icon-stroke" points="17,23 32,31.7 47,23 47,16.9 17,16.9" />
                            <polygon class="svg-icon-prime-l svg-icon-stroke" points="32,25.2 17,16.6 32,7.9 47,16.6" />
                            <line class="svg-icon-outline-s" x1="32" y1="32.7" x2="32" y2="62.5" />
                            <polyline class="svg-icon-outline-s" points="58.5,16.9 32,32.2 5.5,16.9" />
                            <polygon class="svg-icon-outline-s" points="32,63 5,47.4 5,16.6 32,1 59,16.6 59,47.4" />
                        </svg>
                        <span class="item-text">Sản phẩm</span>
                        <b class="ls ls-caret"></b> </a>
                    <ul class="dropdown-menu has-scroll  ">
                        <li class="dropdown-header">Sản phẩm của chúng tôi</li>
                        <?php foreach($NNL->get_list('SELECT * FROM `category` WHERE `status`=1') as $cate):?>
                        <li menuItemName="Web Hosting" class=" " id="Primary_Navbar-Store-Web_Hosting">
                            <a href="<?= BASE_URL('client/product/'),$cate['slug'] ?>">
                                <i class="fas fa-ticket ls ls-hosting"></i>
                                <?=$cate['title']?>
                            </a>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </li>
                <li menuItemName="Billing" class="dropdown" id="Primary_Navbar-Billing">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        <svg class="svg-icon {if $onDark}svg-icon-on-dark{/if}" width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="svg-icon-outline-s dashed-40" d="M10.7 48L1 52.5V18.5L23.5193 8.05444" />
                            <path class="svg-icon-outline-s" d="M50 5.5L49.9 39L12 57V23L50 5.5Z" />
                            <path class="svg-icon-prime-l" d="M59.1 9.00012L63 11L26 63L22 61V26.5L59.1 9.00012Z" />
                            <path class="svg-icon-prime" d="M63 11V44.9999L26 62.9999V27.9999L63 11Z" />
                            <path class="svg-icon-outline-i" d="M29 29.9436L30.6039 29.173" />
                            <path class="svg-icon-outline-i" d="M34.373 27.2966L35.9769 26.526" />
                            <path class="svg-icon-outline-i" d="M39.7461 24.7706L41.35 24" />
                            <path class="svg-icon-outline-s" d="M28.4145 5.53434L21.0927 4.55444" />
                            <path class="svg-icon-outline-s" d="M28.4145 5.53436L25.3652 12.2628" />
                            <path class="svg-icon-i" d="M40.8027 35.8506L40.8027 39.7641L36.0032 42.099L36.0032 38.0558L40.8027 35.8506Z" />
                            <path class="svg-icon-i" d="M40.8026 44.4401L40.8026 46.3069L38.5131 47.4208L38.5131 45.492L40.8026 44.4401Z" />
                            <path class="svg-icon-i" d="M52.7968 32.5825L52.7968 39.078L44.8307 42.9535L44.8307 36.2426L52.7968 32.5825Z" />
                        </svg>

                        <span class="item-text">Nạp tiền</span>
                        <b class="ls ls-caret"></b> </a>
                    <ul class="dropdown-menu has-scroll  ">
                        <li class="dropdown-header">Nạp tiền</li>

                        <li menuItemName="My Invoices" class=" " id="Primary_Navbar-Billing-My_Invoices">
                            <a href="<?= BASE_URL('client/recharge/card') ?>">
                                <i class="fas fa-test ls ls-document"></i>
                                Nạp thẻ
                            </a>
                        </li>
                        <li menuItemName="My Invoices" class=" " id="Primary_Navbar-Billing-My_Invoices">
                            <a href="<?= BASE_URL('client/recharge/bank') ?>">
                                <i class="fas fa-test ls ls-document"></i>
                                Ngân hàng/Ví điện tử
                            </a>
                        </li>


                    </ul>
                </li>

                <li menuItemName="Billing" class="dropdown" id="Primary_Navbar-Billing">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        <svg class="svg-icon {if $onDark}svg-icon-on-dark{/if}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 63.99" x="0px" y="0px" width="64px" height="64px">
                            <line class="svg-icon-outline-s" x1="12.42" y1="56.22" x2="11.57" y2="48.53" />
                            <line class="svg-icon-outline-s" x1="12.42" y1="56.22" x2="4.99" y2="55.35" />
                            <path class="svg-icon-outline-s dashed-1" d="M45.42,3.94C55.51,9,63,19.56,63,31.76,63,48.88,48.46,63,31.6,63a30.45,30.45,0,0,1-3.84-.24" />
                            <path class="svg-icon-outline-s" d="M11.51,55.23A31.5,31.5,0,0,1,1,31.91,31.05,31.05,0,0,1,32,1,29.72,29.72,0,0,1,45.42,3.94" />
                            <polygon class="svg-icon-prime-l" points="17.24 54.43 19.78 56.09 48.39 36.32 51.15 2.83 48.39 1.29 17.24 19.41 17.24 54.43" />
                            <polygon class="svg-icon-prime" points="20.2 56.12 51.15 37.85 51.15 2.83 20.2 21.1 20.2 56.12" />
                            <line class="svg-icon-outline-i" x1="46.82" y1="15.66" x2="24.33" y2="28.58" />
                            <line class="svg-icon-outline-i" x1="46.82" y1="22.54" x2="24.33" y2="35.45" />
                            <line class="svg-icon-outline-i" x1="35.39" y1="35.45" x2="24.33" y2="41.77" />
                        </svg>

                        <span class="item-text">Đơn hàng</span>
                        <b class="ls ls-caret"></b> </a>
                    <ul class="dropdown-menu has-scroll  ">
                        <li class="dropdown-header">Đơn hàng của tôi</li>

                        <li menuItemName="My Invoices" class=" " id="Primary_Navbar-Billing-My_Invoices">
                            <a href="<?= BASE_URL('client/history-vps') ?>">
                                <i class="fas fa-test ls ls-document"></i>
                                Xem thông tin đơn hàng
                            </a>
                        </li>
                    </ul>
                </li>
                <li menuItemName="Support" class="dropdown" id="Primary_Navbar-Support">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        <svg class="svg-icon {if $onDark}svg-icon-on-dark{/if}" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="64px" height="64px" viewBox="0 0 64 64" style="enable-background:new 0 0 64 64;" xml:space="preserve">
                            <line class="svg-icon-outline-s" x1="59" y1="20.6" x2="59" y2="16.6" />
                            <line class="svg-icon-outline-s" x1="59" y1="35.3" x2="59" y2="28.7" />
                            <polyline class="svg-icon-outline-s" points="55.5,49.4 59,47.4 59,43.4" />
                            <line class="svg-icon-outline-s" x1="42.6" y1="56.9" x2="48.4" y2="53.5" />
                            <polyline class="svg-icon-outline-s" points="28.5,61 32,63 35.5,61" />
                            <line class="svg-icon-outline-s" x1="15.6" y1="53.6" x2="21.4" y2="56.9" />
                            <polyline class="svg-icon-outline-s" points="5,43.4 5,47.4 8.5,49.4" />
                            <line class="svg-icon-outline-s" x1="5" y1="28.7" x2="5" y2="35.3" />
                            <line class="svg-icon-outline-s" x1="5" y1="16.6" x2="5" y2="20.6" />
                            <polygon class="svg-icon-prime svg-icon-stroke" points="32,37 27.5,34.4 19,39.3 32,46.8 45,39.3 36.5,34.4" />
                            <polygon class="svg-icon-prime-l svg-icon-stroke" points="32,32.8 24.8,28.6 19,32 32,39.5 45,32 39.2,28.6" />
                            <polygon class="svg-icon-outline-s" points="32,32.2 5,16.6 32,1 59,16.6" />
                            <polyline class="svg-icon-outline-s" points="26,4.7 26,20 52.8,20" />
                            <line class="svg-icon-outline-s" x1="25" y1="13" x2="11.5" y2="13" />
                            <line class="svg-icon-outline-s" x1="38" y1="21" x2="38" y2="28.5" />
                        </svg>
                        <span class="item-text">Hỗ trợ</span>
                        <b class="ls ls-caret"></b> </a>
                    <ul class="dropdown-menu has-scroll  ">
                        <li class="dropdown-header">Hỗ trợ</li>

                        <li menuItemName="Tickets" class=" " id="Primary_Navbar-Support-Tickets">
                            <a href="https://www.facebook.com/CaoNgocLinhz" target="_blank">
                                <i class="fas fa-test ls ls-envelope"></i>
                                Liên Hệ Facebook
                               </a>
                        </li>
                        <li menuItemName="Open Ticket" class=" " id="Primary_Navbar-Support-Open_Ticket">
                            <a href="https://zalo.me/g/lpyizq341" target="_blank">
                                <i class="fas fa-test ls ls-new-window"></i>
                                Liên Hệ Zalo
                            </a>
                        </li>
                    </ul>
                </li>
                 <li menuitemname="Website &amp; Security" class="dropdown" id="Primary_Navbar-Website_&amp;_Security">
                    <a class="dropdown-toggle" href="/client/faq">
                        <svg class="svg-icon {if $onDark}svg-icon-on-dark{/if}" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="64px" height="64px" viewBox="0 0 64 64" style="enable-background:new 0 0 64 64;" xml:space="preserve">
                            <polygon class="svg-icon-prime-l svg-icon-stroke" points="31,27.5 59,3.8 54,1 26,17.2 26,24.7"></polygon>
                            <polygon class="svg-icon-prime svg-icon-stroke" points="31,19.9 31,27.5 38.5,31.9 38.5,48 45,48 59,31.8 59,3.8"></polygon>
                            <polygon class="svg-icon-outline-s" points="33,63 19,63 5,46.8 5,18.8 10,16 38,32.2 38,60.3"></polygon>
                            <polyline class="svg-icon-outline-s" points="5.5,19.1 33,34.9 33,62.5"></polyline>
                            <line class="svg-icon-outline-s" x1="33.5" y1="34.6" x2="37.5" y2="32.5"></line>
                        </svg>
                        <span class="item-text">FAQ</span>
                        <b class="ls ls-caret"></b> </a>
                    
                </li>

            </ul>
        </div>
    </div>
</div>