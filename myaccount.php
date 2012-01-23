<?php
include 'header.php';

session_start();

mysql_connect("mysql.1freehosting.com", "u759026918_main", "Admin1234") or die(mysql_error());
mysql_select_db("u759026918_main") or die(mysql_error());

$query = mysql_query("SELECT * FROM users");
while($row = mysql_fetch_array($query))
{
	$name = $row['username'];
	$activeuser=$_SESSION['userID'];
	if($name == $activeuser)
	{
		echo "Found it<br>";
		break;
	}
	
}
if($name == $activeuser)
{
	echo "Username: ".$row['username']; 
	echo "<br>email: ".$row['email'];
	echo "<br>Organization: ".$row['organization'];
	
	include 'footer.php';
}
?>

