<?php 

  // require the database
  require('config/Database.php');
  
  // require models
  require('models/Quote.php');
  require('models/Category.php');
  require('models/Author.php');

  // connect to database
  $database = new Database();
  $db = $database->connect();

  // instantiate model
  $quote = new Quote($db);
  $category = new Category($db);
  $author = new Author($db);

  // get params sent to controller
  $authorId = filter_input(INPUT_GET, 'authorId', FILTER_VALIDATE_INT);
  $categoryId = filter_input(INPUT_GET, 'categoryId', FILTER_VALIDATE_INT);
  $limit = filter_input(INPUT_GET, 'limit', FILTER_VALIDATE_INT);

  // get requested quote data
  if ($authorId) { $quote->authorId = $authorId; }
  if ($categoryId) { $quote->categoryId = $categoryId; }
  if ($limit) { $quote->limit = $limit; }

  // Read the data 
  $authors = $author->read();
  $categories = $category->read();
  $quotes = $quote->read($authorId, $categoryId, $limit);

  //include the view
  include('view/quotes_list.php');
