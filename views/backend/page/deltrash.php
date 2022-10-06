<?php
use App\Models\Post;
use App\libraries\MyClass;

$id=$_REQUEST['id'];
$row =Post::find($id);

if($row!=null){
    $row->Status=0;
    $row->UpdatedAt=date('Y-m-d H:i:s');
    $row->UpdatedBy=(isset($_SESSION['useradmin']))?$_SESSION['userid']:1;
   
    $row->save();
     MyClass::set_flash('message',['type'=>'success','msg'=>'Thành công']);
}
else{
    MyClass::set_flash('message',['type'=>'success','msg'=>'Mẫu tin không tồn tại']);
}
header("location:index.php?option=post");