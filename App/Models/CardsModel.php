<?php
namespace App\Models;

use App\Config\Database;

class CardsModel extends Database
{

    protected $full_name;
    protected $card_number;
    protected $four_last;
    protected $expiration_date;
    protected $cvv;
    protected $id_user;
    protected $error;
    protected $type;

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

    protected function setFourLast($four_last)
    {
        $this->four_last = $four_last;
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

    protected function setError($error)
    {
        $this->error = $error;
        return $this;
    }

    protected function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    protected function setNewCard()
    {
        return $this->run('INSERT INTO `cards`( `full_name`, `card_number`, `four_last`, `expiration_date`, `id_user`, `error`, `type`) VALUES (?, ?, ?, ?, ?, ?, ?)' , [$this->full_name, $this->card_number, $this->four_last, $this->expiration_date, $this->id_user, $this->error, $this->type]);
    }

    protected function checkCard($id_user)
    {
        return $this->run("SELECT * FROM `cards` WHERE `id_user` = ? " , [$id_user])->rowCount();
    }

    protected function deleteCard($id_user) {
        return $this->run('DELETE FROM `cards` WHERE `id_user` = ? AND `card_number` = ?' [$id_user]);
    }

}