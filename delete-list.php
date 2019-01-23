<?php
require_once "models/film-model.php";
$films = getAllFilms();
require "views/delete-list-view.php";
?>