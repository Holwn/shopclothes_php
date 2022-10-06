<?php
use App\Models\User;
use App\Libraries\MyClass;
$id=$_REQUEST['id'];
$row = User::find($id);

if($row!=null)
{
$row->delete(); 
MyClass::set_flash('message',['type'=>'success','msg'=>'Thành công'] );
}
else
{
    MyClass::set_flash('message',['type'=>'danger','msg'=>'Mẫu tin không tồn tại'] );
}
header("location:index.php?option=category&cat=trash");
