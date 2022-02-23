<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProductController extends ProductModel
{
    public function product($id, $slug)
    {
        $titrepage = 'Produit';
        $product = $this->setId($id)->setSlug($slug)->getProduct();
        $params = ['titre' => $titrepage, 'product' => $product];
        return AbstractController::render('product', $params);
    }

    public function products()
    {
        $titrepage = 'Produits';
        $listproducts = $this->getProducts();
        $listcategory = $this->getCategory();
        $sortedlist = [];
        $sortedlist = $this->sort_category($listcategory);        
        $params = ['titre' => $titrepage, 'products' => $listproducts, 'category' => $sortedlist];
        return AbstractController::render('products', $params);
    }

    public function productsbycategory()
    {
        $titrepage = 'Produits';
        $listproducts = $this->getProductsByCategory();
        $listcategory = $this->getCategory();
        $sortedlist = $this->sort_category($listcategory);
        $params = ['titre' => $titrepage, 'products' => $listproducts, 'category' => $sortedlist];
        return AbstractController::render('products', $params);
    }

    public function productsbysearch()
    {
        $titrepage = 'Produits';
        $listproducts = $this->getProductsBySearch();
        $listcategory = $this->getCategory();
        $sortedlist = $this->sort_category($listcategory);
        $params = ['titre' => $titrepage, 'products' => $listproducts, 'category' => $sortedlist];
        return AbstractController::render('products', $params);
    }



    private function sort_category($listcategory)
    {   
        $sortedlist = [];
        foreach ($listcategory as $key => $value) {
            if (!array_key_exists($value->categorie, $sortedlist)) {
                $sortedlist += [$value->categorie => $value->sub_categorie];
            } else {
                $sortedlist = array_merge_recursive($sortedlist, [$value->categorie => $value->sub_categorie]);
            }
        }
        return $sortedlist;
    }

}
