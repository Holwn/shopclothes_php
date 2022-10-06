<?php 
use App\Models\Post;

$id=$_REQUEST['id'];
$row =Post::find($id);

if($row==null){
  header("location:index.php?option=post");
}


?>
<?php require_once('../views/backend/header.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper py-2">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chi tiết danh mục sản phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Bảng điều khiển</a></li>
              <li class="breadcrumb-item active">Chi tiết</li>
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
          <div class="row mb-2">
            <div class="col-md-12 text-right">
              <a href="index.php?option=post" class="btn btn-sm btn-info">
                      <i class="fas fa-undo"></i>Quay về danh sách
              </a>
              <a href="index.php?option=post&cat=edit&id=<?php echo $row['Id']; ?>" title="Cập nhật" class="btn btn-sm btn-info">
                     <i class="fas fa-edit"></i>Sữa
              </a>
              <a href="index.php?option=post&cat=deltrash&id=<?php echo $row['Id']; ?>" title="Xóa vào thùng rác" class="btn btn-sm btn-danger">
                      <i class="fas fa-trash"></i>Xóa
              </a>
      
            </div>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-borderd" id="myTable">
           <tr>
              <th>Tên trường</th>
              <td>Giá trị</td>
            </tr>
            <tr>
              <th>Id</th>
              <td><?php echo $row['Id'];?></td>
            </tr>
            <tr>
              <th>NameCat</th>
              <td><?php echo $row['NameCat'];?></td>
            </tr>
            <tr>
              <th>SlugCat</th>
              <td><?php echo $row['SlugCat'];?></td>
            </tr>
            <tr>
              <th>ParentId</th>
              <td><?php echo $row['ParentId'];?></td>
            </tr>
            <tr>
              <th>Orders</th>
              <td><?php echo $row['Orders'];?></td>
            </tr>
            <tr>
              <th>MetaKey</th>
              <td><?php echo $row['MetaKey'];?></td>
            </tr>
            <tr>
              <th>MetaDesc</th>
              <td><?php echo $row['MetaDesc'];?></td>
            </tr>
            <tr>
              <th>CreatedAt</th>
              <td><?php echo $row['CreatedAt'];?></td>
            </tr>
            <tr>
              <th>CreatedBy</th>
              <td><?php echo $row['CreatedBy'];?></td>
            </tr>
            <tr>
              <th>UpdatedAt</th>
              <td><?php echo $row['UpdatedAt'];?></td>
            </tr>
            <tr>
              <th>UpdatedBy</th>
              <td><?php echo $row['UpdatedBy'];?></td>
            </tr>
            <tr>
              <th>Status</th>
              <td><?php echo $row['Status'];?></td>
            </tr>
          </table>
        </div>
        <div class="card-footer">
          <div class="row mb-2">
            <div class="col-md-12 text-right">
              <a href="index.php?option=post" class="btn btn-sm btn-info">
                      <i class="fas fa-undo"></i>Quay về danh sách
              </a>
              <a href="index.php?option=post&cat=edit&id=<?php echo $row['Id']; ?>" title="Cập nhật" class="btn btn-sm btn-info">
                     <i class="fas fa-edit"></i>Sữa
              </a>
              <a href="index.php?option=post&cat=deltrash&id=<?php echo $row['Id']; ?>" title="Xóa vào thùng rác" class="btn btn-sm btn-danger">
                      <i class="fas fa-trash"></i>Xóa
              </a>
      
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php require_once('../views/backend/footer.php');?>
  <?php require_once('../views/backend/footer.php');?>
