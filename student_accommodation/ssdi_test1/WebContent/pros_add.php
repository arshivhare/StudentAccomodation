<!DOCTYPE html>
<?php 
session_start();
if (!isset($_SESSION["id_1"]))
	header('location: login_cur.php');
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Add Information</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8" />

	<style>
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
			
			<?php

			include 'C:/xampp/htdocs/ssdi_test1/script/add_info.php';
	
			$a=$_SESSION["id_1"];
			
			function display_form()
			{
				global $a;
				
				$con = mysqli_connect('localhost', 'root', '');
				$db = mysqli_select_db($con,'accommodation');

				$query = "SELECT username,ph_no from prospective_student where id=$a";
				$result = mysqli_query($con,$query);
				$row = mysqli_fetch_row($result);
				
				$uname=$row[0];
				$ph=$row[1];
					
				global $formData;
				
				echo ' 
				<form method="post" action="">
				<div style="background-color:#EEEEEE; width:500px; left:50px; float: left;padding-right:20px; height:400px; border-radius:5px;">
						<h2 style="color: #000099; text-align: center; font-family: Tahoma, Geneva, sans-serif;">Add Information</h2>
						<table border="0" align="center" width = "100" style="font-family:georgia;font-size:15px;">
							<tr>
								<td align="right" width="300" style="padding-right:5px">Full Name:</td>
								<td width="100" align="left">
									<input id="pname" style = "height:25px; padding-left:10px;border-radius:5px;" size = "25" type="text" name="f[]"  value="'; echo $uname; echo ' " required = "true" /> 
								</td>
						    </tr>
							
                            <tr>
								<td align="right" width="300" style="padding-right:5px">Contact Number:</td>
								<td width="100" align="left">
									<input id="c_no" style = "height:25px; padding-left:10px;border-radius:5px;" size = "25" type="text" name="f[]" value="'; echo $ph; echo '" required = "true" /> 
								</td>
						    </tr>
							
							<tr>
								<td align="right" width="300" style="padding-right:5px">Date Of Arrival:</td>
								<td align="left">
									<input id="doa" style = "height:25px; padding-left:10px;border-radius:5px;" size = "25" type="date" name="f[]" placeholder="Date of Arrival" required = "true"/>
								</td>
							</tr>
									
							<tr>
								<td align="right" width="300" style="padding-right:5px">Number of Days Accomodation Needed:</td>
								<td width="100" align="left">
									<select name="f[]">
									  <option value="1">1</option>
									  <option value="2">2</option>
									  <option value="3">3</option>
									  <option value="4">4</option>
  									  <option value="5">5</option>
									  <option value="6">6</option>
									  <option value="7">7</option>
									  <option value="8">8</option>
									  <option value="9">9</option>
									  <option value="10">10</option>
									  <option value="11">11</option>
									  <option value="12">12</option>
									  <option value="13">13</option>
									  <option value="14">14</option>
									  <option value="15">15</option>
									</select>														
								</td>
						    </tr>
							
							<tr>
								<td align="right" width="300" style="padding-right:5px">Food Choice:</td>
								<td>
									<input id ="veg" type="radio" name="f[]" value = "veg" required = "true" /> Vegetarian </br>
									<input id = "nveg" type="radio" name="f[]" value = "nveg" required = "true" /> Non Vegetarian </br>
									<input id = "np" type="radio" name="f[]" value = "np" required = "true" /> No Preference
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
			
			
echo '</br> </br><a href="pros_home.php" style=" background:#000099; border:none; color:white; font-family:georgia; font-size:20px; height: 25px; width: 100px; border-radius:5px; left: 20px; top: 10px;">Return</a>';
			
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