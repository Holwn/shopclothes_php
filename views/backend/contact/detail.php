<?php
use App\Models\Contact;

$id = $_REQUEST['id'];
$row = Contact::find($id);
if ($row == null) {
    header("location:index.php?option=contact");
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
                        <a href="index.php?option=contact" class="btn btn-sm btn-undo">
                            <i class="fas fa-undo"></i> Quay về
                        </a>
                        
                        <a href="index.php?option=contact&cat=del&id=<?php echo $row['Id']; ?>" title="Xoa" class="btn btn-sm btn-danger">
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
                        <th>Email</th>
                        <td><?php echo $row['Email']; ?></td>
                    </tr>
                    <tr>
                        <th>Điện thoại</th>
                        <td><?php echo $row['Phone']; ?></td>
                    </tr>
                    <tr>
                        <th>Ngày tạo</th>
                        <td><?php echo $row['CreateAt']; ?></td>
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
                        <td><?php echo $row['Status']==1?"Đã liên hệ": "Chưa liên hệ"; ?></td>
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