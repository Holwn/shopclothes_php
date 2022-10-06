<?php
  use App\Models\Category;
  use App\libraries\MyClass;

  $id=$_REQUEST["id"];
  $list=Category::where('Status','!=','0')->get();
  $row=Category::find($id);
  if($row==null){
    MyClass::set_flash('message',['type'=>'danger','msg'=>'Chuyển Thất Bại !!!']);
    header("location:index.php?option=category");
  }

  $strparentid="";
  $strorders="";
  foreach($list as $item)
  {
    if($item['Id']!=$id)
    {
      if($row['ParentId']==$item['Id'])
      {
        $strparentid.="<option selected value ='".$item['Id']."'>".$item['NameCat']."</option>";
      }
      else
      {
        $strparentid.="<option value ='".$item['Id']."'>".$item['NameCat']."</option>";
      }
      if($row['Orders'] - 1==$item['Orders'])
      {
        $strorders.="<option selected value ='".$item['Orders']."'>Sau: ".$item['NameCat']."</option>";
      }
      else{
        $strorders.="<option value ='".$item['Orders']."'>Sau: ".$item['NameCat']."</option>";
      }
    }
  }
?> 
<?php require_once('../views/backend/header.php');?>

 <form action="index.php?option=category&cat=process" name = "form1" method="post">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Cập Nhật Danh Mục Sản Phẩm</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Bảng Điều Khiển</a></li>
            <li class="breadcrumb-item active">Cập Nhật Danh Mục Sản Phẩm</li>
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
        <div class="col-12 text-right">
            <button type="submit" name="CAPNHAT" class="btn btn-sm btn-success">
                <i class="fas fa-save"></i>Lưu[Cập Nhật]
            </button>
            <a href="index.php?option=category" class="btn btn-sm btn-info">
              <i class="fas fa-undo"></i>Quay lại
            </a>
        </div>
      </div>
      <div class="card-body">
        <?php require_once('../views/backend/message_alert.php')?>
            <div class="row">
                <div class="col-md-9">
                        <input name ="id" value="<?=$row['Id'] ?>" type="hidden" id="id" class="form-control">
                    <div class="mb-3">
                        <label for="name">Tên Danh Mục</label>
                        <input name ="data[NameCat]" value="<?=$row['NameCat'] ?>" type="text" id="name" placeholder="Nhập Tên Danh Mục"class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="metakey">Từ Khóa SEO</label>
                        <textarea name="data[MetaKey]" id="metakey" rows="3" class="form-control"><?=$row['MetaKey'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="metadesc">Từ Khóa SEO</label>
                        <textarea name="data[MetaDesc]" id="metadesc" rows="3" class="form-control"><?=$row['MetaDesc'] ?></textarea>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                    <label for="parentid">Cấp Cha</label>
                    <select name="parentid" id="parentid" class="form-control">
                        <option value="0">None</option>
                        <?= $strparentid?>
                    </select>
                    </div>
                    <div class="mb-3">
                    <label for="orders">Sắp Xếp</label>
                    <select name="orders" id="orders" class="form-control">
                        <option value="0">None</option>
                        <?= $strorders?>
                    </select>
                    </div>
                    <div class="mb-3">
                    <label for="status">Trạng Thái</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1" <?=($row['Status']==1)?'selected':'';?>>Xuất Bản</option>
                        <option value="2" <?=($row['Status']==2)?'selected':'';?>>Chưa Xuất Bản</option>
                    </select>
                    </div>
                </div>
            </div>
      </div>
      <!-- /.card-body -->
      <!-- /.card-footer-->
      <div class="card-footer">
        <div class="col-12 text-right">
            <button type="submit" name="CAPNHAT" class="btn btn-sm btn-success">
                <i class="fas fa-save"></i>Lưu[Cập Nhật]
            </button>
            <a href="index.php?option=category" class="btn btn-sm btn-info">
              <i class="fas fa-undo"></i>Quay lại
            </a>
        </div>
      </div>

    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</form>
<?php require_once('../views/backend/footer.php');?>