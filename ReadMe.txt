Final Project Notes
1) Use the OOP examples from the Traversy Media video tutorials
provided last week (week 14) as a guideline to set up your basic
REST API with CRUD operations.
2) The textbook took a different approach to applying OOP than the
videos. If you are using something like QuotesDB::doSomething()...
stop right there. Watch last week's tutorial videos and apply OOP as
seen in the videos.
3) The videos use include_once(). It works. However, require() is
preferred.
4) The videos retrieve GET request data from $_GET['id'] ...but we
have learned filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) is
a better way to go.
5) For requests other than GET that use file_get_contents() to retrieve
data, the video tutorials do not take the time to check for !empty()
parameters. You should. This will eliminate potential errors.
6) There is one example of print_f() in the videos. Stick with
json_encode() for your responses.
7) Inside the Quote.php model file, if you have a limit value, you will
want to bind it to a query. Using bindParam() won't work because
the limit value will be within quotes inside the query. Use
bindValue(). Look up bindValue in the PHP docs and/or Google
examples. Googling is the MOST underrated developer skill.
8) The index.php in the root directory that displays the quotes on a
web page does not use the API to request the data. This is because it
is on the same server and has direct access. Approach this index.php
like a controller that has only one possible outcome:
include('view/quotes_list.php')
A Quick Logic Walk-thru for using OOP in this project:
This is the same for any of the API route files (index.php,
read_single.php, update.php, etc...)
1) Require the models.
2) Connect to the database. The video examples show the use of
dependency injection which is a good thing. This approach is the
standard. Dependency injection refers to us passing the $db into the
models when we instantiate them.
3) Instantiate the models needed. For example: $quote = new
Quote($db);
4) Gather parameter data sent to controller with filter_input()
5) If parameter data is received, pass it to the instantiated model. For
example: if ($authorId) { $quote->authorId = $authorId; }
6) If you're going to pass the authorId to the quote model, the
authorId needs to be one of the properties of the class in Quote.php.
7) Call the needed CRUD operation from the model. For example:
$result = $quote->read();
