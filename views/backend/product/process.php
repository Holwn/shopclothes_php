<?php
use App\libraries\MyClass;
use App\Models\Product;

if(isset($_POST['THEM']))
{
    $data=$_POST['data'];
    $data['CatId']=$_POST['catid'];
    $slug=MyClass::str_slug($data['Name']);
    $data['Status']=$_POST['status'];
    $data['CreatedAt']=date('Y-m-d H:i:s');
    $data['CreatedBy']=(isset($_SESSION['useradmin']))?$_SESSION['useradmin']:1;
    $data['Slug']=MyClass::str_slug($data['Name']);
    $target_dir = "../public/images/product/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if(in_array($imageFileType,['png','gif','jpg','jpeg','eps','ai','pdf','indds','raw']))
    {
        $pathFile=$target_dir.$slug.'.'. $imageFileType;
        move_uploaded_file($_FILES["img"]["tmp_name"], $pathFile);
        $data['Img']=$slug.'.'. $imageFileType;
        Product::insert($data);
        MyClass::set_flash('message',['type'=>'success','msg'=>'Thêm Thành Công <3']);
    }
    else
    {
        MyClass::set_flash('message',['type'=>'danger','msg'=>'Tập Tin Không Định Dạng Được !!!']);
    }
    header("location:index.php?option=product");
}
if(isset($_POST['CAPNHAT']))
{
    $id=$_POST['id'];
    $data=$_POST['data'];
    $data['CatId']=$_POST['catid'];
    $row = Product::find($id);
    $Slug=MyClass::str_slug($data['Name']);
    $data['Slug']=MyClass::str_slug($data['Name']);
    $data['Status']=$_POST['status'];
    $data['UpdatedAt']=date('Y-m-d H:i:s');
    $data['UpdatedBy']=(isset($_SESSION['useradmin']))?$_SESSION['useradmin']:1;
    if(strlen($_FILES["img"]["name"])!=0)
    {
        $target_dir = "../public/images/product/";
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if(in_array($imageFileType,['png','gif','jpg','jpeg','eps','ai','pdf','indds','raw']))
        {
            $pathFile=$target_dir.$Slug.'.'. $imageFileType;
            move_uploaded_file($_FILES["img"]["tmp_name"], $pathFile);
            $data['Img']=$Slug.'.'. $imageFileType;
            $id=$_POST['id'];
        }
    }
    Product::where('Id','=',$id)->update($data);
    MyClass::set_flash('message',['type'=>'success','msg'=>'Cập Nhật Thành Công <3']);
    header("location:index.php?option=product");
}