<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  require( '../../config/Database.php');
  require( '../../models/Quote.php');

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate quote object
  $quote = new Quote($db);
  
  // get params
  $authorId = filter_input(INPUT_GET, 'authorId', FILTER_VALIDATE_INT);
  $categoryId = filter_input(INPUT_GET, 'categoryId', FILTER_VALIDATE_INT);
  $limit = filter_input(INPUT_GET, 'limit', FILTER_VALIDATE_INT);
  
  // pass params to model
  if ($authorId || $categoryId || $limit) {
    $quote->authorId = $authorId; 
    $quote->categoryId = $categoryId;
    $quote->limit = $limit;
  }

  // quote query
  $result = $quote->read($authorId, $categoryId, $limit) ; 
  
  // Get row count
  $num = $result->rowCount();

  // Check if any quotes
  if($num > 0) {

    // quote array
    $quotes_arr = array();
     
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $quote_item = array(
        'id' => $id,
        'quote' => $quote,
        'author' => $author,
        'category' => $category
      );

      // Push to arr
      array_push($quotes_arr, $quote_item);
      
    }

    // Turn to JSON & output
    echo json_encode($quotes_arr);

  } else {
    // No quotes
    echo json_encode(
      array('message' => 'No Quote Found')
    );
  }
