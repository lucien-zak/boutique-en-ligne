<?php

namespace App\Models;

use App\Config\Db;

class UserModel extends Db 
{

    public function __construct()
    {
        $this->Db = Db::instance();
    }

    public function checkEmail($email)
    {
        $stmt = $this->Db->run("SELECT * FROM users WHERE email = ?", [$email]);
        if($stmt->rowCount() > 0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function setUser($firstname, $name, $email, $password, $adress)
    {
        return $this->Db->run( "INSERT INTO `users`(`id`, `firstname`, `name`, `email`, `password`, `adress`) VALUES ( ?, ?, ?, ?, ?, ?)", [$firstname, $name, $email, $password, $adress]);    
    }

    public function checkLogs($email, $password)
    {
        return $this->Db->run("SELECT * FROM `users` WHERE `email` = ? AND `password` = ? " , [$email, $password]);    
    }

    public function getInfosById($id)
    {
        return $this->Db->run("SELECT * FROM users WHERE id = ? " , [$id]);    
    }

    public function updateUser($firstname, $name, $email, $password, $id)
    {
        return $this->Db->run("UPDATE `users` SET `firstname`= ? , `name`= ? , `email`= ? , `password`= ?  WHERE `id`= ? " , [$firstname, $name, $email, $password, $id]);    
    }


}