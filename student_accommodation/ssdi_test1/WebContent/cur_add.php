<!DOCTYPE html>
<?php 
session_start();
if (!isset($_SESSION["id_1"]))
	header('location: login_cur.php');
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Add Accommodation</title>
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
			
			<?php
			$a=$_SESSION['id_1'];
			
			include 'C:/xampp/htdocs/ssdi_test1/script/add_listing.php';

			function display_form()
			{
				global $a;
				global $formData;
				
				$con = mysqli_connect('localhost', 'root', '');
				$db = mysqli_select_db($con,'accommodation');

				$query = "SELECT username,ph_no from current_student where id=$a";
				$result = mysqli_query($con,$query);
				$row = mysqli_fetch_row($result);
				
				$name=$row[0];
				$ph=$row[1];
				
				echo ' 
				<form method="post" action="">
				<div style="background-color:#EEEEEE; width:500px; left:50px; float: left;padding-right:20px; height:550px; border-radius:5px;">
						<h2 style="color: #000099; text-align: center; font-family: Tahoma, Geneva, sans-serif;">Add Listing</h2>
						<table border="0" align="center" width = "100" style="font-family:georgia;font-size:15px;">
							<tr>
								<td align="right" width="300" style="padding-right:5px">House Number:</td>
								<td width="100" align="left">
									<input id="hno" style = "height:25px; padding-left:10px;border-radius:5px;" size = "25" type="text" name="f[]" placeholder="House Number" required = "true" /> 
								</td>
						    </tr>
							
							<tr>
								<td align="right" width="300" style="padding-right:5px">Address:</td>
								<td align="left">
									<input id="addr" style = "height:25px; padding-left:10px;border-radius:5px;" size = "25" type="text" name="f[]" placeholder="Address" required = "true"/>
								</td>
							</tr>
							
							<tr>
								<td align="right" width="300" style="padding-right:5px">Zip Code:</td>
								<td width="100" align="left">
									<input id="z_c" style = "height:25px; padding-left:10px;border-radius:5px;" size = "25" type="text" name="f[]" placeholder="5-digit zip Code" required = "true" /> 
								</td>
						    </tr>
							
							<tr>
								<td align="right" width="300" style="padding-right:5px">Number  of rooms:</td>
								<td width="100" align="left">
									<input id="r_no" style = "height:25px; padding-left:10px;border-radius:5px;" size = "25" type="text" name="f[]" placeholder="Number of rooms" required = "true" /> 
								</td>
						    </tr>
							
							<tr>
								<td align="right" width="300" style="padding-right:5px">Rent (in $):</td>
								<td width="100" align="left">
									<input id="hno" style = "height:25px; padding-left:10px;border-radius:5px;" size = "25" type="text" name="f[]" placeholder="Rent" required = "true" /> 
								</td>
						    </tr>
							
							<tr>
								<td align="right" width="300" style="padding-right:5px">Distance from University (in miles):</td>
								<td width="100" align="left">
									<input id="dist" style = "height:25px; padding-left:10px;border-radius:5px;" size = "25" type="text" name="f[]" placeholder="Distance" required = "true" /> 
								</td>
						    </tr>
							
							<tr>
								<td align="right" width="300" style="padding-right:5px">Furnished:</td>
								<td>
									<input id ="yes" type="radio" name="f[]" value = "yes" required = "true" /> Yes
									<input id = "no" type="radio" name="f[]" value = "no" required = "true" /> No
								</td>
						    </tr>
							
							<tr>
								<td align="right" width="300" style="padding-right:5px">Property Manager:</td>
								<td width="100" align="left">
									<input id="pm" style = "height:25px; padding-left:10px;border-radius:5px;" size = "25" type="text" name="f[]" value="'; echo $name; echo '" required = "true" /> 
								</td>
						    </tr>
							
							<tr>
								<td align="right" width="300" style="padding-right:5px">Contact Number:</td>
								<td width="100" align="left">
									<input id="c_no" style = "height:25px; padding-left:10px;border-radius:5px;" size = "25" type="text" name="f[]" value="'; echo $ph; echo '" required = "true" /> 
								</td>
						    </tr>
							
							<tr>
								<td colspan = "2">&nbsp;</td>
							</tr>
					  </table>
						<input type="submit" name="submit" value = "Add" style=" background:#000099;border:none; color:white; font-family:georgia; font-size:14px; height: 25px; width: 100px; border-radius:5px; position:relative; left: 200px; top: 10px;" />
	        </div>
			</form>';
			}
			
			
echo '</br> </br><a href="cur_home.php" style=" background:#000099; border:none; color:white; font-family:georgia; font-size:20px; height: 25px; width: 100px; border-radius:5px; left: 20px; top: 10px;">Return</a>';
			
			display_form();
			
			if(isset($_POST['submit'])) {
				$formData = $_POST['f'];
				
				$fclass = new dummy();
				$fclass->check($formData);
				
				$fclass->result();
			}


?>
			</div>
		</div>
	</div> <!-- /#contents -->
	
</body>
</html>