<?php

use App\Models\Contact;
//use App\Libraries\MyClass;
$list = Contact::where('Status', '!=', '0')->orderBy('CreatedAt', 'desc')->get();
?>

<?php require_once('../views/backend/header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper my-2" style="min-height: 532px;">
    <section class="content">
        <div class="card">
        <div class="card-header">
                <h3 class="card-title">
                    <strong class="text-uppercase text-danger">Tất cả liên hệ</strong>
                </h3>
                <div class="card-tools">
                    <a class="btn btn-danger btn-sm" href="index.php?option=contact&cat=trash" role="button">
                        <i class="fas fa-trash-alt"></i> Thùng rác
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div id="myTable_wrapper" class="dataTables_wrapper no-footer">


                    <table class="table table-bordered dataTable no-footer" id="myTable" role="grid" aria-describedby="myTable_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Tiêu đề liên hệ: activate to sort column descending" style="width: 138.25px;">Tiêu đề liên hệ</th>
                                <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 231.156px;">Email</th>
                                <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Điện thoại: activate to sort column ascending" style="width: 95.5938px;">Điện thoại</th>
                                <th style="width:160px" class="text-center sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Trạng thái : activate to sort column ascending">Trạng thái </th>
                                <th style="width:160px" class="text-center sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Chức năng: activate to sort column ascending">Chức năng</th>
                                <th style="width:30px" class="text-center sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="ID: activate to sort column ascending">ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list as $row) :
                            ?>
                                <tr role="row" class="odd">
                                    <td class="sorting_1"><a href="contact_update.php"><?php echo $row['Title']; ?></a></td>
                                    <td><a href="contact_update.php"><?php echo $row['Email']; ?></a></td>
                                    <td><a href="contact_update.php"><?php echo $row['Phone']; ?></a></td>
                                    <td class="text-center">

                                    <?php if ($row['Status'] == 1) : ?>
                                        <span class="badge badge-success">Đã liên hệ</span>
                                        <?php else : ?>
                                            <span class="badge badge-danger">Chưa trả lời</span>
                                        <?php endif; ?> 
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-info btn-sm" href="index.php?option=contact&cat=contact_reply&id=<?php echo $row['Id']; ?>" role="button">
                                            <i class="fas fa-edit"></i> Trả lời</a>
                                        <?php if ($row['Status']==1): ?>
                                        <a href="index.php?option=contact&cat=status&id=<?php echo $row['Id']; ?>" title="Trang thai" 
                                         class="btn btn-sm btn-success">
                                              <i class="fas fa-toggle-on"></i>
                                         </a>
                                    <?php else :?>
                                        <a href="index.php?option=contact&cat=status&id=<?php echo $row['Id']; ?>" title="Trang thai" 
                                         class="btn btn-sm btn-danger">
                                              <i class="fas fa-toggle-off"></i>
                                         </a>
                                    <?php endif;?>
                                    <a href="index.php?option=contact&cat=detail&id=<?php echo $row['Id']; ?>" title="Chi tiet" class="btn btn-sm btn-primary"> 
                                    <i class="fas fa-eye"></i>
                                    </a>
                                    
                                    <a href="index.php?option=contact&cat=deltrash&id=<?php echo $row['Id']; ?>" title="Xoa" class="btn btn-sm btn-danger"> 
                                    <i class="fas fa-trash"></i>
                                    </a>
                                    </td>
                                    <td class="text-center"><?php echo $row['Id']; ?></td>
                                </tr>
 
                            <?php endforeach; ?>



                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->

<?php require_once('../views/backend/footer.php'); ?>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>