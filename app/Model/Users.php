<?php

require __DIR__ . '/../Database/DB.php';

class Users
{

    private $conn;
    private $table = 'utilisateur';


    public $nom;
    public $prenom;
    public $email;
    public $naissance;
    public $pro_img;
    public $bg_img;
    public $idAuthor;

    public function __construct()
    {
        $database = new DB();
        $this->conn = $database->connect();
    }


    public function getAuthor()
    {
        $query = "SELECT `f_name`, `l_name`, `email`, `naissance`, `bg_image`, `pro_image` FROM `utilisateur` WHERE id_utilisateur = ?";


        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->idAuthor);

        if ($stmt->execute()) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }
    }

    public function getAllAuthors()
    {
        $query = "SELECT DISTINCT `Id_user` , `f_name`, `l_name` FROM $this->table  INNER JOIN `Book` ON Id_user = id_utilisateur  ";
        $stmt = $this->conn->prepare($query);
        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }


    public function getAuthors()
    {
        $query = "SELECT `id_utilisateur`, `f_name`, `l_name` , `bg_image`, `pro_image`  FROM `utilisateur` ORDER BY RAND() LIMIT 4";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $row;
        }
    }
}
