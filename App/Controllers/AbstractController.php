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

        if ($fileSize > 3145728) { // 3 MB (1 byte * 1024 * 1024 * 3 (for 3 MB))
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
        $targetDirectory = $_SERVER['DOCUMENT_ROOT'] . "/assets/img/products"; // __DIR__ is the directory of the current PHP file

        $newFilepath = $targetDirectory . "/" . $filename . "." . 'png';

        if (!copy($filepath, $newFilepath)) { // Copy the file, returns false if failed
            die("Can't move file.");
        }
        unlink($filepath); // Delete the temp file

        echo "File uploaded successfully :)";
    
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

    public static function message($code)
    {
        switch ($code) {
            case 0:
                $message = '';
                break;
            case 1:
                $message = 'Produit ajouté au panier';
                break;
            case 2:
                $message = 'Wesh Fatima tu fous quoi ?';
                break;
            default:
                $message = "";
                header('location:/error');
                break;
        }
        return $message;
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
