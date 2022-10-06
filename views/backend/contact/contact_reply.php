<?php require_once('../views/backend/header.php'); ?>
<?php

use App\Models\Contact;
use App\Libraries\MyClass;
$id=$_REQUEST["id"];
$list = Contact::where('Status','!=','0')->get();
$row=Contact::find($id);
if ($row==null){
    MyClass::set_flash('message',['type'=>'danger', 'msg'=>'Mẫu tin không tồn tại']);
   header("location:index.php?option=contact");

}

$strparentid = "";
$strorders="";
foreach ($list as $item) {
    if($item['Id']!=$id){
    if($row['ParentId'] == $item['Id']){
    $strparentid .= "<option selected value='" . $item['Id'] . "'>" . $item['FullName'] . "</option>";
    } else {
    $strparentid .= "<option value='" . $item['Id'] . "'>" . $item['FullName'] . "</option>";
    }

    if($row['Orders']-1==$item['Orders']) {
    $strorders .= "<option selected value='" . $item['Orders'] . "'>Sau: " . $item['FullName'] . "</option>";

    }
    $strorders .= "<option value='" . $item['Orders'] . "'>Sau: " . $item['FullName'] . "</option>";
    }
}
?>
<?php require_once('../views/backend/header.php'); ?>


<div class="content-wrapper my-2" style="min-height: 549px;">
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <strong class="text-uppercase text-danger">Trả lời liên hệ</strong>
                </h3>
                <div class="card-tools">
                    <a class="btn btn-success btn-sm" href="#" role="button">
                        <i class="far fa-save"></i> Trả lời</a>
                    <a class="btn btn-danger btn-sm" href="index.php?option=contact" role="button">
                        <i class="fas fa-times"></i> Thoát</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="form-group">
                            <label for="">Tiêu đề liên hệ</label>
                            <input type="text" class="form-control" name="" value="Tiêu đề liên hệ" readonly="">
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung câu hỏi</label>
                            <textarea class="form-control" name="" rows="3" readonly="">Nội dung câu hỏi</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung trả lời</label>
                            <textarea class="form-control" name="" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">Họ Tên</label>
                            <input type="text" class="form-control" name="" readonly="" value="Nguyễn Văn AN">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="" readonly="" value="nguyenvanan@gmail.com">
                        </div>
                        <div class="form-group">
                            <label for="">Điện thoại</label>
                            <input type="text" class="form-control" name="" readonly="" value="098765432">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<form action="index.php?option=contact&cat=process" name="form1" method="post">
<!-- Content Wrapper. Contains page content -->

<!-- /.content-wrapper -->
</form> 
<?php require_once('../views/backend/footer.php'); ?>