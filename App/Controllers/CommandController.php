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
        dump($_REQUEST);
        AbstractController::render('mrelay', $params);
    }

    

}
