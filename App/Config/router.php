<?php 
require '../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use App\Controllers\ShopController as Shop;

$router = new AltoRouter;

$router->map( 'GET', '/', function(){
    Shop::home();
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


?>
