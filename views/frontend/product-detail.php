<?php
use App\Models\Product;
use App\Models\Category;
$slug =$_REQUEST['id'];
$row_pro=Product::where([['Slug','=',$slug],['Status','=','1']])->first();
$title=$row_pro['Name'];
$metakey=$row_pro['MetaKey'];
$metadesc=$row_pro['MetaDesc'];
$listcatid=array();
array_push($listcatid,$row_pro->CatId);
$list_category1=Category::where([['ParentId','=',$row_pro->CatId],['Status','=','1']])->orderBy('Orders','asc')->get();
if(count($list_category1)!=0)
{
    foreach($list_category1 as $cat1)
    {
        array_push($listcatid,$cat1->CatId);
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
->where('Id','!=',$row_pro['Id'])
->orderBy('CreatedAt','desc')
->take(8)->get();
?>
<?php require_once('views/frontend/header.php') ?>
    
<section class="maincontent">        
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="public/images/product/<?= $row_pro['Img']?>" class="img-fluid w-100" alt="" srcset="">
                </div>
                <div class="col-md-6">
                    <h1><?= $row_pro['Name']?></h1>
                    <h3><?php echo number_format($row_pro['Price'])."<sup>đ</sup>";?></h3>
                    <h3><?php echo number_format($row_pro['PriceSale'])."<sup>đ</sup>";?></h3>
                    <input type="number" value="1" name="number" min="1" step="1">
                    <a href="index.php?option=cart&addcart=<?php echo $row_product['Id']; ?>" class="btn btn-success">Đặt Mua</a>                        
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h3>Chi Tiết Sản Phẩm</h3>
                    <?= $row_pro['Detail']?>
                </div>
            </div>
            <h3>Sản Phẩm Cùng Loại</h3>
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
                                                <a href="index.php?option=cart&addcart=<?php echo $row_product->Id; ?>" class="btn btn-success">Đặt Mua</a>
                                                </div>
                                            </div>
                                            <!-- <small class="text-muted">9 mins</small> -->
                                        </div>
                                        </div>
                                    </div>
                    <?php endforeach;?>
            </div>          
        </div>
    </div>
</section>
<?php require_once("views/frontend/footer.php") ?>