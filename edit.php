<?php
try{
    $conn = new PDO('mysql:host=localhost;dbname=u0123456', 'u0123456', '01jan96');
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $exception) 
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}

//select the details for the chosen film using the id from the query string e.g. edit.php?id=4
$filmId=$_GET['id']; 
//prepared statement uses the id to select a single film
$stmt = $conn->prepare("SELECT * FROM films WHERE films.id = :id");
$stmt->bindValue(':id',$filmId);
$stmt->execute();
$film=$stmt->fetch();

$conn=NULL;

?>

<!DOCTYPE HTML>
<html>
<head>
<title>Edit the film details</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<ul>
<li><a href="create.php">Create</a></li>
<li><a href="list.php">Read</a></li>
<li><a href="edit-list.php">Update</a></li>
<li><a href="delete-list.php">Delete</a></li>
</ul>
<h1>Edit film details</h1>
<form action="update.php" method="post">
<!-- <input type="hidden"> creates a hidden text field i.e. not visible to the user
	we use it to store the id number of the selected film -->
<input type="hidden" name="id" value="<?php echo $film["id"];?>">
<label for="title">Title:</label>
<input type="text" id="title" name="title" value="<?php echo $film["title"];?>">
<label for="year">Year:</label>
<input type="text" id="year" name="year" value="<?php echo $film["year"];?>">
<label for="duration">Duration:</label>
<input type="text" id="duration" name="duration" value="<?php echo $film["duration"];?>">
<input type="submit" name="submitBtn" value="Update film details">
</form>

</body>
</html>