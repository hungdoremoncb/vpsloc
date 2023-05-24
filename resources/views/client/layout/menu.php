<div class="sidebar-sticky">
    <div class="sidebar sidebar-primary">
        <div menuItemName="Profile" class="panel panel-sidebar ">
            <div class="panel-heading">
                <h5 class="panel-title">
                    <i class="fas fa-user"></i>Hồ sơ của bạn
                    <i class="fa fa-chevron-up panel-minimise pull-right"></i>
                </h5>
            </div>
            <div class="list-group">
                <a menuItemName="Your Profile" href="<?=BASE_URL('client/profile')?>" class="list-group-item" id="Primary_Sidebar-Profile-Your_Profile">
                    <i class="fas fa-ticket ls ls-user"></i>
                    Thông tin tài khoản
                </a>
                <a menuItemName="Change Password" href="<?=BASE_URL('client/change-password')?>" class="list-group-item" id="Primary_Sidebar-Profile-Change_Password">
                    <i class="fas fa-ticket ls ls-padlock"></i>
                    Thay đổi mật khẩu
                </a>
                <a menuItemName="User Security" href="<?=BASE_URL('client/log-balance')?>" class="list-group-item" id="Primary_Sidebar-Profile-User_Security">
                    <i class="fas fa-ticket ls ls-shield"></i>
                    Biến đổi số dư
                </a>
                <a menuItemName="Logout" href="<?=BASE_URL('client/logout')?>" class="list-group-item" id="Primary_Sidebar-Profile-Logout">
                    <i class="fas fa-ticket ls ls-sign-out"></i>
                    Đăng xuất
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
    var url = window.location.pathname,
        urlRegExp = new RegExp(url.replace(/\/$/, '') + "$");
    $('a').each(function() {
        if (urlRegExp.test(this.href.replace(/\/$/, ''))) {
            var href = $(this).parents().eq(0).attr('id');
            $(this).addClass('active');
            $('#' + href).addClass('active');
            Checkhref(href);
        }
    });

    function Checkhref(href) {
        $('a').each(function() {
            if ($(this).attr('href') == "#" + href) {
                $(this).addClass('active');
            }
        });
    }
});
</script>