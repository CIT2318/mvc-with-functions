<?php
<<<<<<< HEAD
try{
       $conn = new PDO('mysql:host=localhost;dbname=u0123456', 'u0123456', '01jan96');
}
catch (PDOException $exception) 
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}

//This is a simple example we would normally do some validation here

//the id from the query string e.g. details.php?id=4
$filmId=$_GET['id'];
=======
require_once("models/film-model.php");
$filmIds=$_POST['films'];
$affected_rows = 0;
foreach($filmIds as $filmId)
{
	$affected_rows += deleteFilm($filmId);
}
$pageTitle="Deleting films";
include("views/delete-view.php");
>>>>>>> 1803d5ed52c5b6b1b052252b0132742fa0a04abb

//now delete the film itself
$stmt = $conn->prepare("DELETE FROM films WHERE films.id = :id");
$stmt->bindValue(':id',$filmId);
$affected_rows=$stmt->execute();

if($affected_rows==1){
    $msg="<p>Deleted film with id of ".$filmId." from the database.</p>";
}else{
    $msg="<p>There was a problem deleting the record.</p>";
}
$conn=NULL;
?>
<<<<<<< HEAD


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
echo $msg;
?>
</body>
</html>
=======
>>>>>>> 1803d5ed52c5b6b1b052252b0132742fa0a04abb
