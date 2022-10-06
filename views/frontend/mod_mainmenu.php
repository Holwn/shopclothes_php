<?php
use App\Models\Menu;
$list_menu=Menu::where([['ParentId','=','0'],['Status','=','1']])
->orderBy('Orders','asc')
->get();
?>
<!-- <nav class="py-2 bg-light border-bottom">
    <div class="container d-flex flex-wrap"> -->
      <ul class="nav me-auto mb-2 mb-lg-0">
      <?php foreach($list_menu as $row_menu): ?>
        <li class="nav-item dropdown">
            <?php
            $list_menu1=Menu::where([['ParentId','=',$row_menu->Id],['Status','=','1']])
            ->orderBy('Orders','asc')
            ->get();
            if(count($list_menu1) != 0) : ?>
            <div class="dropdown">
              <a class="btn text-secondary dropdown-toggle" href="<?php echo $row_menu->Link ?>" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
              <?php echo $row_menu->Name ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <?php foreach($list_menu1 as $row_menu1): ?>
                <li><a class="dropdown-item" href="<?php echo $row_menu1->Link ?>"><?php echo $row_menu1->Name ?></a></li>
                <?php endforeach; ?>
              </ul>
            </div>
            <?php else: ?>
              <a href="<?php echo $row_menu->Link ?>" class="nav-link px-2 text-secondary">
              <?php echo $row_menu->Name ?>
              </a>
        </li>
            <?php endif; ?>
          <?php endforeach; ?>
      </ul>
        <ul class="nav">
          <p>
        <form class="mb-lg-0 me-lg-3" action="index.php?option=search" method="POST" name = "form1">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search" name="TUKHOA">
          <input class="mt-1" type="submit" name="TIMKIEM" value="Tìm Kiếm">
        </form>
        </p>
        <div class="row-6 justify-content-end align-items-center">
          <div class="row-3 mb-1">
            <?php require_once("views/frontend/mod_login.php") ?>
          </div>
          <div class="row-3 mt-3">
          <?php
        $count_cart=0;
        if(isset($_SESSION['cart']))
        {
          $cart=$_SESSION['cart'];
          $count_cart=count($cart);
        }
        ?>
          <a href="index.php?option=cart" class="text-dark">
          <i class="fas fa-cart-plus">(<?=$count_cart;?>)</i>
          </a>
          </div>
        
        
        </div>
      </ul>
    <!-- </div>
</nav> -->