<?php
include 'header.php';
?>
<html>
<head>
	<style type="text/css">
    html{font-size:12px;}
    fieldset{width:520px; margin: 0 auto;}
    legend{font-weight:bold; font-size:14px;}
    label{float:left; width:70px; margin-left:10px;}
    .left{margin-left:80px;}
    .input{width:150px;}
    span{color: #666666;}
	</style>	
	
	<script language=JavaScript>
	<!--
	function InputCheck(RegForm)
	{
	  if (RegForm.username.value == "")
	  {
	    alert("User name cannot be empty!");
	    RegForm.username.focus();
	    return (false);
	  }
	  if (RegForm.password.value == "")
	  {
	    alert("Please enter you password!");
	    RegForm.password.focus();
	    return (false);
	  }
	  if (RegForm.repass.value != RegForm.password.value)
	  {
	    alert("Two passwords are different!");
	    RegForm.repass.focus();
	    return (false);
	  }
	  /*if (RegForm.email.value == "")
	  {
	    alert("Email cannot be blank!");
	    RegForm.email.focus();
	    return (false);
	  }*/
	}
	//-->
</script>
</head>	
	
<body>	


<fieldset>
<legend>Register New Teacher</legend>
<form name="RegForm" method="post" action="reg.php" onSubmit="return InputCheck(this)">
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
</fieldset>
</body>
</html>

<?php
include 'footer.php';
?>