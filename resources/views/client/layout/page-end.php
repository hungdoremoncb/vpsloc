<div class="main-footer">
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-copyright">Copyright &copy; <?= date('Y') ?> SIEUTHICODE.NET. Vận Hành By <a href="https://www.facebook.com/nguyennhatloc">Nguyễn Nhật Lộc</a></div>
            <ul class="footer-nav footer-nav-h">
                <li>
                    <a href="#">
                        <i class="lm lm-go-top"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
</div>
<div id="fullpage-overlay" class="hidden">
    <div class="outer-wrapper">
        <div class="inner-wrapper">
            <img src="/lagom/assets/img/overlay-spinner.svg">
            <br>
            <span class="msg"></span>
        </div>
    </div>
</div>
<div class="modal system-modal fade" id="modalAjax" tabindex="-1" role="dialog" aria-hidden="true" style="display: none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="lm lm-close"></i></button>
                <h5 class="modal-title"></h5>
            </div>
            <div class="modal-body">
                <div class="loader">

                    <div class="spinner ">
                        <div class="rect1"></div>
                        <div class="rect2"></div>
                        <div class="rect3"></div>
                        <div class="rect4"></div>
                        <div class="rect5"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary modal-submit">
                    Submit
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal system-modal fade" id="blockDemoModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="lm lm-close"></i></button>
                <h3 class="modal-title">
                    <span><i class="lm lm-warning text-danger m-r-1x"></i>You're not allowed to change this
                        data</span>
                </h3>
            </div>
            <div class="modal-body">
                Apologize, but you’re not allowed to change this data. This is a <strong>demo environment</strong>,
                that’s why we’ve blocked possibility to change these information, so other customers can preview
                this theme without any interruption.<br><br> This message won’t be included in Lagom WHMCS Theme
                product. If you have any questions, please feel free to contact with us.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-lg modal-submit" data-dismiss="modal">
                    Close this message
                </button>
                <a class="btn btn-info btn-lg" id="closeDemoModalBtn" href="https://rsstudio.net/my-account/submitticket.php?step=2&deptid=1" target="_blank">
                    Contact support
                </a>
            </div>
        </div>
    </div>
</div>
<form action="#" id="frmGeneratePassword" class="form-horizontal">
    <div class="modal fade" id="modalGeneratePassword" style="display: none">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="lm lm-close"></i></button>
                    <h5 class="modal-title">
                        Tạo mật khẩu
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="alert alert-lagom alert-danger hidden" id="generatePwLengthError">
                      Vui lòng nhập từ 8 đến 64 ký tự cho độ dài mật khẩu
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="generatePwLength" class="col-md-4 control-label">Độ dài mật khẩu</label>
                        <div class="col-md-8">
                            <input type="number" min="8" max="64" value="12" step="1" class="form-control input-inline input-inline-100" id="inputGeneratePasswordLength">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="generatePwOutput" class="col-md-4 control-label">Mật khẩu đã tạo</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="inputGeneratePasswordOutput">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-default btn-sm">
                                <i class="ls ls-plus"></i>
                                Random mật khẩu mới
                            </button>
                            <button type="button" class="btn btn-default btn-sm copy-to-clipboard" data-clipboard-target="#inputGeneratePasswordOutput">
                                <i class="ls ls-copy"></i>
                                Sao chép
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Đóng
                    </button>
                    <button type="button" class="btn btn-primary" id="btnGeneratePasswordInsert" data-clipboard-target="#inputGeneratePasswordOutput">
                        Sao chép vào khay nhớ tạm và chèn
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>


<div class="overlay"></div>