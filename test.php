<h1> Website</h1>
<body>this is body</body>
<br>
<?
echo "hello";


// Create connection
$con=mysqli_connect("localhost","root","","pies");

// Check connection
if (mysqli_connect_errno($con))
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

echo "<table border='1'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Office</th>
<th>Research Description</th>
</tr>";


$result = mysqli_query($con, "SELECT * from users");
while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
//     if ($row['First_Name'] != "Graham" )
    {
        echo "<td>" . $row['First_Name'] . "</td>" . "<td>" . $row['Last_Name'] . "</td>" . "<td>" . $row['Office'] . "</td>" . "<td>" . $row['Research_Description'] . "</td>" ;
    }
    echo "</tr>";
    
}
echo "</table>";
echo "<br /><br />Finished";
// $username = $_POST['username'];
// print ($username);


?>


<?php       //CLOSE CONNECTION
    mysqli_close($con);
    ?>
