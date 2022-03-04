<?php
namespace App\Models;
use App\Config\Database;

class CommandModel extends Database
{

    protected $command_num;
    protected $id_user;
    protected $id_product;
    protected $delivery_adress;
    protected $billing_adress;
    protected $id_payement;
    protected $quantity;

    protected function setCommand_num($command_num)
    {
        $this->command_num = $command_num;
        return $this;
    }

    protected function setId_user($id_user)
    {
        $this->id_user = $id_user;
        return $this;
    }

    protected function setId_product($id_product)
    {
        $this->id_product = $id_product;
        return $this;
    }

    protected function setDelivery_adress($delivery_adress)
    {
        $this->delivery_adress = $delivery_adress;
        return $this;
    }

    protected function setBilling_adress($billing_adress)
    {
        $this->billing_adress = $billing_adress;
        return $this;
    }

    protected function setId_payement($id_payement)
    {
        $this->id_payement = $id_payement;
        return $this;
    }

    protected function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function setCommand()
    {
        return $this->run('INSERT INTO `command`( `command_num`, `id_user`, `id_product`, `delivery_adress`, `billing_adress`, `id_payement`, `quantity`) VALUES (?, ?, ?, ?, ?, ?, ?)', [$this->command_num, $this->id_user, $this->id_product, $this->delivery_adress, $this->billing_adress, $this->id_payement, $this->quantity]);
    }

    public function getCommands()
    {
        return $this->run('SELECT * FROM `command` WHERE `id_user` = ?', [$this->id_user]);
    }

}