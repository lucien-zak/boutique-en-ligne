<?php

namespace App\Controllers;


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

    public static function login()
    {
        $titrepage = 'login';
        $params = [ 'titre' => $titrepage];
        return AbstractController::render('login', $params);
    }
    
    public static function profil()
    {
        $titrepage = 'profil';
        $params = [ 'titre' => $titrepage];
        return AbstractController::render('profil', $params);
    }

}
