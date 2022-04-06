<?php

namespace App\Controllers;

class AbstractController

{

    public static function render($name, $params = [])
    {
        require "../App/Views/header.view.php";
        require "../App/Views/$name.view.php";
        require "../App/Views/footer.view.php";
    }

        public static function render_admin($name, $params = [])
    {
        require "../App/Views/admin.header.view.php";
        require "../App/Views/$name.view.php";
    }


    public static function upload_img_products($filename)
    {

        if (!isset($_FILES["file"])) 
        {
            die("There is no file to upload.");
        }

        $filepath = $_FILES['file']['tmp_name'];
        $fileSize = filesize($filepath);
        $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
        $filetype = finfo_file($fileinfo, $filepath);

        if ($fileSize === 0) 
        {
            die("The file is empty.");
        }

        if ($fileSize > 3145728) { 
            die("The file is too large");
        }

        $allowedTypes = [
            'image/png' => 'png',
            'image/jpeg' => 'jpg',
        ];

        if (!in_array($filetype, array_keys($allowedTypes))) 
        {
            die("File not allowed.");
        }

        $extension = $allowedTypes[$filetype];
        $targetDirectory = $_SERVER['DOCUMENT_ROOT'] . "/assets/img/products"; 

        $newFilepath = $targetDirectory . "/" . $filename . "." . 'png';

        if (!copy($filepath, $newFilepath)) { 
            die("Can't move file.");
        }
        unlink($filepath); 
}

    public static function sort_category($listcategory)
    {
        $sortedlist = [];
        foreach ($listcategory as $key => $value) {
            if (!array_key_exists($value->categorie, $sortedlist)) {
                $sortedlist += [$value->categorie => $value->sub_categorie];
            } else {
                $sortedlist = array_merge_recursive($sortedlist, [$value->categorie => $value->sub_categorie]);
            }
        }
        return $sortedlist;
    }


    public static function alert($type, $message)
    {
        switch ($type) {
            case 0:
                return 'succes' . '---' . $message;
                break;
            case 1:
                return 'failed' . '---' . $message;
                break;
            case 2:
                return 'error' . '---' . $message;
                break;
        }
    }

    public static function is_connected()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['continue_path']);
        } else {
            $_SESSION['continue_path'] = $_SERVER["HTTP_REFERER"];
            header('location:/account/login');
            exit();
        }
    }

    public static function redirect_from_referer()
    {

        if (isset($_SERVER["HTTP_REFERER"])) {
            $_SESSION['continue_path'] = $_SERVER["HTTP_REFERER"];
        }
    }
}
