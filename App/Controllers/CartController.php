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

        if (!array_key_exists($_REQUEST['slug'] . '-' . $_REQUEST['id'], $_SESSION['cart'])) {
            $_SESSION['cart'][$_REQUEST['slug'] . '-' . $_REQUEST['id']]['quantity'] = $_REQUEST['quantity'];
            $_SESSION['cart'][$_REQUEST['slug'] . '-' . $_REQUEST['id']]['price'] = $_REQUEST['price'];
            $_SESSION['cart'][$_REQUEST['slug'] . '-' . $_REQUEST['id']]['artist'] = $_REQUEST['artist'];
            $_SESSION['cart'][$_REQUEST['slug'] . '-' . $_REQUEST['id']]['name'] = $_REQUEST['name'];

        } else {
            $_SESSION['cart'][$_REQUEST['slug'] . '-' . $_REQUEST['id']]['quantity'] = $_SESSION['cart'][$_REQUEST['slug'] . '-' . $_REQUEST['id']]['quantity'] + $_REQUEST['quantity'];
        }
    }

    public function cart()
    {
        $titrepage = 'Panier';
        $products = $this->get_products_from_cart();
        $params = ['titre' => $titrepage, 'products' => $products];
        return AbstractController::render('account.cart', $params);

    }

    public function get_products_from_cart()
    {
        $products = [];
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $slugid => $quantity) {
                $slugid = explode('-', $slugid);
                $product = $this->setId($slugid[1]);
                $product = $this->setSlug($slugid[0]);
                $product = $this->getProduct();
                array_push($products, $product);
            }
        }
        return $products;
    }

    static function count_product_cart(){
        $countproduct = [];
        foreach ($_SESSION['cart'] as $product){
            array_push($countproduct, $product['quantity']);
        }
        $count = array_sum($countproduct);
        return $count;
    }

}
