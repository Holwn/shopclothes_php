<?php
use App\Libraries\MyClass;
use App\Models\User;
$id=$_REQUEST['id'];
$row=User::find($id);
if ($row!=null) {
    $row->delete();
    MyClass::set_flash('message',['type'=>'success', 'msg'=>'Thành công']);

} else {
    MyClass::set_flash('message',['type'=>'danger', 'msg'=>'Mẫu tin khôg tồn tại']);

}
header("location:index.php?option=customer&cat=trash");
