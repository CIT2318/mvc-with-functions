<?php
include("header.inc.php");

foreach($films as $film){
    echo "<p>";
    echo "<a href='details.php?id=".$film['id']."'>";
    echo $film["title"];
    echo "</a>";
    echo "</p>";
}

include("footer.inc.php");
?>