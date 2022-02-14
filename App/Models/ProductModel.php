<?php

namespace App\Models;

use App\Config\Database;

class ProductModel extends Database
{
    protected $id;
    protected $name;
    protected $description;
    protected $price;
    protected $slug;
    protected $id_tags;
    protected $id_category;
    protected $id_sub_category;
    protected $stock;

        /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of slug
     */ 
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set the value of slug
     *
     * @return  self
     */ 
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get the value of id_tags
     */ 
    public function getId_tags()
    {
        return $this->id_tags;
    }

    /**
     * Set the value of id_tags
     *
     * @return  self
     */ 
    public function setId_tags($id_tags)
    {
        $this->id_tags = $id_tags;

        return $this;
    }

    /**
     * Get the value of id_category
     */ 
    public function getId_category()
    {
        return $this->id_category;
    }

    /**
     * Set the value of id_category
     *
     * @return  self
     */ 
    public function setId_category($id_category)
    {
        $this->id_category = $id_category;

        return $this;
    }

    /**
     * Get the value of id_sub_category
     */ 
    public function getId_sub_category()
    {
        return $this->id_sub_category;
    }

    /**
     * Set the value of id_sub_category
     *
     * @return  self
     */ 
    public function setId_sub_category($id_sub_category)
    {
        $this->id_sub_category = $id_sub_category;

        return $this;
    }

    /**
     * Get the value of stock
     */ 
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     *
     * @return  self
     */ 
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    public function getProducts(){

        return $this->run('SELECT * FROM products WHERE id = ?', [$this->id])->fetch();

    }
}