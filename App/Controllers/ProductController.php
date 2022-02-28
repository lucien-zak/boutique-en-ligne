<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProductController extends ProductModel
{
    public function product($id, $slug)
    {
        $titrepage = 'Produit';
        $product = $this->setId($id)->setSlug($slug)->getProduct();
        $sub_reviews = $this->displaySub_Reviews(); 
        $reviews = $this->getReviewsById();
        $favorites = $this->checkFavorites($_SESSION['id']);
        $averageRating = $this->avgRatingProduct($id);
        $params = ['titre' => $titrepage, 'product' => $product , 'reviews' => $reviews, 'sub_reviews' => $sub_reviews, 'favorites' => $favorites, 'rating' => $averageRating];
        return AbstractController::render('product', $params);
    }

    public function displaySub_Reviews()
    {
        $reviews = $this->getReviewsById();

        foreach($reviews as $review)
        {
            if(!isset($sub_review[$review->id]))
            {
                $sub_reviews[$review->id] = [];
            }
            $sub_review = $this->getSub_ReviewsById($review->id);
            foreach($sub_review as $value)
            {
                array_push($sub_reviews[$review->id], $value);
            }
        }
        if(!empty($sub_reviews))
        {
            return $sub_reviews;
        }
        else{
            return [];
        }
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

    //// TABLE FAVORITES ////

    public function addFavorites($id)
    {   

        $id_user = $_SESSION['id'];
        $this->setId($id);
        if($this->checkFavorites($id_user)==false)
        {
            $this->setFavorites($id_user);
            header('location:'.$_SERVER["HTTP_REFERER"].'');
        }
        else
        {
            header('location:'.$_SERVER["HTTP_REFERER"].'');
        }
    }

    public function delFavorites($id)
    {   

        $id_user = $_SESSION['id'];
        $this->setId($id);
        if($this->checkFavorites($id_user)==true)
        {
            $this->deleteFavorites($id_user);
            header('location:'.$_SERVER["HTTP_REFERER"].'');
        }
        else
        {
            header('location:'.$_SERVER["HTTP_REFERER"].'');
        }
    }

}
