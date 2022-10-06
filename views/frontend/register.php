<?php
use App\Models\User;
use App\libraries\MyClass;
if(isset($_POST['DANGKI']))
{
    $data=$_POST['data'];
    $data['Status']=1;
    $data['Password']=sha1($_POST['password']);
    $data['UserName']=MyClass::str_slug($data['FullName']);
    $data['Gender']=$_POST['gender'];
    $slug=MyClass::str_slug($data['FullName']);
    $data['Roles']=0;
    $data['CreatedAt']=date('Y-m-d H:i:s');
    $target_dir = "public/images/avatar/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if(in_array($imageFileType,['png','gif','jpg','jpeg','eps','ai','pdf','indds','raw']))
    {
        $pathFile=$target_dir.$slug.'.'. $imageFileType;
        move_uploaded_file($_FILES["img"]["tmp_name"], $pathFile);
        $data['Img']=$slug.'.'. $imageFileType;
        User::insert($data);
        MyClass::set_flash('message',['type'=>'success','msg'=>'Đăng Kí Thành Công <3']);
        header("location:index.php?option=login");
    }
    else
    {
        MyClass::set_flash('message',['type'=>'danger','msg'=>'Tập Tin Không Định Dạng Được !!!']);
    }
}
?>
<?php require_once('views/frontend/header.php') ?>
<div class="container">
    <div class="row">
        <div class="col-md-5"> 
        </div>
        <div class="col-md-7">
        <?php require_once('views/backend/message_alert.php')?>
                 <form action="" method="post" name = "form1" enctype="multipart/form-data">
                    <h4 class="mb-3">Đăng Kí</h4>
                    <div class="row g-3">
                            <div class="form-group">
                            <label for="" class="form-label">Họ Tên</label>
                            <input type="text" class="form-control" placeholder="Name..." name="data[FullName]" required="">
                            </div>
                            <div class="form-group">
                            <label for="" class="form-label">Mật Khẩu</label>
                            <input type="password" class="form-control" placeholder="Password" id="password" name="password" required="">
                            </div>

                            <div class="form-group">
                            <label for="" class="form-label me-5">Giới Tính</label>
                            <input class="form-check-input" type="radio" value="1" id="gender" name="gender" id="flexRadioDefault1"checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Nam
                            </label>
                            <input class="form-check-input" type="radio" value="2" id="gender" name="gender" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Nữ
                            </label>
                            </div>

                            <div class="form-group">
                            <label for="" class="form-label">Email </label>
                            <input type="email" class="form-control" name="data[Email]" placeholder="you@example.com" required="">
                            </div>
                            
                            <div class="form-group">
                            <label for="" class="form-label">Điện Thoại</label>
                            <input type="text" class="form-control" name="data[Phone]" placeholder="+84 (xxx)">
                            </div>
                            <div class="form-group"> 
                                <label for="img">Hình</label> 
                                <input type="file" class="form-control"  id="img" name="img">
                            </div>
                            <div class="form-group">
                            <button name="DANGKI" class="w-100 btn btn-primary btn-lg" type="submit">Đăng Kí</button>
                            </div>
                    </div>
                </form>
        </div>
    </div>
</div>
<?php require_once('views/frontend/footer.php') ?>