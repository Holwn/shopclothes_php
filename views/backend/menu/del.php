<?php
use App\Models\Menu;
use App\Libraries\MyClass;
$id=$_REQUEST['id'];
$row = Menu::find($id);

if($row!=null)
{
$row->delete(); 
MyClass::set_flash('message',['type'=>'success','msg'=>'Thành công'] );
}
else
{
    MyClass::set_flash('message',['type'=>'danger','msg'=>'Mẫu tin không tồn tại'] );
}
header("location:index.php?option=menu&cat=trash");
