<?php
  use App\Models\Product;
  use App\Models\Category;
  $list=Category::where('Status','!=','0')->get();
  $strcatid="";
  foreach($list as $item)
  {
    $strcatid.="<option value ='".$item['Id']."'>".$item['NameCat']."</option>";
  }
  $id = $_REQUEST["id"];
  $list=Product::where('Status','!=','0')->get();

  $row = Product::find($id);
  if($row==null){
      MyClass::set_flash('message',['type'=>'danger','msg'=>'Mẫu tin không tồn tại'] );
      header("location:index.php?option=product");
  }
?> 
<?php require_once('../views/backend/header.php');?>

 <form action="index.php?option=product&cat=process" name = "form1" method="post" enctype="multipart/form-data">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Thêm Sản Phẩm</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Bảng Điều Khiển</a></li>
            <li class="breadcrumb-item active">Thêm Sản Phẩm</li>
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
            <a href="index.php?option=product" class="btn btn-sm btn-info">
              <i class="fas fa-undo"></i>Quay lại
            </a>
        </div>
      </div>
      <div class="card-body">
        <?php require_once('../views/backend/message_alert.php')?>
            <div class="row">
            <input name ="id"  type="hidden" value ="<?=$row['Id'];?>"  id="id"  class ="form-control">
                <div class="col-md-9">
                    <div class="mb-3">
                        <label for="name">Tên Sản Phẩm</label>
                        <input name ="data[Name]" value ="<?=$row['Name'];?>" type="text" id="name" placeholder="Nhập Tên Danh Mục"class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="detail">Chi Tiết</label>
                        <textarea name="data[Detail]"  id="detail" rows="3" class="form-control"><?=$row['Detail'];?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="metakey">Từ Khóa SEO</label>
                        <textarea name="data[MetaKey]"  id="metakey" rows="1" class="form-control"><?=$row['MetaKey'];?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="metadesc">Từ Khóa SEO</label>
                        <textarea name="data[MetaDesc]"  id="metadesc" rows="1" class="form-control"><?=$row['MetaDesc'];?></textarea>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                      <label for="catid">Thuộc Loại</label>
                      <select name="catid" id="catid" class="form-control">
                          <?= $strcatid?>
                      </select>
                    </div>
                    <div class="mb-3"> 
                    <label for="img">Hình</label> 
                    <input type="file" class="form-control" required  id="img" name="img">
                    </div>
                    <div class="mb3">
                      <label for="price">Giá Bán</label>
                      <input name ="data[Price]" value ="<?=$row['Price'];?>" type="price" id="price"class="form-control">
                    </div>
                    <div class="mb3">
                      <label for="pricesale">Giá Sale</label>
                      <input name ="data[PriceSale]" value ="<?=$row['PriceSale'];?>" type="pricesale" id="pricesale"class="form-control">
                    </div>
                    <div class="mb3">
                      <label for="number">Số Lượng</label>
                      <input name ="data[Number]" value ="<?=$row['Number'];?>" type="number" id="number"class="form-control">
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
            <a href="index.php?option=product" class="btn btn-sm btn-info">
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