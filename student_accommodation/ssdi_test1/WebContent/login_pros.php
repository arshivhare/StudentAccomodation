<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION["id_1"]))
	header('location: pros_home.php');
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Login</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8" />	
	</head>
<body>
<div id="header">
		<a href="index.html" id="logo"><img src="images/logo_new.jpg" alt="LOGO" /></a>
	  <div id="navigation">
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="signup.php">Sign up</a></li>
				<li><a href="login.php">Login</a></li>
				<li><a href="about.html">About Us</a></li>
			</ul>
		</div>
		
	</div> <!-- /#header -->
<div id="contents">
		<div class="background">
		  <h3>&nbsp;</h3>
		  
		  
<?php

include 'C:/xampp/htdocs/ssdi_test1/script/login_pros_script.php';

$formData = array();

function display(){
	print<<<TABLE_BLOCK
<form method="post" action="">
<div style="background-color:#EEEEEE; width:500px; left:500px; float: left;padding-right:20px; height:300px; border-radius:5px;">
						<h2 style="color: #000099; text-align: center; font-family: Tahoma, Geneva, sans-serif;">Prospective Student LOGIN</h2>
						<table border="0" align="center" width = "458" style="font-family:georgia;font-size:15px;">
							
							<tr>
								<td align="right" width="104" style="padding-right:5px">49er ID:</td>
								<td align="left">
									<input id="emailed" style = "height:25px; padding-left:10px;border-radius:5px;" size = "25" type="text" name="f[]" placeholder="Your student id" required = "true" />
								</td>
							</tr>
							<tr>
								<td align="right" width="104" style="padding-right:5px">Password:</td>
								<td align="left">
									<input id="pass" style = "height:25px; padding-left:10px;border-radius:5px;" size = "25" type="password" name="f[]" placeholder="Password" required = "true"/>
									
								</td>
							</tr>
							
							<tr>
								<td colspan = "2">&nbsp;</td>
							</tr>
					  </table>
						<input type="submit" name="submit" value = "Login" style=" background:#000099;border:none; color:white; font-family:georgia; font-size:14px; height: 25px; width: 100px; border-radius:5px; position:relative; left: 200px; top: 10px;" />
	        </div>
			</form>
TABLE_BLOCK;
}

display();

if(isset($_POST['submit'])) {
		$formData = $_POST['f'];
		
		$fclass = new dummy();
		$fclass->check($formData);
		
		$fclass->result();
}

?>
</div>
</div> 
</body>
</html>