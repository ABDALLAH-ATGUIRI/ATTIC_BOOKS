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

    public function newImg()
    {

        $post = new Connexion();
        $data = json_decode(file_get_contents("php://input"));

        $post->pro_img = $data->pro_image ? $data->pro_image : NULL;
        $post->bg_img = $data->bg_image ? $data->bg_image : NULL;
        $post->id_user = $data->id_user;
        echo json_encode(
            $post->addImg($data)
        );
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

    // public function read()
    // {


    //     $post = new Connexion();

    //     $result = $post->read();

    //     $num = $result->rowCount();

    //     if ($num > 0) {

    //         while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

    //             extract($row);

    //             $post_item = array(
    //                 'nome' => $nome,
    //                 'prenom' => $prenom,
    //                 'email' => $email,
    //                 'phone' => $phone,
    //                 'naissance' => $naissance,
    //                 'id' => $id
    //             );
    //         }

    //         echo json_encode($post_item);
    //     } else {
    //         echo json_encode(
    //             array('message' => 'No Posts Found')
    //         );
    //     }
    // }

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
}
