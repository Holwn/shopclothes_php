<?php

use App\Models\User;
//use App\Libraries\MyClass;
$list = User::where([['Status', '!=', '0'],['Roles','=','0']])->orderBy('CreatedAt', 'desc')->get();
?>


<?php require_once('../views/backend/header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper my-2" style="min-height: 549px;">
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <strong class="text-uppercase text-danger">Danh sách khách hàng</strong>
                </h3>
                <div class="card-tools">
                <a href="index.php?option=customer&cat=create" class="btn btn-sm btn-success">
                            <i class="fas fa-plus"></i> Thêm
                        </a>
                    <a class="btn btn-danger btn-sm" href="index.php?option=customer&cat=trash" role="button">
                        <i class="fas fa-trash-alt"></i> Thùng rác</a>
                </div>
            </div>
            <div class="card-body">
            <?php require_once('../views/backend/message_alert.php'); ?>
                <div id="myTable_filter" class="dataTables_filter">
                </div>
                <table class="table table-bordered dataTable no-footer" id="myTable" role="grid" aria-describedby="myTable_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Tên khách hàng: activate to sort column descending" style="width: 42.9531px;">Tên khách hàng</th>
                            <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 186.75px;">Email</th>
                            <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Điện thoại: activate to sort column ascending" style="width: 63.5312px;">Điện thoại</th>
                            <th style="width: 81.2344px;" class="text-center sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Chức năng: activate to sort column ascending">Chức năng</th>
                            <th style="width: 20.5312px;" class="text-center sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="ID: activate to sort column ascending">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list as $row) :
                        ?>


                            <tr role="row" class="even">
                                <td class="sorting_1"><a href="customer_update.php"><?php echo $row['FullName']; ?></a></td>
                                <td><a href="customer_update.php"><?php echo $row['Email']; ?></a></td>
                                <td><a href="customer_update.php"><?php echo $row['Phone']; ?></a></td>
                                <td class="text-center">


                                    <?php if ($row['Status'] == 1) : ?>
                                        <a href="index.php?option=customer&cat=status&id=<?php echo $row['Id']; ?>" title="Trang thai" class="btn btn-sm btn-success">
                                            <i class="fas fa-toggle-on"></i>
                                        </a>
                                    <?php else : ?>
                                        <a href="index.php?option=customer&cat=status&id=<?php echo $row['Id']; ?>" title="Trang thai" class="btn btn-sm btn-danger">
                                            <i class="fas fa-toggle-off"></i>
                                        </a>
                                    <?php endif; ?>

                                    <a href="index.php?option=customer&cat=detail&id=<?php echo $row['Id']; ?>" title="Chi tiet" class="btn btn-sm btn-primary"> 
                                    <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="index.php?option=customer&cat=edit&id=<?php echo $row['Id']; ?>" title="Cap nhat" class="btn btn-sm btn-info"> 
                                    <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="index.php?option=customer&cat=deltrash&id=<?php echo $row['Id']; ?>" title="Xoa" class="btn btn-sm btn-danger"> 
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
</div>
</section>
</div>

<?php require_once('../views/backend/footer.php'); ?>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>