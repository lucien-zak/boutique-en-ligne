<?php

namespace App\Models;
use PDO;
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

    protected function setName($name)
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

    protected function getFirstname()
    {
        return $this->firstname;

    }

    protected function getName()
    {
        return $this->name;
    }

    protected function getEmail()
    {
        return $this->email;
    }
    

    protected function getPassword()
    {
        return $this->password;
    }

    protected function getAdress()
    {
        return $this->adress;
    }


    protected function setUser()
    {
        return $this->run('INSERT INTO `users`( `firstname`, `name`, `email`, `password`, `adress`) VALUES (?, ?, ?, ?, ?)' ,[$this->firstname, $this->name, $this->email, $this->password, $this->adress]);
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
    
    protected function checkLogs()
    { 
        return $this->run("SELECT * FROM `users` WHERE `email` = ? AND `password` = ? " , [$this->email, $this->password]);
    }

    protected function getInfosById($id)
    {
        return $this->run("SELECT * FROM `users` WHERE `id` = ? " , [$this->id]);
    }

    public function checkPassword($email)
    {
        return $this->run("SELECT * FROM `users` WHERE `email`= ?" , [$email]);
    }
}
