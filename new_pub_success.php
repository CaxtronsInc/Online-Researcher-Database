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

register success!

<?php

$title = $_GET["title"];
$type = $_GET["type"];
$link = $_GET["link"];

$query_str = "INSERT INTO Publications (
Pub_Id, 
Title, 
External_Link, 
Type) 

VALUES (
0,
'" . $title . "', 
'" . $link . "', 
'" . $type  . "' 
)";

mysqli_query($con, $query_str);


$query_str = "INSERT INTO Publications_Linker (
PubLink_ID, 
Author_Id, 
Pub_Id) 

VALUES (
0, 
'" . $_SESSION["user_id"] . "', 
LAST_INSERT_ID()
)";

mysqli_query($con, $query_str);

?>
<br><a href="http://localhost/example/search_results.php?search_value=&filter=AllItems" target="_self">continue</a>
</body>
</html>
