<?php
use App\Models\Order;

$id = $_REQUEST['id'];
$row = Order::find($id);
if ($row == null) {
    header("location:index.php?option=order");
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
                        <a href="index.php?option=order" class="btn btn-sm btn-undo">
                            <i class="fas fa-undo"></i> Quay về
                        </a>
                        
                        <a href="index.php?option=order&cat=del&id=<?php echo $row['Id']; ?>" title="Xoa" class="btn btn-sm btn-danger">
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
                        <th>Đơn hàng</th>
                        <td><?php echo $row['Code']; ?></td>
                    </tr>
                    <tr>
                        <th>Mã khách hàng</th>
                        <td><?php echo $row['UserId']; ?></td>
                    </tr>
                    <tr>
                        <th>Ngày tạo</th>
                        <td><?php echo $row['CreatedAt']; ?></td>
                    </tr>
                    <tr>
                        <th>Địa chỉ người nhận</th>
                        <td><?php echo $row['DeliveryAddress']; ?></td>
                    </tr>
                    <tr>
                        <th>Tên người nhận</th>
                        <td><?php echo $row['DeliveryName']; ?></td>
                    </tr>
                    <tr>
                        <th>Email ngươi nhận</th>
                        <td><?php echo $row['DeliveryEmail']; ?></td>
                    </tr>
                    
                    <tr>
                        <th>Trạng thái</th>
                        <td><?php echo $row['Status']==1?"Mới đặt hàng":"Đã huỷ"; ?></td>
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