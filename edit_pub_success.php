<!DOCTYPE html>

<?php
require 'session.php';
require 'DBconnection.php';
?>

<html>

<head>
<link rel="stylesheet" type="text/css" href="styles.css">
<!--external link to change the colors,size, and anything that has to do with style-->
</head>
<body>

<h1> New Publication</h1>

edit success!

<?php

$title = $_GET["title"];
$type = $_GET["type"];
$link = $_GET["link"];

$query_str = "UPDATE Publications SET
Title = '" . $title . "', 
External_Link = '" . $link . "', 
Type = '" . $type . "' 
WHERE Pub_Id = '" . $_SESSION["edit_item"] . "'"; 

mysqli_query($con, $query_str);

?>
<br><a href="http://localhost/example/search_results.php?search_value=&filter=AllItems" target="_self">continue</a>
</body>
</html>
