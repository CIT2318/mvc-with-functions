# MVC with Functions

This practical looks at moving from an application built using single, flat PHP files to an MVC structure that uses functions to structure code. You need a good grasp of basic function concepts - arguments, parameters, returning values etc. before attempting this.
* Download this repository.
* You should have a films table in your database already from term 1. If you don't, you can download it from https://github.com/CIT2318/intro-to-mysql-sql/blob/master/films.sql. Import this table using phpmyadmin and check it has worked.
* Change the connection settings in *list.php* so that it works with your database.
* Put  *list.php* on a server and check it works. A user should be able to view a list of all films from the database.
* Now try and re-structure this PHP page so that it uses an MVC structure.

If you have a look in the models folder, there is a file, *film-model.php*. This contains a number of functions for working with a film database table e.g. *getFilmsById*, *saveFilm*, *deleteFilms* etc. If you look in the views folder, there is a file *list-view.php*. This file contains code for outputting a list of films. 

* Change *list.php* so that it includes *film-model.php* and calls the *getAllFilms* function.
* Change *list.php* so that it loads *list-view.php* to display the list of films.

 The code in *list.php* will then look like the following:

```php
include "models/film-model.php";
$films=getAllFilms();
$title="List all films";
include "views/list-view.php";
```

* Take a moment to really understand how the code in these files has been organised.
  - *list.php* is your controller.
  - *film-model.php* is the model.
  - *list-view.php* is the view.

* Try and do the same for the other pages in the site.
  * Start with *details.php*.
  * Call the functions in the *film-model.php* file to retrieve data from the database.
  * Move the HTML and code for outputting data into a view file, save this in the *views* folder and include this file.
  * Repeat the above steps for the *create* functionality. 
