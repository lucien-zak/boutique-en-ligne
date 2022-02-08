<?php
namespace App\Controllers;

use App\Models\UserModel ;
use PDO;

class UserController extends UserModel
{
    
    //fonction qui permet de s'inscrire et qui définie les conditions a remplir
    public function register()
    {
        //sécurisation des $POST
        $firstname = htmlspecialchars($_POST['firstname']);
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $passwordhashed = password_hash($password, PASSWORD_DEFAULT);
        $passwordRep = htmlspecialchars($_POST['passwordRep']);
        $adress = htmlspecialchars($_POST['adress']);
        $titrepage = 'register';
        //Ici je set mes instance  pour pouvoir les réutiliser. 
        $this->setFirstname($firstname)->setName($name)->setEmail($email)->setPassword($passwordhashed)->setAdress($adress);
        if(empty($this->firstname) || empty($this->name) || empty($this->email) || empty($this->password) || empty($passwordRep) || empty($this->adress))
        {
            $message = "champs vides";
            AbstractController::render('register', $params=['titre' =>$titrepage ,'message' =>$message] );
            exit();
        }
        elseif($this->checkEmail()==false){
            $message = "email déjà utilisé";
            AbstractController::render('register', $params=['titre' =>$titrepage ,'message' =>$message] );    
            exit();
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = "L'adresse email est considérée comme invalide.";
            AbstractController::render('register', $params=['titre' =>$titrepage ,'message' =>$message] );    
            exit();
        }
        elseif($password!==$passwordRep){
            $message = "Les mots de passe ne sont pas identiques";
            AbstractController::render('register', $params=['titre' =>$titrepage ,'message' =>$message] );    
            exit();
        }
        else{
            $this->setUser();
            $message = "Bien Inscrit";
            AbstractController::render('login', $params=['titre' =>$titrepage ,'message' =>$message] );
        }
    }

    //fonction qui vérifie que l'utilisateur est bien inscrit
    public function login()
    {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $passwordbdd = $this->checkPassword($email)->fetch(PDO::FETCH_ASSOC);
        $titrepage = 'login';
        
        $this->setEmail($email)->setPassword($passwordbdd['password']);

        if(empty($this->email) || empty($this->password))
        {
            $message = "champs vides";
            AbstractController::render('login', $params=['titre' =>$titrepage ,'message' =>$message] );
            exit();
        }

        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) )
        {
            $message = "L'adresse email est considérée comme invalide.";
            AbstractController::render('login', $params=['titre' =>$titrepage ,'message' =>$message] );
        }    
        elseif($this->checkLogs()->rowCount() == 0)
        {
            $message = "Email ou mot de passe incorrect";
            AbstractController::render('login', $params=['titre' =>$titrepage ,'message' =>$message] );
        }
        elseif(!password_verify($password, $passwordbdd['password']))
        {
            $message = "mot de passe incorrect";
            AbstractController::render('login', $params=['message' =>$message] );
            exit();
        } 
        else 
        {
            session_start();
            $user = $this->checkLogs()->fetchAll(PDO::FETCH_ASSOC);
            
            $_SESSION['id'] = $user['0']['id'];
            $_SESSION['firstname'] = $user['0']['firstname'];
            $_SESSION['name'] = $user['0']['name'];
            $_SESSION['email'] = $user['0']['email'];
            $_SESSION['adress'] = $user['0']['adress'];

            $message = "okok";
            // AbstractController::render('index', $params=['titre' =>'index' ,'message' =>$message] );
        }  
    }

    public function update()
    {
        $firstname = htmlspecialchars($_POST['firstname']);
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $passwordRep = htmlspecialchars($_POST['passwordRep']);
        $adress = htmlspecialchars($_POST['adress']);


    }

}