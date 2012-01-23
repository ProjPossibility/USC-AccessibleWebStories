<?php
include 'header.php';

mysql_connect("mysql.1freehosting.com", "u759026918_main", "Admin1234") or die(mysql_error());
mysql_select_db("u759026918_main") or die(mysql_error());

$storyID = $_GET['storyID'];
$slideNumber = 1;

$activeUser = $_SESSION['userID'];

$query = mysql_query("SELECT * FROM Slide WHERE storyID='$storyID' AND sequence=1");
$slide = mysql_fetch_array($query);
$storyQuery = mysql_query("SELECT * FROM Story WHERE storyID='$storyID'");
$story = mysql_fetch_array($storyQuery);

$storyTitle = $story['title'];
$slideTotal = mysql_num_rows(mysql_query("SELECT * FROM Slide WHERE storyID = '$storyID'"));

?>

<script type="text/javascript">

var currentSlide = <?php echo $slideNumber; ?>;
var currentStory = <?php echo $storyID; ?>;
var slideTotal = <?php echo $slideTotal; ?>;
var activeUser = <?php echo $activeUser; ?>;

function updateSlideNumbers()
{
	$('span#slideNumbers').replaceWith("<span id='slideNumbers'> "+currentSlide+" of " + slideTotal+"</span>");
}


function StringtoXML(text){
                if (window.ActiveXObject){
                  var doc=new ActiveXObject('Microsoft.XMLDOM');
                  doc.async='false';
                  doc.loadXML(text);
                } else {
                  var parser=new DOMParser();
                  var doc=parser.parseFromString(text,'text/xml');
                }
                return doc;
}


function getNarration()
{
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	  {
	    var doc=xmlhttp.responseText;
		doc = doc.substring(0, doc.indexOf('<!'));
		
		var narration = doc.substring(doc.indexOf('<narration>')+11,doc.indexOf('</narration>'));
	
		$("p#narration").replaceWith("<p id='narration'>"+narration+"</p>");
		updateSlideNumbers();
		
		if(doc.indexOf("LASTFILE")!=-1)
		{
			return;
		}

	    }




	  }

	xmlhttp.open("GET","getNext.php?story="+currentStory+"&slide="+(currentSlide)+"&totalSlide="+(slideTotal)+"&activeUser="+activeUser,true);

	xmlhttp.send();
}

function loadNextXMLDoc()
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
  {
    var doc=xmlhttp.responseText;
	doc = doc.substring(0, doc.indexOf('<!'));
	if(doc.indexOf("LASTFILE")!=-1)
	{
		
		return;
	}
	var bgnd = doc.substring(doc.indexOf('<background>')+12,doc.indexOf('</background>'));
	var c1 = doc.substring(doc.indexOf('<character1>')+12,doc.indexOf('</character1>'));
	var c2 = doc.substring(doc.indexOf('<character2>')+12,doc.indexOf('</character2>'));
	var b1 = doc.substring(doc.indexOf('<b1>')+4,doc.indexOf('</b1>'));
	var b2 = doc.substring(doc.indexOf('<b2>')+4,doc.indexOf('</b2>'));
	currentSlide++;
	
	document.getElementById("background").src = bgnd;

	document.getElementById("character1").src = c1;
	document.getElementById("character2").src = c2;
	updateSlideNumbers();
	
    }
	
	
	
	
  }

xmlhttp.open("GET","getNext.php?story="+currentStory+"&slide="+(currentSlide+1),true);

xmlhttp.send();
}

function loadPreviousXMLDoc()
{
	if(currentSlide==1)
		return;
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
  {
    var doc=xmlhttp.responseText;
	doc = doc.substring(0, doc.indexOf('<!'));
	var bgnd = doc.substring(doc.indexOf('<background>')+12,doc.indexOf('</background>'));
	var c1 = doc.substring(doc.indexOf('<character1>')+12,doc.indexOf('</character1>'));
	var c2 = doc.substring(doc.indexOf('<character2>')+12,doc.indexOf('</character2>'));
	var b1 = doc.substring(doc.indexOf('<b1>')+4,doc.indexOf('</b1>'));
	var b2 = doc.substring(doc.indexOf('<b2>')+4,doc.indexOf('</b2>'));
	
	
	document.getElementById("background").src = bgnd;

	document.getElementById("character1").src = c1;
	document.getElementById("character2").src = c2;
	currentSlide--;
	updateSlideNumbers();
	

	
    }
	
	
	
	
  }
xmlhttp.open("GET","getNext.php?story="+currentStory+"&slide="+(currentSlide-1),true);
xmlhttp.send();
}


function getNextImage()
{
	if(currentSlide < slideTotal)
	{
		currentSlide++;
		document.getElementById("fullSlide").src = 'images/slides/'+currentStory+"_"+currentSlide+".png";
		updateSlideNumbers();
		getNarration();
	}
}

function getPreviousImage()
{
	if(currentSlide > 1)
	{
		currentSlide--;
		document.getElementById("fullSlide").src = 'images/slides/'+currentStory+"_"+currentSlide+".png";
		updateSlideNumbers();
		getNarration();
	}
}



</script>



<h2 class= 'story'><?php echo $storyTitle; ?></h2>



<div class="slideShow">
	
	<div class = "slideImagesContainer" height='400' style="position: relative;">
	
	
	
	
	 <!-- <img class = "slideImages background" id = "background" src = "<?php
		echo $slide['background'];
	?>" width='600' height=400>
	
	<img class="" id='bubble1' src = 'images/speechleft.png'>
	<img class="" id='bubble2' src = 'images/speechright.png'>
	
	<img class = "slideImages character1" id = "character1" src = "<?php
		echo $slide['character1'];
	?>">
	<img class ="slideImages character2" id = "character2" src = "<?php
		echo $slide['character2'];
	?>">  -->
	
 <img class="slideImages fullSlide" id = "fullSlide" src = "images/slides/<?php
echo $storyID."_1.png";
?>">
	


	</div>
	
	<a id='back_button' href='#' onclick='getPreviousImage()'> <img src = 'images/arrow_back.png' width='50' height="50"> </a>
	<span id="slideNumbers"> 1 of <?php echo $slideTotal;?> </span>
	<a id ='next_button' href='#' onclick='getNextImage()'> <img src = 'images/arrow_next.png' width='50' height="50"> </a>

<p id='narration'> <?php echo $slide['narration'];?> <p>
</div>


<?php
include 'footer.php';
?>