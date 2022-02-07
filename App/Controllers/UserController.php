<?php
namespace App\Controllers;

use App\Models\UserModel ;

class UserController extends UserModel
{
    
    public function register()
    {
        $firstname = htmlspecialchars($_POST['firstname']);
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $passwordRep = htmlspecialchars($_POST['passwordRep']);
        $adress = htmlspecialchars($_POST['adress']);

        $this->setFirstname($firstname)->setname($name)->setEmail($email)->setPassword($password)->setAdress($adress);
        if(empty($this->firstname) || empty($this->name) || empty($this->email) || empty($this->password) || empty($passwordRep) || empty($this->adress))
        {
            $message = "champs vides";
            AbstractController::render('register', $params=['message' =>$message] );
        }
        if($this->checkEmail()==false){
            $message = "email déjà utilisé";
            AbstractController::render('register', $params=['message' =>$message] );    
        }
        else{
            $this->setUser();
            $message = "Bien Inscrit";
            AbstractController::render('login', $params=['message' =>$message] );

        }
    }


}