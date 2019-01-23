<?php

try{
    $conn = new PDO('mysql:host=localhost;dbname=u0123456', 'u0123456', '01jan96');
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $exception) 
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}

//This is a simple example we would normally do some validation here

//the id from the query string e.g. details.php?id=4
//Simple validation
if(isset($_POST['ids'])){
	//the ids come from the form as an array e.g. ids=[3,6,7]
	$ids=$_POST['ids'];
	$numFilms=count($ids);
	//prepared statement uses the id to delete a single film
	$stmt = $conn->prepare("DELETE FROM films WHERE films.id = :id");
	//loop over the array of ids to delete multiple students
	foreach($ids as $id){
		$stmt->bindValue(':id',$id);
		$stmt->execute();
	}
}else{
    $msg="<p>No films selected.</p>";
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
if(isset($msg)){
	echo "<p>{$msg}</p>";
}else{
	echo "Deleted {$numFilms} films";
}
?>
</body>
</html>

