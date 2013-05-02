  <body>
	<table border="0" cellpadding= "10", align= "center">
	<tr>
	<td><h4><a href="http://www.youtube.com/watch?v=lRRUxAccoN0" target="_blank">Browse</a></h4></td>
	<?php if ($_SESSION['level'] >= 2) : ?> 
		<td><h4><a href="http://www.youtube.com/watch?v=lRRUxAccoN0" target="_blank">Reports</a></h4></td>
	<? endif; ?>
	<?php if ($_SESSION['level'] >= 2) : ?> 
		<td><h4><a href="http://www.youtube.com/watch?v=lRRUxAccoN0" target="_blank">Profile</a></h4></td>
	<?php endif; ?>
	<?php if ($_SESSION['level'] >= 3) : ?> 
		<td><h4><a href="http://www.scholar.google.com">Your Research</a></h4></td>
	<?php endif; ?>
	<td><h4><a href="http://www.youtube.com/watch?v=lRRUxAccoN0" target="_blank">Contact us</a></h></td>
	<td><h4><a href="signout.php">Sign-out</a></h4></td>
	</tr>
	</table> 
