<?php

namespace App\Models;
use PDO;
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
    public $args = "";
    protected $table;

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

    public function getProduct()
    {

        return $this->run(' SELECT *, products.id
                            FROM products
                            INNER JOIN `artists` ON products.id_artist = artists.id
                            INNER JOIN `categories` ON products.id_categorie = categories.id
                            INNER JOIN sub_categorie ON sub_categorie.id = products.id_sub_categorie
                            WHERE products.id = ? AND slug = ?',
            [$this->id, $this->slug])->fetch();
    }

    public function getProducts()
    {

        return $this->run(" SELECT *, products.id
                            FROM `products`
                            INNER JOIN `artists` ON products.id_artist = artists.id
                            INNER JOIN `categories` ON products.id_categorie = categories.id
                            INNER JOIN sub_categorie ON sub_categorie.id = products.id_sub_categorie
                            GROUP BY products.id")->fetchAll();

    }

    public function getCategory()
    {

        return $this->run(" SELECT categorie, sub_categorie
                            FROM `categories`
                            INNER JOIN sub_categorie
                            ON categories.id = sub_categorie.id_categorie
                            ORDER BY categorie")->fetchAll();
    }

    public function getProductsByCategory()
    {
        if ($this->args != ""){
            $sql = 'SELECT *, products.id FROM `products` INNER JOIN `artists` ON products.id_artist = artists.id INNER JOIN `categories` ON products.id_categorie = categories.id INNER JOIN sub_categorie ON sub_categorie.id = products.id_sub_categorie WHERE categorie = ? ';
            return $this->run($sql,[$this->args])->fetchAll();
        }
        $sql = 'SELECT *, products.id FROM `products` INNER JOIN `artists` ON products.id_artist = artists.id INNER JOIN `categories` ON products.id_categorie = categories.id INNER JOIN sub_categorie ON sub_categorie.id = products.id_sub_categorie ';
        if (!empty($_REQUEST)) {
            $i = 0;
            foreach ($_REQUEST as $key => $value) {
                $key = str_replace('_', ' ', $key);
                if ($i == 0) {
                    $sql .= "WHERE categories.categorie = '$key' OR sub_categorie.sub_categorie = '$key' ";
                    $i++;
                } else {
                    $sql .= "OR categories.categorie = '$key' OR sub_categorie.sub_categorie = '$key '";
                }
            }
        }
        $sql .= 'GROUP BY products.id';
        return $this->run($sql)->fetchAll();}

    public function getProductsBySearch()
    {
        $sql = 'SELECT *, products.id 
                FROM `products` 
                INNER JOIN `artists` ON products.id_artist = artists.id 
                INNER JOIN `categories` ON products.id_categorie = categories.id 
                INNER JOIN sub_categorie ON sub_categorie.id = products.id_sub_categorie 
                WHERE categorie LIKE :search OR name LIKE :search OR artist LIKE :search';
                return $this->run($sql, [':search' => $_REQUEST['search'].'%'] )->fetchAll();
    }

    ////Table secondaires //

    protected function getReviewsById()
    {
        return $this->run("SELECT * FROM `reviews` WHERE `id_product`= ?" , [$this->id])->fetchAll();
    }

    protected function getSub_ReviewsById($id)
    {
        return $this->run("SELECT * FROM `sub_reviews` WHERE `id_review`= ?" , [$id])->fetchAll();
    }

    protected function setFavorites($id_user)
    {
        return $this->run("INSERT INTO `favorites`(`id_product`, `id_user`) VALUES (?, ?)" , [$this->id , $id_user]);
    }

    protected function checkFavorites($id_user)
    {
        $stmt = $this->run('SELECT * FROM `favorites` WHERE `id_product`= ? AND `id_user`= ? ' , [$this->id , $id_user])->rowCount();
        if($stmt > 0) 
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    protected function deleteFavorites($id_user)
    {
        return $this->run('DELETE FROM `favorites` WHERE `id_product`= ? AND `id_user`= ? ' , [$this->id , $id_user]);
    }

    protected function avgRatingProduct()
    {
        return $this->run('SELECT AVG(`mark`) FROM `reviews` WHERE `id_product` = ?' , [$this->id])->fetch(PDO::FETCH_ASSOC);
    }
}
