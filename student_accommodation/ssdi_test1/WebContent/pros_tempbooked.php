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
		<p>	
		<h2> Booked Temporary Student Accommodation </h2>

		<?php			
		function display()
			{	
				global $con, $db;
			
				$query = "SELECT * FROM permanent_acco where availability = '0'";

				$result = mysqli_query($con,$query);
				
				if($result) {

					echo '<table border="0" style= "color: #000099; margin: 0 auto;" >';
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
				
				while ($row = $result->fetch_assoc()) {
                     echo "<tr><td>". $row['house_no'] . "</td><td>". $row['addr'] . "</td><td>" . $row['zip_code'] . "</td><td>" . $row['no_room'] . "</td><td>" . $row['rent'] . "</td><td>" . $row['dist'] . "</td><td>" . $row['furnished'] . "</td><td>" . $row['prop_manager'] . "</td><td>" . $row['contact_no'] . "</td></tr>";
                 }
				}
				
				else
					echo "err";
			}
			echo '<hr/>';
			display();
			
			echo '</br> </br><a href="pros_home.php" style=" background:#000099; border:none; color:white; font-family:georgia; font-size:20px; position : absolute; height: 25px; width: 100px; border-radius:5px; left: 225px; top : 350px;">Return</a>';
?>

</p>
			</div>
		</div>
	</div> <!-- /#contents -->
	
</body>
</html>