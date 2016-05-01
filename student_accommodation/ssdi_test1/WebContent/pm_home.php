<!DOCTYPE html>
<?php 
session_start();
if (!isset($_SESSION["id_1"]))
	header('location: login_pm.php');
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Property Manager - Home</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8" />
	<style>
		table {border-collapse: collapse; width: 100%; border: 1px solid #ddd; }
		th, td {height: 40px; text-align:center; border-bottom: 1px solid #ddd;}
		tr:hover {background-color: #f5f5f5;}
		th {background-color: #ddd;}
		a {text-decoration:none;}
		h2 {font-family: Verdana;}
		h4 {font-family: Lucida Console; }
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
			
				<h2> Welcome PROPERTY MANAGER </h2>
				<h4>
					<a href="pm_view.php" style=" background:#FFFFFF; border:none; color:#000099; font-family:georgia; font-size:20px; height: 100px; width: 400px; border-radius:5px; left: 20px; top: 10px;"> View Listing </a>
					</br> </br>
					<a href="pm_add.php" style=" background:#FFFFFF; border:none; color:#000099; font-family:georgia; font-size:20px; height: 25px; width: 100px; border-radius:5px; left: 20px; top: 10px;"> Add Listing </a>
					</br> </br>
					<a href="pm_update.php" style="background:#FFFFFF; border:none; color:#000099; font-family:georgia; font-size:20px; height: 25px; width: 100px; border-radius:5px; left: 20px; top: 10px;"> Update Listing </a>
					</br> </br>
					<a href="pm_delete.php" style=" background:#FFFFFF; border:none; color:#000099; font-family:georgia; font-size:20px; height: 25px; width: 100px; border-radius:5px; left: 20px; top: 10px;"> Delete Listing </a>
				</h4>
			</div>
		</div>
	</div> <!-- /#contents -->
	
</body>
</html>