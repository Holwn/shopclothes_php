<?php
use App\Models\User;

?>
<?php if(!isset($_SESSION['user_customer'])):?>
  
    <a href="index.php?option=login">
    <i class="btn btn-sm btn-outline-secondary">Đăng Nhập</i>
    </a>
<?php else: ?>
  <?php
  $user=User::find($_SESSION['userid']);
  ?>
  <div class="dropdown text-end">
        <a href="" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="public/images/avatar/<?=$user['Img'];?>" alt="" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="index.php?option=customer">Thông Tin Cá Nhân</a></li>
            <li><a class="dropdown-item" href="index.php?option=logout">Sign out</a></li>
        </ul>
</div>
<?php endif; ?>


