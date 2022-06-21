<?php
require __DIR__ . '../../Model/Admin.php';


class AdminController
{

    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: *');
        header('Content-Type: application/json');
        header("Access-Control-Allow-Headers: *");
    }




    public function Analytique()
    {

        $post = new Admin();

        $Analytique = array(

            'Books' => $post->CountAllBooks(),
            'PubBooks' => $post->CountBooksPublic(),
            'Readers' => $post->Readers(),
            'Authors' => $post->Authors(),
            'Bannis' => $post->Bannis()


        );

        echo json_encode(
            $Analytique
        );
    }


    public function AllUsers()
    {

        $post = new Admin();

        if ($row = $post->users()) {
            echo json_encode(
                $row
            );
        } else {
            echo 'data is filed';
        }
    }




    public function banned()
    {

        $post = new Admin();

        $post->id_user = $_POST['id_user'];
        $post->banned = !$_POST['banned'];


        if ($post->id_user) {
            echo json_encode(
                $post->bannedUser()
            );
        }
    }
}
