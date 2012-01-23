<?php
include 'header.php';

session_start();

mysql_connect("mysql.1freehosting.com", "u759026918_main", "Admin1234") or die(mysql_error());
mysql_select_db("u759026918_main") or die(mysql_error());
$activeuser=$_SESSION['userID'];
//echo $activeuser;
$query = mysql_query("SELECT * FROM Homework WHERE studentID= '$activeuser' AND completed='0'");

$options="";

while($row = mysql_fetch_array($query))
{
	$id=$row["storyID"];
	$thing=$row["storyName"];
	$options.="<OPTION VALUE=\"$id\">".$thing;
}?>

<!--//mysql cnx code-->


<form action="story.php" method="get">
<SELECT NAME=storyID>
<!--<OPTION VALUE=0>Choose-->
<?=$options?>
</SELECT> 
<p><input type="submit" value="Start"></p>
</form>
<?php
include 'footer.php';
?>