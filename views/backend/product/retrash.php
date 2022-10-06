<?php 
use App\Models\Product;
use App\libraries\MyClass;
$id =$_REQUEST['id'];

$row=Product::find($id);
if($row!=null)
{
    $row->Status=2;
    $row->UpdatedAt=date('Y-m-d H:i:s');
    $row->UpdatedBy=(isset($_SESSION['useradmin']))?$_SESSION['userid']:1;
    $row->save();
    MyClass::set_flash('message',['type'=>'success','msg'=>'Thành Công <3']);
}
else
{
    MyClass::set_flash('message',['type'=>'danger','msg'=>'Khôi Phục Thất Bại !!!']);
}
header("location:index.php?option=product&cat=trash");
