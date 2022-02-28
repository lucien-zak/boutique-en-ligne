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
        return $this->run('INSERT INTO `reviews`( `comment`, `mark`, `report`, `id_user`, `id_product`) VALUES (?, ?, ?, ?, ?)' , [$this->comment, $this->mark, $this->report, $this->id_user, $this->id_product]);
    }

    protected $id_review;
    protected $sub_comment;

    protected function setId_review($id_review)
    {
        $this->id_review = $id_review;
        return $this;
    }

    protected function setSub_comment($sub_comment)
    {
        $this->sub_comment = $sub_comment;
        return $this;
    }

        
    protected function setSub_Review()
    {
        return $this->run('INSERT INTO `sub_reviews`( `sub_comment`, `id_review`, `id_user`) VALUES (?, ?, ?)' , [$this->sub_comment, $this->id_review, $this->id_user]);
    }
    
}