<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="styles.css">
<!--external link to change the colors,size, and anything that has to do with style-->
</head>
<body>

<h1> Register</h1>

register success!

<?php

require 'DBconnection.php';

$firstname = $_GET["first_name"];
$lastname = $_GET["last_name"];
$username = $_GET["username"];
$user_level = $_GET["user_level"];
$email = $_GET["email"];
$phone = $_GET["phone"];
$office = $_GET["office"];
$research_description = $_GET["research_description"];
$researcher_type = $_GET["researcher_type"];



$query_str = "INSERT INTO Users (
P_Id , 
User_Level, 
Last_Name, 
First_Name, 
Username, 
Email_Address, 
Phone_Number,
Office,
Research_Description,
Researcher_Type) 

VALUES (
0,
'" . $user_level . "', 
'" . $lastname . "', 
'" . $firstname  . "', 
'" . $username  . "', 
'" . $email . "', 
'" . $phone . "',
'" . $office . "',
'" . $research_description . "',
'" . $researcher_type . "'
)";


//$query_str = "INSERT INTO Users VALUES (0,2,'Willis','James','East Office','07772263602', 'My research is into database design.', 'PhD Student','jamster321','123','jamster321@gmail.com')";

mysqli_query($con, $query_str);

?>
<br><a href="http://localhost/example/search_results.php?search_value=&filter=AllItems" target="_self">continue</a>
</body>
</html>
