<!DOCTYPE html>
<?php 
session_start();
if (!isset($_SESSION["id_1"]))
	header('location: login_pros.php');

?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Booked Temporary Accommodation</title>
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
			
			<h2> Your Temporary Student Accommodation Booking</h2>
			
			<?php
			
			$a=$_SESSION['id_1'];
			
			$con = mysqli_connect('localhost', 'root', '');
			$db = mysqli_select_db($con,'accommodation');
						
	function display()
	{				
			global $con, $db, $a;

			$sql = "SELECT * FROM booking where id='$a' and booking_flag='1'";
				
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
				echo '<table border="0" style= "color: #000099; margin: 0 auto;" >';
					echo '<tr>
				  <th>Booking ID</th>
				  <th>House Number</th> 
				  </tr>';
				  
				while ($row = $result->fetch_assoc()) {
                                echo "<tr><td>".$row['booking_id']."</td><td>".$row['house_no']."</td><td><a href='cancel.php?id2=".$row['house_no']."'>Cancel Booking</a></td></tr>";
                            }
						echo '</table>';
			}
			
			else
				echo 'You have not booked any accommodation';
	}

	display();	
			echo '</br> </br><a href="pros_home.php" style=" background:#000099; border:none; color:white; font-family:georgia; font-size:20px; height: 25px; width: 100px; border-radius:5px; left: 20px; top: 10px;">Return</a>';
?>
			</div>
		</div>
	</div> <!-- /#contents -->
	
</body>
</html>