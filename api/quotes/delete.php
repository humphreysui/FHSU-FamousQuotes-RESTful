<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
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

  if (!empty($data->id)){

    // get id
    $quote->id = $data->id;

    // Delete quote
    if($quote->delete()) {
      echo json_encode(
        array('message' => 'Quote Deleted')
      );
    } else {
      echo json_encode(
        array('message' => 'Quote Not Deleted')
      );
    }
  }else{
    echo json_encode(
      array('message' => 'Missing Required Parameters')
    );
  }
