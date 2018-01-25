<?php

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

