<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Author.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog author object
  $author = new Author($db);

  // Get ID
  $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
  if (!empty($id)){
    $author->id = $id;
    // Get author
    $author->read_single();

    // Create array
    $author_arr = array(
      'id' => $author->id,
      'author' => $author->author
    );

    // Make JSON
    print_r(json_encode($author_arr));
  }else{
    echo json_encode(
      array('message' => 'Missing Required Parameters')
    );
  }