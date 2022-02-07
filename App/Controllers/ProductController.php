<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProductController extends ProductModel
{

    public function product($id)
    {
        $titrepage = 'Produit';
        $this->setId($id);
        $res = $this->getProducts();
        $params = ['titre' => $titrepage, 'product' => $res];
        return AbstractController::render('product', $params);
    }

    

}
