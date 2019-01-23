<!DOCTYPE HTML>
<html>
<head>
<title>Delete the film</title>
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
if(isset($msg)){
	echo "<p>{$msg}</p>";
}else{
	echo "Deleted {$numFilms} films";
}
?>
</body>
</html>