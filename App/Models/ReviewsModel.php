<?php
namespace App\Models;

use App\Config\Database;

class ReviewsModel extends Database
{

    protected $comment;
    protected $mark;
    protected $report;
    protected $id_user;
    protected $id_product;

    protected function setComment($comment){
        $this->comment = $comment;
        return $this;
    }

    protected function setMark($mark){
        $this->mark = $mark;
        return $this;
    }

    protected function setReport($report){
        $this->report = $report;
        return $this;
    }

    protected function setId_user($id_user){
        $this->id_user = $id_user;
        return $this;
    }

    protected function setId_product($id_product){
        $this->id_product = $id_product;
        return $this;
    }

    protected function setReview()
    {
        return $this->run('INSERT INTO `reviews`( `comment`, `Mark`, `report`, `id_user`, `id_product`) VALUES (?, ?, ?, ?, ?)' , [$this->comment, $this->mark, $this->report, $this->id_user, $this->id_product]);
    }


}