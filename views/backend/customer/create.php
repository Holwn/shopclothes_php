<?php

use App\Models\User;

$list=User::where('Status', '!=', '0')->get();
$strparentid = "";
$strorders="";
foreach ($list as $item) {
    $strparentid .= "<option value='" . $item['Id'] . "'>" . $item['FullName'] . "</option>";

}
?>
<?php require_once('../views/backend/header.php'); ?>
<form action="index.php?option=customer&cat=process" name="form1" method="post">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="largeSite"> Thêm </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active">Thêm khách hàng</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 text-right">
                        <button type="submit" name="THEM" class="btn btn-sm btn-success">
                            <i class="fas fa-save"></i> Lưu[Thêm]
                        </button>
                        <a href="index.php?option=customer" class="btn btn-sm btn-undo">
                            <i class="fas fa-undo"></i> Quay về</a>
                    </div>
                </div>
            </div>


            <div class="card-body">
                <?php require_once('../views/backend/message_alert.php'); ?>
                <div class="row">
                    <div class="col-md-9">
                        <div class="mb-3">
                            <label for="name">Tên khách hàng</label>
                            <input name="fullname" type="text" id="fullname" placeholder="Nhập tên khách hàng" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="metakey">Tên đăng nhập</label>
                            <textarea name="username" id="username" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="metadesc">Mật khẩu</label>
                            <textarea name="password" id="password" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="metadesc">Email</label>
                            <textarea name="email" id="email" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        
                        <div class="mb-3">
                            <label for="status">Trạng thái</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1">Xuất bản</option>
                                <option value="2">Chưa xuất bản</option>
                            
                            </select>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</form> 
<?php require_once('../views/backend/footer.php'); ?>