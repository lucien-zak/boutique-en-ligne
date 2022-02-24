<?php

namespace App\Controllers;

class AbstractController
{

    public static function render($name, $params = [])
    {
        require "../App/Views/header.view.php";
        require "../App/Views/$name.view.php";
        require "../App/Views/footer.view.php";

    }

    public static function message($code)
    {
        switch ($code) {
            case 0:
                $message = '';
                break;
            case 1:
                $message = 'Produit ajouté au panier';
                break;
            case 2:
                $message = 'Wesh Fatima tu fous quoi ?';
                break;
            default :
                $message = "";
                header('location:/error');
                break;
        }
        return $message;
    }

    public static function is_connected(){
        if (isset($_SESSION['id']) ){
            unset($_SESSION['continue_path']);
        }
        else {
            $_SESSION['continue_path'] = $_SERVER["HTTP_REFERER"];
            header('location:/account/login');
        }
    }


}
