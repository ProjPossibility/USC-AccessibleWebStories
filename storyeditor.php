<?php
include 'header.php';

if(!mysql_num_rows(mysql_query("SELECT * FROM Story WHERE storyID = '$_GET[storyID]'")))
	{
		mysql_query("INSERT INTO `u759026918_main`.`Story` (`title`,`creatorID`,`tag1`,`tag2`,`tag3`,`tag4`,`tag5`,`tag6`,`tag7`) VALUES ('','$_SESSION[userID]','','','','','','','')");
	}
$query = mysql_query("SELECT * FROM Story WHERE storyID = '$_GET[storyID]'");
$row = mysql_fetch_array($query);
?>
<form method="POST" action="slideeditor.php?storyID=<?php echo $_GET[storyID]; ?>&slideID=1">
	Title: <input type="text" name="title" value="<?php echo $row['title']; ?>"><br>
	Tag1: <input type="text" name="tag1" value="<?php echo $row['tag1']; ?>"><br>
	Tag2: <input type="text" name="tag2" value="<?php echo $row['tag2']; ?>"><br>
	Tag3: <input type="text" name="tag3" value="<?php echo $row['tag3']; ?>"><br>
	Tag4: <input type="text" name="tag4" value="<?php echo $row['tag4']; ?>"><br>
	Tag5: <input type="text" name="tag5" value="<?php echo $row['tag5']; ?>"><br>
	Tag6: <input type="text" name="tag6" value="<?php echo $row['tag6']; ?>"><br>
	Tag7: <input type="text" name="tag7" value="<?php echo $row['tag7']; ?>"><br>
	<input type="submit" value="<?php echo "Submit Story"; ?>"><br>
	<input type="hidden" name="submittedstory" value="1">
</form>
<?php
include 'footer.php';
?>