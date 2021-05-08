<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  require('../../config/Database.php');
  require('../../models/Quote.php');

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate quote object
  $quote = new Quote($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  if ( !empty($data->id) && !empty($data->quote) && !empty($data->authorId) && !empty($data->categoryId)){
    // Set ID to update
    $quote->id = $data->id;
    $quote->quote = $data->quote;
    $quote->authorId = $data->authorId;
    $quote->categoryId = $data->categoryId;

    // Update post
    if($quote->update()) {
      echo json_encode(
        array('message' => 'quote Updated')
      );
    } else {
      echo json_encode(
        array('message' => 'quote Not Updated')
      );
    }
  }else{
    echo json_encode(
      array('message' => 'Missing Required Parameters')
    );
  }

  

