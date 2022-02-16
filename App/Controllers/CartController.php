<?php
namespace App\Controllers;

use App\Models\ProductModel;

class CartController extends ProductModel
{

    public function cart()
    {    
        if(!isset($_SESSION['panier'])){
            $_SESSION['cart'] = array();
            $_SESSION['cart']['name'] = array();
            $_SESSION['cart']['price'] = array();
            $_SESSION['cart']['quantity'] = array();
            AbstractController::render('account.cart', $params = ['titre' => "cart"]);
        }
        
    }
    
    public function addProduct($name, $quantity, $price)
    {
        
    }

}