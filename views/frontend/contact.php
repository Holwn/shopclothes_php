<?php
use App\Models\Contact;
use App\libraries\MyClass;
if(isset($_POST['LIENHE']))
{
    $data=$_POST['data'];
    $data['Status']=1;
    $data['CreatedAt']=date('Y-m-d H:i:s');
    $data['UpdatedAt']=date('Y-m-d H:i:s');
    $data['UpdatedBy']=(isset($_SESSION['user_customer']))?$_SESSION['userid']:1;
    Contact::insert($data);
    MyClass::set_flash('message',['type'=>'success','msg'=>'Thêm Thành Công <3']);
    header("location:index.php?option=contact");
}
?>
<?php require_once('views/frontend/header.php') ?>
<div class="container">
    <div class="row">
        <div class="col-md-5">
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
        <div class="col-md-7">
        <?php require_once('views/backend/message_alert.php')?>
                 <form action="" method="post" name = "form1">
                    <h4 class="mb-3">Liên Hệ</h4>
                    <div class="row g-3">
                            <div class="form-group">
                            <label for="" class="form-label">Họ Tên</label>
                            <input type="text" class="form-control" placeholder="Name..." name="data[FullName]" required="">
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
                            <label for="" class="form-label">Tiêu Đề</label>
                            <input type="text" class="form-control" name="data[Title]" placeholder="Topic...">
                            </div>

                            <div class="form-group">
                            <label for="" class="form-label">Nội Dung Liên Hệ</label>
                            <textarea name="data[Detail]" class="form-control" rows="3"name="detail"></textarea>
                            </div>
                            <div class="form-group">
                            <button name="LIENHE" class="w-100 btn btn-primary btn-lg" type="submit">Liên Hệ</button>
                            </div>
                    </div>
                </form>
        </div>
    </div>
</div>
<?php require_once('views/frontend/footer.php') ?>