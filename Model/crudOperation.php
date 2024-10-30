<?php
    //include_once '../Model/database.php';  
    $db = new PDO('mysql:host=127.0.0.1;dbname=bookstore', 'root', 'put your database password here');

    function addBook($isbn, $title, $author, $stock, $price) {
        global $db; // Access the global $db variable
        if ($db instanceof PDO) {
            $query = "INSERT INTO book (isbn, title, author, stock, price) VALUES (:isbn, :title, :author, :stock, :price)";
            $statement = $db->prepare($query);

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

    function readBook(){
        global $db;
        if($db instanceof PDO){
            $query = "SELECT * FROM book";
            $statement = $db->prepare($query);
            $statement->execute();
            return $statement->fetchAll();
        }else{
            die("No valid database connection");
        }
    }

    function updateBook($isbn, $title, $author, $stock, $price) {
        global $db; // Access the global $db variable
        if ($db instanceof PDO) {
            $query = "UPDATE book SET title = :title, author = :author, stock = :stock, price = :price WHERE isbn = :isbn";
            $statement = $db->prepare($query);

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

    function deleteBook($isbn){
        global $db; // Access the global $db variable
        if($db instanceof PDO){
            $query = "DELETE FROM book WHERE isbn = :isbn";
            $statement = $db->prepare($query);
            $statement->bindParam(':isbn', $isbn);
            $statement->execute();
        } else {
            die('No valid database connection.');
        }
    }
?>