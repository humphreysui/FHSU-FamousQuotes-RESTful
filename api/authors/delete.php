<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  require('../../config/Database.php') ;
  require('../../models/Author.php') ;

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate author object
  $author = new Author($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  if (!empty($data->id)){

    // get id
    $author->id = $data->id;

    // Delete author
    if($author->delete()) {
      echo json_encode(
        array('message' => 'author Deleted')
      );
    } else {
      echo json_encode(
        array('message' => 'author Not Deleted')
      );
    }

  }else{
    echo json_encode(
      array('message' => 'Missing Required Parameters')
    );
  }

