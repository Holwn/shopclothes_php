<?php use App\Models\Category;
$id =$_REQUEST['id'];
$row=Category::find($id);

if($row==null)
{
  header("location:index.php?option=category");
}
?>
<?php require_once('../views/backend/header.php');?>

 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Chi Tiết Danh Mục</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Bảng Điều Khiển</a></li>
            <li class="breadcrumb-item active">Chi Tiết</li>
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
              <i class="fas fa-undo"></i> Quay lại
            </a>
            <a href="index.php?option=category&cat=edit&id=<?php echo $row['Id']; ?>" title="Cập Nhật" class="btn btn-sm btn-primary">
              <i class="fas fa-pen-fancy"></i>
            </a>
            <a href="index.php?option=category&cat=deltrash&id=<?php echo $row['Id']; ?>" title="Xóa Vào Thùng Rác" class="btn btn-sm btn-danger">
              <i class="fas fa-trash"></i>
            </a>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-bodered" id="myTable">
            <tr>
              <th>Tên trường</th>
              <td>Giá Trị</td>
            </tr>
            <tr>
              <th>ID</th>
              <td><?php echo $row['Id']; ?></td>
            </tr>
            <tr>
              <th>Loại Sản Phẩm(NameCat)</th>
              <td><?php echo $row['NameCat']; ?></td>
            </tr>
            <tr>
              <th>Slug Từng Loại</th>
              <td><?php echo $row['SlugCat']; ?></td>
            </tr>
            <tr>
              <th>ID Cấp Cha(ParentId)</th>
              <td><?php echo $row['ParentId']; ?></td>
            </tr>
            <th>Xếp Theo Loại(Orders)</th>
              <td><?php echo $row['Orders']; ?></td>
            </tr>
            <tr>
              <th>Từ Khóa SEO(MetaKey)</th>
              <td><?php echo $row['MetaKey']; ?></td>
            </tr>
            <tr>
              <th>Mô Tả SEO(MetaDesc)</th>
              <td><?php echo $row['MetaDesc']; ?></td>
            </tr>
            <tr>
              <th>Ngày Tạo(CreatedAt)</th>
              <td><?php echo $row['CreatedAt']; ?></td>
            </tr>
            <th>Người Tạo(CreatedBy)</th>
              <td><?php echo $row['CreatedBy']; ?></td>
            </tr>
            <tr>
              <th>Ngày Sửa(UpdatedAt)</th>
              <td><?php echo $row['UpdatedAt']; ?></td>
            </tr>
            <tr>
              <th>Người Sửa(UpdatedBy)</th>
              <td><?php echo $row['UpdatedBy']; ?></td>
            </tr>
            <tr>
              <th>Trạng Thái(Status)</th>
              <td><?php echo $row['Status']; ?></td>
            </tr>
        </table>
      </div>

      <!-- /.card-body -->
      <!-- /.card-footer-->
      <div class="card-footer">
        <div class="col-12 text-right">
            <a href="index.php?option=category" class="btn btn-sm btn-info">
              <i class="fas fa-undo"></i> Quay lại
            </a>
            <a href="index.php?option=category&cat=edit&id=<?php echo $row['Id']; ?>" title="Cập Nhật" class="btn btn-sm btn-primary">
              <i class="fas fa-pen-fancy"></i>
            </a>
            <a href="index.php?option=category&cat=deltrash&id=<?php echo $row['Id']; ?>" title="Xóa Vào Thùng Rác" class="btn btn-sm btn-danger">
              <i class="fas fa-trash"></i>
            </a>
        </div>
      </div>
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require_once('../views/backend/footer.php');?>