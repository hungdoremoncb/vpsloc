<?php
      $title = 'Quản lý bank | '.$NNL->site('tenweb');
      require_once(__DIR__."../../../../core/is_user.php");
      require_once(__DIR__."/Header.php");
      require_once(__DIR__."/Sidebar.php");
?>
<?php
if(isset($_GET['delete']) && $getUser['level'] == 'admin')
{
    if ($NNL->site('status_demo') == 1) {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $delete = check_string($_GET['delete']);
    $NNL->remove("bank", " `id` = '$delete' ");
    admin_msg_success("Xóa thành công", BASE_URL("Admin/Bank"), 300);
}

if(isset($_POST['btnThemNganHang']) && $getUser['level'] == 'admin') 
{
    if ($NNL->site('status_demo') == 1) {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $isInsert = $NNL->insert("bank", array(
        'name' => xss($_POST['name']),
        'stk' => xss($_POST['stk']),
        'logo' => xss($_POST['logo']),
        'bank_name' => xss($_POST['bank_name']),
        'ghichu' => xss($_POST['ghichu'])
    ));
    if($isInsert)
    {
        admin_msg_success("Thêm thành công", '', 1000);
    }
}

if(isset($_POST['btnSave']) && $getUser['level'] == 'admin') 
{
    if ($NNL->site('status_demo') == 1) {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $NNL->update("bank", array(
        'name' => xss($_POST['name']),
        'stk' => xss($_POST['stk']),
        'logo' => xss($_POST['logo']),
        'bank_name' => xss($_POST['bank_name']),
        'ghichu' => xss($_POST['ghichu'])
    ), " `id` = '".xss($_POST['id'])."' ");
    admin_msg_success("Lưu thành công", '', 1000);
}

if(isset($_POST['btnSaveOption']) && $getUser['level'] == 'admin')
{
    if ($NNL->site('status_demo') == 1) {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    foreach ($_POST as $key => $value)
    {
        $NNL->update("options", array(
            'value' => $value
        ), " `key` = '$key' ");
    }
    admin_msg_success('Lưu thành công', '', 500);
}
?>



<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ngân hàng</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">CẤU HÌNH MOMO, BANK AUTO</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ON/OFF Nạp tiền qua Bank</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="status_napbank" required>
                                        <option value="<?=$NNL->site('status_napbank');?>">
                                            <?=$NNL->site('status_napbank');?>
                                        </option>
                                        <option value="ON">ON</option>
                                        <option value="OFF">OFF</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">API Zalopay</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="api_zalopay" value="<?=$NNL->site('api_zalopay');?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">API Tpbank</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="api_tpbank" value="<?=$NNL->site('api_tpbank');?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">API Mbbank Auto</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="api_mbbank" value="<?=$NNL->site('api_mbbank');?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">API Momo Auto</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="api_momo" value="<?=$NNL->site('api_momo');?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">API Thesieure Auto</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="api_tsr" value="<?=$NNL->site('api_tsr');?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                            <p>Đăng ký tài khoản API: <a href="https://api.sieuthicode.net" target="_blank">Xem Ngay</a></p>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nội dung nạp tiền</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="noidung_naptien"
                                            value="<?=$NNL->site('noidung_naptien');?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Lưu ý nạp ngân hàng</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea class="form-control" id="luuy_napbank" name="luuy_napbank"
                                            rows="6"><?=$NNL->site('luuy_napbank');?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Chiết khấu khuyến mãi</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="ck_bank" placeholder="Khuyến mãi thêm bao nhiêu % khi nạp tiền qua ngân hàng, ví điện tử" value="<?=$NNL->site('ck_bank');?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="btnSaveOption" class="btn btn-primary btn-block">
                                <span>LƯU</span></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">DANH SÁCH THÔNG TIN THANH TOÁN</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>NGÂN HÀNG</th>
                                        <th>LOGO</th>
                                        <th>CHỦ TÀI KHOẢN</th>
                                        <th>STK</th>
                                        <th>LƯU Ý</th>
                                        <th width="20%">THAO TÁC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach($NNL->get_list(" SELECT * FROM `bank` WHERE `id` IS NOT NULL ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$row['name'];?></td>
                                        <td><img src="<?=$row['logo'];?>" height="50px;" /></td>
                                        <td><?=$row['bank_name'];?></td>
                                        <td><?=$row['stk'];?></td>
                                        <td><?=$row['ghichu'];?></td>
                                        <td>
                                            <a type="button" href="#" data-toggle="modal"
                                                data-target="#Edit<?=$row['id'];?>" class="btn btn-primary"><i
                                                    class="fas fa-edit"></i>
                                                <span>EDIT</span></a>
                                            <a type="button"
                                            onclick="RemoveRow(<?=$row['id']?>)"
                                                class="btn btn-danger"><i class="fas fa-trash"></i>
                                                <span>DELETE</span></a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="Edit<?=$row['id'];?>" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="defaultModalLabel">EDIT NGÂN HÀNG
                                                    </h4>
                                                </div>
                                                <form action="" method="POST">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" name="name"
                                                                    placeholder="Nhập tên ngân hàng"
                                                                    class="form-control" value="<?=$row['name'];?>"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" name="logo"
                                                                    placeholder="Nhập link logo"
                                                                    value="<?=$row['logo'];?>" class="form-control"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" name="stk"
                                                                    placeholder="Nhập số tài khoản"
                                                                    value="<?=$row['stk'];?>" class="form-control"
                                                                    required>
                                                                <input type="hidden" name="id" value="<?=$row['id'];?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" name="bank_name"
                                                                    placeholder="Nhập tên chủ tài khoản"
                                                                    class="form-control" value="<?=$row['bank_name'];?>"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <textarea class="form-control" name="ghichu"
                                                                    placeholder="Nhập ghi chú nếu có"
                                                                    rows="6"><?=$row['ghichu'];?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger waves-effect"
                                                            data-dismiss="modal"><span>ĐÓNG</span></button>
                                                        <button type="submit" name="btnSave"
                                                            class="btn btn-primary waves-effect"><span>LƯU
                                                                LẠI</span></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>NGÂN HÀNG</th>
                                        <th>LOGO</th>
                                        <th>CHỦ TÀI KHOẢN</th>
                                        <th>STK</th>
                                        <th>LƯU Ý</th>
                                        <th>THAO TÁC</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <a type="button" href="javascript:;" data-toggle="modal" data-target="#AddBank"
                            class="btn btn-info btn-block"><i class="fas fa-plus-circle"></i> <span>THÊM NGÂN
                                HÀNG</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">LỊCH SỬ NẠP BANK AUTO</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>USERNAME</th>
                                        <th>MÃ GD</th>
                                        <th>MONEY</th>
                                        <th>NỘI DUNG</th>
                                        <th>THỜI GIAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach($NNL->get_list(" SELECT * FROM `bank_auto` ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><a href="<?=BASE_URL('Admin/User/Edit/'.$NNL->getUser2($row['username'])['id']);?>"><?=$row['username'];?></a></td>
                                        <td><?=$row['tranId'];?></td>
                                        <td><?=$row['amount'];?></td>
                                        <td><?=$row['comment'];?></td>
                                        <td><?=$row['thoigian'];?></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>USERNAME</th>
                                        <th>MÃ GD</th>
                                        <th>MONEY</th>
                                        <th>NỘI DUNG</th>
                                        <th>THỜI GIAN</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">LỊCH SỬ NẠP MOMO AUTO</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable2" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>USERNAME</th>
                                        <th>MÃ GD</th>
                                        <th>MONEY</th>
                                        <th>NỘI DUNG</th>
                                        <th>THỜI GIAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach($NNL->get_list(" SELECT * FROM `momo` ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><a href="<?=BASE_URL('Admin/User/Edit/'.$NNL->getUser2($row['username'])['id']);?>"><?=$row['username'];?></a></td>
                                        <td><?=$row['tranId'];?></td>
                                        <td><?=$row['amount'];?></td>
                                        <td><?=$row['comment'];?></td>
                                        <td><?=$row['time'];?></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>USERNAME</th>
                                        <th>MÃ GD</th>
                                        <th>MONEY</th>
                                        <th>NỘI DUNG</th>
                                        <th>THỜI GIAN</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>



<div class="modal fade" id="AddBank" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">THÊM NGÂN HÀNG</h4>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="name" placeholder="Nhập tên ngân hàng" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="logo" placeholder="Nhập link logo" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="stk" placeholder="Nhập số tài khoản" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="bank_name" placeholder="Nhập tên chủ tài khoản"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <textarea class="form-control" name="ghichu" placeholder="Nhập ghi chú nếu có"
                                rows="6"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect"
                        data-dismiss="modal"><span>ĐÓNG</span></button>
                    <button type="submit" name="btnThemNganHang" class="btn btn-primary waves-effect"><span>THÊM
                            NGAY</span></button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    function RemoveRow(id) {
        cuteAlert({
            type: "question",
            title: "Xác Nhận Xóa",
            message: "Bạn có đồng ý xóa bank này không ?",
            confirmText: "Đồng Ý",
            cancelText: "Hủy"
        }).then((e) => {
            if (e) {
                $.ajax({
                    url: "<?=BASE_URL('ajaxs/admin/removeBank.php')?>",
                    method: "POST",
                    data: {
                        id: id
                    },
                    success: function(respone) {
                        $("#thongbao").html(respone);
                    },
                });
            }
        })
    }
$(function() {
    $("#datatable").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $("#datatable1").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $("#datatable2").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $("#datatable3").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
});
</script>
<script>
    CKEDITOR.replace("luuy_napbank");

</script>


<?php 
    require_once(__DIR__."/Footer.php");
?>