<!DOCTYPE html>
<?php 
session_start();
if (!isset($_SESSION["id_1"]))
	header('location: login_pros.php');
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Book Temporary Accommodation</title>
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
			
			<h2> Temporary Student Accommodation </h2>
						
			<?php
			
			$h_no=$_GET['id'];
			
			$con = mysqli_connect('localhost', 'root', '');
			$db = mysqli_select_db($con,'accommodation');
			
			$sql = "SELECT * FROM permanent_acco WHERE house_no = '$h_no'";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            }
	
			echo "<h3> House Number ".$h_no."</h3>";
			
	function display_view()
	{				
			global $con, $db, $h_no;

				$query = "SELECT * FROM permanent_acco where house_no='$h_no'";

				$result = mysqli_query($con,$query);
				
				if($result) {
					echo '<table border="1" style= "color: #000099; margin: 0 auto;" >';
					echo '<tr>
				  <th>Address</th>
				  <th>Zip Code</th>
				  <th>Number of Rooms</th>
				  <th>Rent per month</th>
				  <th>Distance from the university(miles)</th>
				  <th>Furnished </th>
				  <th>Property Manager </th>
				  <th>Email ID</th>
				  <th>Contact </th>
				</tr>';
				
				while ($row = $result->fetch_assoc()) {
					
                     echo "<tr><td>". $row['addr'] . "</td><td>" . $row['zip_code'] . "</td><td>" . $row['no_room'] . "</td><td>" . $row['rent'] . "</td><td>" . $row['dist'] . "</td><td>" . $row['furnished'] . "</td><td>" . $row['zip_code'] . "</td><td>" . $row['prop_manager'] . "</td><td>" . $row['contact_no'] . "</td></tr>";
                 }
				 echo "</table>";
				 
				 echo '<div style=" color:blue; font-family:georgia; font-size:25px; align:center; position:absolute; top:500px;"><a href="booking.php?id1='.$h_no.'">Book</a></div>';

				}
				else
					echo "err";
			}
			
			
			display_view();
			
			echo '</br> </br><a href="pros_home.php" style=" background:#000099; border:none; color:white; font-family:georgia; font-size:20px; height: 25px; width: 100px; position: relative; border-radius:5px; left: 10px; top: 100px;">Return</a>';
?>
			</div>
		</div>
	</div> <!-- /#contents -->
	
</body>
</html>