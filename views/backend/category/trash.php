<?php
  use App\Models\Category;
  $list=Category::where('Status','=','0')->orderBy('CreatedAt','desc')->get();
?> 
<?php require_once('../views/backend/header.php');?>

 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Danh Sách Danh Mục Rác</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Bảng Điều Khiển</a></li>
            <li class="breadcrumb-item active">Danh Mục Rác</li>
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
            <a href="index.php?option=category" class="btn btn-sm btn-info">
              <i class="fas fa-undo"></i>Quay lại
            </a>
        </div>
      </div>
      <div class="card-body">
      <?php require_once('../views/backend/message_alert.php')?>
        <table class="table table-bodered" id="myTable">
          <thead>
            <tr>
              <th style="width:20px" class="text-center">
              <input type="checkbox" name ="checkAll[]">
              </th>
              <th>Tên Danh Mục</th>
              <th>Slug Danh Mục</th>
              <th>Ngày Tạo</th>
              <th>Chức Năng</th>
              <th style="width:20px" class="text-center">ID</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($list as $row):?>
            <tr>
              <td>
                <input type="checkbox" name ="checkId[]">
                <!-- check nhiều cái cùng lúc nâng cao -->
              </td>
              <td><?php echo $row['NameCat'];?></td>
              <td><?php echo $row['SlugCat'];?></td>
              <td><?php echo $row['CreatedAt'];?></td>
              <td class="text-center">
                <a href="index.php?option=category&cat=detail&id=<?php echo $row['Id']; ?>" title="Chi Tiết " class="btn btn-sm btn-info">
                <i class="fas fa-pen-fancy"></i>
                </a>
                <a href="index.php?option=category&cat=retrash&id=<?php echo $row['Id']; ?>" title="Khôi Phục" class="btn btn-sm btn-info">
                <i class="fas fa-undo"></i>
                </a>
                <a href="index.php?option=category&cat=del&id=<?php echo $row['Id']; ?>" title="Xóa Vĩnh Viễn" class="btn btn-sm btn-danger">
                <i class="fas fa-trash"></i>
                </a>
              </td>
              <td><?php echo $row['Id'];?></td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require_once('../views/backend/footer.php');?>
<script>
  $(document).ready( function () 
  {
  $('#myTable').DataTable();
  } );
</script>