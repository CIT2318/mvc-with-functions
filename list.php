<?php
try{
       $conn = new PDO('mysql:host=localhost;dbname=u0123456', 'u0123456', '01jan96');
}
catch (PDOException $exception) 
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}

//select all the films
$query = "SELECT * FROM films";
$resultset = $conn->query($query);
$films = $resultset->fetchAll();
$conn=NULL;

?>


<!DOCTYPE HTML>
<html>
<head>
<title>List the films</title>
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

//loop over the array of films
foreach ($films as $film) {
    echo "<p>";
    echo $film["title"];
    echo "</p>";
}

?>
</body>
</html>