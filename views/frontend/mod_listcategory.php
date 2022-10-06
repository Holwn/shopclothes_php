<?php
use App\Models\Category;
$listcategory1=Category::where([['ParentId','=','0'],['Status','=','1']])
->orderBy('Orders','asc')
->get();
?>
<div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
    <h3 class="border-bottom">
      <span class="fs-5 fw-semibold border-bottom">Danh Mục Sản Phẩm</span>
    </h3>
    <ul class="list-unstyled ps-0">
        <?php foreach($listcategory1 as $rowcat1): ?>
            <?php
             $listcategory2=Category::where([['ParentId','=',$rowcat1->Id],['Status','=','1']])
             ->orderBy('Orders','asc')
             ->get();
            ?>
            <?php if(count($listcategory2)!=0): ?>
                <li class="mb-1">
                    <a href="index.php?option=product&cat=<?php echo $rowcat1->SlugCat ?>" class="btn btn-toggle d-inline-flex align-items-center rounded border-0"  aria-expanded="true">
                    <?php echo $rowcat1->NameCat ?>
                    </a>
                    <div class="collapse show" id="home-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <?php foreach($listcategory2 as $rowcat2): ?>
                        <li><a href="index.php?option=product&cat=<?php echo $rowcat2->SlugCat ?>" class="link-dark d-inline-flex text-decoration-none rounded">
                            <?php echo $rowcat2->NameCat ?>
                        </a></li>
                        <?php endforeach; ?>
                    </ul>
                    </div>
                </li>
            <?php else: ?>
                <li class="mb-1">
                    <a href ="index.php?option=product&cat=<?php echo $rowcat1->SlugCat ?>"class="btn btn-toggle d-inline-flex align-items-center rounded border-0" aria-expanded="true">
                    <?php echo $rowcat1->NameCat ?>
                    </a>
                </li>
            <?php endif; ?>
      <?php endforeach; ?>
    </ul>
</div>