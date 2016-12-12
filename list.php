<!DOCTYPE HTML>
<html>
<head>
<title>Show All Films</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<?php
try{
       $conn = new PDO('mysql:host=localhost;dbname=u0123456', 'u0123456', '01jan96');
}
catch (PDOException $exception) 
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}
$query = "SELECT * FROM films";
$resultset = $conn->query($query);

while ($film = $resultset->fetch()) {
    echo "<p>";
    echo "<a href='details.php?id=".$film['id']."'>";
    echo $film["title"];
    echo "</a>";
    echo "</p>";
}

?>
</body>
</html>