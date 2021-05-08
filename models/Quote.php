<?php 
  class Quote {
    // DB  
    private $conn;
    private $table = 'quotes';

    // quote properties
    public $id;
    public $quote;
    public $authorId;
    public $categoryId;
    public $limit;
     
    // Constructor  
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get quotes  
    /*
    public function read() {
      // query
      $query = 'SELECT quotes.id, quote, author, category 
                FROM quotes
                JOIN authors
                ON quotes.authorId = authors.id
                JOIN categories
                ON quotes.categoryId = categories.id';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    */ 

    // read single quote
    public function read_single() {
      // query
      $query = 'SELECT quotes.id, quote, author, category 
                FROM quotes
                JOIN authors
                ON quotes.authorId = authors.id
                JOIN categories
                ON quotes.categoryId = categories.id
                WHERE quotes.id = ?
                LIMIT 0, 1';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->id);

      // Execute query
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // Set properties
      $this->id = $row['id'];
      $this->quote = $row['quote'];
      $this->author = $row['author'];
      $this->category = $row['category'];
     
    }

    // Create quotes
    public function create() {
      // Create query
      $query = 'INSERT INTO quotes SET quote = :quote, authorId = :authorId, categoryId = :categoryId';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->quote = htmlspecialchars(strip_tags($this->quote));
      $this->authorId = htmlspecialchars(strip_tags($this->authorId));
      $this->categoryId = htmlspecialchars(strip_tags($this->categoryId));

      // Bind data
      $stmt->bindParam(':quote', $this->quote);
      $stmt->bindParam(':authorId', $this->authorId);
      $stmt->bindParam(':categoryId', $this->categoryId);

      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Update quotes
    public function update() {
      // Create query
      $query = 'UPDATE quotes
                SET quote = :quote, authorId = :authorId, categoryId = :categoryId
                WHERE id = :id';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->title = htmlspecialchars(strip_tags($this->quote));
      $this->author = htmlspecialchars(strip_tags($this->authorId));
      $this->category_id = htmlspecialchars(strip_tags($this->categoryId));
      $this->id = htmlspecialchars(strip_tags($this->id));

      // Bind data
      $stmt->bindParam(':quote', $this->quote);
      $stmt->bindParam(':authorId', $this->authorId);
      $stmt->bindParam(':categoryId', $this->categoryId);
      $stmt->bindParam(':id', $this->id);

      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Delete quotes
    public function delete() {
      // Create query
      $query = 'DELETE FROM quotes WHERE id = :id';

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

    // get quotes by authorId and categoryId
    public function read($authorId, $categoryId, $limit) {

      // query
      $query = 'SELECT quotes.id, quote, author, category 
                FROM quotes
                JOIN authors
                ON quotes.authorId = authors.id
                JOIN categories
                ON quotes.categoryId = categories.id';
      
      if ($authorId && $categoryId) { 
        $query .= ' WHERE quotes.authorId = :authorId 
                  AND quotes.categoryId = :categoryId';
        // Prepare statement
        $stmt = $this->conn->prepare($query);
        // Clean data
        $this->authorId = htmlspecialchars(strip_tags($this->authorId));
        $this->categoryId = htmlspecialchars(strip_tags($this->categoryId));
        // bind values
        $stmt->bindValue(':authorId', $this->authorId);
        $stmt->bindValue(':categoryId', $this->categoryId);

      }
      else if($authorId){
        $query .= ' WHERE quotes.authorId = :authorId';
        // Prepare statement
        $stmt = $this->conn->prepare($query);
        // Clean data
        $this->authorId = htmlspecialchars(strip_tags($this->authorId));
        // bind values
        $stmt->bindValue(':authorId', $this->authorId);

      }else if($categoryId){
        $query .= ' WHERE quotes.categoryId = :categoryId';
        // Prepare statement
        $stmt = $this->conn->prepare($query);
        // Clean data
        $this->categoryId = htmlspecialchars(strip_tags($this->categoryId));
        // bind values
        $stmt->bindValue(':categoryId', $this->categoryId);

      }else if($limit){
        $query .= ' LIMIT '. $limit;
        // Prepare statement
        $stmt = $this->conn->prepare($query);
        
      }
      else{
        // Prepare statement
        $stmt = $this->conn->prepare($query);
      }
      // Execute query
      $stmt->execute();
      return $stmt;
    }

    // get quotes by limit


  }