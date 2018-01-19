<?php
require_once "models/film-model.php";

$filmId=$_GET['id'];

if(deleteFilm($filmId)){
    $msg="<p>Deleted film with id of ".$filmId." from the database.</p>";
}else{
    $msg="<p>There was a problem deleting the record.</p>";
}
require "views/delete-view.php";
?>
