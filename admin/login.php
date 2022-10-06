<?php
session_start();
require_once ("../vendor/autoload.php");
require_once("../config/database.php");
use App\Models\User;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin TeamFive's Shop</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../public/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../public/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../public/css/jquery.dataTables.min.css">
</head>
<body>
    <?php
        if(isset($_POST['DANGNHAP']))
        {
            $username=$_POST['username'];
            $password=sha1($_POST['password']);
            if(filter_var($username,FILTER_VALIDATE_EMAIL))
            {
                $args=[['Status','=','1'],['Email','=',$username],['Roles','=','1']];
            }
            else
            {
                $args=[['Status','=','1'],['UserName','=',$username],['Roles','=','1']];
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
                    $_SESSION['useradmin']=$username;
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
        <div class="modal-dialog" role="document" class="bg-secondary">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <!-- <h5 class="modal-title">Modal title</h5> -->
                    <h2 class="fw-bold mb-0 text-primary">Đăng Nhập</h2>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body p-5 pt-0">
                <form class="" action="" method="post" name="form1">
                <div class="form-floating mb-3">
                    <label for="username" class="text-dark">Tên Đăng Nhập</label>
                    <input name="username" id="username" type="input" class="form-control rounded-3" placeholder="UserName">
                    </div>
                    <div class="form-floating mb-3">
                        <label for="password" class="text-dark">Mật Khẩu</label>
                        <input name="password" id="password" type="password" class="form-control rounded-3" placeholder="Password">
                    </div>
                        
                    <button name="DANGNHAP"class="w-100 mb-2 btn btn-lg rounded-3 btn-primary mt-5" type="submit">Đăng Nhập</button>
                    <?php if(isset($error)):?>
                    <small class=""><?=$error;?></small>
                    <?php endif; ?>
                </div>
                </form>
            </div>
        </div>
</body>
</html>