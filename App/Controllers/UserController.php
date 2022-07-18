<?php

namespace App\Controllers;

use App\Models\CommandModel;
use App\Models\UserModel;
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
        $profil_img = "user-default";
        $titrepage = 'register';

        //Ici je set mes instance  pour pouvoir les réutiliser. 
        $this->setFirstname($firstname)->setName($name)->setEmail($email)->setPassword($passwordhashed)->setProfil_img($profil_img);
        if (empty($this->firstname) || empty($this->name) || empty($this->email) || empty($this->password) || empty($passwordRep)) {
            $message = "Vous devez remplir le formulaire pour pouvoir continuer.";
            AbstractController::render('register', $params = ['titre' => $titrepage, 'css' => 'account', 'alert' => AbstractController::alert(2, $message)]);
            exit();
        }
        if ($this->checkEmail() == false) {
            $message = "L'email inscrite est déjà attribué à un compte.";
            AbstractController::render('register', $params = ['titre' => $titrepage, 'css' => 'account', 'alert' => AbstractController::alert(2, $message)]);
            exit();
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = "L'adresse email est considérée comme invalide.";
            AbstractController::render('register', $params = ['titre' => $titrepage, 'css' => 'account', 'alert' => AbstractController::alert(2, $message)]);
            exit();
        } elseif ($password !== $passwordRep) {
            $message = "Les mots de passe doivent être identique.";
            AbstractController::render('register', $params = ['titre' => $titrepage, 'css' => 'account', 'alert' => AbstractController::alert(2, $message)]);
            exit();
        } else {
            $this->setUser();
            $message = "Félicitation, vous avez bien été inscrit.";
            AbstractController::render('login', $params = ['titre' => $titrepage, 'css' => 'account', 'alert' => AbstractController::alert(0, $message)]);
        }
    }

    //fonction qui vérifie que l'utilisateur est bien inscrit
    public function login()
    {
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $passwordbdd = $this->checkPassword($email)->fetch(PDO::FETCH_ASSOC);
            $titrepage = 'login';
    
            $this->setEmail($email);
    
            if (!empty($email) && !empty($password)) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    if ($this->checkEmail() == false) {
                        if (password_verify($password, $passwordbdd['password']) == true) {
                            $this->setPassword($passwordbdd['password']);
                            $user = $this->checkLogs()->fetchAll(PDO::FETCH_ASSOC);
    
                            $_SESSION['user']['id'] = $user['0']['id'];
                            $_SESSION['user']['firstname'] = $user['0']['firstname'];
                            $_SESSION['user']['name'] = $user['0']['name'];
                            $_SESSION['user']['email'] = $user['0']['email'];
                            $_SESSION['user']['profil_img'] = $user['0']['profil_img'];
                            if (isset($_SESSION["continue_path"])){
                                $url = $_SESSION["continue_path"];
                                header("location:".$url."");
                                exit();
                            }
                            
                            if(isset($_POST['remember'])) {
                                setcookie('auth', $user['0']['id'] . '-----' . sha1($user[0]['email'] . $user[0]['password']), time() + 3600 * 24 * 3, '/', 'boutique', false, true);
                            }
    
                            header('Location:/account');
                            exit();
                        } else {
                            $message = "Votre adresse-email ou votre mot de passe est incorrect.";
                            AbstractController::render('login', $params = ['titre' => $titrepage, 'css' => 'account', 'alert' => AbstractController::alert(2, $message)]);
                            exit();
                        }
                    } else {
                        $message = "Votre adresse-email ou votre mot de passe est incorrect.";
                        AbstractController::render('login', $params = ['titre' => $titrepage, 'css' => 'account', 'alert' => AbstractController::alert(2, $message)]);
    
                        exit();
                    }
                } else {
                    $message = "Votre adresse-email doit respecter le format : example@example.com.";
                    AbstractController::render('login', $params = ['titre' => $titrepage, 'css' => 'account', 'alert' => AbstractController::alert(2, $message)]);
                    exit();
                }
            } else {
                $message = "Vous devez remplir le formulaire pour pouvoir continuer.";
                AbstractController::render('login', $params = ['titre' => $titrepage, 'css' => 'account', 'alert' => AbstractController::alert(2, $message)]);
                exit();
            }
        
    }

    public function profil()
    {
        $id = $_SESSION['user']['id'];
        $firstname = htmlspecialchars($_POST['firstname']);
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $passwordhashed = password_hash($password, PASSWORD_DEFAULT);
        $passwordRep = htmlspecialchars($_POST['passwordRep']);


        ////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////
        $fileName = $_FILES['picture']['name'];
        $fileTmpName = $_FILES['picture']['tmp_name'];
        $fileSize = $_FILES['picture']['size'];
        $fileError = $_FILES['picture']['error'];
        $allowed = array('jpg', 'jpeg', 'png');

        $profil_img = $_SESSION['user']['profil_img'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(substr(strrchr($_FILES['picture']['name'], '.'), 1));

        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 10000000){
                    $fileNameNew = md5(uniqid(rand(), true));
                    $fileDestination = "./assets/img/icons/users/".$fileNameNew. "." .$fileActualExt;

                    $resultat = move_uploaded_file($fileTmpName, $fileDestination);
                    
                    if($resultat) {
                        if($_SESSION['user']['profil_img'] != 'user-default.png') {
                            if(file_exists('./assets/img/icons/users/'.$_SESSION['user']['profil_img'])) {
                                unlink('./assets/img/icons/users/'.$_SESSION['user']['profil_img']);   
                            }
                        }
                        $profil_img = empty($_FILES['picture']) ? $_SESSION['user']['profil_img'] : $fileNameNew. "." .$fileActualExt;
                    } else {
                        $profil_img = $_SESSION['user']['profil_img'];
                    }
                } else {
                    $profil_img = $_SESSION['user']['profil_img'];
                }
            } else {
                $profil_img = $_SESSION['user']['profil_img'];
            }
        }
        ////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////

        $titrepage = 'profil';

        $this->setFirstname($firstname)->setName($name)->setEmail($email)->setPassword($passwordhashed)->setProfil_img(!empty($_FILES['picture'] ? $_SESSION['user']['profil_img'] : $profil_img))->setId($id);

        if (!empty($this->firstname) && !empty($this->name) && !empty($this->email) && !empty($this->password) && !empty($passwordRep)) {
            if ($password == $passwordRep) {
                if ($this->checkEmail() == false) {
                    $emailbdd = $this->getInfosById($id)->fetch(PDO::FETCH_ASSOC);
                    $emailb = $emailbdd['email'];
                    if ($email == $emailb) {
                        $this->updateUser();

                        $_SESSION['user']['firstname'] = $firstname;
                        $_SESSION['user']['name'] = $name;
                        $_SESSION['user']['email'] = $email;
                        $_SESSION['user']['profil_img'] = $profil_img;
                        
                        header("location:/account");
                    } else {
                        AbstractController::render('account.profil', $params = ['titre' => $titrepage, 'css' => 'account']);
                        exit();
                    }
                } else {
                    $this->updateUser();
                    $_SESSION['user']['firstname'] = $firstname;
                    $_SESSION['user']['name'] = $name;
                    $_SESSION['user']['email'] = $email;
                    $_SESSION['user']['profil_img'] = $profil_img;
                    header("location:/account");
                }
            } else {
                AbstractController::render('account.profil', $params = ['titre' => $titrepage, 'css' => 'account']);
                exit();
            }
        } else {
            AbstractController::render('account.profil', $params = ['titre' => $titrepage, 'css' => 'account']);
            exit();
        }
    }

    public function logout() 
    {
        if(isset($_COOKIE['auth'])) {
            setcookie('auth', '', time() - 3600);
        }
        session_destroy();
        header("location:/");
    }

    public function remember() 
    {
        if(isset($_COOKIE['auth'])) {
            $this->table = "users";
            $user = $this->getAllById($_COOKIE['auth'][0]);
            
            $auth = $_COOKIE['auth'];
            $auth = explode('-----', $auth);

            $key = sha1($user[0]['email'] . $user[0]['password']);

            if($key == $auth[1]) {
                return $_SESSION['user'] = (array)$user[0];
            }
        }
    }
}
