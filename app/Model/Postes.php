<?php
require __DIR__ . '/../Database/DB.php';

class Post
{


    private $conn;
    private $table = 'commenter';



    public $id_book;
    public $id_user;
    public $id_chapiter;
    public $id_commenter;
    public $commenter;

    public function __construct()
    {
        $database = new DB();
        $this->conn = $database->connect();
    }


    public function AddCommenter()
    {
        $query = "INSERT INTO $this->table (`Id_utilisateur`, `Id_paragraphe`, `commneter`) VALUES (?,?,?)";
        $stmt = $this->conn->prepare($query);


        $this->nome = htmlspecialchars(strip_tags($this->commenter));

        $stmt->bindParam(1, $this->id_user);
        $stmt->bindParam(2, $this->id_chapiter);
        $stmt->bindParam(3, $this->commenter);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllComment()
    {
        $query = "SELECT utilisateur.id_utilisateur, f_name , l_name , `commneter` , Id_commenter , `pro_image` FROM $this->table INNER JOIN utilisateur ON utilisateur.id_utilisateur = $this->table.Id_utilisateur WHERE Id_paragraphe = ? ";
        $stmt = $this->conn->prepare($query);

        $this->nome = htmlspecialchars(strip_tags($this->commenter));

        $stmt->bindParam(1, $this->id_chapiter);

        if ($stmt->execute()) {
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        } else {
            return false;
        }
    }

    public function countComm()
    {
        $query = "SELECT COUNT(*) FROM $this->table WHERE Id_paragraphe = ? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id_chapiter);

        if ($stmt->execute()) {

            return $stmt->fetch(PDO::FETCH_NUM);
        } else {
            return false;
        }
    }
    public function countlike()
    {
        $query = "SELECT COUNT(*) FROM $this->table WHERE Id_paragraphe = ? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id_chapiter);

        if ($stmt->execute()) {

            return $stmt->fetch();
        } else {
            return false;
        }
    }
}
