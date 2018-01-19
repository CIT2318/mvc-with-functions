<?php
require_once "models/film-model.php";

//This is a simple example we would normally do some form validation here

//basic form processing
$id=$_POST['id'];
$title=$_POST['title'];
$year=$_POST['year'];
$duration=$_POST['duration'];

$msg="";

//SQL UPDATE to change a row in the films table


if(updateFilm($id,$title,$year,$duration)){
    $msg="<p>Successfully updated the details for ".$title."</p>";
}else{
    $msg="<p>There was a problem inserting the data.</p>";
}

require "views/save-view.php";
?>