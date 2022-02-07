<?php
namespace App\Controllers;

use App\Models\UserModel ;

class UserController extends UserModel
{
    
    public function register()
    {
        $this->setFirstname($_POST['firstname'])->setname($_POST['name'])->setEmail($_POST['email'])->setPassword($_POST['password'])->setAdress($_POST['adress']);
        $this->setUser();
    }


}