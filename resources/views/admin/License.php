<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'TOOL ĐÃ BÁN | '.$CMSNT->site('tenweb');
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
?>


<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách key tool</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">DANH SÁCH KEY TOOL</h3>
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
                                        <th>ID</th>
                                        <th>LOẠI TOOL</th>
                                        <th>NGƯỜI MUA</th>
                                        <th>GIÁ</th>
                                        <th>KEY</th>
                                        <!-- <th>DAY</th> -->
                                        <th>HSD</th>
                                        <th>THỜI GIAN MUA</th>
                                        <!-- <th>THAO TÁC</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach($CMSNT->get_list(" SELECT * FROM `license` ORDER BY id DESC ") as $row){
                                    $license = $CMSNT->get_row(" SELECT * FROM `category` WHERE `id` = '".$row['tool_id']."' ")
                                    ?>
                                    <?php
                                    $time = $row['time'];

                                    $now = time();
                                                    
                                    $time = date_parse_from_format('Y-m-d H:i:s', $time);
                                    $time_stamp = mktime($time['hour'], $time['minute'], $time['second'], $time['month'], $time['day'], $time['year']);
                                    $exptool=($now - $time_stamp) / 86400;
                                    $hsd =(int)$row['day'] - (int)$exptool;
                                    $status = "Hết Hạn";
                                    if($hsd > 0)
                                    {
                                        $status = "Còn ".$hsd." ngày";
                                    }
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td>#<?=$row['id'];?></td>
                                        <td width="10%"><?=$license['title'];?></td>
                                        <td><?=$row['user'];?></td>
                                        <td><?=format_cash($row['gia']);?> VNĐ</td>
                                        <td><?=$row['token'];?></td>
                                        <!-- <td><?=$row['day'];?></td> -->
                                        <td><span class="badge badge-success"><?=$status;?></span></td>
                                        <td><span class="badge badge-success"><?=$row['time'];?></span></td>
                                        <!-- <td>
                                            <a class="btn btn-primary" href="<?=BASE_URL('Admin/License/Edit/'.$row['id']);?>"><i class="fas fa-edit"></i>
                                                <span>EDIT</span></a>
                                            <button class="btn btn-danger btnCheck" data-token="<?=$row['token'];?>" data-bidanh="<?=$row['bidanh'];?>"><i class="fas fa-flag-checkered"></i>
                                                <span>CHECK</span></button>
                                        </td> -->
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



<!-- Modal -->
<div class="modal fade" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">THÔNG TIN TOOL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">KEY</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="key" id="key" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">BÍ DANH</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="bidanh" id="bidanh" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">KẾT QUẢ</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="status" id="status" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->

<script type="text/javascript">
$('.btnCheck').on('click', function(e) {
    var btn = $(this);
    $("#key").val(btn.attr("data-token"));
    $("#bidanh").val(btn.attr("data-bidanh"));
    $.ajax({
            url: "<?=BASE_URL("api/kiemtra.php");?>",
            method: "POST",
            data: {
                key: $("#key").val(),
                name: $("#bidanh").val()
            },
            success: function(response) {
                $("#status").val(response);
            }
        });
    $("#staticBackdrop").modal();
    return false;
});
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