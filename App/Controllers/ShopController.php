<?php

namespace App\Controllers;
class ShopController
{

    public static function home()
    {
        $titrepage = 'Accueil';
        $params = ['titre' => $titrepage];
        return AbstractController::render('index', $params);
    }

    //
    //  ACCOUNT
    //

    public static function account()
    {
        $titrepage = 'Account';
        $params = ['titre' => $titrepage];
        return AbstractController::render('account', $params);
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

    //
    // OTHER
    //

    public static function error()
    {
        $titrepage = 'Error 404';
        $params = ['titre' => $titrepage];
        return AbstractController::render('error', $params);
    }

}
?>