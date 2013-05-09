<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="styles.css">
<!--external link to change the colors,size, and anything that has to do with style-->
</head>
<body>
<h1> Website</h1>

<table border="0" cellpadding= "10", align= "center">
<tr>
<td><h4><a href="register_user.php" target="_self">Register</a></h4></td>
<td><h4><a href="http://www.youtube.com/watch?v=lRRUxAccoN0" target="_blank">Administrator</a></h4></td>
<td><h4><a href="http://www.youtube.com/watch?v=lRRUxAccoN0" target="_blank">Browse</a></h4></td>
<td><h4><a href="http://www.youtube.com/watch?v=lRRUxAccoN0" target="_blank">Reports</a></h4></td>
<td><h4><a href="http://www.youtube.com/watch?v=lRRUxAccoN0" target="_blank">Profile</a></h4></td>
<td><h4><a href="http://www.youtube.com/watch?v=lRRUxAccoN0" target="_blank">Contact us</a></h></td>
<td><h4><a href="http://www.youtube.com/watch?v=lRRUxAccoN0" target="_blank">Sign-out</a></h4></td>
</tr>
</table> 
<?php

require 'DBconnection.php';

$noresults = 0;

if (isset($_GET["delete_item"]) )
{

	$query_str = "DELETE FROM Users WHERE P_Id = " . $_GET["delete_item"];

	mysqli_query($con, $query_str);
	$query_str = 0;
}

$searchvalue = $_GET["search_value"];
$filter = $_GET["filter"];

?>

<form name="input" action="search_results.php" method="GET">

<h2>Search: <input type="text" name="search_value" size="90" id="textField" style="background-image:url(filename.jpg)" value = "<?php echo $searchvalue ?>" >

<select name="filter" >
  <option <?php if ($filter == "All Items") echo "selected"; ?> value="AllItems">All Items</option>
  <option <?php if ($filter == "Users") echo "selected"; ?> value="Users">Users</option>
  <option <?php if ($filter == "Publications") echo "selected"; ?> value="Publications">Publications</option>
</select>
<input type="submit" value="Submit" size= "20"></h2>
</form>

<br>

<?

$searchvalue = trim($searchvalue);

if (strlen($searchvalue) == 0) // if nothing was put in the search engine then refresh the page.
{
	echo "<meta http-equiv=\"refresh\" content\0;URL='search_results.php'\">";
}
else
{
	//echo "Search For:   ";

	$searchterms = explode(" ", $searchvalue);

	for ($i = 0; $i < count($searchterms); $i++)
	{
		//echo $searchterms[$i];
	}

	if ( count($searchterms) > 10 )
	{
		echo "Too many terms!";
	}

	// Print Users Search Results /////////////////////////////////////////////
	if ($filter == "AllItems" || $filter == "Users")
	{
	
		$query_str = '';

		for ($i = 0; $i < count($searchterms); $i++)
		{
			$query_str = $query_str . " (Users.First_Name LIKE '%" . $searchterms[$i] . "%' OR Users.Last_Name LIKE '%" . $searchterms[$i] . "%') OR";
		}

		$query_str = substr($query_str,0,count($query_str) - 4);

		$query_str = "SELECT * FROM Users WHERE" . $query_str;

		$result = mysqli_query($con, $query_str);

		
		if (mysqli_num_rows($result) != 0)
		{
			echo "<table border='1'>
			<tr>
			<th>Name</th>
			<th>Office</th>
			<th>Email</th>
			</tr>";
			
			
			$edit_url = "http://cdn1.iconfinder.com/data/icons/fatcow/16/bullet_edit.png";
			$trash_url = "http://cdn1.iconfinder.com/data/icons/fatcow/16x16_0100/bin_closed.png";
			$pub_url = "page_add.png";
		
			
			while($row = mysqli_fetch_array($result))
			{
				$address = "profile.php?user_id=" . $row['P_Id'];
				$emailaddress = "mailto:" . $row['Email_Address'] ;
				$editaddress =  "edit_item.php?edit_item=" . $row['P_Id'];
				$pubaddress =  "add_publication.php?user_id=" . $row['P_Id'];
				//edit_item=" . $row['P_Id'];
				
				$register_user = "register_user.php?edit_item=" . $row['P_Id'];
				$deleteaddress = "search_results.php?search_value=" . $searchvalue . "&filter=" . $filter . "&delete_item=" . $row['P_Id'];
				echo "<tr>";
				echo "<td><a href=" . $address . ">" . $row['Last_Name'] . ", " . $row['First_Name'] . "</td>" . "<td>" . $row['Office'] . "</td>" . "<td><a href=" . $emailaddress . ">" . $row['Email_Address'] . "</a></td>" . "<td><a href=" . $register_user . "><img src=" . $edit_url . "></a></td>" . "<td><a href=" . $pubaddress . "><img src=" . $pub_url . "></a></td>" . "<td><a href=" . $deleteaddress . "><img src=" . $trash_url . "></a></td>";
			}
			echo "</table>";
			echo "<br>";
		}
		else
			{
				if ($filter == "Users")
				{
					echo "<br>No search results";
				}
				else if ($filter == "AllItems")
				{
					$noresults = 1;
				}
			}
	}

	// Print Publications Seach Reults /////////////////////////////////////////////
	if ($filter == "AllItems" || $filter == "Publications")
	{


		$query_str = '';

		for ($i = 0; $i < count($searchterms); $i++)
		{
			$query_str = $query_str . " (Publications.Title LIKE '%" . $searchterms[$i] . "%' OR Publications.Type LIKE '%" . $searchterms[$i] . "%') AND";
		}

		$query_str = substr($query_str,0,count($query_str) - 4);

		$query_str = "SELECT * FROM Publications WHERE" . $query_str;

		$result = mysqli_query($con, $query_str);
		
		if (mysqli_num_rows($result) != 0)
		{
			echo "<table border='1'>
			<tr>
			<th>Title</th>
			<th>Type</th>
			</tr>";
			
			while($row = mysqli_fetch_array($result))
			{
				echo "<tr>";
				echo "<td>" . $row['Title'] . "</td>" . "<td>" . $row['Type'] . "</td>" ;
			}
			echo "</table>";
		}
		else
		{
			if ($filter == "Publications")
			{
				echo "<br>No search results";
			}
			else if ($filter == "AllItems" && $noresults == 1)
			{
				echo "<br>No search results";
			}
		}
	}
}

?>


<?php       //CLOSE CONNECTION
    mysqli_close($con);
    ?>
	
</body>
</html>
