<?php
include 'header.php';
session_start();
mysql_connect("mysql.1freehosting.com", "u759026918_main", "Admin1234") or die(mysql_error());
mysql_select_db("u759026918_main") or die(mysql_error());
?>
<div class="title">Welcome to Storytime!</div>
<img src="images/welcome.png">
<?php
include 'footer.php';
?>