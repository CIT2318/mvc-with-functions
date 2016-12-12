#MVC with Functions

* You should have a films table in your database already from term 1. If you don't, import films.sql and check this has worked. 

* Put the entire website from the repository on a server and check it works. A user should be able to view a list of films, view details for a film, insert new films and delete films. We have looked at all this code previously.

* Try and re-structure this website so that it uses an MVC structure. 

To start with create a new file, film-model.php. Add the following code:

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

* Open list.php. 
* Modify list.php so that it calls the getAllFilms() function. See the lecture slides if you get stuck. 
* Separate the printing of the films as hyperlinks into a view (just like we did last week when separating logic from presentation).
* list.php (your controller) should then look something like the following:

```php
require_once("film-model.php");
$films=getAllFilms();
$title="List all films";
include("list-view.php");
```

* Try and do the same for the other pages in the site. 
  * Move all database related code into functions in the film-model.php file
  * Move the HTML and code for outputting data it a view file. 