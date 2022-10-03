INF653 Back End Web Development - Final Project Requirements
1) You will build a REST API for quotations - both famous quotes and user submissions
2) ALL quotes are required to have ALL 3 of the following:
a) Quote (the quotation itself)
b) Author
c) Category
3) Create a database named “quotesdb” with 3 tables and these specific column names:
a) quotes (id, quote, authorId, categoryId) - the last two are foreign keys
b) authors (id, author)
c) categories (id, category)
4) Response requirements:
a) All requests should provide a JSON data response.
b) All requests for quotes should return the id, quote, author, and category fields.
c) If the parameter “authorId” is received, the response should only include quotes attributed to the
specified author.
d) If the parameter “categoryId” is received, the response should only include quotes within the
specified category.
e) If “authorId” and “categoryId” parameters are passed to the endpoint, the response should only
include quotes from the specified author that are within the specified category.
f) If the parameter “limit” is passed with a request, the response should limit the quotes in the
response to no more than the number specified.
5) Your REST API will provide responses to the following GET requests:
/api/quotes/ requests return (id, quote, author, category).
/api/authors/ requests return (id, author). /api/categories/ requests return (id, category).
Request: Response (fields):
/api/quotes/ All quotes are returned (id, quote, author, category)
/api/quotes/read_single.php?id=4 The specific quote
/api/quotes/?authorId=10 All quotes from authorId=10
/api/quotes/?categoryId=8 All quotes in categoryId=8
/api/quotes/?authorId=3&categoryId=4 All quotes from authorId=3 that are in categoryId=4
/api/quotes/?limit=3 All quotes but limited to 3 quotes
/api/authors/ All authors with their id
/api/authors/read_single.php?id=5 The specific author with their id
/api/categories/ All categories with their ids (id, category)
/api/categories/read_single.php?id=7 The specific category with its id
NOTE: In the above examples, the parameter numbers are examples. You could change the limit=5 or
the authorId=2, etc. and the requests should still have the appropriate response.
6) Your REST API will provide responses to the following POST requests:
Request: Response (fields):
/api/quotes/create.php { message: ‘Quote Created’ }
Note: To create a quote, the POST submission MUST contain the quote, authorId, and categoryId.
/api/authors/create.php { message: ‘Author Created’ }
Note: To create an author, the POST submission MUST contain the author.
/api/categories/create.php { message: ‘Category Created’ }
Note: To create a category, the POST submission MUST contain the category.
7) Your REST API will provide responses to the following PUT requests:
Request: Response (fields):
/api/quotes/update.php { message: ‘Quote Updated’}
Note: To update a quote, the PUT submission MUST contain the id, quote, authorId, and categoryId.
/api/authors/update.php { message: ‘Author Updated’}
Note: To create an author, the PUT submission MUST contain the id and author.
/api/categories/update.php { message: ‘Category Updated’}
Note: To create a category, the PUT submission MUST contain the id and category.
8) Your REST API will provide responses to the following DELETE requests:
Request: Response (fields):
/api/quotes/delete.php { message: ‘Quote Deleted’}
/api/authors/delete.php { message: ‘Author Deleted’}
/api/categories/delete.php { message: ‘Category Deleted’}
Note: All delete requests require the id to be submitted.
9) A public web page available in your root directory (index.php) which displays all quotes and provides
select (dropdown) menus allowing a user to filter by author, category, or both. Responsive design for
viewing in all viewports from mobile to desktop.
10) Your project should have a GitHub repository with a pipeline connected to Heroku. The project should
utilize JawsDB on Heroku for the database. As with the Zippys project, you may develop the database
locally on MySQL first.
11) You will need to populate your own quotes database. You may want to first create secure admin pages
that allow you to add authors and categories and then create a page to add quotes as we did with
Zippys. This is up to you as these additional pages are not required (although useful). You may choose
to simply populate the database manually or with Postman to start out. A good site to find quotes by
category (topic) is: https://www.brainyquote.com/ Minimum 5 categories. Minimum 5 authors. Minimum
25 quotes total for initial data.
12) Submit the following:
a) A link to your GitHub code repository (no code updates after the due date accepted on the final
project)
b) A link to your deployed project on Heroku
c) A one page PDF document discussing what challenges you faced while building your project.
✅ Test your requests and responses with Postman: https://www.postman.com/downloads/
👁 Please Notice: The endpoints that perform the “read all” action do not have a specific “page.php” at the
end of their URLs. You may think of this as the “read.php” from the example tutorials. However, for a URL like
“/api/quotes/” to return all quotes, you should name the “read.php” file “index.php” instead. You do not need to
specify “index.php” at the end of the URL for it to load. It will do so by default. ...And this is not the index.php in
your root directory as in requirement # 9 above.
💯 Extra Credit: (up to 5 points)
Not Required but useful: Allow a “random=true” parameter to be sent via GET request so the response
received does not always contain the same quote. The response should contain a random quote that still
adheres to the other specified parameters. For example, this will allow users of the API to retrieve a single
random quote, a single random quote from Bill Gates, or a single random quote about life.
Examples of Extra Credit Requests and Responses:
Request: Response (fields):
/api/quotes/?random=true 1 random quote
/api/quotes/?authorId=7&random=true 1 random quote from the specified author
/api/quotes/?categoryId=10&random=true 1 random quote from the specified category
/api/quotes/?authorId=7&categoryId=10&random=true 1 random quote from the specified author & category
Project Rubric Below ⬇️⬇️⬇️
Rubric
Criteria Expert Proficient Developing Needs
Improvement
API: GET
Requests
30 pts
Functions as
required.
24 pts
Meets most
requirements
21 pts
Meets some
requirements
0 pts
Does not meet
requirements
/30
API: POST
Requests
10 pts
Functions as
required.
8 pts
Meets most
requirements
5 pts
Meets some
requirements
0 pts
Does not meet
requirements
/10
API: PUT
Requests
10 pts
Functions as
required.
8 pts
Meets most
requirements
5 pts
Meets some
requirements
0 pts
Does not meet
requirements
/10
API: DELETE
Requests
10 pts
Functions as
required.
8 pts
Meets most
requirements
5 pts
Meets some
requirements
0 pts
Does not meet
requirements
/10
Public
Webpage
(index.php)
10 pts
Functions as
required.
8 pts
Meets most
requirements
7 pts
Meets some
requirements
2.5 pts
Significant
Deviation
/10
Required Data 10 pts
Data as
required.
8 pts
Most data as
required.
7 pts
Some data as
required.
2.5 pts
Very little data.
/10
Deployed to
Heroku
10 pts
Deployed as
required.
0 pts
Not Deployed.
0 pts
Not Deployed.
0 pts
Not Deployed.
/10
GitHub code
repository
5 pts
Repository as
required.
0 pts
No Repository.
0 pts
No Repository.
0 pts
No Repository.
/5
One Page
Discussion
Document
5 pts
Full Discussion
as required.
4 pts
Some
Discussion.
0 pts
No Discussion.
0 pts
No Discussion.
/5
Total /100
Overall Score
Expert
90 pts minimum
Proficient
80 pts minimum
Developing
70 pts minimum
Needs
Improvement
0 pts minimum
