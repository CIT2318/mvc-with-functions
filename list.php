<<<<<<< HEAD
<?php
try{
       $conn = new PDO('mysql:host=localhost;dbname=u0123456', 'u0123456', '01jan96');
}
catch (PDOException $exception) 
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}

//select all the films
$query = "SELECT * FROM films";
$resultset = $conn->query($query);
$films = $resultset->fetchAll();
$conn=NULL;

?>


<!DOCTYPE HTML>
<html>
<head>
<title>List the films</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<ul>
<li><a href="create.php">Create</a></li>
<li><a href="list.php">Read</a></li>
<li><a href="edit-list.php">Update</a></li>
<li><a href="delete-list.php">Delete</a></li>
</ul>
<?php

//loop over the array of films
foreach ($films as $film) {
    echo "<p>";
    echo "<a href='details.php?id=".$film['id']."'>";
    echo $film["title"];
    echo "</a>";
    echo "</p>";
}
=======

<?php

require_once("models/film-model.php");
$films=getAllFilms();
$pageTitle="List all films";
include("views/list-view.php");
>>>>>>> 1803d5ed52c5b6b1b052252b0132742fa0a04abb

?>
