<?php
require_once ("vendor/autoload.php");
require_once("config/database.php");
use App\Models\User;
if(isset($_POST['DANGNHAP']))
{
    $username=$_POST['username'];
    $password=sha1($_POST['password']);
    if(filter_var($username,FILTER_VALIDATE_EMAIL))
    {
        $args=[['Status','=','1'],['Email','=',$username],['Roles','=','0']];
    }
    else
    {
        $args=[['Status','=','1'],['UserName','=',$username],['Roles','=','0']];
    }
    $user=User::where($args)->first();
    $error='';
    if($user==null)
    {
       $error='<div class="text-danger">Tên Đăng Nhập Không Tồn Tại !!! </div>';
    }
    else
    {
        if($password==$user['Password'])
        {
            $_SESSION['user_customer']=$username;
            $_SESSION['userid']=$user["Id"];
            header('location:index.php');
        }
        else
        {
            $error='<div class="text-danger">Không Đúng Mật Khẩu !!! </div>';
        }
    }
}
?>
<?php require_once('views/frontend/header.php') ?>
<div class="container">
    <div class="row">
        <div class="col-5">
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded-4 shadow">
                <div class="modal-body p-5">
                    <h2 class="fw-bold mb-0">Khuyến Mãi Khủng</h2>

                    <ul class="d-grid gap-4 list-unstyled">
                    <li class="d-flex ">
                        
                        <div>
                        <img src="public/images/gift_icon.png" alt="" style="w-100">
                        <h5 class="mb-0">Tạo Tài Khoản</h5>
                            Đăng kí thành viên để có nhiều ưu đãi hấp dẫn. Chần chờ gì mà không ĐĂNG KÍ NGAY !!!
                        </div>
                    </li>
                    </ul>
                    <a href="index.php?option=register" class="btn btn-lg btn-primary mt-5 w-100">Đăng Kí</a>
                </div>
                </div>
            </div>
        </div>
        <div class="col-7">
        <form  class="" action="" method="post" name="form1">
            <img class="mb-4 " src="public/images/logo.jpg" alt="" width="150" height="110">
            <h1 class="h3 mb-3 fw-normal">Đăng Nhập</h1>

            <div class="form-group mb-3">
                <label for="username" class="text-dark">Tên Đăng Nhập</label>
                <input name="username" id="username" type="input" class="form-control rounded-3" placeholder="UserName"> 
            </div>
            <div class="form-group mb-3">
                <label for="password" class="text-dark">Mật Khẩu</label>
                <input name="password" id="password" type="password" class="form-control rounded-3" placeholder="Password">
            </div>
            <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
            </div>
            <button name="DANGNHAP" class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <?php if(isset($error)):?>
                <?=$error;?>
            <?php endif; ?>
        </form>
        </div>
    </div>
</div>
<?php require_once('views/frontend/footer.php') ?>