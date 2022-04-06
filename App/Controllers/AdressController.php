<?php
namespace App\Controllers;
use App\Models\AdressModel;
use PDO;

class AdressController extends AdressModel
{

    public function NewAdress()
    {
        $titrepage = "add address";
        $type = htmlspecialchars($_POST['type']);
        $full_name = htmlspecialchars($_POST['full_name']);
        $adress = htmlspecialchars($_POST['adress']);
        $additional_adress = htmlspecialchars($_POST['additional_adress']);
        $postal_code = htmlspecialchars($_POST['postal_code']);
        $city = htmlspecialchars($_POST['city']);
        $id_user = htmlspecialchars($_SESSION['user']['id']);

        if(!empty($type) && !empty($full_name) && !empty($adress) && !empty($postal_code) && !empty($city))
        {
            if(ctype_digit($postal_code)==true)
            {
                $this->setType($type)->setFull_name($full_name)->setAdress($adress)->setAdditional_adress($additional_adress)->setPostal_code($postal_code)->setCity($city)->setId_user($id_user);
                $this->setUserAdress();
                if (isset($_SESSION['continue_path'])) {
                    $url = $_SESSION['continue_path'];
                    header("location:$url");
                    exit();
                }
                header("location:/account");
                exit();
            }
            else{
                $message = 'Code postal invalide';
                AbstractController::render('account.address.add', $params = ['titre' => $titrepage, 'alert' => AbstractController::alert(2, $message)]);
                exit();
            }
        }
        else{
            $message = 'Tout les champs doivent être rempli';
            AbstractController::render('account.address.add', $params = ['titre' => $titrepage, 'alert' => AbstractController::alert(2, $message)]);
            exit();
        }

    }
    
    public function AllUserAdresses()
    {
        $titrepage = "Adresses";
        $this->table = "adresses";
        
        $id_user = $_SESSION['user']['id'];
        $data = $this->setId_user($id_user)->getAllById_user();
        $nb = $this->checkAddress($id_user);
        $params = ['nb'=>$nb, 'data'=> $data, 'titre' => $titrepage];

        return AbstractController::render('account.address', $params);
    }

    public function AdressModify($type)
    {
        $id_user = $_SESSION['user']['id'];
        $currentAdress = $this->getCurrentAdress($type, $id_user);

        $titrepage = "change address";
        $type = htmlspecialchars($_POST['type']);
        $full_name = htmlspecialchars($_POST['full_name']);
        $adress = htmlspecialchars($_POST['adress']);
        $additional_adress = htmlspecialchars($_POST['additional_adress']);
        $postal_code = htmlspecialchars($_POST['postal_code']);
        $city = htmlspecialchars($_POST['city']);

        if(!empty($type) && !empty($full_name) && !empty($adress) && !empty($postal_code) && !empty($city))
        {
            if(ctype_digit($postal_code)==true)
            {
                $this->setType($type)->setFull_name($full_name)->setAdress($adress)->setAdditional_adress($additional_adress)->setPostal_code($postal_code)->setCity($city)->setId_user($id_user);
                $this->setUserAdress();
                if (isset($_SESSION['continue_path'])) {
                    $url = $_SESSION['continue_path'];
                    header("location:$url");
                    exit();
                }
                header("location:/account");
                exit();
            }
            else{
                $message = 'Code postal invalide';
                AbstractController::render('account.address.add', $params = ['titre' => $titrepage, 'alert' => AbstractController::alert(2, $message)]);
                exit();
            }
        }
        else{
            $message = 'Tout les champs doivent être rempli';
            AbstractController::render('account.address.add', $params = ['titre' => $titrepage, 'alert' => AbstractController::alert(2, $message)]);
            exit();
        }
    }
}