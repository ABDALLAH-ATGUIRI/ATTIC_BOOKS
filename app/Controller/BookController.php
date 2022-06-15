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


    ##########################################################################################################################



    public function DelBook()
    {
        $post = new Publisher();
        $post->id_book = $_POST['id_book'];

        if ($post->id_book) {
            echo json_encode(
                $post->Del()
            );
        }
    }


    #####################################################################################################################################"


    public function PublishBook()
    {
        $post = new Publisher();
        $post->id_book = $_POST['id_book'];
        $post->publish = !$_POST['publish'];


        if ($post->id_book) {
            echo json_encode(
                $post->publBook()
            );
        }
    }


    #################################################################################################################################################


    public function getOneBook()
    {
        $post = new Publisher();
        $post->id_book = $_POST['id_book'];
        $post->id_user = $_POST['id_user'];

        if ($post->id_book && $post->id_user) {
            echo json_encode(
                $post->OneBook()
            );
        }
    }

    ################################################################################################################################################


    public function EditBook()
    {
        $post = new Publisher();

        $post->id_book = $_POST['id_book'];
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
                $post->Edit()
            );
        }
    }

    ################################################################################################################################################

    public function GetAllChapiters()
    {
        $post = new Publisher();
        $post->id_book = $_POST['id_book'];
        $post->id_user = $_POST['id_user'];


        if ($post->id_book && $post->id_user) {
            echo json_encode(
                $post->GetChapiters()
            );
        }
    }

    ################################################################################################################################################

    // public function EditChapiters()
    // {
    //     $post = new Publisher();
    //     $post->id_book = $_POST['id_book'];
    //     $title = json_decode($_POST['title']);
    //     $body = json_decode($_POST['body']);
    //     $index = json_decode($_POST['index']);


    //     if ($title || $body) {
    //         json_encode(
    //             $post->Writing($title, $body, $index)
    //         );
    //     }
    // }


    #########################################################################################################################################################



    public function chapters()
    {

        $post = new Publisher();
        $post->id_book = json_decode($_POST['id_book']);
        $title = json_decode($_POST['title']);
        $body = json_decode($_POST['body']);
        $index  = json_decode($_POST['index']);



        if ($index || $post->id_book) {
            echo json_encode(
                $post->Writing($title, $body, $index)
            );
        } else {
            echo 'data is filed';
        }
    }


    #########################################################################################################################################################



    public function delChapters()
    {

        $post = new Publisher();
        $post->id_book = json_decode($_POST['id_book']);
        $post->index_chapiter  = json_decode($_POST['index']);

        if ($post->index_chapiter || $post->id_book) {
            echo json_encode(
                $post->DelChapter()
            );
        } else {
            echo 'data is filed';
        }
    }
}
