<?php 
session_start(); 
require 'DBconnection.php';
$_POST["pwd"] = md5($_POST["pwd"]); 
$_SESSION['user']=$_POST["user"];
?>
<html>
<head>
<?php
		$verification = FALSE;
if ( isset($_GET["visitor"]) ) 
{
	$_SESSION['level'] = 1;
	$verification = TRUE;
}

if (!$con) {
	echo "<meta http-equiv=\"refresh\" content=\"0;URL='login.php?message=Failed to connect to database - contact administrator.'\">";
} else{
				// Everything else here!!
	$result = mysqli_query($con, "SELECT Username, Password, User_Level FROM Users");
	while($row = mysqli_fetch_array($result))
		{
			if ($row['Username'] == $_POST["user"] && $row['Password'] == $_POST["pwd"])
			{
				$verification = TRUE;
				$_SESSION['level'] = $row['User_Level'];
				$_SESSION['ID'] = $row['P_Id'];
			}
		}
	
	if($verification){
		echo "<meta http-equiv=\"refresh\" content=\"0;URL='search.php'\">";
	}else {
		echo "<meta http-equiv=\"refresh\" content=\"0;URL='login.php?message=Incorrect user name or password!'\">";
	}
}
?>
</head>
</html>
