<?php
require __DIR__ . '/../Database/DB.php';

class Publisher
{


    private $conn;
    private $table = 'book';

    public $Title_book;
    public $Category_book;
    public $Classification;
    public $Language_book;
    public $Coverture;
    public $Description;
    public $id_book;
    public $id_user;
    public $index_chapiter;
    public $chapiter;
    public $title_chapiter;

    public function __construct()
    {
        $database = new DB();
        $this->conn = $database->connect();
    }


    public function Description()
    {
        $query = "INSERT INTO $this->table (`Id_book`, `titre_book`, `category_book`, `classification`, `couverture`, `Description`, `Langage`, `Id_user`) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($query);


        $this->nome = htmlspecialchars(strip_tags($this->id_book));
        $this->prenom = htmlspecialchars(strip_tags($this->titre_book));
        $this->email = htmlspecialchars(strip_tags($this->category_book));
        $this->naissance = htmlspecialchars(strip_tags($this->classification));
        $this->naissance = htmlspecialchars(strip_tags($this->couverture));
        $this->naissance = htmlspecialchars(strip_tags($this->Description));
        $this->naissance = htmlspecialchars(strip_tags($this->Langage));


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
        } else {
            return false;
        }
    }

    public function getAll()
    {
        $query = "SELECT `Id_book`, `titre_book`, `category_book`, `classification`, `couverture`, `Description`, `Langage`, `Id_user`, `pro_image` , `f_name`, `l_name` FROM $this->table  INNER JOIN utilisateur ON Id_user = id_utilisateur WHERE 1";
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
    }

    public function Writing(
        $title,
        $body,
        $index
    ) {
        $query = "INSERT INTO `chapiter` (`Id_book`, `titre_paragraphe`, `paragraphe`, `index`) VALUES (?,?,?,?)";
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
            return $this->id_book;
        } else {
            return false;
        }
    }


    public function getBook()
    {
        $query = "SELECT * FROM `chapiter` WHERE Id_book = ? And index_chapiter = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id_book);
        $stmt->bindParam(2, $this->index_chapiter);

        if ($stmt->execute()) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        }
    }
}
