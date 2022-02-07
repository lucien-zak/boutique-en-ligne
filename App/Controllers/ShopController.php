<?php

namespace App\Controllers;

use App\Models\Model as Model;

class ShopController
{

    public static function home()
    {
        $titrepage = 'test';
        $params = ['titre' => $titrepage];
        return AbstractController::render('index', $params);
    }

    public static function register()
    {
        $titrepage = 'register';
        $params = [ 'titre' => $titrepage];
        return AbstractController::render('register', $params);
    }    

}
