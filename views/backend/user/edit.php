<?php
use App\Models\User;
$id = $_REQUEST["id"];
  $list=User::where('Status','!=','0')->get();

  $row = User::find($id);
  if($row==null){
      MyClass::set_flash('message',['type'=>'danger','msg'=>'Mẫu tin không tồn tại'] );
      header("location:index.php?option=user");
  }
?>
<?php require_once('../views/backend/header.php');?>
<form action="index.php?option=user&cat=process" name="form1" method="post" enctype="multipart/form-data">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm mới User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Bảng điều khiển</a></li>
              <li class="breadcrumb-item active">Thêm mới User</li>
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
          <a href="index.php?option=user" class ="btn btn-sm btn-info"> 
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
                      <label for="fullname">Họ tên User</label>
                      <input name ="data[FullName]" value ="<?=$row['FullName'];?>" type="text" id="fullname" placeholder= "Họ và tên" class ="form-control">
                  </div>
                  <div class="mb-3">
                      <label for="email">Email</label>
                      <input name ="data[Email]" value ="<?=$row['Email'];?>" type="text" id="email" placeholder= "Thư điện tử" class ="form-control">
                  </div>
                  <div class="mb-3">
                      <label for="phone">Số điện thoại</label>
                      <input name ="data[Phone]" value ="<?=$row['Phone'];?>" type="text" id="phone" placeholder= "Số điện thoại" class ="form-control">
                  </div>
                  <div class="mb-3">
                      <label for="username">Tên đăng nhập</label>
                      <input name ="data[UserName]" value ="<?=$row['UserName'];?>" type="text" id="username" placeholder= "Tên đăng nhập viết không dấu" class ="form-control">
                  </div>
                  <div class="mb-3">
                      <label for="password">Mật khẩu</label>
                      <input name ="password" value ="<?=$row['Password'];?>" type="text" id="password" placeholder= "Mật khẩu" class ="form-control">
                  </div>
                  <div class="mb-3">
                      <label for="password_confirm">Xác nhận mật khẩu</label>
                      <input name ="password_confirm" value ="<?=$row['Password'];?>" type="text" id="password_confirm" placeholder= "Xác nhận mật khẩu" class ="form-control">
                  </div>

              </div>
              <div class="col-md-3">
                <div class="mb-3"> 
                <label for="roles">Xét Quyền</label> 
                <select id="roles" name="roles" class ="form-control">
                    <option value="0" <?=($row['Roles']==0)?'selected':'';?>>Vô Quyền</option>
                    <option value="1" <?=($row['Roles']==1)?'selected':'';?>>Admin</option>
                </select>
                <div class="mb-3"> 
                <label for="gender">Giới tính</label> 
                <select id="gender" name="gender" class ="form-control">
                    <option value="1" <?=($row['Gender']==1)?'selected':'';?>>Nam</option>
                    <option value="2" <?=($row['Gender']==2)?'selected':'';?>>Nữ</option>
                </select>
                </div>
                <div class="mb-3"> 
                <label for="img">Avatar</label> 
                <input type="file" class="form-control"  id="img" name="img" >
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
                <button type="submit" name="THEM" class="btn btn-sm btn-success">
                <i class="fas fa-save"></i>Lưu
                </button>
          <a href="index.php?option=user" class ="btn btn-sm btn-info"> 
            <i class="fas fa-undo"></i>Quay về danh sách</a>
            </div>
          </div>
        </div>
          </div>
        </div>
        
        <!-- /.card-body -->
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </form>
  <?php require_once('../views/backend/footer.php');?>
