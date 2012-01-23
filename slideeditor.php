<?php
include 'header.php';

function flipHorizontal(&$img) {
	
 $size_x = imagesx($img);
 $size_y = imagesy($img);
 $temp = imagecreatetruecolor($size_x, $size_y);
 
 imagecolortransparent($temp, imagecolorallocate($img, 0, 0, 0));
imagealphablending($temp, false);
imagesavealpha($temp, true);
 
 $x = imagecopyresampled($temp, $img, 0, 0, ($size_x-1), 0, $size_x, $size_y, 0-$size_x, $size_y);
 if ($x) {
$img = $temp;
 }
 else {
die("Unable to flip image");
 }
}

function getUrl($keyword)
{
	if($keyword == "basketball")
		return "images/bgtemplate-basketballcourt.png";
	else if ($keyword == "classroom")
		return "images/bgtemplate-classroom.png";
	else if ($keyword == "playground")
		return "images/bgtemplate-playground.png";
	else if ($keyword == "rehab")
		return "images/bgtemplate-rehabilitationcenter.png";
	else if ($keyword == "livingroom")
		return "images/bgtemplate-livingroom.png";
	else if ($keyword == "basketballkid")
		return "images/basketballkid.png";
	else if ($keyword == "blackkid")
		return "images/blackpoorkid.png";
	else if ($keyword == "fatkid")
		return "images/fatkid.png";
	else if ($keyword == "gingerkid")
		return "images/gingerboy.png";
	else if ($keyword == "shygirl")
		return "images/shykid.png";
	else if ($keyword == "hispanicman")
		return "images/oldhispanicman.png";
	else if ($keyword == "teacher")
		return "images/teacher.png";
	else if ($keyword == "blackteacher")
		return "images/blackteacher.png";
	else if ($keyword == "gameaddict")
		return "images/gameaddictboy.png";
	else if ($keyword == "disabled")
		return "images/disabledkid.png";
	else if ($keyword == "blank")
		return "images/blank.png";
}

function getName($url)
{
	if($url == "images/bgtemplate-basketballcourt.png")
		return "basketball";
	else if ($url == "images/bgtemplate-classroom.png")
		return "classroom";
	else if ($url == "images/bgtemplate-playground.png")
		return "playground";
	else if ($url == "images/bgtemplate-livingroom.png")
		return "livingroom";
	else if ($url == "images/basketballkid.png")
		return "basketballkid";
	else if ($url == "images/blackpoorkid.png")
		return "blackkid";
	else if ($url == "images/fatkid.png")
		return "fatkid";
	else if ($url == "images/gingerboy.png")
		return "gingerkid";
	else if ($url == "images/shykid.png")
		return "shygirl";
	else if ($url == "images/oldhispanicman.png")
		return "hispanicman";
	else if ($url == "images/teacher.png")
		return "teacher";
	else if ($url == "images/blackteacher.png")
		return "blackteacher";
	else if ($url == "images/gameaddictboy.png")
		return "gameaddict";
	else if ($url == "images/disabledkid.png")
		return "disabled";
	else if ($url == "images/blank.png")
		return "blank";
}

if($_POST['submittedstory'])
{
	mysql_query("UPDATE `u759026918_main`.`Story` SET `title` = '$_POST[title]', `tag1` =  '$_POST[tag1]', `tag2` =  '$_POST[tag2]', `tag3` =  '$_POST[tag3]', `tag4` =  '$_POST[tag4]', `tag5` =  '$_POST[tag5]', `tag6` =  '$_POST[tag6]', `tag7` =  '$_POST[tag7]' WHERE `storyID` = '$_GET[storyID]'");
}

if(!mysql_num_rows(mysql_query("SELECT * FROM Slide WHERE storyID = '$_GET[storyID]'")) || mysql_num_rows(mysql_query("SELECT * FROM Slide WHERE storyID = '$_GET[storyID]'")) < $_GET['slideID'])
{
		mysql_query("INSERT INTO `u759026918_main`.`Slide` (`slideID`, `storyID`, `sequence`, `template`, `background`, `textbubble1`, `textbubble2`, `textbubble3`, `character1`, `character2`, `character3`, `narration`) VALUES ('NULL', '$_GET[storyID]', '$_GET[slideID]', '2', 'images/bgtemplate-basketballcourt.png', '', '', '', 'images/basketballkid.png', 'images/basketballkid.png', '', '')");
	
}

if($_POST['submitted'])
{


$bgurl = getUrl($_POST['background']);
$lefturl = getUrl($_POST['person1']);
$righturl = getUrl($_POST['person2']);
$speech1 = $_POST['speech1'];
$speech2 = $_POST['speech2'];
$narration = $_POST['narration'];

if(mysql_num_rows(mysql_query("SELECT * FROM Slide WHERE storyID = '$_GET[storyID]' AND sequence = '$_GET[slideID]'")))
{
	mysql_query("UPDATE `u759026918_main`.`Slide` SET `background` = '$bgurl', `textbubble1` = '$speech1', `textbubble2` = '$speech2', `character1` = '$lefturl', `character2` = '$righturl', `narration` = '$narration' WHERE `storyID` = '$_GET[storyID]' AND `sequence` = '$_GET[slideID]'");
}
else{
	mysql_query("INSERT INTO `u759026918_main`.`Slide` (`slideID`, `storyID`, `sequence`, `template`, `background`, `textbubble1`, `textbubble2`, `textbubble3`, `character1`, `character2`, `character3`, `narration`) VALUES ('NULL', '$_GET[storyID]', '$_GET[slideID]', '2', '$bgurl', '$_POST[speech1]', '$_POST[speech2]', '', '$lefturl', '$righturl', '', '$narration')");
}
}


//Start making image
$query = mysql_query("SELECT * FROM Slide WHERE storyID = '$_GET[storyID]' AND sequence = '$_GET[slideID]'");
$row = mysql_fetch_array($query);
$bgurl = $row['background'];
$lefturl = $row['character1'];
$righturl = $row['character2'];
$speech1 = $row['textbubble1'];
$speech2 = $row['textbubble2'];
$narration = $row['narration'];



$image = imagecreatefrompng($bgurl);
$personleft = imagecreatefrompng($lefturl);
$speechleft = imagecreatefrompng("images/speechleft.png");
$speechright = imagecreatefrompng("images/speechright.png");
$font = 'files/comicfont.ttf';
$textColor = imagecolorallocate ($image, 0, 0, 0);

$personright = imagecreatefrompng($righturl);
flipHorizontal($personright);

if($speech1 != "")
	imagecopy($image, $speechleft,0,0,0,0,600,400);
if($speech2 != "")
	imagecopy($image, $speechright,0,0,0,0,600,400);

$imcoords=imagettfbbox ( 10 , 0 , $font , $speech1 );
if($imcoords[2]>254)
{
	$speech11 = substr($speech1,0,floor(strlen($speech1))/2);
	$speech12 = substr($speech1,floor(strlen($speech1)/2),strlen($speech1));
	imagettftext ( $image , 10 , 0 , 200 , 57 , $textColor , $font , $speech11 );
	imagettftext ( $image , 10 , 0 , 200 , 77 , $textColor , $font , $speech12 );
}
else{
	imagettftext ( $image , 10 , 0 , 200 , 57 , $textColor , $font , $speech1 );
}

$imcoords=imagettfbbox ( 10 , 0 , $font , $speech2 );
if($imcoords[2]>254)
{
	$speech21 = substr($speech2,0,floor(strlen($speech2))/2);
	$speech22 = substr($speech2,floor(strlen($speech2)/2),strlen($speech2));
	imagettftext ( $image , 10 , 0 , 200 , 215 , $textColor , $font , $speech21 );
	imagettftext ( $image , 10 , 0 , 200 , 235 , $textColor , $font , $speech22 );
}
else{
imagettftext ( $image , 10 , 0 , 200 , 215 , $textColor , $font , $speech2 );
}

imagecopy($image, $personleft,0,0,0,0,600,400);
imagecopy($image, $personright,0,0,0,0,600,400);

$storyID = $_GET['storyID'];
$slideID = $_GET['slideID'];
//Save & destroy image
$imageurl = "images/slides/".$storyID."_".$slideID.".png";
imagepng($image, $imageurl);
imagedestroy($image);

	?>
	<div class="title">Edit Slide</div><br>
	Narration: <?php echo $narration; ?><br>
	<img src="<? echo "images/slides/".$_GET['storyID']."_".$_GET['slideID'].".png?".rand(1,3000); ?>"><br><br>
	<table width="100%">
		<tr valign="top">
			<td width="50%">
	<form method="POST" action="<?php echo $PHP_SELF; ?>">
		Background: <select name="background" >
			<option value="basketball" <?php if("basketball" == getName($bgurl)) echo "SELECTED"; ?>>Basketball Court</option>
			<option value="classroom" <?php if("classroom" == getName($bgurl)) echo "SELECTED"; ?>>Classroom</option>
			<option value="playground" <?php if("playground" == getName($bgurl)) echo "SELECTED"; ?>>Playground</option>
			<option value="rehab" <?php if("rehab" == getName($bgurl)) echo "SELECTED"; ?>>Rehab Center</option>
		<option value="livingroom" <?php if("livingroom" == getName($bgurl)) echo "SELECTED"; ?>>Living Room</option>
		
		</select><br>
		Left Person: <select name="person1">
			<option value="blank" <?php if("blank" == getName($lefturl)) echo "SELECTED"; ?>>Blank</option>
			<option value="basketballkid" <?php if("basketballkid" == getName($lefturl)) echo "SELECTED"; ?>>Basketball Player</option>
			<option value="blackkid" <?php if("blackkid" == getName($lefturl)) echo "SELECTED"; ?>>Black Kid</option>
			<option value="fatkid" <?php if("fatkid" == getName($lefturl)) echo "SELECTED"; ?>>Fat Kid</option>
			<option value="gingerkid" <?php if("gingerkid" == getName($lefturl)) echo "SELECTED"; ?>>Ginger Kid</option>
			<option value="shygirl" <?php if("shygirl" == getName($lefturl)) echo "SELECTED"; ?>>Shy Girl</option>
			<option value="hispanicman" <?php if("hispanicman" == getName($lefturl)) echo "SELECTED"; ?>>Hispanic Man</option>
			<option value="teacher" <?php if("teacher" == getName($lefturl)) echo "SELECTED"; ?>>White Teacher</option>
			<option value="blackteacher" <?php if("blackteacher" == getName($lefturl)) echo "SELECTED"; ?>>Black Teacher</option>
		<option value="gameaddict" <?php if("gameaddict" == getName($lefturl)) echo "SELECTED"; ?>>Game Addict</option>
		<option value="disabled" <?php if("disabled" == getName($lefturl)) echo "SELECTED"; ?>>Child in Wheelchair</option>
		
		</select><br>
		Left Text: <input type="text" name="speech1" value="<?php echo $speech1; ?>"><br>
		Right Person: <select name="person2">
			<option value="blank" <?php if("blank" == getName($righturl)) echo "SELECTED"; ?>>Blank</option>
			<option value="basketballkid" <?php if("basketballkid" == getName($righturl)) echo "SELECTED"; ?>>Basketball Player</option>
			<option value="blackkid" <?php if("blackkid" == getName($righturl)) echo "SELECTED"; ?>>Black Kid</option>
			<option value="fatkid" <?php if("fatkid" == getName($righturl)) echo "SELECTED"; ?>>Fat Kid</option>
			<option value="gingerkid" <?php if("gingerkid" == getName($righturl)) echo "SELECTED"; ?>>Ginger Kid</option>
			<option value="shygirl" <?php if("shygirl" == getName($righturl)) echo "SELECTED"; ?>>Shy Girl</option>
			<option value="hispanicman" <?php if("hispanicman" == getName($righturl)) echo "SELECTED"; ?>>Hispanic Man</option>
			<option value="teacher" <?php if("teacher" == getName($righturl)) echo "SELECTED"; ?>>Teacher</option>
		<option value="blackteacher" <?php if("blackteacher" == getName($righturl)) echo "SELECTED"; ?>>Black Teacher</option>
		<option value="gameaddict" <?php if("gameaddict" == getName($righturl)) echo "SELECTED"; ?>>Game Addict</option>
		<option value="disabled" <?php if("disabled" == getName($righturl)) echo "SELECTED"; ?>>Child in Wheelchair</option>
		</select><br>
		Right Text: <input type="text" name="speech2" value="<?php echo $speech2; ?>"><br>
		Narration: <textarea cols="20" rows="4" name="narration"><?php echo $narration; ?></textarea><br>
		<input type="submit" value="<?php echo "Make Picture"; ?>"><br>
		<input type="hidden" name="submitted" value="1">
	</form>
			</td>
			<td width="50%">
				<div class="slides">
				<?php
					$slidenum = mysql_num_rows(mysql_query("SELECT * FROM Slide WHERE storyID = '$_GET[storyID]'"));
					
					for($counter = 1; $counter <= $slidenum; $counter++)
					{
							?>
							<a href="?storyID=<?php echo $_GET['storyID']; ?>&slideID=<?php echo $counter; ?>">
								<?php echo $counter; ?></a>&nbsp;
							
							<?php
					}
				?>
				
				<br><br>
<a href="?storyID=<?php echo $_GET['storyID']; ?>&slideID=<?php echo $slidenum+1; ?>">New Slide</A>
				</div>
			</td>
		</tr>
	</table>
<?php
include 'footer.php';
?>