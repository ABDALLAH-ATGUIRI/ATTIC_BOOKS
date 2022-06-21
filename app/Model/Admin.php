<?php
require __DIR__ . '/../Database/DB.php';

class Admin
{



    public $id_book;
    public $id_user;
    public $id_chapiter;
    public $id_commenter;
    public $commenter;
    public $banned ;

    public function __construct()
    {
        $database = new DB();
        $this->conn = $database->connect();
    }

    public function CountBooksPublic()
    {
        $query = "SELECT COUNT(*) FROM book WHERE Annuler = 0 AND Publisher = 1 ";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {
            return $stmt->fetch();
        } else {
            return false;
        }
    }


    public function CountAllBooks()
    {
        $query = "SELECT COUNT(*) FROM book WHERE Annuler = 0";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {
            return $stmt->fetch();
        } else {
            return false;
        }
    }


    public function Readers()
    {


        $query = "SELECT COUNT(*) FROM utilisateur WHERE banned = 0";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {
            return $stmt->fetch();
        } else {
            return false;
        }
    }


    public function Bannis()
    {


        $query = "SELECT COUNT(*) FROM utilisateur WHERE banned = 1";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {
            return $stmt->fetch();
        } else {
            return false;
        }
    }


    public function Authors()
    {
        $query = "SELECT DISTINCT COUNT(Id_user) FROM book WHERE Annuler = 1";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {
            return $stmt->fetch();
        } else {
            return false;
        }
    }


    public function users()
    {
        $query = "SELECT `id_utilisateur`, `f_name`, `l_name`, `email`, `bg_image`, `pro_image`, `banned` FROM `utilisateur` WHERE 1";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }



    public function bannedUser()
    {
        
        $query = "UPDATE `utilisateur` SET `banned` = :banned WHERE id_utilisateur = :id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':banned', $this->banned);
        $stmt->bindParam(':id', $this->id_user);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }



   
}
