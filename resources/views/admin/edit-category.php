<?php
  $title = 'Chỉnh sửa vps | '.$NNL->site('tenweb');
  require_once(__DIR__."../../../../core/is_user.php");
  require_once(__DIR__."/Header.php");
  require_once(__DIR__."/Sidebar.php");
?>

<?php
if(isset($_GET['id']) && $getUser['level'] == 'admin')
{
    $row = $NNL->get_row(" SELECT * FROM `category` WHERE `id` = '".xss($_GET['id'])."'  ");
    if(!$row)
    {
        admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 500);
    }
}
else
{
    admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 0);
}

if(isset($_POST['editcate']) && $getUser['level'] == 'admin' )
{
    if ($NNL->site('status_demo') == 1) {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $arr_data = array();
    foreach ($_POST['listCountry'] as $country) {
        //var_dump($country);
        array_push($arr_data, array(
            "country_id" => $country, 
            "country_name" => getRowRealtime('country',$country,'name')));
    }
    $json['data'] = $arr_data;
    $full_detail = json_encode($json);

    $NNL->update("category", array(
        'title' => xss($_POST['title']),
        'slug' => xss(create_slug($_POST['title'])),
        'detail' =>$full_detail,
        'status' => xss($_POST['status'])
    ), " `id` = '".xss($_GET['id'])."' ");
    admin_msg_success("Lưu thành công", '', 500);
}

?>


<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chỉnh Sửa Danh Mục</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">SỬA VPS</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">

                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên danh mục</label>
                                        <input type="text" class="form-control" id="name" name="title"
                                            value="<?=$row['title']?>" placeholder="Nhập tên danh mục"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label>Chọn quốc gia</label>
                                        <select class="select2bs4" name="listCountry[]" multiple="multiple"
                                            data-placeholder="Chọn danh sách quốc gia" style="width: 100%;">
                                            <?php 
                                            $data = json_decode($row['detail'], true);
                                            foreach ($data['data'] as $country) {?>

                                            <option value="<?=$country['country_id'];?>" selected>Quốc gia:
                                                <?=$country['country_name'];?></option>
                                            <?php }?>
                                            <?php foreach ($NNL->get_list("SELECT * FROM `country` ") as $country) {?>
                                            <option value="<?=$country['id'];?>">Quốc gia: <?=$country['name'];?>
                                            </option>
                                            <?php }?>
                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Trạng thái</label>
                                        <select class="form-control" name="status" required>
                                        <option value="1" <?= $row['status'] == '1' ? 'selected' : '' ?>>Hiển thị</option>
                                        <option value="0" <?= $row['status'] == '0' ? 'selected' : '' ?>>Ẩn</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="card-footer clearfix">
                                <a href="/admin/category-vps" class="btn btn-danger btn-icon-left m-b-10" type="button"><i
                                            class="fas fa-right mr-1"></i>Quay lại</a>
                                    <button name="editcate" class="btn btn-info btn-icon-left m-b-10" type="submit"><i
                                            class="fas fa-save mr-1"></i>Lưu Ngay</button>
                                </div>
                            </form>
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
$(function() {
    $(".select2").select2()
    $(".select2bs4").select2({
        theme: "bootstrap4"
    });
});
</script>
<?php 
    require_once(__DIR__."/Footer.php");
?>