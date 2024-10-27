<?php
include '../Model/database.php';  

class crudOperation {
    private $db;

    public function __construct() {
        $database = new Database();
        $db_response = $database->login();

        // Check if login was successful and assign the connection to $this->db
        if ($db_response === true) {
            $this->db = $database->DBconnect();
        } else {
            die('Database connection failed or invalid login.');
        }
    }

    public function addBook($isbn, $title, $author, $stock, $price) {
        if ($this->db instanceof PDO) {
            $query = "INSERT INTO book (isbn, title, author, stock, price) VALUES (:isbn, :title, :author, :stock, :price)";
            $statement = $this->db->prepare($query);

            $statement->bindParam(':isbn', $isbn);
            $statement->bindParam(':title', $title);
            $statement->bindParam(':author', $author);
            $statement->bindParam(':stock', $stock);
            $statement->bindParam(':price', $price);

            $statement->execute();
        } else {
            die('No valid database connection.');
        }
    }

    public function updateBook($isbn, $title, $author, $stock, $price) {
        if ($this->db instanceof PDO) {
            // SQL query to update a book based on ISBN
            $query = "UPDATE book SET title = :title, author = :author, stock = :stock, price = :price WHERE isbn = :isbn";
            $statement = $this->db->prepare($query);

            // Bind parameters
            $statement->bindParam(':isbn', $isbn);
            $statement->bindParam(':title', $title);
            $statement->bindParam(':author', $author);
            $statement->bindParam(':stock', $stock);
            $statement->bindParam(':price', $price);

            // Execute the query
            $statement->execute();
        } else {
            die('No valid database connection.');
        }
    }

    public function deleteBook($isbn){
        if($this->db instanceof PDO){
            $query = "DELETE FROM book WHERE isbn = :isbn";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':isbn', $isbn);
            $statement->execute();
        } else {
            die('No valid database connection.');
        }
    }
}

?>
