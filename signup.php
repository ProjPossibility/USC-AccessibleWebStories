<?php
include 'header.php';

mysql_connect("mysql.1freehosting.com", "u759026918_main", "Admin1234") or die(mysql_error());
mysql_select_db("u759026918_main") or die(mysql_error());

Please enter your desired username and password.

<form action="newuser.php" method="post">
Username: <input type="text" name="username" />
Password: <input type="password" name="password" />
Email: <input type="text" name="email" />
<input type="submit" />
</form>


<?php
include 'footer.php';
?>