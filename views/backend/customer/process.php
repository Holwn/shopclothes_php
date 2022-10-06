<?php 
use App\Models\Customer;
use App\Libraries\MyClass;

if(isset($_POST['THEM'])){
    $data=$_POST['data'];
    
    $data['Status']=$_POST['status'];
    $data['FullName']=$_POST['fullname'];
    $data['Password']=$_POST['password'];
    $data['Email']=$_POST['email'];
    $data['CreatedAt']=date('Y-m-d H:i:s');
    $data['CreatedBy']=(isset($_SESSION['useradmin']))? $_SESSION['userid']:1;
   
    User::insert($data);
    MyClass::set_flash('message',['type'=>'success', 'msg'=>'Thêm thành công']);
    header("location:index.php?option=customer");

}
if(isset($_POST['CAPNHAT'])){
    $id=$_POST['id'];
    $data=$_POST['data'];
   
    $data['Status']=$_POST['status'];
    $data['FullName']=$_POST['fullname'];
    $data['Password']=$_POST['password'];
    $data['Email']=$_POST['email'];
    $data['UpdatedAt']=date('Y-m-d H:i:s');
    $data['UpdatedBy']=(isset($_SESSION['useradmin']))? $_SESSION['userid']:1;
   
    User::where('Id','=',$id)->update($data);
    MyClass::set_flash('message',['type'=>'success', 'msg'=>'Thêm thành công']);
    header("location:index.php?option=customer");
}