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
        
    }


}