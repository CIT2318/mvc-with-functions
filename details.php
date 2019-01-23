
<?php
require_once "models/film-model.php";
$filmId=$_GET['id']; 
$film = getFilmById($filmId);
require "views/details-view.php";
?>