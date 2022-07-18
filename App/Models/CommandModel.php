<?php
namespace App\Models;
use App\Config\Database;

class CommandModel extends Database
{

    protected $date;
    protected $full_name; 
    protected $command_num;
    protected $id_user;
    protected $delivery_adress;
    protected $billing_adress;
    protected $four_last;
    protected $statut;
  

    protected function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    protected function setFull_name($full_name)
    {
        $this->full_name = $full_name;
        return $this;
    }

    protected function setCommand_num($command_num)
    {
        $this->command_num = $command_num;
        return $this;
    }

    public function setId_user($id_user)
    {
        $this->id_user = $id_user;
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

    protected function setFour_last($four_last)
    {
        $this->four_last = $four_last;
        return $this;
    }

    /**
     * Get the value of statut
     */ 
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set the value of statut
     *
     * @return  self
     */ 
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }


    public function setCommand()
    {
        return $this->run('INSERT INTO `command`( `date`, `full_name`, `command_num`, `id_user`, `delivery_adress`, `biling_adress`, `four_last`) VALUES (?, ?, ?, ?, ?, ?, ?)', [$this->date, $this->full_name, $this->command_num, $this->id_user, $this->delivery_adress, $this->billing_adress, $this->four_last]);
    }

    public function checkNum_Command($command_num)
    {
        $sql = $this->run('SELECT `command_num` FROM `command` WHERE `command_num` = ?', [$command_num]);
        if($sql->rowCount()>0)
        {
            return true;
        }
        else {
            return false;
        }
    }

    protected function getStockById($id)
    {
        return $this->run('SELECT `stock` FROM `products` WHERE `id` = ?'  , [$id])->fetch();
    }
    
    protected function updateStock($id, $quantity)
    {
        $prevStock = $this->getStockById($id)->stock;     
        $stock = $prevStock - $quantity;
        return $this->run('UPDATE `products` SET `stock`= ? WHERE `id` = ? '  , [$stock , $id]);
    }

    protected function getCommandByNum()
    {
        return $this->run('SELECT * FROM `command` WHERE `command_num` = ?'  , [$this->command_num])->fetch();
    }

    protected function setId_product($id_product)
    {
        $this->id_product = $id_product;
        return $this;
    }

    protected function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    protected function setProducts_Command()
    {
        return $this->run('INSERT INTO `products_command` (`id_product`, `num_command`, `quantity`) VALUES (?, ?, ?)', [$this->id_product, $this->command_num, $this->quantity]);
    }
    
    protected function getProducts_CommandByNum()
    {
        return $this->run('SELECT * FROM `products_command` INNER JOIN `products` ON `products_command`.`id_product` = `products`.`id` WHERE `products_command`.`num_command` = ?'  , [$this->command_num])->fetchAll();
    }

    public function getAllCommands()
    {

        return $this->run("SELECT `command`.`id_user`, `command`.`command_num`, `command`.`date`,`command`.`delivery_adress`, `command`.`biling_adress`, `command`.`four_last`, SUM(`price`) AS 'total', COUNT(`products`.`id`) AS 'products', statut FROM `command` INNER JOIN `products_command` ON `command`.`command_num` = `products_command`.`num_command` INNER JOIN `products` ON `products_command`.`id_product` = `products`.`id` GROUP BY `products_command`.`num_command` ORDER BY `command`.`date`")->fetchAll();
    }

    public function getAllCommandsByUser()
    {

        return $this->run("SELECT command.id_user, command.command_num, command.date, command.delivery_adress, command.biling_adress, command.four_last, SUM(price) AS 'total', COUNT(products.id) AS 'quantity', statut AS 'products' FROM `command` INNER JOIN products_command ON command.command_num = products_command.num_command INNER JOIN products ON products_command.id_product = products.id  WHERE command.id_user = ?  GROUP BY products_command.num_command ORDER BY command.date",[$this->id_user])->fetchAll();
    }

    public function updateStatutCommand($id, $statut)
    {
        return $this->run('UPDATE `command` SET `statut`= ? WHERE `command_num` = ? '  , [$statut,$id]);
    }
}