<?php 
require 'session.php';
require 'DBconnection.php';

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles.css">
<!--external link to change the colors,size, and anything that has to do with style-->
</head>

<body>
<!--This comment will not be displayed-->
<?php 
include 'menu.php';

if ( isset($_GET['user_id']) ){
	$user_id = $_GET['user_id'];
}else 
	{
		$user_id = $_SESSION['ID'];
	}

	$result = mysqli_query($con, "SELECT * FROM Users WHERE P_Id = " . $user_id );
	$row = mysqli_fetch_array($result);
	$emailaddress = "mailto:" . $row['Email_Address'] ;

	
	$pub_result = mysqli_query($con, 
	"SELECT Publications.Title, Publications.Type 
	FROM Users 
	INNER JOIN Publications_Linker
	ON Users.P_Id = Publications_Linker.Author_Id
	INNER JOIN Publications
	ON Publications_Linker.Pub_Id = Publications.Pub_Id
	WHERE Users.P_Id = " . $user_id . " ORDER BY Publications.Title" );
	

	
	if($row['Researcher_Type'] == "PhD Student")
	{
		$supervise_result = mysqli_query($con, 
		"SELECT ACA.Last_Name, ACA.First_Name, STU.Last_Name, STU.First_Name 
		FROM Users AS STU 
		INNER JOIN Student_Linker 
		ON STU.P_Id = Student_Linker.Academic_Id 
		INNER JOIN Users AS ACA 
		ON Student_Linker.Student_Id = ACA.P_Id 
		WHERE ACA.P_Id = " . $user_id . " ORDER BY STU.Last_Name");
	}else{
		$supervise_result = mysqli_query($con, 
		"SELECT ACA.Last_Name, ACA.First_Name, STU.Last_Name, STU.First_Name 
		FROM Users AS ACA 
		INNER JOIN Student_Linker 
		ON ACA.P_Id = Student_Linker.Academic_Id 
		INNER JOIN Users AS STU 
		ON Student_Linker.Student_Id = STU.P_Id 
		WHERE ACA.P_Id = " . $user_id . " ORDER BY STU.Last_Name");
		}
?>

<table border="0" cellpadding="3" cellspacing="0" align="left" width = "1000">
<tr>
 <td width="50%" align="left">
<font face="verdana" color="Black" size="10" ><?php echo $row['First_Name'] . " " . $row['Last_Name']; ?></font>
</td>
</tr>
</table>
<table border="0" cellpadding="3" cellspacing="0" align="left" width = "1000">
<tr>
<td  width="50%" align="left">
<font face="verdana" color="black"><?php echo $row['Researcher_Type'];?> </font>
</td>
</tr>
</table>
<br>
<br>
<br>
<br>
<br>
<br>
<table border="0" cellpadding="3" cellspacing="0" align="bottom" width="400">
<tr>
<td  width="50%" align="left">
<font face="verdana" color="black">Office:</font>
</td>
<td width="50%" align="left">
<font face="verdana" color="black"><?php echo $row['Office'];?></font>
</td>
</tr>
<td  width="50%" align="left">
<font face="verdana" color="black">Telephone:</font>
</td>
<td width="50%" align="left">
<font face="verdana" color="black"><?php echo $row['Phone_Number'];?></font>
</tr>
<td  width="50%" align="left">
<font face="verdana" color="black">Email:</font>
</td>
<td>
<font face="verdana" color="black"><?php echo "<a href=" . $emailaddress . ">" . $row['Email_Address']; ?></font>
</tr>
</table>
<br>
<br>
<h7><input type="submit" value="Add or Edit Research Information" size= "20" ></h7>
<br>
<table border="0" cellpadding="2" cellspacing="0" align="left" width = "700">
<tr>
<td  width="50%" align="left">
<font face="verdana" color="black">Research Information:</font>
</td>
</tr>
<td><?php echo $row['Research_Description'];?>
</td>
</tr>
</table>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<table border="0" cellpadding="3" cellspacing="0" align="bottom" width = "700">
<tr>
 <td width="50%" align="left">
<font face="verdana" color="Black" size="5"> My Publications</font>
</td>
<td width="50%" align="left">
<font face="verdana" color="Black" size="5"> 
<?php 
	 if($row["Researcher_Type"] == "PhD Student"){
	 echo "My Supervisors";
	 }
	else echo "My Students"; ?> </font>
</td>
</tr>
<table border="0" cellpadding="3" cellspacing="0" align="bottom" width = "700">
<tr>
<td  width="50%" align="left">
<font face="verdana" color="purple"><ul>
<?php 
	while($pub_row = mysqli_fetch_array($pub_result)){
	echo "<li>" . $pub_row['Title'] . "</li>";
}
?>
</ul></font>
</td>
<td width="50%" align="left">
<font face="verdana" color="purple"><ul>
<?php 
	while($supervise_row = mysqli_fetch_array($supervise_result)){
	echo "<li>" . $supervise_row['First_Name'] . " " . $supervise_row['Last_Name'] . "</li>";
}
?>
</ul>
</font>
</td>
</tr>
</table>
<br>
<table border="0" cellpadding="3" cellspacing="0" align="bottom" width = "700">
<tr>
<td width="50%" align="center">
<font face="verdana" color="Black">BIOGRAPHY</font>
</td>
</tr>
<td width="50%" align="center" >
<font face="verdana" color="black">John Illingworth originally hails from Bishop Auckland, County Durham.Educated at Universities of Birmingham and Oxford.Member of academic staff at University of Surrey since 1986. Currently Professor of Machine Vision.Further details can be found on my personal web page.</font>
</td>
</tr>
</table>
</body>
</html>
