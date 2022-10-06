<?php
use App\Models\User;
?>
<?php if(!isset($_SESSION['user_customer'])):?>
    <?php header("location:index.php?option=login"); ?>
<?php else: ?>
    <?php require_once('views/frontend/header.php') ?>
    <?php
    $user=User::find($_SESSION['userid']);
    ?>
<div class="container">
    <div class="row">
        <div class="col-md-10">
        <table class="table table-bodered" id="myTable">
            <tr>
              <h3>Thông tin cá nhân</h3>
            </tr>
            <tr>
              <th>Họ và tên</th>
              <td><?php echo $user['FullName']; ?></td>
            </tr>
            <tr>
              <th>Email</th>
              <td><?php echo $user['Email']; ?></td>
            </tr>
            <tr>
              <th>Giới Tính</th>
              <td>
                <?php
                if($user['Gender']==1)
                {
                    echo "Nam";
                }
                else
                {
                    echo "Nữ"; 
                }
                ?>
                </td>
            </tr>
            <tr>
              <th>Số Điện Thoại</th>
              <td><?php echo $user['Phone']; ?></td>
            </tr>
            <tr>
              <th>Hình</th>
              <td><img style="width:330px;height:330px" class="" src="public/images/avatar/<?php echo $user['Img']; ?>" alt="<?php echo $user['Img']; ?>" srcset=""></td>
            </tr>
            
        </table>
        </div>
        <div class="col-md-2">
            <a href="index.php?option=logout" class="badge bg-danger text-decoration-none bg-opacity-75">
                <p class="text-uppercase ">Đăng Xuất Khỏi Trái Đất</p>
            </a>
        </div>
    </div>
</div>
<?php require_once('views/frontend/footer.php') ?>
<?php endif; ?>