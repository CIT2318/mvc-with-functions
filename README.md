#MVC with Functions

This practical looks at moving from an application built using single flat PHP files to an MVC structure.It uses functions to structure code. You need a good grasp of basic function concepts - arguments, parameters, returning values etc. before attempting this. 
* You should have a films table in your database already from term 1. If you don't, import films.sql into phpmyadmin and check this has worked. 
* Change the connection settings in list.php so that it works with your database.
* Put the  list.php on a server and check it works. A user should be able to view a list of all films from the database.
* Now try and re-structure this PHP page so that it uses an MVC structure. 

To start with create a new file, film-model.php. Add the following code (use your own connection settings):

```php
function getConnection(){
    try{
       $conn = new PDO('mysql:host=localhost;dbname=u0123456', 'u0123456', '01jan96');
    }
    catch (PDOException $exception) 
    {
        exit("Oh no, there was a problem" . $exception->getMessage());
    }
    return $conn;
}

function closeConnection($conn)
{
    $conn=null;
}

function getAllFilms()
{
    $conn = getConnection();
    $query = "SELECT * FROM films";
    $resultset = $conn->query($query);
    $films=[];

    while ($film = $resultset->fetch()) {
        $films[] = $film;
    }
    closeConnection($conn);
    return $films;
}
```  

* Open list.php in a text editor. 
* Modify list.php so that it calls the getAllFilms() function. See the lecture slides if you get stuck. 
* Separate the printing of the films as hyperlinks into a view (just like we did last week when separating logic from presentation).
* list.php (your controller) should then look something like the following:

```php
require_once("film-model.php");
$films=getAllFilms();
$title="List all films";
include("list-view.php");
```
* Take a moment to really understand how the code in these files has been organised.
* Try and do the same for the other pages in the site. 
  * Move all database related code into functions in the film-model.php file
  * Move the HTML and code for outputting data into a view file. 