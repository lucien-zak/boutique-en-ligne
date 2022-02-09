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
            // $message = "champs vides";'message' =>$message
            AbstractController::render('register', $params=['titre' =>$titrepage ] );
            exit();
        }
        if($this->checkEmail()==false){
            // $message = "email déjà utilisé";'message' =>$message
            AbstractController::render('register', $params=['titre' =>$titrepage ] );    
            exit();
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // $message = "L'adresse email est considérée comme invalide.";'message' =>$message
            AbstractController::render('register', $params=['titre' =>$titrepage ] );    
            exit();
        }
        elseif($password!==$passwordRep){
            // $message = "Les mots de passe ne sont pas identiques";'message' =>$message
            AbstractController::render('register', $params=['titre' =>$titrepage ] );    
            exit();
        }
        else{
            $this->setUser();
            // $message = "Bien Inscrit";'message' =>$message
            AbstractController::render('login', $params=['titre' =>$titrepage ] );
        }
    }

    //fonction qui vérifie que l'utilisateur est bien inscrit
    public function login()
    {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $passwordbdd = $this->checkPassword($email)->fetch(PDO::FETCH_ASSOC);
        $titrepage = 'login';


        if(empty($email) || empty($password))
        {
            // $message = "champs vides";'message' =>$message
            AbstractController::render('login', $params=['titre' =>$titrepage ] );
            exit();
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL) )
        {
            // $message = "L'adresse email est considérée comme invalide.";'message' =>$message
            AbstractController::render('login', $params=['titre' =>$titrepage ] );
            exit();
        } 
        elseif($this->checkEmail()==false)
        {
            if(!password_verify($password, $passwordbdd['password']))
            {
                // $message = "mot de passe incorrect";'message' =>$message
                AbstractController::render('login', $params=['titre' =>$titrepage] );
                exit();
            }
            
            elseif($this->checkLogs()->rowCount() == 0)
            {
                // $message = "Email ou mot de passe incorrect";'message' =>$message
                AbstractController::render('login', $params=['titre' =>$titrepage ] );
            }
        }
        else 
        {
            $this->setEmail($email)->setPassword($passwordbdd['password']);
            session_start();
            $user = $this->checkLogs()->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION['id'] = $user['0']['id'];
            $_SESSION['firstname'] = $user['0']['firstname'];
            $_SESSION['name'] = $user['0']['name'];
            $_SESSION['email'] = $user['0']['email'];
            $_SESSION['adress'] = $user['0']['adress'];

            // $message = "okok";'message' =>$message
            AbstractController::render('profil', $params=['titre' =>'profil' ] );
        }  
    }

    public function profil()
    {
        session_start();
        $id = $_SESSION['id'];
        $firstname = htmlspecialchars($_POST['firstname']);
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $passwordhashed = password_hash($password, PASSWORD_DEFAULT); 
        $passwordRep = htmlspecialchars($_POST['passwordRep']);
        $adress = htmlspecialchars($_POST['adress']);
        $titrepage = 'profil';

        $this->setFirstname($firstname)->setName($name)->setEmail($email)->setPassword($passwordhashed)->setAdress($adress)->setId($id);
        
        if(empty($this->firstname) || empty($this->name) || empty($this->email) || empty($this->password) || empty($passwordRep) || empty($this->adress))
        {
            // $message = "champs vides";'message' =>$message
            AbstractController::render('profil', $params=['titre' =>$titrepage] );
            exit();
        }

        elseif($password!==$passwordRep)
        {
            // $message = "champs vides";'message' =>$message
            AbstractController::render('profil', $params=['titre' =>$titrepage ] );
        }

        elseif($this->checkEmail()==false){
            $emailbdd = $this->getInfosById($id)->fetch(PDO::FETCH_ASSOC);
            $emailbdd['email'];
            if($email == $_SESSION['email']){   
                $this->updateUser();
                // $message = "Bien changé";'message' =>$message
                AbstractController::render('index', $params=['titre' =>$titrepage ] );
                exit();
            }
            else{
                // $message = "email déjà utilisé";'message' =>$message
                AbstractController::render('profil', $params=['titre' =>$titrepage ] );    
                exit();
            } 
        }

        else{
            $this->updateUser();
            // $message = "Bien changé";'message' =>$message
            AbstractController::render('index', $params=['titre' =>$titrepage ] );
        }
    }

}