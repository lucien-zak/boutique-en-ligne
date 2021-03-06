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
    protected $release;
    protected $slug;
    protected $id_artist;
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

    /**
     * Get the value of release
     */ 
    public function getRelease()
    {
        return $this->release;
    }

    /**
     * Set the value of release
     *
     * @return  self
     */ 
    public function setRelease($release)
    {
        $this->release = $release;

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
                            [$this->id, $this->slug])
                            ->fetch();
    }

    public function getProducts()
    {

        return $this->run(" SELECT *, products.id
                            FROM `products`
                            INNER JOIN `artists` ON products.id_artist = artists.id
                            INNER JOIN `categories` ON products.id_categorie = categories.id
                            INNER JOIN sub_categorie ON sub_categorie.id = products.id_sub_categorie
                            GROUP BY products.id")
                            ->fetchAll();

    }

    public function getCategory()
    {

        return $this->run(" SELECT categorie, sub_categorie
                            FROM `categories`
                            INNER JOIN sub_categorie
                            ON categories.id = sub_categorie.id_categorie
                            ORDER BY categorie")
                            ->fetchAll();
    }

    public function getCategorywithSub()
    {

        return $this->run(" SELECT categories.id AS 'categoriesid', sub_categorie.id AS 'sub_categorieid' ,categorie, sub_categorie FROM `categories` 
                            INNER JOIN sub_categorie ON categories.id = sub_categorie.id_categorie  
                            ORDER BY categorie")
                            ->fetchAll();
    }

    public function update_subcategory($category, $sub_category, $id)
    {
        return $this->run("UPDATE `sub_categorie` SET `id_categorie`= ? ,`sub_categorie`= ? WHERE `id` = ? ", [$category, $sub_category, $id]);
    }

    public function insert_subcategory($id, $subcategory)
    {
        return $this->run("INSERT INTO `sub_categorie`(`id_categorie`, `sub_categorie`) VALUES (?,?)", [$id,$subcategory]);
    }


    public function delete_subcategory($id)
    {
        return $this->run("DELETE FROM `sub_categorie` WHERE id = ?", [$id]);
    }

    public function delete_category($id)
    {
        return $this->run("DELETE FROM `categories` WHERE id = ?", [$id]);
    }

    public function insert_category($category)
    {
        return $this->run("INSERT INTO `categories`(`categorie`) VALUES (?)", [$category]);
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

    public function update_product()
    {
        $sql = "UPDATE `products` SET `name`='".htmlspecialchars($this->name)."',`description`='".htmlspecialchars($this->description)."',`price`=$this->price,`date`='".$this->release."',`id_artist`=$this->id_artist,`id_categorie`=$this->id_category,`id_sub_categorie`=$this->id_sub_category,`stock`=$this->stock WHERE `id` = ? ";
        return $this->run($sql,[$this->id]);
    }

    public function delete_product()
    {
        $sql = "DELETE FROM `products` WHERE id = ? AND slug = ?";
        return $this->run($sql,[$this->id, $this->slug]);
    }

    public function insert_product()
    {
        $sql = "INSERT INTO `products`(`name`, `description`, `price`, `date`, `slug`, `id_artist`, `id_categorie`, `id_sub_categorie`, `stock`) VALUES (:name,:description,:price,:date,:slug,:id_artist,:id_category,:id_sub_category,:stock)";
        return $this->run($sql,
        [
            ':name' => $this->name,
            ':description' => $this->description,
            ':price' => $this->price,
            ':date' => $this->release,
            ':slug' => $this->slug,
            ':id_artist' => $this->id_artist,
            ':id_category' => $this->id_category,
            ':id_sub_category' => $this->id_sub_category,
            ':stock' => $this->stock,
        ]);
    }

    ////Table secondaires //

    protected function getReviewsById()
    {
        return $this->run("SELECT `reviews`.`id`,
        `reviews`.`comment`,
        `reviews`.`mark`,
        `users`.`firstname`,
        `users`.`profil_img` FROM `reviews` INNER JOIN `users` ON `reviews`.`id_user` = `users`.`id` WHERE `id_product`= ?" , [$this->id])->fetchAll();
    }

    protected function getSub_ReviewsById($id)
    {
        return $this->run("SELECT `sub_reviews`.`sub_comment`,
        `sub_reviews`.`id`,
        `users`.`firstname`,
        `users`.`profil_img` FROM `sub_reviews` INNER JOIN `users` ON `sub_reviews`.`id_user` = `users`.`id` WHERE `id_review`= ?" , [$id])->fetchAll();
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
            return 1;
        }
        else
        {
            return 0;
        }
    }

    protected function deleteFavorites($id_user)
    {
        return $this->run('DELETE FROM `favorites` WHERE `id_product`= ? AND `id_user`= ? ' , [$this->id , $id_user]);
    }

    protected function avgRatingProduct()
    {
        return $this->run(' SELECT AVG(`mark`) 
                            AS `stars`
                            FROM `reviews` 
                            WHERE `id_product` = ?' , [$this->id]
                            )->fetch(PDO::FETCH_ASSOC);
    }

    protected function moreSold()
    {
        return $this->run('SELECT SUM(`products_command`.`quantity`) as sold, 
        `products`.`slug`, 
        `products`.`id`,
        `products`.`name`,
        `artists`.`artist`
        FROM `products_command` INNER JOIN `products` ON `products_command`.`id_product` = `products`.`id` INNER JOIN `artists` ON `artists`.`id` = `products`.`id_artist` GROUP BY `products_command`.`id_product` ORDER BY `sold` DESC LIMIT 3')->fetchAll();
    }

    protected function Similar()
    {
        return $this->run("SELECT `products`.id, 
        `products`.`name`, 
        COUNT(*) as how_many_shared_tags FROM `products` JOIN `products_tags` ON `products_tags`.`id_product` = `products`.`id` AND `products_tags`.`id_tag` IN(SELECT `id_tag` FROM `products_tags` WHERE `id_product` = 8) WHERE `products`.`id` != 8 GROUP BY `products`.`id`, `products`.`name` order by COUNT(*) DESC LIMIT 3" )->fetch();
    }

    protected function News()
    {
        return $this->run('SELECT `products`.*,
        `artists`.`artist` FROM `products` INNER JOIN `artists` ON `products`.`id_artist` = `artists`.`id` ORDER BY `products`.`date` DESC LIMIT 3')->fetchAll();
    }

    
    /**
     * Get the value of id_artist
     */ 
    public function getId_artist()
    {
        return $this->id_artist;
    }

    /***
     * 
     * Set the value of id_artist
     *
     * @return  self
     */ 
    public function setId_artist($id_artist)
    {
        $this->id_artist = $id_artist;

        return $this;
    }
}
