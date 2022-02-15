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
        $listproducts = $this->getProducts();
        $listcategory = $this->getCategory();
        $list2 = [];
        // dump($listcategory); 
        foreach ($listcategory as $key => $value){
            if(!array_key_exists($value->categorie, $list2)){
            $list2 += [$value->categorie => $value->sub_categorie];
        }
        else {
            $list2 = array_merge_recursive($list2, [$value->categorie => $value->sub_categorie]);
        }
    }
        $params = ['titre' => $titrepage, 'products' => $listproducts, 'category' => $list2];
        return AbstractController::render('products', $params);
    }

    public function productsbycategory()
    {
        $titrepage = 'Produits';
        $listproducts = $this->getProductsByCategory($_REQUEST);
        $listcategory = $this->getCategory();
        $list2 = [];
        // dump($listcategory); 
        foreach ($listcategory as $key => $value){
            if(!array_key_exists($value->categorie, $list2)){
            $list2 += [$value->categorie => $value->sub_categorie];
        }
        else {
            $list2 = array_merge_recursive($list2, [$value->categorie => $value->sub_categorie]);
        }
    }
        $params = ['titre' => $titrepage, 'products' => $listproducts, 'category' => $list2];
        return AbstractController::render('products', $params);
    }





}
?>