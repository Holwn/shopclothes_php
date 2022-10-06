<?php
use App\Models\Slider;
use App\Libraries\MyClass;
$id=$_REQUEST['id'];
$row = Slider::find($id);

if($row!=null)
{
$row->delete(); 
MyClass::set_flash('message',['type'=>'success','msg'=>'Thành công'] );
}
else
{
    MyClass::set_flash('message',['type'=>'danger','msg'=>'Mẫu tin không tồn tại'] );
}
header("location:index.php?option=slider&cat=trash");
