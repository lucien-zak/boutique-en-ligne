<?php

namespace App\Controllers;

use App\Models\CardsModel;
use PDO;

class CardsController extends CardsModel
{

    public function Crypt($number)
    {
        // $cryptednumber = substr($number, -4);
    }

    public function NewCard()
    {
        $titrepage = "Add card";
        $full_name = $_POST['fullname'];

        $card_number = $_POST['number'];
        $crypted_number = password_hash($card_number , PASSWORD_BCRYPT);
        $expiration_date = "$_POST[expiration_month]/$_POST[expiration_year]";

        $cvv = $_POST['cvv'];
        $crypted_cvv = password_hash($_POST['cvv'] , PASSWORD_BCRYPT);
        $id_user = $_SESSION['id'];

        if(!empty($full_name) && !empty($card_number) && !empty($expiration_date) && !empty($cvv))
        {
            if(ctype_digit($_POST['number']) && strlen($_POST['number'])==16)
            {
                if(ctype_digit($_POST['cvv']) && strlen($_POST['cvv '])==3)
                {
                    $this->setFull_name($full_name)->setCard_number($card_number)->setExpiration_date($expiration_date)->setCvv($cvv)->setId_user($id_user);
                    $this->setNewCard();
                    header("location:/account");
                    exit();
                }
                else{
                    $message = "Le CVV doit etre strictement composé de 3 chiffres";
                    AbstractController::render('account.payements.add', $params = ['message' => $message ,'titre' => $titrepage]);
                    exit();
                }
            }
            else{
                $message = "Le Numéro de carte doit etre strictement composé de 16 chiffres";
                AbstractController::render('account.payements.add', $params = ['message' => $message ,'titre' => $titrepage]);
                exit();
            }       
        }
        else{
            AbstractController::render('account.payements.add', $params = ['titre' => $titrepage]);
            exit();
        }
    }

    public function AllUserCards()
    {
        $titrepage = "Cards";
        $id_user = $_SESSION['id'];
        $this->setId_user($id_user);
        $req = $this->getCards();
        $res= $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;    
    }

    //fonction pour delete a faire plus tard

}