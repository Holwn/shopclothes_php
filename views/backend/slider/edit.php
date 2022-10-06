<?php
use App\Models\Slider;
use App\Libraries\MyClass;

$id = $_REQUEST["id"];
$list=Slider::where('Status','!=','0')->get();

$row = Slider::find($id);
if($row==null){
    MyClass::set_flash('message',['type'=>'danger','msg'=>'Mẫu tin không tồn tại'] );
    header("location:index.php?option=slider");
}
  $strparentid="";
  $strorders="";
  foreach($list as $item){
      if ($item['Id']!=$id){
      if ($row['ParentId'] == $item['Id']){
        $strparentid .="<option selected value='".$item['Id']."'>".$item["Name"]."</option>";
      }
      else
      {
        $strparentid .="<option value='".$item['Id']."'>".$item["Name"]."</option>";
      }
      if ($row['Orders'] -1 == $item['Orders']){
        $strorders .="<option selected value='".$item['Orders']."'> Sau: ".$item["Name"]."</option>";
      }
      else
      {
        $strorders .="<option value='".$item['Orders']."'> Sau: ".$item["Name"]."</option>";
      }
    }

  }

?>
<?php require_once('../views/backend/header.php');?>
<form action="index.php?option=slider&cat=process" name="form1" method="post" enctype="multipart/form-data">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm danh mục sản phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Bảng điều khiển</a></li>
              <li class="breadcrumb-item active">Thêm danh mục sản phẩm</li>
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
            <div class="col-12 text-right" >
                <button type="submit" name="CAPNHAT" class="btn btn-sm btn-success">
                <i class="fas fa-save"></i>Lưu[Cập Nhật]
                </button>
          <a href="index.php?option=slider" class ="btn btn-sm btn-info"> 
            <i class="fas fa-undo"></i>Quay về danh sách</a>
            </div>
          </div>
        </div>
        <div class="card-body">
        <?php require_once('../views/backend/message_alert.php');?>
          <div class="row">
          <input name ="id"  type="hidden" value ="<?=$row['Id'];?>"  id="id"  class ="form-control">
              <div class="col-md-9">
                  <div class="mb-3">
                      <label for="name">Tên Slider</label>
                      <input name ="data[Name]"  value="<?=$row['Name'] ?>" type="text" id="name" placeholder= "Nhập tên danh mục" class ="form-control">
                  </div>
                  <div class="mb-3">
                      <label for="link">Liên kết</label>
                      <input name ="data[Link]"  value="<?=$row['Link'] ?>" type="text" id="link" placeholder= "#" class ="form-control">
                  </div>
                
              </div>
              <div class="col-md-3">
                <div class="mb-3"> 
                <label for="position">Vị trí</label> 
                <select id="position" name="position" class ="form-control">
                    <option value="slideshow" <?=($row['Position']=="slideshow")?'selected':'';?>>Slideshow</option>
                    <option value="ads" <?=($row['Position']=="ads")?'selected':'';?>>Quảng cáo</option>
                    <option value="logo" <?=($row['Position']=="logo")?'selected':'';?>>Logo</option>
                </select>
                </div>
                <div class="mb-3"> 
                <label for="orders">Sắp xếp</label> 
                <select id="orders" name="orders" class ="form-control">
                    <option value="0">None</option>
                    <?=$strorders; ?>
                </select>
                </div>

                <div class="mb-3"> 
                <label for="img">Hình</label> 
                <input type="file" class="form-control" id="img" name="img" >
                </div>

                <div class="mb-3"> 
                <label for="status">Trạng thái</label> 
                <select id="status" name="status" class ="form-control">
                    <option value="1" <?=($row['Status']==1)?'selected':'';?>>Xuất bản</option>
                    <option value="2" <?=($row['Status']==2)?'selected':'';?>>Chưa xuất bản</option>
                </select>
                </div>
              </div>
              <div class="card-footer">
          <div class="row">
            <div class="col-12 text-right" >
                <button type="submit" name="CAPNHAT" class="btn btn-sm btn-success">
                <i class="fas fa-save"></i>Lưu[Cập Nhật]
                </button>
          <a href="index.php?option=slider" class ="btn btn-sm btn-info"> 
            <i class="fas fa-undo"></i>Quay về danh sách</a>
            </div>
          </div>
        </div>
          </div>
        </div>
        
        <!-- /.card-body -->
        <div class="card-footer">
          Thời trang nam
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </form>
  <?php require_once('../views/backend/footer.php');?>
