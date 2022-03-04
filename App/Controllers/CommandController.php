<?php

namespace App\Controllers;

use App\Models\AdressModel;
use App\Models\CardsModel;

class CommandController
{

    public function __construct()
    {
        $this->adress = new AdressModel;
        $this->card = new CardsModel;
    }

    public function delivery_choice()
    {

        $titrepage = 'Votre Livraison';
        $adress = $this->adress->setId_user($_SESSION['user']['id'])->getAllById_user();
        // $cards = $this->card->setId_user($_SESSION['user']['id'])->getAllById_user();
        $params = ['titre' => $titrepage, 'adress' => $adress];
        return AbstractController::render('order', $params);

    }

    public function delivery_setrelay()
    {
        $titrepage = 'Vorte point relais';
        $adress = $this->adress->setId_user($_SESSION['user']['id'])->getAllById_user();
        // $cards = $this->card->setId_user($_SESSION['user']['id'])->getAllById_user();
        $params = ['titre' => $titrepage, 'adress' => $adress];
        $_SESSION['order']['delivery'] = "relay";
        $_SESSION['order']['typedelivery'] = "relay";
        dump($_REQUEST);
        AbstractController::render('mrelay', $params);
    }

    public function orderSession()
    {
        if(!empty($_SESSION['order']))
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function resumeOrder()
    {
        if($this->orderSession()==true)
        {
            $id_user = $_SESSION['user']['id'];
            $type = $_SESSION['order']['typedelivery'];  
            if($_SESSION['order']['delivery']=='home')
            {
                $adress = $this->adress->getCurrentAdress($type, $id_user);
            }
            else{
                $adress = $_REQUEST;
            }

            $titrepage = "Resume";
            $params = ['titre' => $titrepage, 'adress' => $adress];
            AbstractController::render('order.resume', $params);
        }
        else{
            header("location:/error");
        }
        
    }
    
    public function redirect ()
    {
        $_SESSION['order']['typedelivery'] = $_REQUEST['typedelivery'];
        $_SESSION['order']['delivery'] = "home";
        header("location:/order/resume");   
    }

}
