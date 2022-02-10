<?php

use App\Config\Database;

class CardsModel extends Database
{

    protected $full_name;
    protected $card_number;
    protected $expiration_date;
    protected $ccv;
    protected $id_user;

    public function setFull_name($full_name)
    {
        $this->full_name = $full_name;
        return $this;
    }

    public function setCard_number($card_number)
    {
        $this->card_number = $card_number;
        return $this;
    }

    public function setExpiration_date($expiration_date)
    {
        $this->expiration_date = $expiration_date;
        return $this;
    }

    public function setCcv($ccv)
    {
        $this->ccv = $ccv;
        return $this;
    }

    public function setId_user($id_user)
    {
        $this->id_user = $id_user;
        return $this;
    }

    public function setNewCard()
    {
        return $this->run('INSERT INTO `cards`( `full_name`, `card_number`, `expiration_date`, `ccv`, `id_user`) VALUES (?, ?, ?, ?, ?)' , [$this->full_name, $this->card_number, $this->expiration_date, $this->ccv, $this->id_user]);
    }

    

}