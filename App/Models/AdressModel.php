<?php
namespace App\Models;
use App\Config\Database;
class AdressModel extends Database
{

    protected $type;
    protected $full_name;
    protected $adress;
    protected $additional_adress;
    protected $postal_code;
    protected $city;
    protected $id_user;
    protected $table = 'adresses';

    protected function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    protected function setFull_name($full_name)
    {
        $this->full_name = $full_name;
        return $this;
    }

    public function setAdress($adress)
    {
        $this->adress = $adress;
        return $this;
    }

    protected function setAdditional_adress($additional_adress)
    {
        $this->additional_adress = $additional_adress;
        return $this;
    }

    protected function setPostal_code($postal_code)
    {
        $this->postal_code = $postal_code;
        return $this;
    }

    protected function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    public function setId_user($id_user)
    {
        $this->id_user = $id_user;
        return $this;
    }

    protected function setUserAdress()
    {   
        return $this->run('INSERT INTO `adresses` ( `type`, `full_name`, `adress`, `additional_adress`, `postal_code`, `city`, `id_user`) VALUES (?, ?, ?, ?, ?, ?, ?)' , [$this->type, $this->full_name, $this->adress, $this->additional_adress, $this->postal_code, $this->city, $this->id_user]);
    }

    protected function checkAddress()
    {
        return $this->run("SELECT * FROM `adresses` WHERE `id_user` = ? " , [$this->id_user])->rowCount();
    }

    public function getAdressById_user()
    {
        return $this->run("SELECT * FROM adresses WHERE `id_user`= $this->id_user " )->fetchAll();
    }

    public function getCurrentAdress($type, $id_user)
    {
        return $this->run("SELECT * FROM adresses WHERE `type`= ? AND `id_user`= ?" , [$type , $id_user])->fetch();
    }

    public function updateAdress($type) 
    {
        return $this->run("UPDATE `adresses` SET `type`= ?, `full_name`= ?, `adress`= ?, `additional_adress`= ?, `postal_code`= ?, `city`= ?, `id_user`= ?  WHERE `id_user`= ? AND `type`= ? " , [$this->type, $this->full_name, $this->adress, $this->additional_adress, $this->postal_code, $this->city, $this->id_user, $this->id_user, $type]);
    }

}