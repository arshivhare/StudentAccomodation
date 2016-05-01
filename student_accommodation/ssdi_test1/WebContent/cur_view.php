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
			<h2> Temporary Accommodation Listing </h2>
			<?php

	function display_view()
	{				
				$con = mysqli_connect('localhost', 'root', '');
				$db = mysqli_select_db($con,'accommodation');

				$query = "SELECT house_no,addr,zip_code,no_room,rent,dist,furnished,prop_manager,contact_no FROM permanent_acco";

				$result = mysqli_query($con,$query);
				
				if($result) {
					$row = mysqli_fetch_row($result);

					echo '<table border="1" style= "text-align: center; color: #000099; margin: 0 auto;" >';
					echo '<tr> <th>House Number</th>
				  <th>Address</th>
				  <th>Zip Code</th>
				  <th>Number of Rooms</th>
				  <th>Rent per month</th>
				  <th>Distance from the university(miles)</th>
				  <th>Furnished </th>
				  <th>Property Manager </th>
				  <th>Contact </th>
				</tr>';
				
				while($row)
					{
						$col = count($row);
						echo "<tr>";
						
						for($c=0; $c<$col;$c++)
							echo "<td>".$row[$c]."</td>";
						echo "</tr>";
						
						$row = mysqli_fetch_row($result);
					}
					echo "</table>";
				}
				
				else
					echo "err";
			}
			
			display_view();
			
			echo '</br> </br><a href="cur_home.php" style=" background:#000099; border:none; color:white; font-family:georgia; font-size:20px; height: 25px; width: 100px; border-radius:5px; left: 20px; top: 10px;">Return</a>';
?>
			</div>
		</div>
	</div> <!-- /#contents -->
	
</body>
</html>