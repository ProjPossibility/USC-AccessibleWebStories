<?php
include 'header.php';
session_start();
mysql_connect("mysql.1freehosting.com", "u759026918_main", "Admin1234") or die(mysql_error());
mysql_select_db("u759026918_main") or die(mysql_error());
$target=$_GET['student'];
$query = mysql_query("SELECT * FROM users WHERE userID='$target'");
$row = mysql_fetch_array($query);

	echo $name = $row['username'];
	echo "Are you sure you want to delete: ". $row['username'];

	
	echo "<form action='removingstudent.php?remove=$row[0]'$target method=\"post\">";
	echo "<p><input type=\"submit\" value=\"Remove\"></p>";
	echo "</form>";
	echo "<a href='/managestudents.php'>Cancle</a>";

include 'footer.php';
?>