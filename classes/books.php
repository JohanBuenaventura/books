<?php

require_once "database.php";

class books{
    public $id = "";
    public $title = "";
    public $author = "";
    public $genre = "";
    public $publication_year = "";

    protected $db;

    public function __construct() {
        $this->db = new Database(); 
    }
    


    public function addBooks() {
        $sql = "INSERT INTO books (title, author, genre, publication_year) VALUE (:title, :author, :genre, :publication_year);";
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam("title",$this->title);
        $query->bindParam("author",$this->author);
        $query->bindParam("genre",$this->genre);
        $query->bindParam("publication_year",$this->publication_year);

        return $query->execute();
    }

    public function viewBooks() {
        $sql = "SELECT * FROM books ORDER BY title ASC;";
        $query = $this->db->connect()->prepare($sql);

        if($query->execute()) {
            return $query->fetchAll();
        }else {
            return null;
        }
    }
}

$obj = new books();



