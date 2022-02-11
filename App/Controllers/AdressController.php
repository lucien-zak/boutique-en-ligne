<?php
namespace App\Controllers;
use App\Models\AdressModel;
use PDO;

class AdressController extends AdressModel
{

    public function NewAdress()
    {
        $titrepage = "add address";
        $type = $_POST['type'];
        $full_name = $_POST['full_name'];
        $adress = $_POST['adress'];
        $additional_adress = $_POST['additional_adress'];
        $postal_code = $_POST['postal_code'];
        $city = $_POST['city'];
        $id_user = $_SESSION['id'];

        if(!empty($type) && !empty($full_name) && !empty($adress) && !empty($postal_code) && !empty($city))
        {
            if(ctype_digit($_POST['postal_code'])==true)
            {
                $this->setType($type)->setFull_name($full_name)->setAdress($adress)->setAdditional_adress($additional_adress)->setPostal_code($postal_code)->setCity($city)->setId_user($id_user);
                $this->setUserAdress();
                header("location:/account");
                exit();
            }
            else{
                AbstractController::render('account.address.add', $params = ['titre' => $titrepage]);
                exit();
            }
        }
        else{
            AbstractController::render('account.address.add', $params = ['titre' => $titrepage]);
            exit();
        }

    }
    
    public function AllUserAdresses()
    {
        $titrepage = "Adresses";
        $id_user = $_SESSION['id'];
        $this->setId_user($id_user);
        $req = $this->getAdresses();
        $res= $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;    
    }
    

}