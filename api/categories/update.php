<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  require('../../config/Database.php') ;
  require('../../models/Category.php') ;

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate category object
  $category = new Category($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  if ( !empty($data->id) && !empty($data->category)){
    
    // Set ID to update
    $category->id = $data->id;
    $category->category = $data->category;

    // Update category
    if($category->update()) {
      echo json_encode(
        array('message' => 'category Updated')
      );
    } else {
      echo json_encode(
        array('message' => 'category Not Updated')
      );
    }

  }else{
    echo json_encode(
      array('message' => 'Missing Required Parameters')
    );
  }
 
