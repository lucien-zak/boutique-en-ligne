<?php
require '../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

session_start();

use App\Controllers\AbstractController;
use App\Controllers\AdminController;
use App\Controllers\AdressController;
use App\Controllers\CardsController;
use App\Controllers\CartController;
use App\Controllers\CommandController;
use App\Controllers\PayementController;
use App\Controllers\ReviewsController;

use App\Controllers\ProductController;
use App\Controllers\ShopController as Shop;
use App\Controllers\UserController;

$router = new AltoRouter;

$router->map('GET', '/', function () {
    Shop::home();
});

/////////////////////////////////////////////////////////////////////////////

$router->map('GET', '/product/[a:slug]-[i:id]-[i:code]', function ($slug, $id, $code = '') {
    $product = new ProductController;
    $product->product($id, $slug, $code);
});

$router->map('GET', '/product/[a:slug]-[i:id]', function ($slug, $id, ) {
    $product = new ProductController;
    $product->product($id, $slug);
});

$router->map( 'POST', '/product/favorite_add/[i:id]', function($id){
    $favorite = new ProductController;
    $favorite->addFavorites($id);
});

$router->map( 'POST', '/product/favorite_del/[i:id]', function($id){
    $favorite = new ProductController;
    $favorite->delFavorites($id);
});

$router->map( 'POST', '/product/reviewadd/[i:id_product]', function($id_product){
    $review = new ReviewsController;
    $review->NewReview($id_product);
});

$router->map( 'POST', '/product/sub_reviewadd/[i:id_review]', function($id_review){
    $review = new ReviewsController;
    $review->NewSub_review($id_review);
});

$router->map('GET', '/products', function () {
    $product = new ProductController;
    $product->products();
});

$router->map('POST', '/products', function () {
    $product = new ProductController;
    if (!array_key_exists('search', $_REQUEST)) {
        $product->productsbycategory();
    } else {
        $product->productsbysearch();
    }
});

$router->map('GET', '/products/category/[a:category]', function ($category) {
    $product = new ProductController;
    $product->args = $category;
    $product->productsbycategory();
});

/////////////////////////////////////////////////////////////////////////////

$router->map('POST', '/cart/add/[a:slug]-[i:id]', function ($slug, $id) {
    $cart = new CartController;
    $message = 'test';
    $cart->addProduct();
});

$router->map('POST', '/cart/modify/[a:slug]-[i:id]', function ($slug, $id) {
    $cart = new CartController;
    $cart->update_product_cart($slug, $id);
});

/////////////////////////////////////////////////////////////////////////////

$router->map('GET', '/account/login', function () {
    Shop::login();
});

$router->map('POST', '/account/login', function () {
    $model = new UserController; $model->login();
});

/////////////////////////////////////////////////////////////////////////////

$router->map('GET', '/account/register', function () {
    Shop::register();
});

$router->map('POST', '/account/register', function () {
    $model = new UserController; $model->register();
});

/////////////////////////////////////////////////////////////////////////////

$router->map('GET', '/account/profil', function () {
    Shop::profil();
});

$router->map('POST', '/account/profil', function () {
    $model = new UserController; $model->profil();
});

/////////////////////////////////////////////////////////////////////////////

$router->map('GET', '/account/addresses', function () {
    AbstractController::redirect_from_referer();
    $newAddress = new AdressController;
    $newAddress->AllUserAdresses();
});

// $router->map( 'POST', '/account/addresses', function(){
//     $model = new UserController; $model->address();
// });

$router->map('GET', '/account/addresses/add', function () {
    Shop::addressAdd();
});

$router->map('POST', '/account/addresses/add', function () {
    $model = new AdressController; $model->NewAdress();
});

/////////////////////////////////////////////////////////////////////////////

$router->map('GET', '/account/orders', function () {
    Shop::orders();
});

$router->map('POST', '/account/orders', function () {
    $model = new UserController; $model->orders();
});

/////////////////////////////////////////////////////////////////////////////

$router->map('GET', '/account/payements', function () {
    $newAddress = new CardsController;
    $newAddress->AllUserCards();
});

// $router->map( 'POST', '/account/payements', function(){
//     $model = new CardsController; $model->AllUserCards();
// });

$router->map('GET', '/account/payements/add', function () {
    Shop::payements_add();
});

$router->map('POST', '/account/payements/add', function () {
    $model = new CardsController; $model->NewCard();
});

// $router->map( 'GET', '/account/payements/edit', function(){
//     Shop::payements_edit();
// });

$router->map('POST', '/account/payements/edit', function () {
    $model = new UserController; $model->payements_edit();
});
/////////////////////////////////////////////////////////////////////////////

$router->map('GET', '/account/cart', function () {
    $cart = new CartController;
    $cart->cart();
});

//////////////////////////////ADMIN///////////////////////////////////////////////

$router->map('GET', '/admin', function () {
    $admin = new AdminController;
    $admin->home_admin();
});

$router->map('GET', '/admin/products', function () {
    $admin = new AdminController;
    $admin->products_admin();
});

$router->map('GET', '/admin/categories', function () {
    $admin = new AdminController;
    $admin->categories_admin();
});

$router->map('GET', '/admin/category/[i:id]', function ($id) {
    $admin = new AdminController;
    $admin->category_admin($id);
});

$router->map('POST', '/admin/subcategory/modify/[i:id]', function ($id) {
    $product = new AdminController;
    $product->category_admin_modify($id);
});






$router->map('GET', '/admin/product/modify/[a:slug]-[i:id]', function ($slug, $id) {
    $product = new AdminController;
    $product->product_admin($slug, $id);
});

$router->map('POST', '/admin/product/update/[a:slug]-[i:id]', function ($slug, $id) {
$product = New AdminController;
$product->product_admin_update($slug,$id);
echo 'Produits modifiés';
echo '<a href="/admin/products">Retour aux produits</a>';
});

$router->map('GET', '/admin/product/delete/[a:slug]-[i:id]', function ($slug, $id) {
    $product = New AdminController;
    $product->product_admin_delete($slug,$id);
    echo 'Produits supprimé';
    echo '<a href="/admin/products">Retour aux produits</a>';
    });

/////////////////////////////////////////////////////////////////////////////

$router->map('POST|GET', '/order/delivrery', function () {
    AbstractController::is_connected();
    $command = new CommandController;
    $command->delivery_choice();
});

$router->map('POST', '/order/verification', function () 

    {
    if ($_REQUEST['typedelivery'] == 'Mondial Relay') {
        $command = New CommandController;
        $command->delivery_setrelay();
    }
    if ($_REQUEST['typedelivery'] == 'Home') {
        dump($_REQUEST);
    }
});

$router->map('POST|GET', '/order/resume', function () {
    AbstractController::is_connected();
    $command = new CommandController;
    $command->delivery_choice();
});




/////////////////////////////////////////////////////////////////////////////

$router->map('GET', '/payement', function () {
    $model = new PayementController; $model->setStripe();
});

// $router->map( 'POST', '/account/payements/edit', function(){
//     $model = new UserController; $model->payements_edit();
// });

/////////////////////////////////////////////////////////////////////////////

$router->map('GET', '/account', function () {
    Shop::account();
});

/////////////////////////////////////////////////////////////////////////////
$router->map('GET', '/rate', function () {
    Shop::rate();
});

$router->map('GET', '/error', function () {
    Shop::error();
});

$router->map('GET', '/logout', function () {
    $user = new UserController;
    $user->logout();
});

/////////////////////////////////////////////////////////////////////////////

// match current request url
$match = $router->match();

// call closure or throw 404 status
if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // no route was matched
    Shop::error();
}