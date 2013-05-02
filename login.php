<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="styles.css">
<!--external link to change the colors,size, and anything that has to do with style-->
</head>

<body>
<!--This comment will not be displayed-->
<br>
<h1> Research Database </h1>
<table border="0" cellpadding="80" align="center">
<tr>
 <td><img src="Database.png" width="500" height="400"></td>
<br>
</td>
<td>
<h2><?php 
	if ( !isset($_GET["message"]) ) : ?> 
		Please Log-in
		<?php else: 
			echo "<font color=\"red\">" . $_GET["message"] . "</font><br>"; 
	endif; 
	?></h2>
	
<form action="verify.php" method="post">
<h2>Username: <input type="text" size="50" name="user"></hr>
<h2>Password: <input type="password" size="50" name="pwd"></h2>
<!-- 
<h2><input type="checkbox" name="Sign in" value="Sign in">Keep me signed in<br></h2>
 -->
<h2><input type="submit" value="Sign in" script =onClick(alert("Are zou sure"))></h2>
<h2><a href="verify.php?visitor" >Visitor Login</a>
<br>
<!-- <h2><a href="http://www.youtube.com" target="_blank">Sign in with a single-use code</a></h2> -->
</tr>
</table>
</body>
</html>
