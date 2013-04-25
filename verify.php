<?php 
session_start(); 
$_POST["pwd"] = md5($_POST["pwd"]); 
$_SESSION['user']=$_POST["user"];
$_SESSION['level']=1;
?>

<html>

<head>

<?php
  	$verification = FALSE;
// Create connection
$_SESSION['con']=mysqli_connect("localhost","root","","uni_database");
$con=$_SESSION['con'];

// Check connection
if (!$con) {
echo "<meta http-equiv=\"refresh\" content=\"0;URL='login.php?message=Failed to connect to database - contact administrator.'\">";
}
else{
				// Everything else here!!
$result = mysqli_query($con, "SELECT Username, Password FROM Users");
while($row = mysqli_fetch_array($result))
	{
		if ($row['Username'] == $_POST["user"] && $row['Password'] == $_POST["pwd"])
		{
			$verification = TRUE;
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
