<!DOCTYPE html>
<?php 
session_start();
if (!isset($_SESSION["id_1"]))
	header('location: login_cur.php');
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>View Accommodation</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8" />	
	<style>
		table {border-collapse: collapse; width: 100%; border: 1px solid #ddd; }
		th, td {height: 40px; text-align:center; border-bottom: 1px solid #ddd;}
		tr:hover {background-color: #f5f5f5;}
		th {background-color: #ddd;}
		a {text-decoration:none;}
		h2 {font-family: Verdana;}

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
			<h2> Booked Accommodations </h2>
			<?php

			$a = $_SESSION['id_1'];
			
	function display_view()
	{				
	global $a;
				$con = mysqli_connect('localhost', 'root', '');
				$db = mysqli_select_db($con,'accommodation');

				$q1 = "SELECT * FROM permanent_acco where id='$a' and availability='0'"; 
				$r1 = mysqli_query($con,$q1);
				
				if ($r1->num_rows > 0)
				{
							echo '<table border="1" style= "text-align: center; color: #000099; margin: 0 auto;" >';
							echo '<tr> <th>House Number</th>
								</tr>';
				
							while ($row = $r1->fetch_assoc()) {
                                echo "<tr><td>".$row['house_no']."</td></tr>";
								}
							echo "</table>";
						}
					else
						echo "Your listing has not been booked";
					
	}
		
				
			display_view();
			
			echo '</br> </br><a href="cur_home.php" style=" background:#000099; border:none; color:white; font-family:georgia; font-size:20px; height: 25px; width: 100px; border-radius:5px; left: 20px; top: 10px;">Return</a>';
?>
			</div>
		</div>
	</div> <!-- /#contents -->
	
</body>
</html>