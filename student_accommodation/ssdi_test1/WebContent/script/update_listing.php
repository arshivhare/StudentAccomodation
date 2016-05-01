<?php

$a=$_SESSION['id_1'];

class dummy
{

var $house_no1;
var $addr1;
var $zip_code1;
var $no_room1;
var $rent1;
var $dist1;
var $furnished1;
var $prop_manager1;
var $contact_no1;

var $err;


function update($formData)
{
	global $a, $house_no1;
	
//	echo $a;
//	echo "hello";
		$house_no1 = $formData[0];
//			echo $house_no1;

					
				$con = mysqli_connect('localhost', 'root', '');
				$db = mysqli_select_db($con,'accommodation');

				$query = "SELECT house_no, addr, zip_code, no_room, rent, dist, furnished, prop_manager, contact_no FROM permanent_acco where id='$a' and house_no = '$house_no1'";
				$result = mysqli_query($con,$query);
				$row = mysqli_fetch_row($result);
				
				$hno=$row[0];
				$addr=$row[1];
				$zc = $row[2];
				$room = $row[3];
				$rent = $row[4];
				$dist = $row[5];
				$fur = $row[6];
				$pm = $row[7];
				$cno = $row[8];
									
				echo ' 
				<form method="" action="">
				<div style="background-color:#EEEEEE; width:500px; left:50px; float: left;padding-right:20px; height:550px; border-radius:5px;">
						<h2 style="color: #000099; text-align: center; font-family: Tahoma, Geneva, sans-serif;">Update Listing</h2>
						<table border="0" align="center" width = "100" style="font-family:georgia;font-size:15px;">
							<tr>
								<td align="right" width="300" style="padding-right:5px">House Number:</td>
								<td width="100" align="left">';
									echo $hno;
							echo '	</td>
						    </tr>
							
							<tr>
								<td align="right" width="300" style="padding-right:5px">Address:</td>
								<td align="left">
									<input id="addr" style = "height:25px; padding-left:10px;border-radius:5px;" size = "25" type="text" name="f1[]"  value="'; echo $addr; echo ' " required = "true"/>
								</td>
							</tr>
							
							<tr>
								<td align="right" width="300" style="padding-right:5px">Zip Code:</td>
								<td width="100" align="left">
									<input id="z_c" style = "height:25px; padding-left:10px;border-radius:5px;" size = "25" type="text" name="f1[]"  value="'; echo $zc; echo ' " required = "true" /> 
								</td>
						    </tr>
							
							<tr>
								<td align="right" width="300" style="padding-right:5px">Number  of rooms:</td>
								<td width="100" align="left">
									<input id="r_no" style = "height:25px; padding-left:10px;border-radius:5px;" size = "25" type="text" name="f1[]"  value="'; echo $room; echo ' " required = "true" /> 
								</td>
						    </tr>
							
							<tr>
								<td align="right" width="300" style="padding-right:5px">Rent (in $):</td>
								<td width="100" align="left">
									<input id="hno" style = "height:25px; padding-left:10px;border-radius:5px;" size = "25" type="text" name="f1[]"  value="'; echo $rent; echo ' " required = "true" /> 
								</td>
						    </tr>
							
							<tr>
								<td align="right" width="300" style="padding-right:5px">Distance from University (in miles):</td>
								<td width="100" align="left">
									<input id="dist" style = "height:25px; padding-left:10px;border-radius:5px;" size = "25" type="text" name="f1[]"  value="'; echo $dist; echo ' "  required = "true" /> 
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
									<input id="pm" style = "height:25px; padding-left:10px;border-radius:5px;" size = "25" type="text" name="f1[]" value="'; echo $pm; echo '" required = "true" /> 
								</td>
						    </tr>
							
							<tr>
								<td align="right" width="300" style="padding-right:5px">Contact Number:</td>
								<td width="100" align="left">
									<input id="c_no" style = "height:25px; padding-left:10px;border-radius:5px;" size = "25" type="text" name="f1[]" value="'; echo $cno; echo '" required = "true" /> 
								</td>
						    </tr>
							
							<tr>
								<td colspan = "2">&nbsp;</td>
							</tr>
					  </table>
						<input type="submit" name="submit1" value = "Update" style=" background:#000099;border:none; color:white; font-family:georgia; font-size:14px; height: 25px; width: 100px; border-radius:5px; position:relative; left: 200px; top: 10px;" />
	        </div>
			</form>';

			if(isset($_POST['submit1'])) {
				$formData1 = $_POST['f1'];
				print_r ($formData1);
				echo "dqwpdjpo";
				
			//	$this->check($formData1);	
			}
}
			/*
function check($formData1){
	
	global $house_no1, $addr1, $zip_code1, $no_room1, $rent1, $dist1, $furnished1, $prop_manager1, $contact_no1;
	global $err;

	$regex_zip_code1 = "/^[0-9]{5}$/";
	$regex_no_room1 = "/^[0-9]$/";
	$regex_dist1 = "/^[0-9]+(\.[0-9]+)?$/";
    $regex_contact_no1 = "/^[0-9]{10}$/";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			if (!preg_match($regex_zip_code1, $formData1[1])) {
					$err = "Please fill out a valid zip code.";
				return $err;
			}
				
			else if (!preg_match($regex_no_room1, $formData1[2])) {
					$err = "Please fill out valid Number of rooms";
				return $err;
			}
				
			else if (!preg_match($regex_dist1, $formData1[4])) {
					$err = "Please fill out a valid value.";
				return $err;
			}
				
			else if (!preg_match($regex_contact_no1, $formData1[7])) {
					$err = "Please fill out a valid 10 Digit Contact Number ";
				return $err;
			}
		
			else{		
				$addr1 = $formData1[0];
				$zip_code1 = $formData1[1];
				$no_room1 = $formData1[2];
				$rent1 = $formData1[3];
				$dist1 = $formData1[4];
				$furnished1 = $formData1[5];
				$prop_manager1 = $formData1[6];
				$contact_no1 = $formData1[7];
				
				$this->add();
			}
		}
}

function add() {
		
	global $house_no1, $addr1, $zip_code1, $no_room1, $rent1, $dist1, $furnished1, $prop_manager1, $contact_no1;
	global $err;
	global $a;

	$con = mysqli_connect('localhost', 'root', '');
	$db = mysqli_select_db($con,'accommodation');

//	$query = "SELECT * FROM permanent_acco WHERE id='$a' and house_no = '$house_no'";
//	$result = mysqli_query($con,$query);
//	$num = mysqli_num_rows($result);

	$query = "UPDATE TABLE permanent_acco (`addr`, `zip_code`, `no_room`, `rent`, `dist`, `furnished`, `prop_manager`, `contact_no`) VALUES ('$addr1','$zip_code1','$no_room1','$rent1','$dist1','$furnished1','$prop_manager1','$contact_no1') where id='$a' and house_no='$house_no1'";
	
	//header("Refresh:0; url=cur_update.php");
	
		if (!$con->query($query)) {
			echo "INSERT failed";
		}
		
		else {
		//$this->display_view();
		echo "done";
		
		}
}

/*
function display_view()
	{				
				$con = mysqli_connect('localhost', 'root', '');
				$db = mysqli_select_db($con,'accommodation');

				$query = "SELECT house_no,addr,zip_code,no_room,rent,dist,furnished,prop_manager,contact_no FROM permanent_acco where ";
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
				
				echo '</br> </br><a href="cur_home.php" style=" background:#000099; border:none; color:white; font-family:georgia; font-size:20px; height: 25px; width: 100px; border-radius:5px; left: 20px; top: 10px;">Return</a>';

			}	
			

	function result(){
	global $err;

	echo $err;
}
*/
}


?>