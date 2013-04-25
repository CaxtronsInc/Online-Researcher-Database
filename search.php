<?php
require 'session.php';
?>

<html>

<body>

<h1> Search Results </h1>
<br>
</body>

<br>
<?php
echo $_SESSION['number'];
// Create connection
$con=mysqli_connect("localhost","root","","uni_database");

// Check connection
if (mysqli_connect_errno($con))
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}else{

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
    if ($row['First_Name'] == "Yiannos" )
    {
        echo "<td>" . $row['First_Name'] . "</td>" . "<td>" . $row['Last_Name'] . "</td>" . "<td>" . $row['Office'] . "</td>" . "<td>" . $row['Research_Description'] . "</td>" ;
    }
    echo "</tr>";
    
}
echo "</table>";
echo "<br /><br />Finished";
// $username = $_POST['username'];
// print ($username);

}
?>


<!-- 
<?php       //CLOSE CONNECTION
    mysqli_close($con);
    ?>
 -->
    
</html>
