<?php
namespace App\Controllers;

use App\Models\ProductModel;

class CartController extends ProductModel
{

    private function init_cart()
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
    }

    public function addProduct()
    {
        $this->init_cart();

        if (!array_key_exists($_REQUEST['id'], $_SESSION['cart'])) {
            $_SESSION['cart'][$_REQUEST['id']]['quantity'] = $_REQUEST['quantity'];
            $_SESSION['cart'][$_REQUEST['id']]['price'] = $_REQUEST['price'];
        }
        else {
            $_SESSION['cart'][$_REQUEST['id']]['quantity'] = $_SESSION['cart'][$_REQUEST['id']]['quantity'] + $_REQUEST['quantity'];
        }
    }

    public function cart(){
        $titrepage = 'Panier'; 
        $params = ['titre' => $titrepage];
        return AbstractController::render('account.cart', $params);

    }



}
