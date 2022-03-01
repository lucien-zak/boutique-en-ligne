<?php

namespace App\Controllers;

use App\Models\ProductModel;

class AdminController extends ProductModel{

    public function home_admin(){
        $titrepage = 'Panel Admin';
        $params = [ 'titre' => $titrepage];
        return AbstractController::render('admin', $params);
    }

    public function products_admin(){
        $titrepage = 'Panel Admin produits';
        $products = $this->getProducts();
        $params = [ 'titre' => $titrepage, 'products' => $products];
        return AbstractController::render('admin.products', $params);
    }

    public function product_admin($slug,$id){
        $titrepage = 'Panel Admin produit';
        $this->table = 'artists';
        $listartist = $this->getAll();
        $this->table = 'categories';
        $allcategory = $this->getAll();
        $this->table = 'sub_categorie';
        $allsubcategory = $this->getAll();
        $product = $this->setId($id)->setSlug($slug)->getProduct();
        $params = [ 'titre' => $titrepage, 'product' => $product, 'artists' => $listartist, 'allcategory' => $allcategory, 'allsubcategory' => $allsubcategory ];
        return AbstractController::render('admin.product', $params);
    }


}

