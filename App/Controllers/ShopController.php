<?php

namespace App\Controllers;

use App\Models\Model as Model;

class ShopController
{

    public static function home()
    {
        $titrepage = 'test';
        $result = New Model;
        $result = $result->findAll();
        $params = ['css' => $result, 'titre' => $titrepage];
        return AbstractController::render('index', $params);
    }

    
}
