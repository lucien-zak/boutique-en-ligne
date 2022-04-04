<?php
namespace App\Controllers;

use App\Models\ProductModel;

class CartController extends ProductModel
{

    public function __construct()
    {
        $this->init_cart();

    }

    private function init_cart()
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
    }

    public function addProduct()
    {
        if (!array_key_exists($_REQUEST['slug'] . '-' . $_REQUEST['id'], $_SESSION['cart'])) {
            
            $_SESSION['cart'][$_REQUEST['slug'] . '-' . $_REQUEST['id']]['quantity'] = $_REQUEST['quantity'];
            $_SESSION['cart'][$_REQUEST['slug'] . '-' . $_REQUEST['id']]['price'] = $_REQUEST['price'];
            $_SESSION['cart'][$_REQUEST['slug'] . '-' . $_REQUEST['id']]['artist'] = $_REQUEST['artist'];
            $_SESSION['cart'][$_REQUEST['slug'] . '-' . $_REQUEST['id']]['name'] = $_REQUEST['name'];

        } else {
            $_SESSION['cart'][$_REQUEST['slug'] . '-' . $_REQUEST['id']]['quantity'] = $_SESSION['cart'][$_REQUEST['slug'] . '-' . $_REQUEST['id']]['quantity'] + $_REQUEST['quantity'];
        }
        header('location:'.$_SERVER["HTTP_REFERER"].'');
    }

    public function cart()
    {
        $titrepage = 'Panier';
        $products = $this->get_products_from_cart();
        $params = ['titre' => $titrepage, 'products' => $products, 'css' => 'cart'];
        return AbstractController::render('account.cart', $params);

    }

    public function get_products_from_cart()
    {
        $products = [];
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $slugid => $quantity) {
                $slugid = explode('-', $slugid);
                $product = $this->setId($slugid[1])->setSlug($slugid[0])->getProduct();
                array_push($products, $product);
            }
        }
        return $products;
    }

    public function update_product_cart($slug,$id){
        if ($_REQUEST['quantity'] == 0){
            unset($_SESSION['cart'][$slug.'-'.$id]);
        }
        else {
            $_SESSION['cart'][$slug.'-'.$id]['quantity'] = $_REQUEST['quantity'];
        }
        return header('location:'.$_SERVER["HTTP_REFERER"].'');

    }

    static function count_product_cart(){
        
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        $countproduct = [];
        foreach ($_SESSION['cart'] as $product){
            array_push($countproduct, $product['quantity']);
        }
        $count = array_sum($countproduct);
        return $count;
    }

    static function total_product_cart(){
        $total = [];
        foreach ($_SESSION['cart'] as $product){
            array_push($total, $product['quantity'] * $product['price'] );
        }
        return array_sum($total);
    }

}
