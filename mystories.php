<?php
include 'header.php';
?>


<?php
session_start();
$id = $_SESSION['userID'];
$stories_query = mysql_query("SELECT title, tag1, tag2, tag3, tag4, tag5, tag6, tag7, storyID FROM Story where Story.creatorID=$id");

$stories=mysql_num_rows(mysql_query("SELECT * FROM Story"))+1;

echo "Displaying all stories of: "; 

echo '<a href="storyeditor.php?storyID='.$stories.'">Create a new story</a>';

	echo '<table border=\"1\" width=\"100%\" cellpadding=\"2\" cellspacing=\"2\">';
	echo '<tr>';
	echo '<td align=\"center\" style="width:100%;">title</td>';
	
	echo '<td align=\"center\">tag1</td>';
	echo '<td align=\"center\">tag2</td>';
	echo '<td align=\"center\">tag3</td>';
	echo '<td align=\"center\">tag4</td>';
	echo '<td align=\"center\">tag5</td>';
	echo '<td align=\"center\">tag6</td>';
	echo '<td align=\"center\">tag7</td>';
	echo '<td align=\"center\">edit slide</td>';
	echo '<td align=\"center\">story info</td>';
	echo '<td align=\"center\">assign</td>';
	
	
	echo "</tr>";

while($row = mysql_fetch_array($stories_query))
{
	
	echo '<tr>';
	echo '<td align=\"center\"><a href="story.php?storyID='.$row['storyID'].'">'.$row['title'].'</a></td>';
	echo '<td align=\"center\">'.$row['tag1'].'</td>';
	echo '<td align=\"center\">'.$row['tag2'].'</td>';
	echo '<td align=\"center\">'.$row['tag3'].'</td>';
	echo '<td align=\"center\">'.$row['tag4'].'</td>';
	echo '<td align=\"center\">'.$row['tag5'].'</td>';
	echo '<td align=\"center\">'.$row['tag6'].'</td>';
	echo '<td align=\"center\">'.$row['tag7'].'</td>';
	echo '<td align=\"center\" style="text-align:center;">
	<a href="slideeditor.php?storyID='.$row['storyID'].'&slideID=1"><img class="icon" height="16" width="16" alt="editslide" title="editslide" src="_pencil.png"></a><!--<a href="slideeditor.php?storyID='.$row['storyID'].'&slideID=1">slide</a>--></td>';
	
	echo '<td align=\"center\" style="text-align:center;">
	<a href="storyeditor.php?storyID='.$row['storyID'].'"><img class="icon" height="16" width="16" alt="editstory" title="editstory" src="_book.png"></a><!--<a href="storyeditor.php?storyID='.$row['storyID'].'">story</a>--></td>';
	
	echo '<td align=\"center\" style="text-align:center;">
	<a href="createassignment.php?story='.$row['storyID'].'"><img class="icon" height="16" width="16" alt="create assignment" title="createassignment" src="_paper.png"></a><!--<a href="createassignment.php?story='.$row['storyID'].'">assign</a>--></td>';
	
	echo '</tr>';
	
}
echo '</table>';


?>



<?php
include 'footer.php';
?>