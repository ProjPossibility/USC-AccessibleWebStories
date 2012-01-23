<?php
include 'header.php';
session_start();
mysql_connect("mysql.1freehosting.com", "u759026918_main", "Admin1234") or die(mysql_error());
mysql_select_db("u759026918_main") or die(mysql_error());
$target=$_GET[remove];
echo "$target";
mysql_query("DELETE FROM 'users' WHERE 'userID'='$target'");

echo "<meta http-equiv=\"REFRESH\" content=\"2;url=http://storytime.allalla.com/managestudents.php\">";
include 'footer.php';
?>