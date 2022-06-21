<?php
require __DIR__ . '/../Database/DB.php';

class Publisher
{


    private $conn;
    private $table = 'book';

    public $titre_book;
    public $category_book;
    public $classification;
    public $couverture;
    public $Description;
    public $id_book;
    public $id_user;
    public $index_chapiter;
    public $chapiter;
    public $title_chapiter;
    public $publish;
    public $Langage;
    public $index;

    public function __construct()
    {
        $database = new DB();
        $this->conn = $database->connect();
    }


    public function Description()
    {
        $query = "INSERT INTO $this->table (`Id_book`, `titre_book`, `category_book`, `classification`, `couverture`, `Description`, `Langage`, `Id_user`) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($query);


        $this->id_book = htmlspecialchars(strip_tags($this->id_book));
        $this->titre_book = htmlspecialchars(strip_tags($this->titre_book));
        $this->category_book = htmlspecialchars(strip_tags($this->category_book));
        $this->classification = htmlspecialchars(strip_tags($this->classification));
        $this->couverture = htmlspecialchars(strip_tags($this->couverture));
        $this->Description = htmlspecialchars(strip_tags($this->Description));
        $this->Langage = htmlspecialchars(strip_tags($this->Langage));


        $stmt->bindParam(1, $this->id_book);
        $stmt->bindParam(2, $this->titre_book);
        $stmt->bindParam(3, $this->category_book);
        $stmt->bindParam(4, $this->classification);
        $stmt->bindParam(5,  $this->couverture);
        $stmt->bindParam(6,  $this->Description);
        $stmt->bindParam(7,  $this->Langage);
        $stmt->bindParam(8,  $this->id_user);

        if ($stmt->execute()) {
            return $this->id_book;
        }
        return false;
    }

    public function getAll()
    {
        $query = "SELECT `Id_book`, `titre_book`, `category_book`, `classification`, `couverture`, `Description`, `Langage`, `Id_user`, `pro_image` , `f_name`, `l_name` FROM $this->table  INNER JOIN utilisateur ON Id_user = id_utilisateur AND Annuler = 0 AND publisher = 1 WHERE 1";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public function myBooks()
    {
        $query = "SELECT * FROM $this->table WHERE Id_user = ?";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->id_user);

        if ($stmt->execute()) {
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
        return false;
    }

    public function Writing(
        $title,
        $body,
        $index
    ) {


        $query = "INSERT INTO `chapiter` (`Id_book`, `titre_paragraphe`, `paragraphe`, `index_chapiter`) VALUES (?,?,?,?)";
        $stmt = $this->conn->prepare($query);

        $this->id_book = htmlspecialchars(strip_tags($this->id_book));
        $this->index_chapiter = htmlspecialchars(strip_tags($index));
        $this->chapiter = htmlspecialchars(strip_tags($body));
        $this->title_chapiter = htmlspecialchars(strip_tags($title));

        $stmt->bindParam(1, $this->id_book);
        $stmt->bindParam(2, $this->title_chapiter);
        $stmt->bindParam(3, $this->chapiter);
        $stmt->bindParam(4, $this->index_chapiter);


        if ($stmt->execute()) {
            return true;
        }
        return false;
    }


    public function getBook()
    {
        $query = "SELECT `Id_paragraphe`,`titre_paragraphe`, `paragraphe`, `index_chapiter` , `Id_user` FROM `chapiter` INNER JOIN $this->table ON chapiter.Id_book = $this->table.Id_book WHERE chapiter.Id_book = ? And chapiter.index_chapiter = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id_book);
        $stmt->bindParam(2, $this->index_chapiter);

        if ($stmt->execute()) {

            return true;
        }
        return false;
    }


    public function Del()
    {
        $query = "UPDATE $this->table SET `Annuler`= 1 WHERE Id_book = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id_book);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }



    public function publBook()
    {
        $query = "UPDATE $this->table SET `publisher`= :publ WHERE Id_book = :id AND (SELECT COUNT(*) FROM `chapiter` WHERE Id_book = :id) > 0 ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':publ', $this->publish);
        $stmt->bindParam(':id', $this->id_book);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function OneBook()
    {
        $query = "SELECT * FROM $this->table WHERE Id_book = ? AND Id_user = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id_book);
        $stmt->bindParam(2, $this->id_user);
        if ($stmt->execute()) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        }
        return false;
    }


    public function Edit()
    {
        $query = " UPDATE  $this->table SET titre_book = :titre_book ,`category_book`= :category_book ,`classification`= :classification ,`couverture`= :couverture ,`Description`= :Description ,`Langage`= :Langage  WHERE Id_book = :id AND Id_user = :user";
        $stmt = $this->conn->prepare($query);


        $this->titre_book = htmlspecialchars(strip_tags($this->titre_book));
        $this->category_book = htmlspecialchars(strip_tags($this->category_book));
        $this->classification = htmlspecialchars(strip_tags($this->classification));
        $this->couverture = htmlspecialchars(strip_tags($this->couverture));
        $this->Description = htmlspecialchars(strip_tags($this->Description));
        $this->Langage = htmlspecialchars(strip_tags($this->Langage));


        $stmt->bindParam(':id', $this->id_book);
        $stmt->bindParam(':user', $this->id_user);
        $stmt->bindParam(':titre_book', $this->titre_book);
        $stmt->bindParam(':category_book', $this->category_book);
        $stmt->bindParam(':classification', $this->classification);
        $stmt->bindParam(':couverture',  $this->couverture);
        $stmt->bindParam(':Description',  $this->Description);
        $stmt->bindParam(':Langage',  $this->Langage);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }


    public function GetChapiters()
    {
        $query = "SELECT `Id_paragraphe`, `titre_paragraphe`, `paragraphe`, `index_chapiter` FROM `chapiter` INNER JOIN $this->table ON chapiter.Id_book = $this->table.Id_book WHERE chapiter.Id_book = ? AND $this->table.Id_user = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id_book);
        $stmt->bindParam(2, $this->id_user);

        if ($stmt->execute()) {
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
        return false;
    }



    public function DelChapter()
    {
        $query = "DELETE FROM `chapiter` WHERE id_book = ? AND index_chapiter = ?";
        $stmt = $this->conn->prepare($query);

        $this->id_book = htmlspecialchars(strip_tags($this->id_book));
        $this->index_chapiter = htmlspecialchars(strip_tags($this->index_chapiter));

        $stmt->bindParam(1, $this->id_book);
        $stmt->bindParam(2,  $this->index_chapiter);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }


    public function countRows()
    {
        $query = "SELECT COUNT(*) FROM `chapiter` WHERE id_book = ? ";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->id_book);

        if ($stmt->execute()) {
            $row = $stmt->fetch(PDO::FETCH_NUM);

            return $row;
        }
        return false;
    }
}
