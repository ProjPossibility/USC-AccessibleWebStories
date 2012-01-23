<?php
include 'header.php';
?>


<?php
$stories_query = mysql_query("SELECT title, tag1, tag2, tag3, tag4, tag5, tag6, tag7, storyID FROM Story, users where Story.creatorID=$_SESSION['userID']");

//slideeditor.php?storyID=1&slideID=1

echo "Displaying all stories of: "; 



	echo "<table border=\"1\" width=\"75%\" cellpadding=\"2\" cellspacing=\"2\">";
	echo "<tr>";
	echo "<td align=\"center\">title</td>";
	
	echo "<td align=\"center\">tag1</td>";
	echo "<td align=\"center\">tag2</td>";
	echo "<td align=\"center\">tag3</td>";
	echo "<td align=\"center\">tag4</td>";
	echo "<td align=\"center\">tag5</td>";
	echo "<td align=\"center\">tag6</td>";
	echo "<td align=\"center\">tag7</td>";
	echo "<td align=\"center\">slide</td>";
	
	
	
	echo "</tr>";

while($row = mysql_fetch_array($stories_query))
{
	
	echo '<tr>';
	echo '<td align=\"center\">'.$row['title'].'</td>';
	echo '<td align=\"center\">'.$row['tag1'].'</td>';
	echo '<td align=\"center\">'.$row['tag2'].'</td>';
	echo '<td align=\"center\">'.$row['tag3'].'</td>';
	echo '<td align=\"center\">'.$row['tag4'].'</td>';
	echo '<td align=\"center\">'.$row['tag5'].'</td>';
	echo '<td align=\"center\">'.$row['tag6'].'</td>';
	echo '<td align=\"center\">'.$row['tag7'].'</td>';
	echo '<td align=\"center\"><a href=slideeditor.php?storyID=$row['storyID']&slideID=1>slide</a></td>';
	echo '</tr>';
	
}
echo "</table>";


?>



<?php
include 'footer.php';
?>