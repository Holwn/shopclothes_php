<?php
use App\Models\Product;
use App\libraries\Cart;
$product=Product::get();
$cart=new Cart();
$page="view";
if(isset($_REQUEST['addcart']))
{
    $page="addcart";
    $qty=1;
    $id=$_REQUEST['addcart'];
    $row_product=Product::where('Status','=','1')->find($id);
    $row_cart=array(
        'Id'=>$id,
        'Img'=>$row_product['Img'],
        'Name'=>$row_product['Name'],
        'Price'=>isset($row_product['Price'])?$row_product['Price']:$row_product['PriceSale'],
        'Quantity'=>$qty,
        'Amount'=>$row_product['Price']*$qty,
    );
    $cart->addCart($row_cart);
    header("location:index.php?option=cart");
}
if(isset($_REQUEST['updatecart'])&&isset($_POST['CAPNHAT']))
{
    $qty=$_POST['Quantity'];
    $cart_list=$cart->contentCart();
    $i=0;
    $data=array();
    foreach($cart_list as $cart_row)
    {
        $row=array(
            'Id'=>$cart_row['Id'],
            'Quantity'=>$qty[$i],
            'Amount'=>$cart_row['Price']*$qty[$i]
        );
        $data[]=$row;
        $i++;
    }
    $cart->updateCart2($data);
    header("location:index.php?option=cart");
}
if(isset($_REQUEST['delcart']))
{
    $page="delcart";
    $id=$_REQUEST['delcart'];
    if(is_numeric($id))
    {
        $cart->removeCart($id);
    }
    else
    {
        unset($_SESSION['cart']);
    }
    header("location:index.php?option=cart");
}
if($page=="view")
{
    $list_content=$cart->contentCart();
    require_once'views/frontend/cart_view.php';
}