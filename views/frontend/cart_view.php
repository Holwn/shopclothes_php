<?php require_once('views/frontend/header.php') ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            <?php require_once('views/frontend/mod_listcategory.php') ?>
            </div>
            <div class="col-md-9">
                <h3>Giỏ Hàng</h3>
                <?php $totalMoney=0; ?>
                <?php if($list_content!=null): ?>
                    <form action="index.php?option=cart&updatecart=1" method="post">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th style="width:100px;height:50px">Hình</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Giá</th>
                            <th>Số Lượng</th>
                            <th>Thành Tiền</th>
                            <th></th>
                        </tr>
                        <?php foreach($list_content as $rcart):?>
                        <tr>
                            <td><?=$rcart['Id'];?></td>
                            <td>
                            <img class="img-fluid" src="public/images/product/<?php echo $rcart['Img'] ?>" alt="" srcset=""> 
                            </td>
                            <td><?=$rcart['Name'];?></td>
                            <td><?=number_format($rcart['Price']);?></td>
                            <td>
                                <input style="width:50px;" type="number" name="Quantity[]" value="<?=number_format($rcart['Quantity']);?>">
                            </td>
                            <td><?=number_format($rcart['Amount']);?></td>
                            <td>
                                <a href="index.php?option=cart&delcart=<?=$rcart['Id'];?>">
                                <i class="far fa-times-circle"></i>
                                </a>
                            </td>
                            <?php $totalMoney+=$rcart['Amount']; ?>
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="5">
                            <a class="btn btn-danger" href="index.php?option=cart&delcart=all">Xóa Giỏ Hàng</a>
                            <a class="btn btn-success" href="index.php?option=cart&cat=buy">Thanh Toán</a>
                            <button name="CAPNHAT" type="submit" class="btn btn-info">Cập Nhật</button>
                            </td>
                            <td colspan="2">
                                <?php echo "Tổng Tiền: ".number_format($totalMoney); ?>
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php else: ?>
                Giỏ Hàng còn Trống
                <?php endif;?> 
            </div>
        </div>
    </div>
</section>
<?php require_once('views/frontend/footer.php') ?>