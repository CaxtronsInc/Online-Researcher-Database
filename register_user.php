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
  $query_str = "SELECT * FROM Users WHERE P_Id = " . $_GET["edit_item"];
	$result = mysqli_query($con, $query_str);
	$query_str = 0;
	$row = mysqli_fetch_array($result);
	$_SESSION["edit_item"] = $_GET["edit_item"];
}

if (isset($_GET["edit_item"])) 
	{
		echo "<h1>Edit User</h1>"; 
	}
	else 
		echo "<h1>Register</h1>"; 

?>

<form name="user_details" method="GET"
<?php 
if (isset($_GET["edit_item"])) 
	{
		echo "action = \"update_success.php\""; 
	}
	else 
		echo "action = \"register_success.php\""; 
?> 
>

First Name: <input type="text" name="first_name" size="30" 
<?php if (isset($_GET["edit_item"])) echo "value = \"" . $row['First_Name'] . "\""; ?> ><br>

Last Name: <input type="text" name="last_name" size="30" 
<?php if (isset($_GET["edit_item"])) echo "value = \"" . $row['Last_Name'] . "\""; ?> ><br>

Username: <input type="text" name="username" size="30" 
<?php if (isset($_GET["edit_item"])) echo "value = \"" . $row['Username'] . "\""; ?> ><br>

Access Level: <input type="number" name="user_level" size="30" 
<?php if (isset($_GET["edit_item"])) echo "value = \"" . $row['User_Level'] . "\""; ?> ><br>

Email Address: <input type="text" name="email" size="30" 
<?php if (isset($_GET["edit_item"])) echo "value = \"" . $row['Email_Address'] . "\"";  ?> ><br>

Phone Number: <input type="text" name="phone" size="30" 
<?php if (isset($_GET["edit_item"])) echo "value = \"" . $row['Phone_Number'] . "\"";  ?> ><br>

Office: <input type="text" name="office" size="30" 
<?php if (isset($_GET["edit_item"])) echo "value = \"" . $row['Office'] . "\"";  ?> ><br>

Research Description: <textarea name="research_description" cols="70" rows="5">
<?php if (isset($_GET["edit_item"])) echo $row['Research_Description'];  ?>
</textarea><br>

Researcher Type: <input type="text" name="researcher_type" size="30" 
<?php if (isset($_GET["edit_item"])) echo "value = \"" . $row['Researcher_Type'] . "\"";  ?> ><br>


<input type="submit" value="Submit" size= "20">

</form>

</body>
</html>
