<?php
use App\Models\Slider;
use App\Libraries\MyClass;
$id=$_REQUEST['id'];
$row = Slider::find($id);
if($row!=null)
{
    $row->Status=2;
    $row->UpdatedAt=date('Y-m-d H:i:s');
    $row->UpdatedBy=(isset($_SESSION['useradmin']))?$_SESSION['userid']:1;
    $row->save();
    MyClass::set_flash('message',['type'=>'success','msg'=>'Thành công'] );

}
else
{
    MyClass::set_flash('message',['type'=>'danger','msg'=>'Mẫu tin không tồn tại'] );
}
header("location:index.php?option=slider&cat=trash");
