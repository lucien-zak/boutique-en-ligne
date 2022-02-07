<?php

namespace App\Models;

use App\Config\Database;

class Model extends Database
{
   

    public function find($id)
    {
        $stmt =  $this->connect()->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute(array($id));
        $test = $stmt->fetchAll();

        return $test;

    }

}
