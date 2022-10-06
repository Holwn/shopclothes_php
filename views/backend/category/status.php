<?php 
use App\Models\Category;
use App\libraries\MyClass;

$id =$_REQUEST['id'];
$row=Category::find($id);

if($row!=null)
{
    $row->Status=($row['Status']==1)?2:1;
    $row->UpdatedAt=date('Y-m-d H:i:s');
    $row->UpdatedBy=(isset($_SESSION['useradmin']))?$_SESSION['userid']:1;
    $row->save();
    MyClass::set_flash('message',['type'=>'success','msg'=>'Thành Công <3']);
}
else
{
    MyClass::set_flash('message',['type'=>'danger','msg'=>'Chuyển Thất Bại !!!']);
}
header("location:index.php?option=category");
