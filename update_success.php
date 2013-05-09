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

<h1> Update</h1>

update success!


<?php

$firstname = $_GET["first_name"];
$lastname = $_GET["last_name"];
$username = $_GET["username"];
$user_level = $_GET["user_level"];
$email = $_GET["email"];
$phone = $_GET["phone"];
$office = $_GET["office"];
$research_description = $_GET["research_description"];
$researcher_type = $_GET["researcher_type"];

$query_str = "UPDATE Users SET 
Last_Name = '" . $lastname . "', 
User_Level = '" . $user_level . "', 
First_Name = '" . $firstname . "', 
Username = '" . $username . "', 
Email_Address = '" . $email . "', 
Phone_Number = '" . $phone . "', 
Office = '" . $office . "', 
Research_Description = '" . $research_description . "', 
Researcher_Type = '" . $researcher_type . "' 
WHERE P_Id = '" . $_SESSION["edit_item"] . "'"; 


mysqli_query($con, $query_str);

?>
<br><a href="http://localhost/example/search_results.php?search_value=&filter=AllItems" target="_self">continue</a>
</body>
</html>
