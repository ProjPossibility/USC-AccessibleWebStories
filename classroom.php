<?php
include 'header.php';

session_start();

mysql_connect("mysql.1freehosting.com", "u759026918_main", "Admin1234") or die(mysql_error());
mysql_select_db("u759026918_main") or die(mysql_error());
$activeuser=$_SESSION['userID'];
//echo $activeuser;
$query = mysql_query("SELECT * FROM users WHERE teacherID= '$activeuser'");

$options='';

while($row = mysql_fetch_array($query))
{
	$id=$row["userID"];
	$thing=$row["username"];
	$options.="<OPTION VALUE=\"$id\">".$thing.'</option>';
}?>

<!--//mysql cnx code-->

Check assignment progress: <br>

<form action="assignmentcheck.php" method="get">
<SELECT NAME=student>
<!--<OPTION VALUE=0>Choose-->

<?=$options?>
</SELECT> 
<p><input type="submit" value="Check Assignments"></p>
</form>
<br>
<form action="managestudents.php" method="post">
<p><input type="submit" value="Manage Students"></p>
</form>




<?php
include 'footer.php';
?>