<?php

use App\Models\Product;
use App\libraries\Pagination;

$title="Sản Phẩm Tìm Kiếm";

$limit=8;
$page=Pagination::pageCurrent();
$skip=Pagination::pageOffset($page,$limit);

$list_product=Product::where([['Name','like','%'.$_POST['TUKHOA'].'%'],['Status','=','1']])
->orderBy('Name','desc')
->skip($skip)->take($limit)->get();
$total=Product::where('Status','=','1')
->count();

?>

<?php require_once('views/frontend/header.php') ?>
    
    <section class="maincontent">
        
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                    <?php require_once('views/frontend/mod_listcategory.php') ?>
                    </div>
                    <div class="col-md-9">
                        <div class="product-home">
                            <h3 class="my-3 text-center">
                                <?php echo $title ?>
                            </h3>
                                <div class="row">
                                    <?php foreach($list_product as $row_product) : ?>
                                    <div class="col-md-3 mb-3 card shadow-sm">
                                        <a class="" href="index.php?option=product&id=<?php echo $row_product->Slug ?>">
                                            <img class="w-100" src="public/images/product/<?php echo $row_product->Img ?>" alt="" srcset=""> 
                                        </a>                        
                                        <div class="card-body">
                                        <h5 class="card-title">
                                            <a class="btn text-body"href="index.php?option=product&id=<?php echo $row_product->Slug ?>">
                                                <?php echo $row_product->Name ?>
                                            </a>
                                        </h5>
                                        <div class="justify-content-between align-items-center">
                                            <h4 class="fs-6">
                                                <?php
                                                if($row_product->Price > $row_product->PriceSale)
                                                {
                                                    echo "<del>".number_format($row_product->Price)."<sup>đ</sup>"."</del>";
                                                    echo number_format($row_product->PriceSale)."<sup>đ</sup>";
                                                }
                                                else
                                                {
                                                    echo number_format($row_product->Price)."<sup>đ</sup>";
                                                }
                                                ?>
                                            </h4>
                                            <div class="row">
                                                <div class="col">
                                                <a href="index.php?option=product&id=<?php echo $row_product->Slug; ?>" class="btn btn-success">Chi Tiết</a>
                                                </div>
                                                <div class="col text-end">
                                                    <a href="index.php?option=cart&addcart=<?php echo $row_product['Id']; ?>" class="btn btn-success">Đặt Mua</a>
                                                </div>
                                            </div>
                                            <!-- <small class="text-muted">9 mins</small> -->
                                        </div>
                                        </div>
                                    </div>
                                    <?php endforeach;?>
                                </div>
                                <div><?php echo Pagination::pageLinks($total,$page,$limit,'index.php?option=product'); ?></div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </section>
<?php require_once("views/frontend/footer.php") ?>