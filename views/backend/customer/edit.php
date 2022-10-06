<?php

use App\Models\User;
use App\Libraries\MyClass;
$id=$_REQUEST["id"];
$list = User::where('Status','!=','0')->get();
$row=User::find($id);
if ($row==null){
    MyClass::set_flash('message',['type'=>'danger', 'msg'=>'Mẫu tin không tồn tại']);
   header("location:index.php?option=customer");

}

$strparentid = "";
$strorders="";
foreach ($list as $item) {
    if($item['Id']!=$id){
    if($row['ParentId'] == $item['Id']){
    $strparentid .= "<option selected value='" . $item['Id'] . "'>" . $item['FullName'] . "</option>";
    } else {
    $strparentid .= "<option value='" . $item['Id'] . "'>" . $item['FullName'] . "</option>";
    }

    if($row['Orders']-1==$item['Orders']) {
    $strorders .= "<option selected value='" . $item['Orders'] . "'>Sau: " . $item['FullName'] . "</option>";

    }
    $strorders .= "<option value='" . $item['Orders'] . "'>Sau: " . $item['FullName'] . "</option>";
    }
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
                    <h1 class="largeSite"> Cập nhật </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active">Cập nhật</li>
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
                        <button type="submit" name="CAPNHAT" class="btn btn-sm btn-success">
                            <i class="fas fa-save"></i> Lưu[Cập nhật]
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
                        
                        <input name="id" type="hidden" value="<?= $row['Id']; ?>" id="id" class="form-control">
                        
                        <div class="mb-3">
                            <label for="name">Tên khách hàng</label>
                            <input name="data[FullName]" type="text" value="<?= $row['FullName']; ?>" id="fullname" placeholder="Nhập tên danh mục" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="metakey">Mật khẩu</label>
                            <textarea name="data[Password]" id="password" class="form-control"><?= $row['Password']; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="metadesc">Email</label>
                            <textarea name="data[Email]" id="email" class="form-control"><?= $row['Email']; ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        
                        <div class="mb-3">
                            <label for="status">Trạng thái</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" <?= ($row['Status'] == 1)? 'selected' : '';?> >Xuất bản</option>
                                <option value="2" <?= ($row['Status'] == 2)? 'selected' : '';?> >Chưa xuất bản</option>
                            
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