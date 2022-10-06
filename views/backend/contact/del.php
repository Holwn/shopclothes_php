<?php
use App\Libraries\MyClass;
use App\Models\Contact;
$id=$_REQUEST['id'];
$row=Contact::find($id);
if ($row!=null) {
    $row->delete();
    MyClass::set_flash('message',['type'=>'success', 'msg'=>'Thành công']);

} else {
    MyClass::set_flash('message',['type'=>'danger', 'msg'=>'Mẫu tin khôg tồn tại']);

}
header("location:index.php?option=contact&cat=trash");
