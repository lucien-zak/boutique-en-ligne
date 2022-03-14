<?php

namespace App\Controllers;

use App\Models\ProductModel;

class AdminController extends ProductModel
{

    public function home_admin(){
        $titrepage = 'Panel Admin';
        $params = [ 'titre' => $titrepage];
        return AbstractController::render('admin', $params);
    }

    public function products_admin(){
        $titrepage = 'Panel Admin produits';
        $products = $this->getProducts();
        $this->table = 'artists';
        $listartist = $this->getAll();
        $this->table = 'categories';
        $allcategory = $this->getCategorywithSub();
        $params = ['titre' => $titrepage,'products' => $products,'artists' => $listartist, 'allcategory' => $allcategory];
        return AbstractController::render('admin.products', $params);
    }

    public function product_admin($slug,$id){
        $titrepage = 'Panel Admin produit';
        $this->table = 'artists';
        $listartist = $this->getAll();
        $this->table = 'categories';
        $allcategory = $this->getCategorywithSub();
        $product = $this->setId($id)->setSlug($slug)->getProduct();
        $params = [ 'titre' => $titrepage, 'product' => $product, 'artists' => $listartist, 'allcategory' => $allcategory];
        return AbstractController::render('admin.product', $params);
    }

    public function product_admin_new(){
        
        $titrepage = 'Produit';
        $category = explode("/", $_REQUEST['category']);
        $this->setName(htmlspecialchars($_REQUEST['name']))
        ->setDescription(htmlspecialchars($_REQUEST['description']))
        ->setPrice(htmlspecialchars($_REQUEST['price']))
        ->setRelease(htmlspecialchars($_REQUEST['released']))
        ->setStock(htmlspecialchars($_REQUEST['stock']))
        ->setId_artist(htmlspecialchars($_REQUEST['artist']))
        ->setId_category($category[0])
        ->setId_sub_category($category[1])
        ->setSlug(substr(str_replace(" ","",htmlspecialchars($_REQUEST['name'])),0,4))
        ->insert_product();
        $filename = substr(str_replace(" ","",htmlspecialchars($_REQUEST['name'])),0,4).'-'.$this->pdo->lastInsertId();
        AbstractController::upload_img_products($filename);

        // dump($category);
        // dump($product);
        // // $sub_reviews = $this->displaySub_Reviews();
        // $reviews = $this->getReviewsById();
        // if(!empty($_SESSION['user']))
        // {
        //     $favorites = $this->checkFavorites($_SESSION['user']['id']);

        // }
        // else{
        //     $favorites = false;
        // }
        // $averageRating = $this->avgRatingProduct($id);
        // $params = ['titre' => $titrepage, 'css' => 'product', 'product' => $product , 'reviews' => $reviews, 'sub_reviews' => $sub_reviews, 'favorites' => $favorites, 'rating' => $averageRating];
        
    
    }

    public function product_admin_update($slug, $id)
    {
        $category = explode("/",$_REQUEST['category']);
        $this->setId($id)
        ->setname($_REQUEST['name'])
        ->setDescription($_REQUEST['description'])
        ->setPrice($_REQUEST['price'])
        ->setRelease($_REQUEST['released'])
        ->setId_artist($_REQUEST['artist'])
        ->setId_category($category[0])
        ->setId_sub_category($category[1])
        ->setStock($_REQUEST['stock']);
        $this->update_product();
    }

    public function product_admin_add()
    {
        $category = explode("/",$_REQUEST['catgory']);
        $this->setname($_REQUEST['name'])
        ->setDescription($_REQUEST['description'])
        ->setPrice($_REQUEST['price'])
        ->setRelease($_REQUEST['released'])
        ->setId_artist($_REQUEST['artist'])
        ->setId_category($category[0])
        ->setId_sub_category($category[1])
        ->setStock($_REQUEST['stock']);
        $this->add_product();
    }

    public function product_admin_delete($slug,$id){
        $this->setSlug($slug)->setId($id);
        $this->delete_product();
    }

    public function categories_admin(){
        $titrepage = 'Panel Admin Catégorie';
        $this->table = 'categories';
        $allcategory = $this->getAll();
        $params = [ 'titre' => $titrepage, 'allcategory' => $allcategory];
        return AbstractController::render('admin.categories', $params);
    }

    public function category_admin($id){
        $titrepage = 'Panel Admin Catégorie';
        $this->table = 'categories';
        $categories = $this->getAll();
        $allcategory = $this->getCategorywithSub();
        $params = [ 'titre' => $titrepage, 'id' => $id, 'allcategory' => $allcategory, 'categories' => $categories];
        return AbstractController::render('admin.category', $params);
    }

    public function category_admin_update($id, $category,$sub_category){        
        if ($_REQUEST['action'] == 'Modifier'){
            $this->update_subcategory($category, $sub_category, $id);
        }
        if ($_REQUEST['action'] == 'Supprimer') {
            $this->delete_subcategory($id);        
        }
        // $titrepage = 'Panel Admin Catégorie';
        // $this->table = 'categories';
        // $allcategory = $this->getCategorywithSub();
        // $params = [ 'titre' => $titrepage, 'id' => $id, 'allcategory' => $allcategory];
        // return AbstractController::render('admin.category', $params);
    }


    public function category_admin_delete($id)
    {        
        $titrepage = 'Panel Admin Catégorie';
        $this->table = 'categories';
        $categories = $this->getAll();
        $allcategory = $this->getCategorywithSub();
        $params = [ 'titre' => $titrepage, 'id' => $id, 'allcategory' => $allcategory, 'categories' => $categories];
        return AbstractController::render('admin.confirmdel.category', $params);
    }

    public function category_admin_delete_confirm($id)
    {        
        return $this->delete_category($id);
    }

    public function category_admin_add($category)
    {        
        return $this->insert_category($category);
    }

    public function subcategory_admin_add($id,$subcategory)
    {        
        return $this->insert_subcategory($id,$subcategory);
    }







        
    

    



}

