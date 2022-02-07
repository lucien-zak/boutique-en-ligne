<?php

namespace App\Models;

use App\Config\Database;

class UserModel extends Database
{

    protected $firstname;
    protected $name;
    protected $email;
    protected $password;
    protected $adress;


    protected function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    protected function setname($name)
    {
        $this->name = $name;
        return $this;
    }

    protected function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    protected function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    protected function setAdress($adress)
    {
        $this->adress = $adress;
        return $this;
    }


    protected function setUser()
    {
        $stmt =  $this->run('INSERT INTO `users`( `firstname`, `name`, `email`, `password`, `adress`) VALUES (?, ?, ?, ?, ?)' ,[$this->firstname, $this->name, $this->email, $this->password, $this->adress]);
    }

    protected function checkEmail()
    {
        $stmt = $this->run("SELECT `email` FROM `users` WHERE email = ?" , [$this->email]);

        if($stmt->rowCount() > 0){
            return false;
        }
        else{
            return true;
        }
    }
}