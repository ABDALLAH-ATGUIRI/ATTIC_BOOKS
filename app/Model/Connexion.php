<?php

require __DIR__ . '/../Database/DB.php';

class Connexion
{

    private $conn;
    private $table = 'utilisateur';


    public $nom;
    public $prenom;
    public $email;
    public $naissance;
    public $password;

    public function __construct()
    {
        $database = new DB();
        $this->conn = $database->connect();
    }


    public function read()
    {

        $query = 'SELECT *  FROM ' . $this->table . '';

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }


    public function read_single($id)
    {

        $query = "SELECT *  FROM $this->table  WHERE email = ? LIMIT 0,1 ";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $id);
 
        if ($stmt->execute()) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        };
    }

    public function create()
    {
        // $query = 'INSERT INTO user SET nome = :nome, prenom = :prenom, phone = :phone , naissance = :naissance , id = :id';
        $query = "INSERT INTO $this->table(`f_name`, `l_name`,`naissance`, `email`, `password`) VALUES (? , ? , ? , ? , ?)";
        $stmt = $this->conn->prepare($query);


        $this->nome = htmlspecialchars(strip_tags($this->nom));
        $this->prenom = htmlspecialchars(strip_tags($this->prenom));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->naissance = htmlspecialchars(strip_tags($this->naissance));
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);

        $stmt->bindParam(1, $this->nom);
        $stmt->bindParam(2, $this->prenom);
        $stmt->bindParam(4, $this->email);
        $stmt->bindParam(3, $this->naissance);
        $stmt->bindParam(5,  $this->password);

        if ($stmt->execute()) {
            return  true;
        } else {
            printf("Error: %s.\n", $stmt->error);
            return false;
        }
    }
}
