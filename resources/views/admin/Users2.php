<?php
    $title = 'Quản lý thành viên | '.$NNL->site('tenweb');
    require_once(__DIR__."../../../../core/is_user.php");
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
?>

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h2 class="text-center display-4">Username Search</h2>
            <form action="Users" method="GET">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <input type="search" name="search" id="search" class="form-control form-control-lg" placeholder="Điền ID hoặc Username">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
  </div>

<script>
$(function() {
    $("#datatable").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
});
</script>



<?php 
    require_once(__DIR__."/Footer.php");
?>