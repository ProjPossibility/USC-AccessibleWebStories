<?php
include 'header.php';
?>

<?php
session_start();
if(!isset($_POST['submit'])){
    exit('Illegal access!');
}
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$organization = $_POST['organization'];
$teacherid=$_SESSION['userID'];
//check if in right format
if(!preg_match('/^[\w\x80-\xff]{3,15}$/', $username)){
    exit('Error: User name in wrong format<a href="javascript:history.back(-1);">Return</a>');
}
if(strlen($password) < 1){
    exit('Error: password is too short! At least 1 character!<a href="javascript:history.back(-1);">RETURN</a>');
}
/*
if(!preg_match('/^w+([-+.]w+)*@w+([-.]w+)*.w+([-.]w+)*$/', $email)){
    exit('Error: wrong email format.<a href="javascript:history.back(-1);">RETURN</a>');
}
*/
//connect db
include('conn.php');
//check if user already exists.
$check_query = mysql_query("select userID from users where username='$username' limit 1");
if(mysql_fetch_array($check_query)){
    echo 'Error: User Name ',$username,' already exists!<a href="javascript:history.back(-1);">RETURN</a>';
    exit;
}
//input user data
//$password = MD5($password);
$regdate = time();
$sql = "INSERT INTO users(username,password,teacher,email,organization,teacherID) VALUES('$username','$password','0','$email','$organization','$teacherid')";




if(mysql_query($sql,$conn)){
		$check_query = mysql_query("select * from users where username='$username' AND password='$password' LIMIT 1");
		if(!mysql_fetch_array($check_query)){
		    echo 'CANNOT FETCH INSERTED DATA!';
		    exit;
		}
		
		
		header('location: managestudents.php');
    //exit('Register successfully! Press here to <a href="login.php">log in</a>');
} else {
    echo 'Sorry! Fail to insert data: ',mysql_error(),'<br />';
    echo 'Press here <a href="javascript:history.back(-1);">RETURN</a> Retry';
}
?>

<?php
include 'footer.php';
?>