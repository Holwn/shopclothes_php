<?php
namespace App\libraries;
class Cart
{
    public function addCart($row)
    {
        if(is_array($row))
        {
            if(isset($_SESSION['cart']))
            {
                $cart=$_SESSION['cart'];
                $key=$this->cart_exist($cart,$row['Id']);
                if($key!=-1)
                {
                    $cart[$key]['Quantity']++;
                }
                else
                {
                    $cart[]=$row;
                }
            }
            else{
                $cart[]=$row;
            }
            $_SESSION['cart']=$cart;
        }
    }
    public function cart_exist($cart,$id)
        {
            foreach($cart as $key=>$val)
            {
                if($val['Id']==$id)
                {
                    return $key;
                }
                return -1;
            }
            
    }
    public function removeCart($id)
    {
        if(isset($_SESSION['cart']))
        {
            $cart=$_SESSION['cart'];
            $key=$this->cart_exist($cart,$id);
            if($key!=-1)
            {
                unset($cart[$key]);
                if(count($cart)==0)
                {
                    unset($_SESSION['cart']);
                    return null;
                }
            }
            $_SESSION['cart']=$cart;
        }
        else
        {
            return null;
        }
    }
    public function updateCart($row)
    {
        if(isset($_SESSION['cart']))
        {
            $cart=$_SESSION['cart'];
            $key=$this->cart_exist($cart,$row->id);
            if($key!=-1)
            {
                $cart[$key]['qty']=$row->qty;
                $cart[$key]['price']=$row->price;
                $cart[$key]['amount']=$row->amount;
            }
            if($cart[$key][['qty']==0])
            {
                unset($cart[$key]);
            }
            $_SESSION['cart']=$cart;
        }
        else
        {
            return null;
        }
    }
    public function updateCart2($data)
    {
        $mycart=$_SESSION['cart'];
        foreach($data as $key=>$item)
        {
            foreach($mycart as $keycart=>$rcart)
            {
                if($data[$key]['Quantity']<=0)
                {
                    unset($mycart[$keycart]);
                }
                else{
                    $mycart[$keycart]['Quantity']=$data[$key]['Quantity'];
                    $mycart[$keycart]['Amount']=$data[$key]['Amount'];
                }
            }
        }
        $_SESSION['cart']=$mycart;
    }
    public function contentCart()
    {
        if(isset($_SESSION['cart']))
        {
            $cart=$_SESSION['cart'];
            return $cart;
        }
        return null;
    }
    public function totalCart()
    {
        if(isset($_SESSION['cart']))
        {
            $cart=$_SESSION['cart'];
            return $cart;
        }
        return null;
    }
}