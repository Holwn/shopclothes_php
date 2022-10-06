<?php
use App\Models\post;
use App\libraries\MyClass;

$id=$_REQUEST['id'];
$row=post::find($id);

if($row!=null){
    $row->delete();
    MyClass::set_flash('message',['type'=>'success','msg'=>'Thành công']);
}
else{
    MyClass::set_flash('message',['type'=>'danger','msg'=>'Mẫu tin không tồn tại']);
}
header("location:index.php?option=post&cat=trash");