<?php

require_once "models/film-model.php";

if(isset($_POST['ids'])){
	//the ids come from the form as an array e.g. ids=[3,6,7]
	$ids=$_POST['ids'];
	$numFilms=count($ids);
	deleteFilms($ids);
}else{
    $msg="<p>No films selected.</p>";
}

require "views/delete-view.php";
?>

