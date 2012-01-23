<?php

session_start();



//Log in
if(!isset($_POST['submit'])){
	//Log off
	if($_GET['action'] == "logout"){
	    unset($_SESSION['userID']);
	    unset($_SESSION['username']);
	    unset($_SESSION['teacher']);
	    unset($_SESSION['teacherID']);
	    echo 'Log off. Click here to <a href="login.php">Log in</a>';
	    header( 'Location: index.php' ) ;
	    exit;
	}
	else{
    exit('Illegal access!');
  }
}

$username = ($_POST['username']);
$password = ($_POST['password']);
//$username = htmlspecialchars($_POST['username']);
//$password = MD5($_POST['password']);

//connect db
include('conn.php');
//check if user info is correct
$check_query = mysql_query("SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1");
$result = mysql_fetch_array($check_query);
if($result!=NULL){
    //log in successfully.
    $_SESSION['username'] = $username;
    $_SESSION['userID'] = $result['userID'];
    $_SESSION['teacher'] = $result['teacher'];
    $_SESSION['teacherID'] = $result['teacherID'];
    header('location:welcome.php');
    //echo $username,' Welcome! Please click <a href="welcomelogin.php">USER CENTER</a><br />';
    echo 'Click here <a href="loginCheck.php?action=logout">Log out</a><br />';
    exit;
} else {
    exit('Fail to log in!  <a href="javascript:history.back(-1);">Back</a> Retry');
}



?>