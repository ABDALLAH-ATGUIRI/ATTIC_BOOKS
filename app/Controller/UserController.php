<?php
require_once __DIR__ . '/../Model/Connexion.php';

class userController
{
    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: *');
        header('Content-Type: application/json');
        header("Access-Control-Allow-Headers: *");
    }


    public function create()
    {
        header('Access-Control-Allow-Methods: POST');

        $post = new Connexion();
        $data = json_decode(file_get_contents("php://input"));
        $post->nom = $data->nom;
        $post->prenom = $data->prenom;
        $post->naissance = $data->naissance;
        $post->email = $data->email;
        $post->password = $data->password;
        $post->conpassword = $data->conpassword;
        if (
            $post->password == $post->conpassword
            && filter_var($post->email, FILTER_VALIDATE_EMAIL)
            && preg_match("/^[a-zA-Z0-9]*$/", $post->nom)
            && preg_match("/^[a-zA-Z0-9]*$/", $post->prenom)
        ) {

            if (
                ($post->nom) &&
                ($post->prenom) &&
                ($post->naissance) &&
                ($post->email) &&
                ($post->password)
            ) {


                echo json_encode(
                    $post->create()
                );
            }
        } else {
            echo json_encode(
                false
            );
        }
    }

    ######################################################################################################################

    public function read_One()
    {
        $post = new Connexion();
        $data = json_decode(file_get_contents("php://input"));
        if ($rep = $post->read_single($data->email)) {
            if (password_verify($data->password, $rep['password'])) {
                echo json_encode(
                    $rep
                );
            }
        };
    }

    ####################################################################################################################
    public function ImgProfile()
    {
        $post = new Connexion();

        $post->pro_img = $_POST['profile'];
        $post->id_user = $_POST['id_user'];

        if ($post->pro_img && $post->id_user) {

            echo json_encode(
                $post->profile()
            );
        }
    }

    ###############################################################################################################################
    public function ImgBackground()
    {
        $post = new Connexion();

        $post->bg_img = $_POST['Background'];
        $post->id_user = $_POST['id_user'];

        if ($post->bg_img && $post->id_user) {

            echo json_encode(
                $post->Background()
            );
        }
    }


    ###########################################################################################################################
    
}
