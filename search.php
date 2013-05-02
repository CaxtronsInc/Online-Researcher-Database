<?php
require 'session.php';
require 'DBconnection.php';
if ( isset($_SESSION['level']) ):
   ?>
	<!DOCTYPE html>
	<html>
	<head>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<!--external link to change the colors,size, and anything that has to do with style-->
	
	</head>
<?php include 'menu.php';?>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<h3> Research Database </h1>
	<br>
	
<!-- 	SEARCH FORM    -->
<form name="input" action="search_results.php" method="GET">
<h2>Search: <input type="text" name="search_value" size="90" id="textField" style="background-image:url(filename.jpg)"/>
<select name="filter">
  <option value="AllItems">All Items</option>
  <option value="Users">Users</option>
  <option value="Publications">Publications</option>
</select></h2>
<br>
<h2><input type="submit" value="Submit" size= "20"></h2>
</form> 


<?php else : 
	echo "<meta http-equiv=\"refresh\" content=\"0;URL='login.php'\">";
endif; ?>

	 	</body>
	</html>
