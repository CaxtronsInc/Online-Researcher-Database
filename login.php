
<html>
<body>

<!--This comment will not be displayed-->
<h1> Welcome to the login page </h1>
<br>


<form action="verify.php" method="post">
Enter your details:<br><br>
<?php echo "<font size=\"3\" color=\"red\">" . 
  		$_GET["message"] . "</font>"; ?><br>
Username: <input type="text" name="user"><br>
Password: <input type="password" name="pwd">

<br>
<input type="submit">
</form>
<?php
// Create connection
$con=mysqli_connect("localhost","root","","uni_database");

// Check connection
if (mysqli_connect_errno($con))
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}else{	
		// Everything else here!!
}
?>


</body>
</html>
