<h1> Website</h1>

<?php


$noresults = 0;

// Create connection
$con=mysqli_connect("localhost","root","","uni_database");

// Check connection
if (mysqli_connect_errno($con))
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$searchvalue = $_GET["search_value"];
$filter = $_GET["filter"];


?>

<form name="input" action="search_results.php" method="GET">

<h2>Search: <input type="text" name="search_value" size="90" id="textField" style="background-image:url(filename.jpg)" value = <?php echo $searchvalue ?> >

<select name="filter" >
  
  <option <?php if ($filter == "All Items") echo "selected"; ?> value="AllItems">All Items</option>
  <option <?php if ($filter == "Users") echo "selected"; ?> value="Users">Users</option>
  <option <?php if ($filter == "Publications") echo "selected"; ?> value="Publications">Publications</option>
</select>
<input type="submit" value="Submit" size= "20"></h2>
</form>

<br>

<?

if (strlen($searchvalue) == 0)
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
			$query_str = $query_str . " (Users.First_Name LIKE '%" . $searchterms[$i] . "%' OR Users.Last_Name LIKE '%" . $searchterms[$i] . "%') AND";
		}

		$query_str = substr($query_str,0,count($query_str) - 4);

		$query_str = "SELECT * FROM Users WHERE" . $query_str;

		$result = mysqli_query($con, $query_str);

		
		if (mysqli_num_rows($result) != 0)
		{
			echo "<table border='1'>
			<tr>
			<th>Firstname</th>
			<th>Lastname</th>
			<th>Office</th>
			<th>Research Description</th>
			</tr>";
			
			$address = "https://www.google.co.uk/";
		
			
			while($row = mysqli_fetch_array($result))
			{
				echo "<tr>";
				echo "<td><a href=" . $address . ">" . $row['Last_Name'] . ", " . $row['First_Name'] .  "</a><br><small>" . $row['Office'] . "</small></td>" . "<td>" . $row['Last_Name'] . "</td>" . "<td>" . $row['Office'] . "</td>" . "<td>" . $row['Research_Description'] . "</td>" ;
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


	echo "<br /><br />Finished";
	// $username = $_POST['username'];
	// print ($username);
}

?>


<?php       //CLOSE CONNECTION
    mysqli_close($con);
    ?>
