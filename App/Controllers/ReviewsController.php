<?php

namespace App\Controllers;

use App\Models\ReviewsModel;

class ReviewsController extends ReviewsModel
{

    public function NewReview($id_product)
    {
        $titrepage = "add Review";
        $comment = htmlspecialchars($_POST['comment']);
        $mark = htmlspecialchars($_POST['rating']);
        $report = 0;
        $id_user = $_SESSION['user']['id'];
        $this->setComment($comment)->setMark($mark)->setReport($report)->setId_user($id_user)->setId_product($id_product);
        $this->setReview();
        header('location:'.$_SERVER["HTTP_REFERER"].'');
    }

    ///////////////////////////////////////////
    public function NewSub_review($id_review)
    {
        $titrepage = "add Sub_Review";
        $sub_comment = htmlspecialchars($_POST['sub_comment']);
        $id_user = $_SESSION['user']['id'];
        $this->setSub_comment($sub_comment)->setId_review($id_review)->setId_user($id_user);
        $this->setSub_Review();
        header('location:'.$_SERVER["HTTP_REFERER"].'');
    }
    
    //////////////////////////////////////////
    
    public function updateReport($id)
    {
        $nb = $this->getReport($id);
        $report = $nb->report+1;
        $this->addReport($report, $id);
        header('location:'.$_SERVER["HTTP_REFERER"].'');
    }
}