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

function add() {
	
	global $house_no1, $addr1, $zip_code1, $no_room1, $rent1, $dist1, $furnished1, $prop_manager1, $contact_no1;
	global $a;
	
	$con = mysqli_connect('localhost', 'root', '');
	$db = mysqli_select_db($con,'accommodation');

	$query = "SELECT * FROM permanent_acco WHERE id='$a' and house_no = '$house_no1'";
	$result = mysqli_query($con,$query);
	$num = mysqli_num_rows($result);

	if ($num != 0) {
		echo "Property already exists";
		}
	else{ 
		$query = "INSERT into permanent_acco (`id`,`house_no`, `addr`, `zip_code`, `no_room`, `rent`, `dist`, `furnished`, `prop_manager`, `contact_no`, `availability`) VALUES ('$a','$house_no1','$addr1','$zip_code1','$no_room1','$rent1','$dist1','$furnished1','$prop_manager1','$contact_no1', '1')";
		
		if (!$con->query($query)) {
			echo "INSERT failed";
		}
		else {
			
		$this->display_view();
		}
	}
}

public function check($formData){

	global $house_no1, $addr1, $zip_code1, $no_room1, $rent1, $dist1, $furnished1, $prop_manager1, $contact_no1;
	global $err;
	
	$regex_house_no1 = "/^[0-9]+.$/";
	$regex_zip_code1 = "/^[0-9]{5}$/";
	$regex_no_room1 = "/^[0-9]$/";
	$regex_dist1 = "/^[0-9]+(\.[0-9]+)?$/";
    $regex_contact_no1 = "/^[0-9]{10}$/";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			if (!preg_match($regex_house_no1, $formData[0])) {
				$err = "Please fill out a valid house number";
				return $err;
			}
			
			else if (!preg_match($regex_zip_code1, $formData[2])) {
					$err = "Please fill out a valid zip code.";
				return $err;
			}
				
			else if (!preg_match($regex_no_room1, $formData[3])) {
					$err = "Please fill out valid Number of rooms";
				return $err;
			}
				
			else if (!preg_match($regex_dist1, $formData[5])) {
					$err = "Please fill out a valid value.";
				return $err;
			}
				
			else if (!preg_match($regex_contact_no1, $formData[8])) {
					$err = "Please fill out a valid 10 Digit Contact Number ";
				return $err;
			}
		
			else{		
				$house_no1 = $formData[0];
				$addr1 = $formData[1];
				$zip_code1 = $formData[2];
				$no_room1 = $formData[3];
				$rent1 = $formData[4];
				$dist1 = $formData[5];
				$furnished1 = $formData[6];
				$prop_manager1 = $formData[7];
				$contact_no1 = $formData[8];
				
		//		return $formData;

				$this->add();
			}
		}
}
	
function display_view()
	{				
				$con = mysqli_connect('localhost', 'root', '');
				$db = mysqli_select_db($con,'accommodation');

			//	$query = "SELECT * FROM permanent_acco";
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
				
				echo '</br> </br><a href="cur_home.php" style=" background:#000099; border:none; color:white; font-family:georgia; font-size:20px; height: 25px; width: 100px; border-radius:5px; left: 20px; top: 10px;">Return</a>';

			}
			
	function result(){
	global $err;

	echo $err;
}
}

?>