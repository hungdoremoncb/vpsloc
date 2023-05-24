<?php
$title = 'Đơn hàng vps | ' . $NNL->site('tenweb');
require_once(__DIR__ . "../../../../core/is_user.php");
require_once(__DIR__ . "/header.php");
require_once(__DIR__ . "/sidebar.php");
?>

<?php

if (isset($_GET['id']) && $getUser['level'] == 'congtacvien') {
    $id = $_GET['id'];
    $row = $NNL->get_row("SELECT * FROM `license_vps` WHERE `id` = '$id' AND `status` = 'xuly' ");
    if (!$row) {
        admin_msg_warning("Đơn hàng này đã bị người khác nhận rồi !", "", 2000);
    }
    $NNL->update("license_vps", array(
        'nguoiban'  => $_SESSION['username'],
        'ip'        => 'NULL',
        'tk'        => 'NULL',
        'mk'        => 'NULL',
        'status'    => 'nhandon',
    ), " `id` = '$id' ");
    admin_msg_success("Nhận thành công", BASE_URL('CTV/DonHangVps'), 500);
}

?>


<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách đơn hàng vps</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">DANH SÁCH ĐƠN HÀNG VPS</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
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
                                        <th>LOẠI VPS</th>
                                        <th>IP|TK|MK</th>
                                        <th>CPU</th>
                                        <th>RAM</th>
                                        <th>VỊ TRÍ</th>
                                        <th>THÔNG TIN</th>
                                        <th>GIÁ</th>
                                        <th>THỜI GIAN TẠO</th>
                                        <th>STATUS</th>
                                        <th>THAO TÁC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($NNL->get_list(" SELECT * FROM `license_vps` WHERE `status` = 'xuly' ORDER BY `id` DESC ") as $row) {
                                        $category_vps = $NNL->get_row("SELECT * FROM `category_vps` WHERE `id` = '" . $row['vps_id'] . "' ");
                                    ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $row['user']; ?></td>
                                            <td><?= $category_vps['namevps']; ?></td>
                                            <td><?= $row['ip']; ?>|<?= $row['tk']; ?>|<?= $row['mk']; ?></td>
                                            <td><?= $category_vps['cpu']; ?> CORE</td>
                                            <td><?= $category_vps['ram']; ?> GB</td>
                                            <td><?= $category_vps['vitri']; ?></td>
                                            <td>
                                            <ul>
                                                <li><b>Hệ điều hành: <span
                                                            style="color:blue"><?= $row['opera']; ?></span></b></li>
                                                <li><b>Quốc gia: <span
                                                            style="color:green"><?= $row['country']; ?></span></b></li>
                                            </ul>
                                        </td>
                                            <td><?= format_cash($row['gia']); ?> VNĐ</td>
                                            <td><span class="badge badge-info"><?= $row['time']; ?></span></td>
                                            <td><?= status($row['status']); ?></td>
                                            <td>
                                                <button class="btn btn-primary btn-sm" type="button" onclick="NhanDon(<?= $row['id'] ?>)">
                                                    Nhận đơn
                                                </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
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

<script>
    function NhanDon(id) {
        cuteAlert({
            type: "question",
            title: "Xác Nhận Đơn Hàng",
            message: "Bạn có chắc chắn muốn nhận đơn hàng ID " + id + " không ?",
            confirmText: "Đồng Ý",
            cancelText: "Hủy"
        }).then((e) => {
            if (e) {
                $.ajax({
                    url: "<?= BASE_URL("ajaxs/ctv/orders-vps.php"); ?>",
                    method: "POST",
                    data: {
                        action: "nhandon",
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
    });
</script>



<?php
require_once(__DIR__ . "/footer.php");
?>