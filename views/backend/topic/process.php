<?php
use App\libraries\MyClass;
use App\Models\Topic;


if(isset($_POST['THEM']))
{
    $data=$_POST['data'];
    $data['ParentId']=$_POST['parentid'];
    $data['Orders']=$_POST['orders']+1;
    $data['Status']=$_POST['status'];
    $data['CreatedAt']=date('Y-m-d H:i:s');
    $data['CreatedBy']=(isset($_SESSION['useradmin']))?$_SESSION['useradmin']:1;
    $data['Slug']=MyClass::str_slug($data['Name']);
    Topic::insert($data);
    MyClass::set_flash('message',['type'=>'success','msg'=>'Thêm Thành Công <3']);
    header("location:index.php?option=topic");
}
if(isset($_POST['CAPNHAT']))
{
    $id=$_POST['id'];
    $data=$_POST['data'];
    $data['ParentId']=$_POST['parentid'];
    $data['Orders']=$_POST['orders']+1;
    $data['Status']=$_POST['status'];
    $data['UpdatedAt']=date('Y-m-d H:i:s');
    $data['UpdatedBy']=(isset($_SESSION['useradmin']))?$_SESSION['useradmin']:1;
    $data['Slug']=MyClass::str_slug($data['Name']);
    
    Topic::where('Id','=',$id)->update($data);
    MyClass::set_flash('message',['type'=>'success','msg'=>'Cập Nhật Thành Công <3']);
    header("location:index.php?option=topic");
}