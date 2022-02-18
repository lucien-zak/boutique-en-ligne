<?php
namespace App\Controllers;

use App\Models\ProductModel;

class CartController extends ProductModel
{

    private function cart()
    {    
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
        }
        
    }
    
    public function addProduct()
    {
        $this->cart();
        return array_push($_SESSION['cart'],$_REQUEST);
    }

}