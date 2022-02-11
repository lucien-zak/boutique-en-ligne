<?php
namespace App\Models;

use App\Config\Database;

class CardsModel extends Database
{

    protected $full_name;
    protected $card_number;
    protected $expiration_date;
    protected $cvv;
    protected $id_user;

    protected function setFull_name($full_name)
    {
        $this->full_name = $full_name;
        return $this;
    }

    protected function setCard_number($card_number)
    {
        $this->card_number = $card_number;
        return $this;
    }

    protected function setExpiration_date($expiration_date)
    {
        $this->expiration_date = $expiration_date;
        return $this;
    }

    protected function setCvv($cvv)
    {
        $this->cvv = $cvv;
        return $this;
    }

    protected function setId_user($id_user)
    {
        $this->id_user = $id_user;
        return $this;
    }

    protected function setNewCard()
    {
        return $this->run('INSERT INTO `cards`( `full_name`, `card_number`, `expiration_date`, `cvv`, `id_user`) VALUES (?, ?, ?, ?, ?)' , [$this->full_name, $this->card_number, $this->expiration_date, $this->cvv, $this->id_user]);
    }

    public function getCards()
    {
        return $this->run("SELECT * FROM `cards` WHERE `id_user`= ? " , [$this->id_user]);
    }

}