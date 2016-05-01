<!DOCTYPE html>
<?php 
session_start();
if (!isset($_SESSION["id_1"]))
	header('location: login_pm.php');
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Delete Permanent Accommodation</title>
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
			
			<?php
                $a=$_SESSION['id_1'];
						
			include 'C:/xampp/htdocs/ssdi_test1/script/delete_permlisting.php';



	function display_view()
	{				
        
        global $a;
				$con = mysqli_connect('localhost', 'root', '');
				$db = mysqli_select_db($con,'accommodation');

				$query = "SELECT house_no,addr,zip_code,no_room,rent,dist,furnished,prop_manager,email_id,prop_address,contact_no FROM prop_acco where id='$a'";
//echo $a;
				$result = mysqli_query($con,$query);
				
				if($result) {
					$row = mysqli_fetch_row($result);

					echo '<table border="1" style= "color: #000099; margin: 0 auto;" >';
					echo '<tr> <th>House Number</th>
				  <th>Address</th>
				  <th>Zip Code</th>
				  <th>Number of Rooms</th>
				  <th>Price of House</th>
				  <th>Distance from the university(miles)</th>
				  <th>Furnished </th>
				  <th>Property Manager </th>
				  <th>Email ID </th>
				  <th>Property Manager Address </th>
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
			
			function display_form()
			{
				global $formData;
				
				echo ' 
				<form method="post" action="">
				<div style="background-color:#EEEEEE; width:500px; left:50px; float: left;padding-right:20px; height:200px; border-radius:5px;">
						<h2 style="color: #000099; text-align: center; font-family: Tahoma, Geneva, sans-serif;">Enter House Number that you want to delete</h2>
						<table border="0" align="center" width = "100" style="font-family:georgia;font-size:15px;">
							<tr>
								<td align="right" width="300" style="padding-right:5px">House Number:</td>
								<td width="100" align="left">
									<input id="hno" style = "height:25px; padding-left:10px;border-radius:5px;" size = "25" type="text" name="f[]" placeholder="House Number" required = "true" /> 
								</td>
						    </tr>
							<tr>
								<td colspan = "2">&nbsp;</td>
							</tr>
					  </table>
						<input type="submit" name="submit" value = "Delete" style=" background:#000099;border:none; color:white; font-family:georgia; font-size:14px; height: 25px; width: 100px; border-radius:5px; position:relative; left: 200px; top: 10px;" />
	        </div>
			</form>';
			}
			
			display_form();
			
			display_view();
			
			if(isset($_POST['submit'])) {
				$formData = $_POST['f'];
				
				$fclass = new dummy();
				$fclass->check($formData);
				
			//	$fclass->result();
			}
			
			echo '</br> </br><a href="pm_home.php" style=" background:#000099; border:none; color:white; font-family:georgia; font-size:20px; height: 25px; width: 100px; border-radius:5px; left: 20px; top: 10px;">Return</a>';
?>
			</div>
		</div>
	</div> <!-- /#contents -->
	
</body>
</html>