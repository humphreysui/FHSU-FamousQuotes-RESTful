<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  require('../../config/Database.php') ;
  require('../../models/Quote.php') ;

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object 
  $quote = new Quote($db);

  // Get ID
  $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
  if (!empty($id)){

    $quote->id = $id;

    // Get quote
    $quote->read_single();

    // Create array
    $quote_arr = array(
      'id' => $quote->id,
      'quote' => $quote->quote,
      'author' => $quote->author,
      'category' => $quote->category
    );

    // Make JSON
    print_r(json_encode($quote_arr));
  
  }else{
    echo json_encode(
      array('message' => 'Missing Required Parameters')
    );
  }
  