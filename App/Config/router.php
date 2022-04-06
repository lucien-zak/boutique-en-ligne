<?php
require '../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

session_start();

use App\Controllers\AbstractController;
use App\Controllers\AdminController;
use App\Controllers\AdressController;
use App\Controllers\CartController;
use App\Controllers\CommandController;
use App\Controllers\ProductController;
use App\Controllers\ReviewsController;
use App\Controllers\ShopController as Shop;
use App\Controllers\UserController;
use App\Models\CommandModel;

$user = new UserController();
$user->remember();

$router = new AltoRouter;

$router->map('GET', '/', function () {
    $product = new ProductController;
    $product->homeItems();
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

$router->map('POST', '/product/favorite_add/[i:id]', function ($id) {
    $favorite = new ProductController;
    $favorite->addFavorites($id);
});

$router->map('POST', '/product/favorite_del/[i:id]', function ($id) {
    $favorite = new ProductController;
    $favorite->delFavorites($id);
});

$router->map('POST', '/product/reviewadd/[i:id_product]', function ($id_product) {
    AbstractController::is_connected();
    $review = new ReviewsController;
    $review->NewReview($id_product);
});

$router->map('POST', '/product/sub_reviewadd/[i:id_review]', function ($id_review) {
    AbstractController::is_connected();
    $review = new ReviewsController;
    $review->NewSub_review($id_review);
});

$router->map('POST', '/product/review_report/[i:id]', function ($id) {
    $review = new ReviewsController;
    $review->updateReport($id);
});

$router->map('GET', '/products', function () {
    $product = new ProductController;
    $product->products();
});

$router->map('POST', '/products', function () {
    $product = new ProductController;
    dump($_REQUEST);
    if ($_REQUEST['search'] == "") {
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

$router->map('POST', '/account/adress/[a:type]', function ($type) {
    $adress = new AdressController; $adress->currentAdress($type);
});

$router->map('POST', '/account/adress/update/[a:type]', function ($type) {
    $adress = new AdressController; $adress->AdressModify($type);
});

/////////////////////////////////////////////////////////////////////////////

$router->map('GET', '/account/orders', function () {
    $command = new CommandController;
    $commands = $command->allUserCommands();
    dump($commands);
});


/////////////////////////////////////////////////////////////////////////////

$router->map('GET', '/account/cart', function () {
    $cart = new CartController;
    $cart->cart();
});


$router->map('GET', '/order/delivrery', function () {
    AbstractController::is_connected();
    $command = new CommandController;
    $command->delivery_choice();
});

$router->map('POST', '/order/verification', function () {
    if ($_REQUEST['typedelivery'] == 'Mondial Relay') {
        $command = new CommandController;
        $command->delivery_setrelay();
    }
});

// $router->map('POST|GET', '/order/resume', function () {
//     $resume = new CommandController;
//     $resume->resumeOrder();
// });

/////////////////////////////////////////////////////////////////////////////

$router->map('POST', '/payement', function () {
    $resume = new CommandController;
    $resume->resumeOrder();
});

$router->map('GET', '/payement/resume', function () {
    $resume = new CommandController;
    $resume->newCommand();
});

$router->map('POST ', '/payement/charge', function () {
    $model = new CommandController; $model->setStripe2();  
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

if (isset($_SESSION['user']['email']) && $_SESSION['user']['email'] == 'admin@admin.fr' )
{
    require "../App/Config/RouterAdmin.php";
}



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