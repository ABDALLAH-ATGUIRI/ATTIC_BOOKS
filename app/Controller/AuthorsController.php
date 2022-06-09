<?php
require __DIR__ . '../../Model/Users.php';


class AuthorsController
{


    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: *');
        header('Content-Type: application/json');
        header("Access-Control-Allow-Headers: *");
    }

    public function Author()
    {
        $post = new Users();
        $post->idAuthor = $_POST['id_user'];

        if ($post->idAuthor) {

            echo json_encode(
                $post->getAuthor()
            );
        }
    }

    public function allAuthors()
    {
        $post = new Users();
        echo json_encode(
            $post->getAllAuthors()
        );
    }
}
