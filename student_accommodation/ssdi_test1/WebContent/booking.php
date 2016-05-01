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
			
			<h2> Book Temporary Student Accommodation </h2>
			
			<?php
			
			$a=$_SESSION['id_1'];
			
			$h_no=$_GET['id1'];
			//echo $h_no;
			
			$con = mysqli_connect('localhost', 'root', '');
			$db = mysqli_select_db($con,'accommodation');
			
			$sql = "SELECT * FROM permanent_acco WHERE house_no = '$h_no'";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            }
			echo "<h3> House Number ".$h_no."</h3>";
			
						
	function update()
	{				
			global $con, $db, $h_no;

				$query = "UPDATE permanent_acco SET availability = '0' where house_no='$h_no'";
				
                if (!$con->query($query)) {
					echo "UPDATE failed";
				}
				else {
						echo "Booked";
				}
	}	

	function insert()
	{				
			global $con, $db, $h_no, $a;

				$query = "INSERT INTO booking(`id`, `house_no`, `booking_flag`) VALUES ('$a', '$h_no', '1')";
				
                if (!$con->query($query)) {
					echo "Insert failed";
				}
	}		
			
			update();
			insert();
			
			echo '</br> </br><a href="pros_home.php" style=" background:#000099; border:none; color:white; font-family:georgia; font-size:20px; height: 25px; width: 100px; border-radius:5px; left: 20px; top: 10px;">Return</a>';
?>
			</div>
		</div>
	</div> <!-- /#contents -->
	
</body>
</html>