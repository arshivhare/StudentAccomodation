<!DOCTYPE html>
<?php 
session_start();
if (!isset($_SESSION["id_1"]))
	header('location: login_pros.php');
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Prospective Student - Home</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8" />	
	<style>
		h2 {font-family: Verdana;}
		h4 {font-family: Lucida Console; }
		a {text-decoration:none;}
	</style>
</head>

<body>
	<div id="header">
		<a href="index.html" id="logo"><img src="images/logo_new.jpg" alt="LOGO" /></a>
	  <div id="navigation">
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="logout.php">LogOut</a></li>
				<li><a href="about.html">About Us</a></li>
			</ul>
		</div>
		
</div> <!-- /#header -->
	<div id="contents">
		<div class="background">
			<div id="contacts">
			
				<h2> Welcome PROSPECTIVE student </h2>
				
				<h4>
				<a href="pros_tempview.php" style=" background:#FFFFFF; border:none; color:#000099; font-family:georgia; font-size:20px; height: 100px; width: 400px; border-radius:5px; left: 20px; top: 10px;"> View  Available Temporary Listing </a>
				</br> </br>
				<a href="pros_tempbooked.php" style=" background:#FFFFFF; border:none; color:#000099; font-family:georgia; font-size:20px; height: 100px; width: 400px; border-radius:5px; left: 20px; top: 10px;"> View Booked Temporary Listing </a>
				</br> </br>
				<a href="pros_permview.php" style=" background:#FFFFFF; border:none; color:#000099; font-family:georgia; font-size:20px; height: 100px; width: 400px; border-radius:5px; left: 20px; top: 10px;"> View Permanent Listing </a>
				</br> </br>
				<a href="pros_add.php" style=" background:#FFFFFF; border:none; color:#000099; font-family:georgia; font-size:20px; height: 25px; width: 100px; border-radius:5px; left: 20px; top: 10px;"> Add Preferences </a>
				</br> </br>
				<a href="pros_bh.php" style=" background:#FFFFFF; border:none; color:#000099; font-family:georgia; font-size:20px; height: 25px; width: 100px; border-radius:5px; left: 20px; top: 10px;"> Your Booking History </a>
				</br> </br>
				</h4>
			</div>
		</div>
	</div> <!-- /#contents -->
	
</body>
</html>