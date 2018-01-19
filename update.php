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
$id=$_POST['id'];
$title=$_POST['title'];
$year=$_POST['year'];
$duration=$_POST['duration'];

$msg="";

//SQL UPDATE to change a row in the films table
$query="UPDATE films SET title=:title, year=:year, duration=:duration WHERE id=:id";
$stmt=$conn->prepare($query);
$stmt->bindValue(':id', $id);
$stmt->bindValue(':title', $title);
$stmt->bindValue(':year', $year);
$stmt->bindValue(':duration', $duration);
$affected_rows = $stmt->execute();

if($affected_rows==1){
    $msg="<p>Successfully updated the details for ".$title."</p>";
}else{
    $msg="<p>There was a problem inserting the data.</p>";
}

$conn=NULL;
?>


<!DOCTYPE HTML>
<html>
<head>
<title>Update film record</title>
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