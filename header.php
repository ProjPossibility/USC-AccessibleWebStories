<!DOCTYPE html>

<html>

<head>

  <title>Story Time</title>

  <LINK href="styles.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="jquery-1.7.1.min.js"></script>


</head>

<div class = "root">

	    <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">



<table cellpadding='20' cellspacing='0' border='0' width='100%'>

	<tr>

		<td bgcolor='#EEEEEE'>

			<table width='800 px' border='0' cellspacing='0' cellpadding='0' align='center'>

				<tr>

					<td>

						

						<table width='100%' border='0' cellspacing='0' cellpadding='10'>

							<tr>

								<td bgcolor='#ffffff' align='center' id="header" style="background:#ffffff;">

									<img src="images/title.png">

								</td>

							</tr>

							<tr valign='top'>

								<td bgcolor='#ffffff'>

									<table width="100%" border='0' cellspacing='0' cellpadding='5'>

										<tr valign='top'>

									

									<td bgcolor='#ffffff' width='15%'>

											<div id="social">

											<h2>

										Menu Bar:

									</h2>

									<a href="index.php">Home</a><br />

									<a href="/allstories.php">All Stories</a><br />

									<?php

									session_start();

									if($_SESSION['teacher']==1)

									{
										echo "<a href='/mystories.php'>My Stories</a><br />";

										echo "<a href='/classroom.php'>My Classroom</a><br />";
									}
									else
									{
										echo "<a href='/myassignments.php'>My Assignments</a><br />";
									}

									if(!isset($_SESSION['userID']))

									{

										echo "<a href='/login.php'>Login</a><br />";

										echo "<a href='/register.php'>Teacher Registration</a><br />";

									}

									else

									{

										echo "<a href='/welcomelogin.php'>My Account</a><br />";
										echo "<a href='/loginCheck.php?action=logout'>Logout</a><br />";

									}

									?>

								</div>

									</td>

									

									<td bgcolor='#ffffff' width='85%' id="content">

		

		<div id = 'body'>

			

<?php

include 'conn.php';

?>