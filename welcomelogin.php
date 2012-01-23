<?php



session_start();
include 'header.php';
//check if log in, if not turn to the login page
if(!isset($_SESSION['userID'])){
    header("Location:login.html");
    exit();
}
//check db
include('conn.php');
$userID = $_SESSION['userID'];
$username = $_SESSION['username'];
$user_query = mysql_query("select * from users where userID='$userID' limit 1");
if($user_query);
else
	echo 'Searching fail! <br />';

$row = mysql_fetch_array($user_query);
echo 'User info: <br />';
echo 'user id: ',$userID,'<br />';
echo 'username: ',$username,'<br />';
echo 'email: ',$row['email'],'<br />';

echo '<a href="loginCheck.php?action=logout">log out</a> log in<br />';

include 'footer.php';
?>