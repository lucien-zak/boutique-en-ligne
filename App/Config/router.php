<?php 
require '../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

session_start();

use App\Controllers\ProductController;
use App\Controllers\ShopController as Shop;
use App\Controllers\UserController;
use App\Controllers\CardsController;
use App\Controllers\AdressController;
use App\Controllers\CartController;

$router = new AltoRouter;

$router->map( 'GET', '/', function(){
    Shop::home();
});

/////////////////////////////////////////////////////////////////////////////


$router->map( 'GET', '/product/[a:slug]-[i:id]', function($slug, $id){
    $product = new ProductController;
	$product->product($id, $slug);
});

$router->map( 'POST', '/product/[a:slug]-[i:id]', function($slug, $id){
    $product = new ProductController;
    $cart = new CartController;
    $cart->addProduct();
	$product->product($id, $slug);
});


$router->map( 'GET', '/products', function(){
    $product = new ProductController;
	$product->products();
});

$router->map( 'POST', '/products', function(){
	$product = new ProductController;
	if (!array_key_exists('search', $_REQUEST)) {
        $product->productsbycategory();
    }
	else {
		$product->productsbysearch();
	}
});

$router->map( 'GET', '/products/category/[a:category]', function($category){
    $product = new ProductController;
    $product->args = $category;
    $product->productsbycategory();
});

/////////////////////////////////////////////////////////////////////////////





/////////////////////////////////////////////////////////////////////////////



$router->map( 'GET', '/account/login', function(){
    Shop::login();
});

$router->map( 'POST', '/account/login', function(){
    $model = new UserController; $model->login();
});

/////////////////////////////////////////////////////////////////////////////

$router->map( 'GET', '/account/register', function(){
    Shop::register();
});

$router->map( 'POST', '/account/register', function(){
	$model = new UserController; $model->register();
});

/////////////////////////////////////////////////////////////////////////////

$router->map( 'GET', '/account/profil', function(){
    Shop::profil();
});

$router->map( 'POST', '/account/profil', function(){
    $model = new UserController; $model->profil();
});

/////////////////////////////////////////////////////////////////////////////

$router->map( 'GET', '/account/addresses', function(){
    $newAddress = new AdressController;
    $newAddress->AllUserAdresses();
});

// $router->map( 'POST', '/account/addresses', function(){
//     $model = new UserController; $model->address();
// });

$router->map( 'GET', '/account/addresses/add', function(){
    Shop::addressAdd();
});

$router->map( 'POST', '/account/addresses/add', function(){
    $model = new AdressController; $model->NewAdress();
});

/////////////////////////////////////////////////////////////////////////////

$router->map( 'GET', '/account/orders', function(){
    Shop::orders();
});

$router->map( 'POST', '/account/orders', function(){
    $model = new UserController; $model->orders();
});

/////////////////////////////////////////////////////////////////////////////

$router->map( 'GET', '/account/payements', function(){
    $newAddress = new CardsController;
    $newAddress->AllUserCards();
});

// $router->map( 'POST', '/account/payements', function(){
//     $model = new CardsController; $model->AllUserCards();
// });

$router->map( 'GET', '/account/payements/add', function(){
    Shop::payements_add();
});

$router->map( 'POST', '/account/payements/add', function(){
    $model = new CardsController; $model->NewCard();
});

// $router->map( 'GET', '/account/payements/edit', function(){
//     Shop::payements_edit();
// });

$router->map( 'POST', '/account/payements/edit', function(){
    $model = new UserController; $model->payements_edit();
});
/////////////////////////////////////////////////////////////////////////////

$router->map( 'GET', '/account/cart', function(){
    $cart = new CartController; 
    $cart->cart();
});

/////////////////////////////////////////////////////////////////////////////

$router->map( 'GET', '/account', function(){
    Shop::account();
});

/////////////////////////////////////////////////////////////////////////////
$router->map( 'GET', '/rate', function(){
    Shop::rate();
});

$router->map( 'GET', '/error', function(){
    Shop::error();
});

$router->map( 'GET', '/logout', function(){
    Shop::logout();
});

/////////////////////////////////////////////////////////////////////////////

// match current request url
$match = $router->match();

// call closure or throw 404 status
if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
    Shop::error();
}


?>