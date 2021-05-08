<?php
  class Author {
    // DB  
    private $conn;
    private $table = 'authors';

    // Properties
    public $id;
    public $author;
     
    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get authors
    public function read() {
      // Create query
      $query = 'SELECT id, author 
                FROM authors
                ORDER By id';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Author
    public function read_single(){
      // Create query
      $query = 'SELECT id, author 
                FROM authors
                WHERE id = ?
                LIMIT 0, 1';

      //Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->id);

      // Execute query
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // set properties
      $this->id = $row['id'];
      $this->author = $row['author'];
    }

    // Create Author
    public function create() {
      // Create query
      $query = 'INSERT INTO authors SET author = :author';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->author = htmlspecialchars(strip_tags($this->author));

      // Bind data
      $stmt->bindParam(':author', $this->author);

      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Update Author
    public function update() {
      // Create query
      $query = 'UPDATE authors
                SET author = :author
                WHERE id = :id';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->author = htmlspecialchars(strip_tags($this->author));
      $this->id = htmlspecialchars(strip_tags($this->id));

      // Bind data
      $stmt->bindParam(':author', $this->author);
      $stmt->bindParam(':id', $this->id);

      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Delete author
    public function delete() {
      // Create query
      $query = 'DELETE FROM authors WHERE id = :id';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->id = htmlspecialchars(strip_tags($this->id));

      // Bind data
      $stmt->bindParam(':id', $this->id);

      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }



}

/*
// get author
    public function get_author(){
      // query
      $query = 'SELECT quote
                FROM quotes
                JOIN authors
                ON quotes.authorId = authors.id
                WHERE authors.id = ?';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->id);

      // Execute query
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // Set properties
      $this->quote = $row['quote'];
      
    }

*/