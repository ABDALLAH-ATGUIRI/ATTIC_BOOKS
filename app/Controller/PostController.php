<?php
require __DIR__ . '../../Model/Postes.php';


class PostController
{


    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: *');
        header('Content-Type: application/json');
        header("Access-Control-Allow-Headers: *");
    }


    public function AddComm()
    {

        $post = new Post();


        $post->id_user = $_POST['Id_user'];
        $post->commenter = $_POST['commenter'];
        $post->id_chapiter = $_POST['Id_chapiter'];

        if (
            ($post->id_user) &&
            ($post->commenter) &&
            ($post->id_chapiter)

        ) {
            echo json_encode(
                $post->AddCommenter()
            );
        }
    }

    public function getComm()
    {
        $post = new Post();

        $post->id_chapiter = $_POST['Id_chapiter'];

        if (
            ($post->id_chapiter)
        ) {
            echo json_encode(
                $post->getAllComment()
            );
        }
    }

    public function count()
    {
        $post = new Post();

        $post->id_chapiter = $_POST['Id_chapiter'];

        if (
            ($post->id_chapiter)
        ) {
            echo json_encode(
                $post->countComm()
            );
        }
    }
}
