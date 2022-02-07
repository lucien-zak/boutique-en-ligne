<?php

namespace App\Models;

use App\Config\Database;

class UserModel 
{

    protected $firstname;
    protected $name;
    protected $email;
    protected $password;
    protected $adress;


    protected function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    protected function setname($name)
    {
        $this->name = $name;
    }

    protected function setEmail($email)
    {
        $this->email = $email;
    }

    protected function setPassword($password)
    {
        $this->password = $password;
    }

    protected function setAdress($adress)
    {
        $this->adress = $adress;
    }


}