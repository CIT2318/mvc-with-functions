<?php
try{
       $conn = new PDO('mysql:host=localhost;dbname=u0123456', 'u0123456', '01jan96');
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

$msg="";

//SQL INSERT for adding a new row
//Use a prepared statement to bind the values from the form
$query="INSERT INTO films (id, title, year, duration) VALUES (NULL, :title, :year, :duration)";
$stmt=$conn->prepare($query);
$stmt->bindValue(':title', $title);
$stmt->bindValue(':year', $year);
$stmt->bindValue(':duration', $duration);

//when we execute the SQL statement the number of affected rows is returned
$affected_rows = $stmt->execute();

if($affected_rows==1){
    $msg="<p>Successfully added the details for ".$title."</p>";
}else{
    $msg="<p>There was a problem inserting the data.</p>";
}

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
	<li><a href="edit-list.php">Update</a></li>
	<li><a href="delete-list.php">Delete</a></li>
	<li><a href="search.php">Search</a></li>
</ul>
<?php
echo $msg;
?>
</body>
</html>