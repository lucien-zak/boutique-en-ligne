<?php
namespace App\Controllers;

use App\Models ;

class RegisterController extends UserModel
{


    public function setUserContr()  
    {     
        $result = new UserModel;
        $firstname = "test2";
        $name = "test2";
        $email = "test2";
        $password = "test2";
        $adress = "test2";

        $result->setUser($firstname, $name, $email, $password, $adress);
    }

    public static function register()
    {
        $titrepage = 'register';
        $firstname = "test2";
        $name = "test2";
        $email = "test2";
        $password = "test2";
        $adress = "test2";
        $result = $this->setUser($firstname, $name, $email, $password, $adress);
        $params = ['css' => $result, 'titre' => $titrepage];
        $params = ['css' => $result, 'titre' => $titrepage];
        return AbstractController::render('register', $params);
    }


}