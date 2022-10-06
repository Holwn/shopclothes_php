<?php 
use App\Models\Contact;
$list = Contact::where('Status', '=', '0')->orderBy('CreatedAt','desc')->get();
?>
<?php require_once('../views/backend/header.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                   <h1 class="largeSite"> THÙNG RÁC </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active">Thùng rác sản phẩm</li>
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
                             <i class="fas fa-undo"></i> Quay về</a>
                    </div>
                </div>
            </div>

            
            <div class="card-body">
            <?php require_once('../views/backend/message_alert.php'); ?>

                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th style="width:20px" class="text-center">
                                <input type="checkbox" name="checkAll">
                            </th>
                            
                            <th>Tiêu đề</th>
                            <th>Chi tiết</th>
                            <th>Ngày tạo</th>
                            <th>Chức năng</th>
                            <th style="width:20px" class="text-center">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        //for ($i = 1; $i <= 100; $i++) :
                            foreach($list as $row):
                        ?>
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" name="checkId[]">
                                </td>
                                <td>
                                <?php echo $row['Title']; ?>
                                 <!-- <img src="../public/images/product/hinh.jpg" alt="" class="img-fluid"> -->
                                </td>
                                <td><?php echo $row['Detail']; ?></td>
                                <td><?php echo $row['CreatedAt']; ?></td>
                                <td class="text-center">
                                
                                    <a href="index.php?option=contact&cat=retrash&id=<?php echo $row['Id']; ?>" title="" class="btn btn-sm btn-info"> 
                                    <i class="fas fa-undo"></i>
                                    </a>
                                   
                                    
                                    <a href="index.php?option=contact&cat=del&id=<?php echo $row['Id']; ?>" title="Xoa" class="btn btn-sm btn-danger"> 
                                    <i class="fas fa-trash"></i>
                                    </a>
                                    
                                </td>
                                <td class="text-center"><?php echo $row['Id']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require_once('../views/backend/footer.php'); ?>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>