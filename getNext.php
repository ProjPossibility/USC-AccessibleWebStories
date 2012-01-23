<?php
include "conn.php";

$storyID=$_GET["story"];
$slideNumber=$_GET["slide"];
$totalSlide= $_GET["totalSlide"];
$activeUser = $_GET["activeUser"];

$sql="SELECT * FROM Slide WHERE storyID = '".$storyID."' AND sequence = '".($slideNumber)."'";
$result = mysql_query($sql);

if($row = mysql_fetch_array($result)){
	echo "<newSlide>";
	echo "<narration>".$row['narration']."</narration>";
	echo "</newSlide>";
	if($slideNumber == $totalSlide){
		$sql="UPDATE Homework SET completed='1' WHERE studentID='$activeUser' AND storyID='$storyID'";
		$result = mysql_query($sql);
		echo "<LASTFILE>";
	}
}


?>

