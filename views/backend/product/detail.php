<?php use App\Models\Product;
$id =$_REQUEST['id'];
$row=Product::find($id);

if($row==null)
{
  header("location:index.php?option=product");
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
          <h1>Chi Tiết Sản Phẩm</h1>
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
            <a href="index.php?option=product" class="btn btn-sm btn-info">
              <i class="fas fa-undo"></i> Quay lại
            </a>
            <a href="index.php?option=product&cat=edit&id=<?php echo $row['Id']; ?>" title="Cập Nhật" class="btn btn-sm btn-primary">
              <i class="fas fa-pen-fancy"></i>
            </a>
            <a href="index.php?option=product&cat=deltrash&id=<?php echo $row['Id']; ?>" title="Xóa Vào Thùng Rác" class="btn btn-sm btn-danger">
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
              <th>Tên Sản Phẩm</th>
              <td><?php echo $row['Name']; ?></td>
            </tr>
            <tr>
              <th>Slug Sản Phẩm</th>
              <td><?php echo $row['Slug']; ?></td>
            </tr>
            <tr>
              <th>ID Loại(CatId)</th>
              <td><?php echo $row['CatId']; ?></td>
            </tr>
              <th>Hình Ảnh</th>
              <td><?php echo $row['Img']; ?></td>
            </tr>
            </tr>
              <th>Số Lượng</th>
              <td><?php echo $row['Number']; ?></td>
            </tr>
            </tr>
              <th>Giá Bán/Giá Sale</th>
              <td><?php echo $row['Price']; ?>/<?php echo $row['PriceSale']; ?></td>
            </tr>
            </tr>
              <th>Mô Tả</th>
              <td><?php echo $row['Detail']; ?></td>
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
              <th>Ngày Tạo(CreatedAt)/Người Tạo(CreatedBy)</th>
              <td><?php echo $row['CreatedAt']; ?>/<?php echo $row['CreatedBy']; ?></td>
            <tr>
              <th>Ngày Sửa(UpdatedAt)/Người Sửa(UpdatedBy)</th>
              <td><?php echo $row['UpdatedAt']; ?>/<?php echo $row['UpdatedBy']; ?></td>
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
            <a href="index.php?option=product" class="btn btn-sm btn-info">
              <i class="fas fa-undo"></i> Quay lại
            </a>
            <a href="index.php?option=product&cat=edit&id=<?php echo $row['Id']; ?>" title="Cập Nhật" class="btn btn-sm btn-primary">
              <i class="fas fa-pen-fancy"></i>
            </a>
            <a href="index.php?option=product&cat=deltrash&id=<?php echo $row['Id']; ?>" title="Xóa Vào Thùng Rác" class="btn btn-sm btn-danger">
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