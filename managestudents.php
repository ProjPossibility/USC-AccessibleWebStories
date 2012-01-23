<?php
include 'header.php';
session_start();
mysql_connect("mysql.1freehosting.com", "u759026918_main", "Admin1234") or die(mysql_error());
mysql_select_db("u759026918_main") or die(mysql_error());
$activeuser=$_SESSION['userID'];
$query = mysql_query("SELECT * FROM users WHERE teacherID=$activeuser");


echo "<table border=\"1\" width=\"75%\" cellpadding=\"2\" cellspacing=\"2\">";
echo "<tr>";
echo "<td align=\"center\">Student</td>";
echo "<td align=\"center\">email</td>";
//echo "<td align=\"center\">Completed</td>";
//echo "<td align="center">date</td>";
echo "</tr>";

while($row = mysql_fetch_array($query))
{
	echo '<tr>';
	echo '<td align=\"center\">'.$row[1].'</td>';
	echo '<td align=\"center\">'.$row[4].'</td>';
	echo '<td align=\"center\">'."<a href=/removestudent.php?student=$row[0]>Remove Student</a>".'</td>';
	//echo '<td align="center">'.$row[3].'</td>';
	echo '</tr>';
	//echo $name = $row['username'];
}	

	echo "</table>";
	echo "<br>";
	echo "<form action=\"createstudent.php\" method=\"post\">";
	echo "<p><input type=\"submit\" value=\"Create New Student\"></p>";
	echo "</form>";
?>

<?php
include 'footer.php';
?>