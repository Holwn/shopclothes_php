<?php
use App\Models\Menu;
use App\Models\Category;

  $list=Menu::where('Status','!=','0')->get();
 
  $strparentid="";
  $strorders="";
  foreach($list as $item)
  {
    $strparentid .="<option value='".$item['Id']."'>".$item["Name"]."</option>";
    $strorders.="<option value ='".$item['Orders']."'>Sau: ".$item['Name']."</option>";
    $list_cat=Category::where([['Status','!=','0'],['Id','=',$item->TableId]])->get();
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
            <h1>Thêm danh mục menu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Bảng điều khiển</a></li>
              <li class="breadcrumb-item active">Thêm danh mục menu</li>
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
                <button type="submit" name="THEM" class="btn btn-sm btn-success">
                <i class="fas fa-save"></i>Lưu[Thêm]
                </button>
          <a href="index.php?option=menu" class ="btn btn-sm btn-info"> 
            <i class="fas fa-undo"></i>Quay về danh sách</a>
            </div>
          </div>
        </div>
        <div class="card-body">
        <?php require_once('../views/backend/message_alert.php');?>
          <div class="row">
              <div class="col-md-9">
                  <div class="mb-3">
                      <label for="name">Tên Menu</label>
                      <input name ="data[Name]"  type="text" id="name" placeholder= "Nhập tên menu" class ="form-control">
                  </div>
                  <div class="mb-3">
                      <label for="link">Liên kết</label>
                      <input name ="data[Link]"  type="text" id="link" placeholder= "#" class ="form-control">
                  </div>
                  <div class="mb-3">
                    <label for="tableid">Mã Trong Bảng</label>
                    <input name ="data[TableId]"  type="text" id="tableid" placeholder= "Nhập mã id trong bảng của loại menu này" class ="form-control">
                  </div>
                  <div class="mb-3">
                    <label for="parentid">Cấp Cha</label>
                    <select name="parentid" id="parentid" class="form-control">
                        <option value="0">None</option>
                        <?= $strparentid;?>
                    </select>
                  </div>
              </div>
              <div class="col-md-3">
                <div class="mb-3"> 
                <label for="position">Vị trí</label> 
                <select id="position" name="position" class ="form-control">
                    <option value="mainmenu">mainmenu</option>
                </select>
                </div>
                <div class="mb-3"> 
                <label for="orders">Sắp xếp</label> 
                <select id="orders" name="orders" class ="form-control">
                    <option value="0">None</option>
                    <?=$strorders?>
                </select>
                </div>
                <div class="mb-3"> 
                <label for="type">Kiểu menu</label> 
                <select id="type" name="type" class ="form-control">
                    <option value="custom">custom</option>
                    <option value="page">page</option>
                    <option value="category">category</option>
                    <option value="topic">topic</option>
                </select>
                </div>
                <div class="mb-3"> 
                <label for="status">Trạng thái</label> 
                <select id="status" name="status" class ="form-control">
                    <option value="1">Xuất bản</option>
                    <option value="2">Chưa xuất bản</option>
                </select>
                </div>
              </div>
              <div class="card-footer">
          <div class="row">
            <div class="col-12 text-right" >
                <button type="submit" name="THEM" class="btn btn-sm btn-success">
                <i class="fas fa-save"></i>Lưu[Thêm]
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
