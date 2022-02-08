<?php

namespace App\Controllers;

class AbstractController {
    static function render($name, $params = []){
        require "../App/Views/header.view.php";
        require "../App/Views/$name.view.php";
        require "../App/Views/footer.view.php";

    }
}