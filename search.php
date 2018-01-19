<!DOCTYPE HTML>
<html>
<head>
<title>Search films</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<ul>
	<li><a href="create.php">Create</a></li>
	<li><a href="edit-list.php">Update</a></li>
	<li><a href="delete-list.php">Delete</a></li>
	<li><a href="search.php">Search</a></li>
</ul>
<form action="results.php" method="get">
<label for="search">Enter a search term:</label>
<input type="text" name="search" id="search">
<input type="submit" name="submitBtn" value="Search">
</form>
</body>
</html>