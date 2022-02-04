<?php

namespace App\Models;

use App\Config\Db;

class Model
{

    private $Db;

    public function __construct()
    {
        $this->Db = Db::instance();}

    public function find($table,$id)
    {
        return $this->Db->run("SELECT * FROM ? WHERE id = ?", [$table,$id])->fetch();

    }

    public function findAll()
    {
        return $this->Db->run("SELECT * FROM products")->fetchAll();

    }


}
