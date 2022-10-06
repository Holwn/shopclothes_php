<?php
  use App\libraries\MyClass;
  use App\Models\Topic;
  $list=Topic::where('Status','!=','0')->orderBy('CreatedAt','desc')->get();
?> 
<?php require_once('../views/backend/header.php');?>

 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Danh Sách Chủ Đề</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Bảng Điều Khiển</a></li>
            <li class="breadcrumb-item active">Tất Cả Chủ Đề</li>
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
            <a href="index.php?option=topic&cat=create" class="btn btn-sm btn-success">
              <i class="fas fa-plus"></i> Thêm
            </a>
            <a href="index.php?option=topic&cat=trash" class="btn btn-sm btn-danger">
              <i class="fas fa-trash"></i>Thùng rác
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
              <th>Tên Chủ Đề</th>
              <th>Slug Chủ Đề</th>
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
              <td><?php echo $row['Name'];?></td>
              <td><?php echo $row['Slug'];?></td>
              <td><?php echo $row['CreatedAt'];?></td>
              <td class="text-center">
                <?php if($row['Status']==1):?>
                <a href="index.php?option=topic&cat=status&id=<?php echo $row['Id']; ?>" title="Trạng Thái" class="btn btn-sm btn-success">
                <i class="fas fa-toggle-on"></i>
                </a>
                <?php else :?>
                  <a href="index.php?option=topic&cat=status&id=<?php echo $row['Id']; ?>" title="Trạng Thái" class="btn btn-sm btn-danger">
                <i class="fas fa-toggle-off"></i>
                </a>
                <?php endif; ?>
                <a href="index.php?option=topic&cat=edit&id=<?php echo $row['Id']; ?>" title="Cập Nhật" class="btn btn-sm btn-primary">
                <i class="fas fa-pen-fancy"></i>
                </a>
                <a href="index.php?option=topic&cat=detail&id=<?php echo $row['Id']; ?>" title="Chi Tiết " class="btn btn-sm btn-info">
                <i class="fas fa-eye"></i>
                </a>
                <a href="index.php?option=topic&cat=deltrash&id=<?php echo $row['Id']; ?>" title="Xóa Vào Thùng Rác" class="btn btn-sm btn-danger">
                <i class="fas fa-trash"></i>
                </a>
              </td>
              <td class="text-center"><?php echo $row['Id'];?></td>
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