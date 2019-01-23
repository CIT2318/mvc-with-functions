<?php
try{
    $conn = new PDO('mysql:host=localhost;dbname=u0123456', 'u0123456', '01jan96');
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $exception) 
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}


//This is a simple example we would normally do some form validation here

//basic form processing
$title=$_POST['title'];
$year=$_POST['year'];
$duration=$_POST['duration'];

//SQL INSERT for adding a new row
//Use a prepared statement to bind the values from the form
$query="INSERT INTO films (id, title, year, duration) VALUES (NULL, :title, :year, :duration)";
$stmt=$conn->prepare($query);
$stmt->bindValue(':title', $title);
$stmt->bindValue(':year', $year);
$stmt->bindValue(':duration', $duration);
$stmt->execute();
$conn=NULL;
?>


<!DOCTYPE HTML>
<html>
<head>
<title>Save films</title>
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
echo "<p>Successfully added the details for {$title}.</p>";
?>
</body>
</html>