<?php
        $title = 'Lịch sử vps đã bán | '.$NNL->site('tenweb');
        require_once(__DIR__."../../../../core/is_user.php");
        require_once(__DIR__."/Header.php");
        require_once(__DIR__."/Sidebar.php");
    
    if(isset($_POST['type']) && $_POST['type'] == "Delete")
    {
        $id = check_string($_POST['id']);
        $NNL->remove("license_vps", " `id` = '$id' ");
        admin_msg_success("Xóa thành công", BASE_URL("Admin/Pay/Vps"), 1000);
    }
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách vps đang nhận</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">DANH SÁCH VPS ĐANG NHẬN</h3>
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
                                        <th>NGƯỜI BÁN</th>
                                        <th>USERNAME</th>
                                        <th>LOẠI VPS</th>
                                        <th>CPU</th>
                                        <th>RAM</th>
                                        <th>VỊ TRÍ</th>
                                        <th>THÔNG TIN</th>
                                        <th>GIÁ</th>
                                        <th>IP</th>
                                        <th>THỜI GIAN TẠO</th>
                                        <th>THAO TÁC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach($NNL->get_list(" SELECT * FROM `license_vps` WHERE `status` = 'nhandon' ORDER BY id DESC ") as $row){
                                    $category_vps = $NNL->get_row("SELECT * FROM `category_vps` WHERE `id` = '".$row['vps_id']."' ");
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=$row['nguoiban'];?></td>
                                        <td><?=$row['user'];?></td>
                                        <td><?=$category_vps['namevps'];?></td>
                                        <td><?=$category_vps['cpu'];?> CORE</td>
                                        <td><?=$category_vps['ram'];?> GB</td>
                                        <td><?=$category_vps['vitri'];?></td>
                                        <td>
                                            <ul>
                                                <li><b>Hệ điều hành: <span
                                                            style="color:blue"><?= $row['opera']; ?></span></b></li>
                                                <li><b>Quốc gia: <span
                                                            style="color:green"><?= $row['country']; ?></span></b></li>
                                            </ul>
                                        </td>
                                        <td><?=format_cash($row['gia']);?> VNĐ</td>
                                        <td><?=$row['ip'];?></td>
                                        <td><span class="badge badge-info"><?=$row['time'];?></span></td>
                                        <td>
                                            <a class="btn btn-primary"
                                                href="<?=BASE_URL('admin/orders-vps-edit/'.$row['id']);?>">
                                                <i class="fas fa-edit"></i>
                                                <span>EDIT</span>
                                            </a>
                                            <button class="btn btn-danger" onclick="del(<?=$row['id'];?>)">
                                                <span>XÓA</span>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
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
<div id="thongbao"></div>
<script type="text/javascript">
function del(id) {
    cuteAlert({
        type: "question",
        title: "Xác Nhận Xóa Đơn Hàng",
        message: "Bạn có đồng ý xóa đơn ID " + id + " không ?",
        confirmText: "Đồng Ý",
        cancelText: "Hủy"
    }).then((e) => {
        if (e) {
            $.ajax({
                url: "<?= BASE_URL("ajaxs/admin/removeOrders.php"); ?>",
                method: "POST",
                data: {
                    action: "xoadon",
                    id: id
                },
                success: function(respone) {
                    $("#thongbao").html(respone);
                },
            });
        }
    })
}
</script>

<script>
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
});
</script>

<?php 
    require_once(__DIR__."/Footer.php");
?>