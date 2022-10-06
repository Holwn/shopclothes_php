<?php 
use App\Models\Post;

$list=Post::where('Status','!=','0')->orderBy('CreatedAt','desc')->get();
?>
<?php require_once('../views/backend/header.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper py-2">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="text-uppercase text-danger">DANH SÁCH BÀI VIẾT</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Bảng điều khiển</a></li>
              <li class="breadcrumb-item active">Tất cả sản phẩm</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md-12 text-right">
              <a href="index.php?option=post&cat=create" class="btn btn-sm btn-success">
                      <i class="fas fa-plus"></i>Thêm
              </a>
              <a href="index.php?option=post&cat=trash" class="btn btn-sm btn-danger">
                      <i class="fas fa-trash"></i>Thùng rác
              </a>
      
            </div>
          </div>
        </div>
        <div class="card-body">
         <?php require_once('../views/backend/message_alert.php'); ?>
          <table class="table table-borderd" id="myTable">
            <thead>
              <tr>
              <th style="width:30px;height:40px">Hình</th>
                <th  class="text-center">Tiêu đề bài viết</th>
                <th class="text-center">Nội Dung Bài Viết</th>
                <th class="text-center">Chức năng</th>
                <th style="with:20px" class="text-center">ID</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($list as $row) : ?>
                <tr>
                <td>
                <img class="img-thumbnail" src="../public/images/post/<?= $row['Img'];?>" alt="<?= $row['Img'];?>">
                </td>
                  <td><?php echo $row['Title']; ?></td>
                  <td class="Extra Small" ><?php echo $row['Detail']; ?></td>
                  <td class="text-center">
                    <?php if($row['Status']==1) : ?>
                      <a href="index.php?option=post&cat=status&id=<?php echo $row['Id']; ?>" title="Trạng thái" class="btn btn-sm btn-success">
                        <i class="fas fa-toggle-on"></i>
                      </a>
                    <?php else : ?>
                      <a href="index.php?option=post&cat=status&id=<?php echo $row['Id']; ?>" title="Trạng thái"  class="btn btn-sm btn-danger">
                        <i class="fas fa-toggle-off"></i>
                      </a>
                    <?php endif ; ?>
                    <a href="index.php?option=post&cat=detail&id=<?php echo $row['Id']; ?>" title="Chi tiết"  class="btn btn-sm btn-primary">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a href="index.php?option=post&cat=edit&id=<?php echo $row['Id']; ?>" title="Cập nhật" class="btn btn-sm btn-info">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a href="index.php?option=post&cat=deltrash&id=<?php echo $row['Id']; ?>" title="Xóa vào thùng rác" class="btn btn-sm btn-danger">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                  <td class="text-center"><?php echo $row['Id']; ?></td>
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