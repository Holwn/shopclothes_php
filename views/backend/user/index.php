<?php
use App\Models\User;
$list = User :: where('Status','!=','0')->orderBy('CreatedAt','desc')->get(); 
?>
<?php require_once('../views/backend/header.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DANH SÁCH USER </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Bảng điều khiển</a></li>
              <li class="breadcrumb-item active">Tất cả user</li>
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
          <a href="index.php?option=user&cat=create" class ="btn btn-sm btn-success"> <i class="fas fa-plus"></i>Thêm mới</a>
          <a href="index.php?option=user&cat=trash" class ="btn btn-sm btn-danger"> <i class="fas fa-trash"></i>Thùng rác</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <?php require_once('../views/backend/message_alert.php');?>
          <table class="table table-bordered" id="myTable" >
        <thead>
          <tr>
            <th style="width: 20px"class= "text-center">
            <input type="checkbox" name="checkAll[]">
          </th>
            <th>Họ và tên</th>
            <th>Tên đăng nhập</th>
            <th>Email</th>
            <th>Chức năng</th>
            <th style="width: 20px"class= "text-center">id</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($list as $row):?>
          <tr>
            <td class= "text-center">
              <input type="checkbox" name="checkID[]">
            </td>
            
            <td><?php echo $row['FullName'];?></td>
            <td><?php echo $row['UserName'];?></td>
            <td><?php echo $row['Email'];?></td>
            <td class="text-center">
              <?php if($row['Status']==1):?>
            <a href="index.php?option=user&cat=status&id=<?php echo $row['Id'];?> " title="Trạng thái" class ="btn btn-sm btn-success"> 
            <i class="fas fa-toggle-on"></i>
            </a>
            <?php else: ?>
              <a href="index.php?option=user&cat=status&id=<?php echo $row['Id'];?> " title="Trạng thái" class ="btn btn-sm btn-danger"> 
            <i class="fas fa-toggle-off"></i>
            </a>
              <?php endif;?>
            
            <a href="index.php?option=user&cat=edit&id=<?php echo $row['Id'];?> "title="Cập nhật" class ="btn btn-sm btn-info"> 
            <i class="fas fa-edit"></i>
            </a>
            <a href="index.php?option=user&cat=deltrash&id=<?php echo $row['Id'];?> "title="Xóa vào thùng rác" class ="btn btn-sm btn-danger"> 
            <i class="fas fa-trash"></i>
            </a>
            </td>
            <td class= "text-center"><?php echo $row['Id'];?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>    
        </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php require_once('../views/backend/footer.php');?>
  <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
  </script>
