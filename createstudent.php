<?php
include 'header.php';
session_start();
mysql_connect("mysql.1freehosting.com", "u759026918_main", "Admin1234") or die(mysql_error());
mysql_select_db("u759026918_main") or die(mysql_error());


?>
<form name="StudentCreate" method="post" action="stucreate.php" onSubmit="return InputCheck(this)">
<p>
<label for="username" class="label">User Name:</label>
<input id="username" name="username" type="text" class="input" />
<span>(*)</span>
<p/>
<p>
<label for="password" class="label">Password:</label>
<input id="password" name="password" type="password" class="input" />
<span>(*)</span>
<p/>
<p>
<label for="repass" class="label">Password:</label>
<input id="repass" name="repass" type="password" class="input" />
<span>(*)</span>
<p/>
<p>
<label for="email" class="label">Email:</label>
<input id="email" name="email" type="text" class="input" />
<p/>
<p>
<label for="organization" class="label">Organization:</label>
<input id="organization" name="organization" type="text" class="input" />
<p/>	
	
<p>
<input type="submit" name="submit" value="  Submit  " class="left" />
</p>
</form>
<?php
include 'footer.php';
?>