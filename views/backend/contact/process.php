<?php 
use App\Models\Contact;
use App\Libraries\MyClass;

if(isset($_POST['THEM'])){
    $data=$_POST['data'];
    $data['ParentId']=$_POST['parentid'];
    $data['Orders']=$_POST['orders']+1;
    $data['Status']=$_POST['status'];
    $data['CreatedAt']=date('Y-m-d H:i:s');
    $data['CreatedBy']=(isset($_SESSION['useradmin']))? $_SESSION['userid']:1;
    $data['SlugCat']=MyClass::str_slug($data['NameCat']);
    Contact::insert($data);
    MyClass::set_flash('message',['type'=>'success', 'msg'=>'Thêm thành công']);
    header("location:index.php?option=contact");

}
if(isset($_POST['CAPNHAT'])){
    $id=$_POST['id'];
    $data=$_POST['data'];
    $data['ParentId']=$_POST['parentid'];
    $data['Orders']=$_POST['orders']+1;
    $data['Status']=$_POST['status'];
    $data['UpdatedAt']=date('Y-m-d H:i:s');
    $data['UpdatedBy']=(isset($_SESSION['useradmin']))? $_SESSION['userid']:1;
    $data['SlugCat']=MyClass::str_slug($data['NameCat']);
    Contact::where('Id','=',$id)->update($data);
    MyClass::set_flash('message',['type'=>'success', 'msg'=>'Thêm thành công']);
    header("location:index.php?option=contact");
}