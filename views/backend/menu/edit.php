<?php
use App\Models\Menu;
use App\Libraries\MyClass;

$id = $_REQUEST["id"];
$list=Menu::where('Status','!=','0')->get();

$row = Menu::find($id);
if($row==null){
    MyClass::set_flash('message',['type'=>'danger','msg'=>'Mẫu tin không tồn tại'] );
    header("location:index.php?option=menu");
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
<form action="index.php?option=menu&cat=process" name="form1" method="post" enctype="multipart/form-data">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cập Nhật Menu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Bảng điều khiển</a></li>
              <li class="breadcrumb-item active">Cập Nhật Menu</li>
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
          <a href="index.php?option=menu" class ="btn btn-sm btn-info"> 
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
                      <label for="name">Tên Menu</label>
                      <input name ="data[Name]" value ="<?=$row['Name'];?>" type="text" id="name" placeholder= "Nhập tên danh mục" class ="form-control">
                  </div>
                  <div class="mb-3">
                      <label for="link">Liên kết</label>
                      <input name ="data[Link]" value ="<?=$row['Link'];?>" type="text" id="link" placeholder= "#" class ="form-control">
                  </div>
                  <div class="mb-3"> 
                    <label for="type">Kiểu menu</label> 
                    <select id="type" name="type" class ="form-control">
                      <option value="category" <?=($row['Type']=="category")?'selected':'';?>>category</option>
                      <option value="custom" <?=($row['Type']=="custom")?'selected':'';?>>custom</option>
                      <option value="page" <?=($row['Type']=="page")?'selected':'';?>>page</option>
                      <option value="topic" <?=($row['Type']=="topic")?'selected':'';?>>topic</option>
                    </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="mb-3"> 
                <label for="position">Cấp cha</label> 
                <select id="position" name="position" class ="form-control">
                      <option value="0">None</option>
                      <?= $strparentid?>
                </select>
                </div>
                <div class="mb-3"> 
                <label for="orders">Sắp Xếp</label> 
                <select id="orders" name="orders" class ="form-control">
                    <option value="0">none</option>
                    <?=$strorders; ?>
                </select>
                </div>
                <div class="mb-3"> 
                <label for="position">Vị Trí</label> 
                <select id="position" name="position" class ="form-control">
                    <option value="mainmenu" <?=($row['Position']=="mainmenu")?'selected':'';?>>mainmenu</option>
                </select>
                </div>
                <div class="mb-3"> 
                <label for="status">Trạng thái</label> 
                <select id="status" name="status" class ="form-control">
                    <option value="1" <?=($row['Status']==1)?'selected':'';?>>Xuất Bản</option>
                    <option value="2" <?=($row['Status']==2)?'selected':'';?>>Chưa Xuất Bản</option>
                </select>
                </div>
              </div>
              <div class="card-footer">
          <div class="row">
            <div class="col-12 text-right" >
                <button type="submit" name="CAPNHAT" class="btn btn-sm btn-success">
                <i class="fas fa-save"></i>Lưu[Cập Nhật]
                </button>
          <a href="index.php?option=menu" class ="btn btn-sm btn-info"> 
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
