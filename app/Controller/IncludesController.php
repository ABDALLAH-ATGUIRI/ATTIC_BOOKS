<?php


class IncludesController
{

    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: *');
        header('Content-Type: application/json');
        header("Access-Control-Allow-Headers: *");
    }

    public function uploads()
    {
        $target_path  = 'C:/xampp/htdocs/file_rouge/attic_books/src/assets/uploads/';
        $uniq_name = $_POST['uniqName'];
        $target_path = $target_path . $uniq_name;

        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $target_path)) {
            echo "The file " .  basename($_FILES['avatar']['name']) . " has been uploaded";
        } else {
            echo "There was an error uploading the file, please try again!";
        }
    }
}
