<!DOCTYPE html>
<?php 
session_start();
if (!isset($_SESSION["id_1"]))
	header('location: login_pros.php');

	$con = mysqli_connect('localhost', 'root', '');
	$db = mysqli_select_db($con,'accommodation');
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>View Temporary Accommodation</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8" />	
	
	<style>
		table {border-collapse: collapse; width: 75%; border: 1px solid #ddd; }
		th, td {height: 40px; text-align:center; border-bottom: 1px solid #ddd;}
		tr:hover {background-color: #f5f5f5;}
		th {background-color: #ddd;}
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
		<p>	
		<h2> Available Temporary Student Accommodation </h2>
		<h4> Click on the House Number for furthur details </h4> <hr/>
<?php			
	function display_view1()
	{
		global $con, $db;
		
				$query = "SELECT * FROM permanent_acco where availability='1'";

				$result = mysqli_query($con,$query);
				
				if($result) {

					echo '<table border-collapse:collapse style= "color: #000099; margin: 0 auto;" >';
					echo '<tr> <th>House Number</th>
				  <th>Address</th>
				  <th>Zip Code</th>
				</tr>';
				
				while ($row = $result->fetch_assoc()) {
                     echo "<tr><td><a href='getinfo.php?id=".$row['house_no']."'>" . $row['house_no'] . "</a></td><td>" . $row['addr'] . "</td><td>" . $row['zip_code'] . "</td></tr>";
                 }
				 echo '</table>';
				}
				
				else
					echo "err";
	}
	
	display_view1();
			
			echo '</br> </br><a href="pros_home.php" style=" background:#000099; border:none; color:white; font-family:georgia; font-size:20px; height: 25px; width: 100px; border-radius:5px; left: 20px; top : 100px;">Return</a>';
?>

</p>
			</div>
		</div>
	</div> <!-- /#contents -->
	
</body>
</html>