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
    protected $profil_img;

    protected function setId($id){
        $this->id = $id;
        return $this;
    }
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

    protected function setProfil_img($profil_img)
    {
        $this->profil_img = $profil_img;
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

    protected function getProfil_img()
    {
        return $this->profil_img;
    }


    protected function setUser()
    {
        return $this->run('INSERT INTO `users`( `firstname`, `name`, `email`, `password`, `profil_img`) VALUES (?, ?, ?, ?, ?)' , [$this->firstname, $this->name, $this->email, $this->password, $this->profil_img]);
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

    public function updateUser() 
    {
        return $this->run("UPDATE `users` SET `firstname`= ?, `name`= ?, `email`= ?, `password`= ?, `profil_img`= ?  WHERE `id`= ? " , [$this->firstname, $this->name, $this->email, $this->password, $this->profil_img, $this->id]);
    }
}
