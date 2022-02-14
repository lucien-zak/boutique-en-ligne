<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProductController extends ProductModel
{
    public function product($id,$slug)
    {
        $titrepage = 'Produit';
        $this->setId($id);
        $this->setSlug($slug);
        $res = $this->getProduct();
        $params = ['titre' => $titrepage, 'product' => $res];
        return AbstractController::render('product', $params);
    }

    public function products()
    {
        $titrepage = 'Produits';
        $res = $this->getProducts();
        $params = ['titre' => $titrepage, 'products' => $res];
        return AbstractController::render('products', $params);
    }



}
?>