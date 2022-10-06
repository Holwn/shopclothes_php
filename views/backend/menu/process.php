<?php
use App\Models\Menu;
use App\Libraries\MyClass;

if (isset($_POST['THEM'])){
    $data = $_POST['data'];//Thông tin của điều khiển name="data[...]"
    $data['Orders']=$_POST['orders'] +1;
    $data['ParentId']=$_POST['parentid'];
    $data['Position']=$_POST['position'];
    $data['Status']=$_POST['status'];
    $data['Type']=$_POST['type'];
    $data['CreatedAt']=date('Y-m-d H:i:s');
    $data['CreatedBy']=(isset($_SESSION['useradmin']))?$_SESSION['userid']:1;
    Menu::insert($data);//Lưu thêm
    MyClass::set_flash('message',['type'=>'success','msg'=>'Thêm thành công'] );
    header("location:index.php?option=menu");

}
if (isset($_POST['CAPNHAT'])){
    $id = $_POST['id']; 
    $data = $_POST['data'];
    $data['Orders']=$_POST['orders'] +1 ;
    $data['ParentId']=$_POST['parentid'];
    $data['Position']=$_POST['position'];
    $data['Status']=$_POST['status'];
    $data['Type']=$_POST['type']; 
    $data['UpdatedAt']=date('Y-m-d H:i:s');
    $data['UpdatedBy']=(isset($_SESSION['useradmin']))?$_SESSION['userid']:1;
    Menu::where('Id','=',$id)->update($data);
    MyClass::set_flash('message',['type'=>'success','msg'=>'Cập Nhật thành công'] );
    header("location:index.php?option=menu");
}