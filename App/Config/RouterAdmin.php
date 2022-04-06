<?php

use App\Controllers\AdminController;
use App\Controllers\CommandController;

//////////////////////////////ADMIN///////////////////////////////////////////////

$router->map('GET', '/admin', function () {
    $admin = new AdminController();
    $admin->home_admin();
});

$router->map('GET', '/admin/users', function () {
    $admin = new AdminController();
    $admin->users_admin();
});

$router->map('GET', '/admin/users/delete/[i:id]', function ($id) {
    $admin = new AdminController();
    $admin->users_admin_delete($id);
});





$router->map('GET', '/admin/commands', function () {
    $admin = new AdminController();
    $admin->commands_admin();
});

$router->map('POST', '/admin/commands/update/[i:num]', function ($num) {
    $admin = new CommandController();
    $admin->updateStatutCommand($num,$_POST['statut']);
    header('location:/admin/commands');
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

$router->map('GET', '/admin/category/delete/[i:id]', function ($id) {
    $admin = new AdminController;
    $admin->category_admin_delete_confirm($id);
});

$router->map('POST', '/admin/category/add', function () {
    $admin = new AdminController;
    $category = htmlspecialchars($_REQUEST['category']);
    $admin->category_admin_add($category);
    echo 'Catégorie ajoutée';
    echo "<a href='/admin'>Retour à l'admin</a>";
});

$router->map('POST', '/admin/sub_category/add', function () {
    $admin = new AdminController;
    $id = htmlspecialchars($_REQUEST['category']);
    $subcategory = htmlspecialchars($_REQUEST['subcategory']);
    $admin->subcategory_admin_add($id, $subcategory);
    echo 'Sous-catégorie ajoutée';
    echo "<a href='/admin'>Retour à l'admin</a>";
});

$router->map('POST', '/admin/subcategory/modify/[i:id]', function ($id) {
    $product = new AdminController;
    $category = htmlspecialchars($_REQUEST['category']);
    $sub_category = htmlspecialchars($_REQUEST[$id]);
    $product->category_admin_update($id, $category, $sub_category);
    echo 'Produit modifié';
    echo "<a href='/admin'>Retour à l'admin</a>";
});

$router->map('GET', '/admin/product/modify/[a:slug]-[i:id]', function ($slug, $id) {
    $product = new AdminController;
    $product->product_admin($slug, $id);
});

$router->map('POST', '/admin/product/update/[a:slug]-[i:id]', function ($slug, $id) {
    $product = new AdminController;
    $product->product_admin_update($slug, $id);
    header('location:/admin/products');
});

$router->map('POST', '/admin/product/add', function () {
    $admin = new AdminController;
    $admin->product_admin_new();
});

$router->map('GET', '/admin/product/delete/[a:slug]-[i:id]', function ($slug, $id) {
    $product = new AdminController;
    $product->product_admin_delete($slug, $id);
    header('location:/admin/products');
});

$router->map('GET', '/admin/reviews', function () {
    $product = new AdminController;
    $product->reviews_admin();
    
});

/////////////////////////////////////////////////////////////////////////////


?>