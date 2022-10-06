<?php 
use App\Models\Product;
use App\libraries\MyClass;
$id =$_REQUEST['id'];
$row=Product::find($id);
if($row!=null)
{
    $row->delete();
    MyClass::set_flash('message',['type'=>'success','msg'=>'Thành Công <3']);
}
else
{
    MyClass::set_flash('message',['type'=>'danger','msg'=>'Mẫu Tin Không Tồn Tại !!!']);
}
header("location:index.php?option=product&cat=trash");
