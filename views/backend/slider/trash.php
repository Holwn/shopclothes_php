<?php
use App\Models\Slider;
$list = Slider :: where('Status','=','0')->orderBy('CreatedAt','desc')->get();
?>
<?php require_once('../views/backend/header.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thùng rác slider</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Bảng điều khiển</a></li>
              <li class="breadcrumb-item active">Thùng rác slider</li>
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
          <a href="index.php?option=slider" class ="btn btn-sm btn-info"> 
            <i class="fas fa-undo"></i>Quay về danh sách</a>
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
            <th style="width: 100px">Hình</th>
            <th>Tên slider</th>
            <th>Danh mục slider</th>
            <th>Ngày tạo</th>
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
            <td>
              <img class="img-fluid" src="../public/images/slider/<? $row['Img'];?>" alt="<? $row['Img'];?>">
            </td>
            <td><?php echo $row['Name'];?></td>
            <td><?php echo $row['Link'];?></td>
            <td><?php echo $row['CreatedAt'];?></td>
            <td class="text-center">
            
            <a href="index.php?option=slider&cat=detail&id=<?php echo $row['Id'];?> "title="Chi tiết" class ="btn btn-sm btn-primary"> 
            <i class="fas fa-eye"></i>
            </a>
            <a href="index.php?option=slider&cat=retrash&id=<?php echo $row['Id'];?> "title="Khôi phục" class ="btn btn-sm btn-info"> 
            <i class="fas fa-undo"></i>
            </a>
            <a href="index.php?option=slider&cat=del&id=<?php echo $row['Id'];?> "title="Xóa vĩnh viễn" class ="btn btn-sm btn-danger"> 
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
        <div class="card-footer">
        </div>
        <!-- /.card-footer-->
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
