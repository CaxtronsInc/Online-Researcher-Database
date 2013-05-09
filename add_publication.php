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



<?php
if (isset($_GET["edit_item"]) )
{
  $query_str = "SELECT * FROM Publications WHERE Pub_Id = " . $_GET["edit_item"];
	$result = mysqli_query($con, $query_str);
	$query_str = 0;
	$row = mysqli_fetch_array($result);
	$_SESSION["edit_item"] = $_GET["edit_item"];
}

if (isset($_GET["user_id"]) )
{
	$_SESSION["user_id"] = $_GET["user_id"];
}

if (isset($_GET["edit_item"])) 
{
	echo "<h1>Edit Publication</h1>"; 
}
else 
	echo "<h1>New Publication</h1>"; 

?>

<form name="user_details" method="GET"
<?php 
if (isset($_GET["edit_item"])) 
	{
		echo "action = \"edit_pub_success.php\""; 
	}
	else 
		echo "action = \"new_pub_succcess.php\""; 
?> 
>

Title: <input type="text" name="title" size="30" 
<?php if (isset($_GET["edit_item"])) echo "value = \"" . $row['Title'] . "\""; ?> ><br>

Type: <input type="text" name="type" size="30" 
<?php if (isset($_GET["edit_item"])) echo "value = \"" . $row['Type'] . "\""; ?> ><br>

External Link: <input type="text" name="link" size="30" 
<?php if (isset($_GET["edit_item"])) echo "value = \"" . $row['External_Link'] . "\""; ?> ><br>

<input type="submit" value="Submit" size= "20">

</form>

</body>
</html>
