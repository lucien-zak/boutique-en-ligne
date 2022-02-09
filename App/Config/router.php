<?php 
require '../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

session_start();

use App\Controllers\ProductController;
use App\Controllers\ShopController as Shop;
use App\Controllers\UserController;

$router = new AltoRouter;

$router->map( 'GET', '/', function(){
    Shop::home();
});

/////////////////////////////////////////////////////////////////////////////


$router->map( 'GET', '/product/[i:id]', function($id){
    $product = new ProductController;
	$product->product($id);
});

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
    Shop::address();
});

$router->map( 'POST', '/account/addresses', function(){
    $model = new UserController; $model->address();
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
    Shop::payements();
});

$router->map( 'POST', '/account/payements', function(){
    $model = new UserController; $model->payements();
});

$router->map( 'GET', '/account/payements/add', function(){
    Shop::payements_add();
});

$router->map( 'POST', '/account/payements/add', function(){
    $model = new UserController; $model->payements_add();
});

$router->map( 'GET', '/account/payements/edit', function(){
    Shop::payements_edit();
});

$router->map( 'POST', '/account/payements/edit', function(){
    $model = new UserController; $model->payements_edit();
});

/////////////////////////////////////////////////////////////////////////////

$router->map( 'GET', '/account', function(){
    Shop::account();
});

/////////////////////////////////////////////////////////////////////////////

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