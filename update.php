<?php
require_once "models/film-model.php";

//This is a simple example we would normally do some form validation here

//basic form processing
$id=$_POST['id'];
$title=$_POST['title'];
$year=$_POST['year'];
$duration=$_POST['duration'];

updateFilm($id,$title,$year,$duration);

require "views/update-view.php";
?>

