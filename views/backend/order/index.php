<?php

use App\Models\Order;
//use App\Libraries\MyClass;
$list = Order::where('Status', '!=', '0')->orderBy('CreateDate', 'desc')->get();
?>


<?php require_once('../views/backend/header.php'); ?>


<div class="content-wrapper my-2" style="min-height: 532px;">
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <strong class="text-uppercase text-danger">Tất cả đơn hàng</strong>
                </h3>
                <div class="card-tools">
                    <a class="btn btn-danger btn-sm" href="index.php?option=order&cat=trash" role="button">
                        <i class="fas fa-trash-alt"></i> Thùng rác
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div id="myTable_wrapper" class="dataTables_wrapper no-footer">

                    <table class="table table-bordered dataTable no-footer" id="myTable" role="grid" aria-describedby="myTable_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Tên loại sản phẩm: activate to sort column descending" style="width: 247.484px;">Tên loại sản phẩm</th>
                                <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Họ tên khách hàng: activate to sort column ascending" style="width: 255.516px;">Họ tên khách hàng</th>
                                <th style="width:160px" class="text-center sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Trạng thái: activate to sort column ascending">Trạng thái</th>
                                <th style="width:160px" class="text-center sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Chức năng: activate to sort column ascending">Chức năng</th>
                                <th style="width:30px" class="text-center sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="ID: activate to sort column ascending">ID</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($list as $row) :
                            ?>


                                <tr role="row" class="odd">
                                    <td class="sorting_1"><a href="order_update.php"><?php echo $row['Code']; ?></a></td>
                                    <td><a href="order_update.php"><?php echo $row['DeliveryName']; ?></a></td>
                                    <td class="text-center">
                                        <?php if ($row['Status'] == 1) : ?>
                                            <span class="badge badge-success">Mới đặt hàng</span>
                                        <?php else : ?>
                                            <span class="badge badge-danger">Đã huỷ</span>
                                        <?php endif; ?>

                                    </td>
                                    <td class="text-center">


                                    <?php if ($row['Status']==1): ?>
                                        <a href="index.php?option=order&cat=status&id=<?php echo $row['Id']; ?>" title="Trang thai" 
                                         class="btn btn-sm btn-success">
                                              <i class="fas fa-toggle-on"></i>
                                         </a>
                                    <?php else :?>
                                        <a href="index.php?option=order&cat=status&id=<?php echo $row['Id']; ?>" title="Trang thai" 
                                         class="btn btn-sm btn-danger">
                                              <i class="fas fa-toggle-off"></i>
                                         </a>
                                    <?php endif;?>
                                    <a href="index.php?option=order&cat=detail&id=<?php echo $row['Id']; ?>" title="Chi tiet" class="btn btn-sm btn-primary"> 
                                    <i class="fas fa-eye"></i>
                                    </a>
                                        <a class="btn btn-danger btn-sm" href="index.php?option=order&cat=deltrash&id=<?php echo $row['Id']; ?>" role="button">
                                            <i class="fas fa-trash-alt"></i>
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