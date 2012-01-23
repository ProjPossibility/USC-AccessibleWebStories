<?php
include 'header.php';

session_start();

mysql_connect("mysql.1freehosting.com", "u759026918_main", "Admin1234") or die(mysql_error());
mysql_select_db("u759026918_main") or die(mysql_error());
$student=$_GET[student];
$query = mysql_query("SELECT * FROM Homework WHERE studentID='$student' ORDER BY assignmentID DESC");
$question = mysql_query("SELECT * FROM users WHERE userID='$student'");

$info = mysql_fetch_array($question);
echo "Displaying the Assignments of: ".$info['username']; 



	echo "<table border=\"1\" width=\"75%\" cellpadding=\"2\" cellspacing=\"2\">";
	echo "<tr>";
	echo "<td align=\"center\">Assignment Number</td>";
	echo "<td align=\"center\">Story Name</td>";
	echo "<td align=\"center\">Completed</td>";
	//echo "<td align="center">date</td>";
	echo "</tr>";

while($row = mysql_fetch_array($query))
{
	
	echo '<tr>';
	echo '<td align=\"center\">'.$row[3].'</td>';
	echo '<td align=\"center\">'.$row[4].'</td>';
	echo '<td align=\"center\">'.$row[5].'</td>';
	//echo '<td align="center">'.$row[3].'</td>';
	echo '</tr>';
	
}
echo "</table>";
include 'footer.php';
?>