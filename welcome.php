<?php
include 'header.php';

?>

<?php
session_start();

//Log in
//check if log in, if not turn to the login page
if(isset($_SESSION['userID']) || isset($_POST['submit'])) ;
else{
    header("Location:login.html");
    exit();
}


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

?>

<?php
include 'footer.php';
?>