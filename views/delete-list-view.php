<!DOCTYPE HTML>
<html>
<head>
<title>Delete films</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<ul>
<li><a href="create.php">Create</a></li>
<li><a href="list.php">Read</a></li>
<li><a href="edit-list.php">Update</a></li>
<li><a href="delete-list.php">Delete</a></li>
</ul>
<form action="delete.php" method="POST">
<?php
foreach ($films as $film) {
    echo "<p>";
    echo "<label>";
    //outputs a checkbox button for each film e.g. <label><input type="checkbox" name="ids[]" value="1" '="">Jaws</label>
    echo "<input type='checkbox' name='ids[]' value='{$film["id"]}''>";
    echo "{$film["title"]}";
    echo "</label>";
    echo "</p>";
}
?>
<input type="submit">
</form>
</body>
</html>