<?php
require __DIR__ . '../../Model/Book.php';


class BookController
{


    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: *');
        header('Content-Type: application/json');
        header("Access-Control-Allow-Headers: *");
    }


    #####################################################################################################################################################

    public function create_book()
    {
        $post = new Publisher();

        $str = explode(' ', $_POST['titre_book']);
        $post->id_book = strtoupper($str[0]) . '-' . rand(10000, 99999);;
        $post->titre_book = $_POST['titre_book'];
        $post->category_book = $_POST['category_book'];
        $post->classification = $_POST['classification'];
        $post->couverture = $_POST['couverture'];
        $post->Description = $_POST['Description'];
        $post->Langage = $_POST['Langage'];
        $post->id_user = $_POST['id_user'];



        if (
            ($post->id_book) &&
            ($post->titre_book) &&
            ($post->category_book) &&
            ($post->classification) &&
            ($post->couverture) &&
            ($post->Description) &&
            ($post->Langage) &&
            ($post->id_user)
        ) {


            echo json_encode(
                $post->Description()
            );
        }
    }


    #########################################################################################################################################################



    public function getAllBooks()
    {
        $post = new Publisher();
        $result = $post->getAll();
        echo json_encode($result);
    }

    public function getMyBooks()
    {
        $post = new Publisher();
        $post->id_user = $_POST['id_user'];

        if ($post->id_user) {
            echo json_encode(
                $post->myBooks()
            );
        }
    }



    #########################################################################################################################################################



    public function chapters()
    {
        $post = new Publisher();


        $post->id_book = $_POST['id_book'];
        $post->chapiters = json_decode($_POST['chapiters']);

        foreach ($post->chapiters  as $chapeter) {
            if ($chapeter->title || $chapeter->body) {
                echo json_encode(
                    $post->Writing($chapeter->title, $chapeter->body, $chapeter->index)
                );
            }
        }
    }




    #########################################################################################################################

    public function readBook()
    {
        $post = new Publisher();
        $post->id_book = $_POST['id_book'];
        $post->index_chapiter = $_POST['chapiter'];

        if ($post->id_book) {
            echo json_encode(
                $post->getBook()
            );
        }
    }







}
