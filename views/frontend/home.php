<?php
use App\Models\Category;
use App\Models\Product;
$list_category=Category::where([['ParentId','=','0'],['Status','=','1']])->orderBy('Orders','asc')->get();
$title="Trang Chủ";
$metakey="";
$metadesc="";
?>

<?php require_once('views/frontend/header.php') ?>
    
   
        <?php require_once('views/frontend/mod_slider.php') ?>
        
        <div class="album py-5 bg-light">
            <div class="container">
                <?php foreach($list_category as $cat) : ?>
                    <?php
                    $listcatid=array();
                    array_push($listcatid,$cat->Id);
                    $list_category1=Category::where([['ParentId','=',$cat->Id],['Status','=','1']])->orderBy('Orders','asc')->get();
                    if(count($list_category1)!=0)
                    {
                        foreach($list_category1 as $cat1)
                        {
                            array_push($listcatid,$cat1->Id);
                            $list_category2=Category::where([['ParentId','=',$cat1->Id],['Status','=','1']])->orderBy('Orders','asc')->get();
                            if(count($list_category2)!=0)
                            {
                                foreach($list_category2 as $cat2)
                                {
                                    array_push($listcatid,$cat2->Id);
                                }
                            }
                        } 
                    }
                    $list_product=Product::where('Status','=','1')
                    ->whereIn('CatId',$listcatid)
                    ->orderBy('CreatedAt','desc')
                    ->take(8)
                    ->get();

                    ?>
                    <div class="product-home">
                        <h3 class="my-3 text-center">
                            <a class="font-weight-bold btn btn-basic" href="index.php?option=product&cat=<?php echo $cat->SlugCat ?>">
                            <?php echo $cat->NameCat ?>
                            </a>
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
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

<?php require_once("views/frontend/footer.php") ?>