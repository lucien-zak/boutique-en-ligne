<?php 
require '../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use App\Controllers\ProductController;
use App\Controllers\ShopController as Shop;
use App\Controllers\UserController;

$router = new AltoRouter;

$router->map( 'GET', '/', function(){
    Shop::home();
});


$router->map( 'GET', '/register', function(){
    Shop::register();
});

$router->map( 'POST', '/register', function(){
	$model = new UserController; $model->register();
});

$router->map( 'GET', '/product/[i:id]', function($id){
    $product = new ProductController;
	$product->product($id);
});

$router->map( 'GET', '/login', function(){
    Shop::login();
});

$router->map( 'POST', '/login', function(){$model = new UserController; $model->login();
});

$router->map( 'GET', '/account', function(){
    Shop::account();
});

$router->map( 'GET', '/error', function(){
    Shop::error();
});

// match current request url
$match = $router->match();

// call closure or throw 404 status
if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
    Shop::error();
}


// match current request url
$match = $router->match();



// call closure or throw 404 status
if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
	echo '404';

	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}


?>