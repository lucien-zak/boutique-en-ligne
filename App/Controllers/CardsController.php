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
        $full_name =  htmlspecialchars($_POST['fullname']);

        $card_number = htmlspecialchars($_POST['number']);
        $expiration_date = htmlentities("$_POST[expiration_month]/$_POST[expiration_year]");

        $cvv = htmlspecialchars($_POST['cvv']);
        $id_user = $_SESSION['id'];
        $error = 0;
        $four_last = substr($card_number, -4);

        if(!empty($full_name) && !empty($card_number) && !empty($expiration_date) && !empty($cvv))
        {
            if(ctype_digit($card_number) && strlen($card_number)==16)
            {
                if(ctype_digit($cvv) && strlen($cvv)==3)
                {
                    if($card_number[0] == 5) {
                        $this->setFull_name($full_name)->setCard_number($card_number)->setFourLast($four_last)->setExpiration_date($expiration_date)->setCvv($cvv)->setError($error)->setType('MasterCard')->setId_user($id_user);
                    } else if($card_number[0] == 4) {
                        $this->setFull_name($full_name)->setCard_number($card_number)->setFourLast($four_last)->setExpiration_date($expiration_date)->setCvv($cvv)->setError($error)->setType('Visa')->setId_user($id_user);
                    } else {
                        $this->setFull_name($full_name)->setCard_number($card_number)->setFourLast($four_last)->setExpiration_date($expiration_date)->setCvv($cvv)->setError($error)->setType('MasterCard')->setId_user($id_user);
                    }

                    $this->setNewCard();
                    header("location:/account");
                    exit();
                }
                else{
                    $message = "Le CVV 
                    doit etre strictement composé de 3 chiffres";
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
        $this->table = "cards";
        $titrepage = "Cards";
        $id_user = $_SESSION['id'];
        $this->setId_user($id_user);
        $data = $this->getAllById_user();
        $nb = $this->checkCard($id_user);
        $params = ['nb' => $nb, 'data'=> $data, 'titre' => $titrepage];

        return AbstractController::render('account.payements', $params); 
    }

    //fonction pour delete a faire plus tard

}