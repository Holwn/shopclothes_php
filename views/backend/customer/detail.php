<?php
use App\Models\User;

$id = $_REQUEST['id'];
$row = User::find($id);
if ($row == null) {
    header("location:index.php?option=category");
}
?>
<?php require_once('../views/backend/header.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="largeSite"> CHI TIẾT</h1>
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
                <div class="row">
                    <div class="col-12 text-right">
                        <a href="index.php?option=customer" class="btn btn-sm btn-undo">
                            <i class="fas fa-undo"></i> Quay về
                        </a>
                        <a href="index.php?option=customer&cat=edit&id=<?php echo $row['Id']; ?>" title="Cap nhat" class="btn btn-sm btn-info">
                            <i class="fas fa-edit"></i> Sửa
                        </a>
                        <a href="index.php?option=customer&cat=del&id=<?php echo $row['Id']; ?>" title="Xoa" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i> Xoá
                        </a>
                    </div>
                </div>
            </div>


            <div class="card-body">
                <table class="table table-bordered" id="myTable">
                    <tr>
                        <th>Tên trường</th>
                        <th>Giá trị</th>
                    </tr>
                    <tr>
                        <th>Id</th>
                        <td><?php echo $row['Id']; ?></td>
                    </tr>
                    <tr>
                        <th>Họ tên</th>
                        <td><?php echo $row['FullName']; ?></td>
                    </tr>
                    <tr>
                        <th>Tên đăng nhập</th>
                        <td><?php echo $row['UserName']; ?></td>
                    </tr>
                    <tr>
                        <th>Mật khẩu</th>
                        <td><?php echo $row['Password']; ?></td>
                    </tr>
                    <tr>
                        <th>Ngày tạo</th>
                        <td><?php echo $row['CreatedAt']; ?></td>
                    </tr>
                    
                    <tr>
                        <th>Ngày sửa</th>
                        <td><?php echo $row['UpdatedAt']; ?></td>
                    </tr>
                   
                    <tr>
                        <th>Trạng thái</th>
                        <td><?php echo $row['Status']; ?></td>
                    </tr>
                </table>
            </div>

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require_once('../views/backend/footer.php'); ?>