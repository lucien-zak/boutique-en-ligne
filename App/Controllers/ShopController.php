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
        $titrepage = 'Register';
        $params = [ 'titre' => $titrepage];
        return AbstractController::render('register', $params);
    }    

    public static function login()
    {
        $titrepage = 'Connexion';
        $params = [ 'titre' => $titrepage];
        return AbstractController::render('login', $params);
    }
    
    public static function rate()
    {
        $titrepage = 'rate';
        $params = [ 'titre' => $titrepage];
        return AbstractController::render('rate', $params);
    }

    public static function profil()
    {
        $titrepage = 'Profil';
        $params = [ 'titre' => $titrepage];
        return AbstractController::render('account.profil', $params);
    }

    

    public static function addressAdd()
    {
        $titrepage = 'Ajout d\'une Adresse';
        $params = [ 'titre' => $titrepage];
        return AbstractController::render('account.address.add', $params);
    }

    public static function orders()
    {
        $titrepage = 'Vos Commandes';
        $params = [ 'titre' => $titrepage];
        return AbstractController::render('account.orders', $params);
    }

    public static function payements()
    {
        $titrepage = 'Vos Paiements';
        $params = [ 'titre' => $titrepage];
        return AbstractController::render('account.payements', $params);
    }

    public static function payements_add()
    {
        $titrepage = 'Ajout d\'une Carte Bancaire';
        $params = [ 'titre' => $titrepage];
        return AbstractController::render('account.payements.add', $params);
    }

    public static function payements_edit()
    {
        $titrepage = 'Modification d\'une Carte Bancaire';
        $params = [ 'titre' => $titrepage];
        return AbstractController::render('account.payements.edit', $params);
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

    public static function logout()
    {
        // $titrepage = 'logout';
        // $params = ['titre' => $titrepage];
        // return AbstractController::render('logout', $params);
        session_destroy();
    }
}
?>