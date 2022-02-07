<?php
namespace App\Config;

use PDO;

class Database
{
    // 
    protected $pdo;

    protected function connect() {
        $opt  = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES   => FALSE,
        );
        $dsn = 'mysql:host=51.38.48.43;dbname=s37_boutique;';
        return $this->pdo = new PDO($dsn, 'u37_AQzitrHR8s', 'kj3++kaHeUZgukj8e^MLxc@T', $opt);
    }

    //Generic function:

    public function find($id)
    {
        $stmt =  $this->connect()->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute(array($id));
        $test = $stmt->fetchAll();

        return $test;

    }

}