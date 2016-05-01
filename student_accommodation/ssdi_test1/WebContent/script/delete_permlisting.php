<?php

$a=$_SESSION['id_1'];
 
class dummy
{

var $house_no1;

function del() {
	
	global $house_no1;
	
	$con = mysqli_connect('localhost', 'root', '');
	$db = mysqli_select_db($con,'accommodation');

	$query = "SELECT * FROM prop_acco WHERE house_no = '$house_no1'";
	$result = mysqli_query($con,$query);
	$num = mysqli_num_rows($result);

	if ($num == 0) {
		echo "No such Property exists";
		}
	else{ 
		$query = "DELETE from prop_acco where house_no = '$house_no1'";
		
		if (!$con->query($query)) {
			echo "delete failed";
		}
		else {
			
		$this->display_view();
		}
			
}
}

public function check($formData){

	global $house_no1;
	
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
			$house_no1 = $formData[0];
			
            $con = mysqli_connect('localhost', 'root', '');
	        $db = mysqli_select_db($con,'accommodation');
			
            $query = "SELECT id FROM prop_acco WHERE house_no = '$house_no1'"; 
            $result = mysqli_query($con,$query);
	        $row = mysqli_fetch_array($result);
            
            if($row[0]== $_SESSION['id_1'])
            {
			     $this->del();
            }
            else 
            {
                echo "This listing has not been posted by you";
            }
            
		}
}
	

function display_view()
	{				
    global $a;
				$con = mysqli_connect('localhost', 'root', '');
				$db = mysqli_select_db($con,'accommodation');

				$query = "SELECT house_no,addr,zip_code,no_room,rent,dist,furnished,prop_manager, email_id, prop_address,contact_no FROM prop_acco  where id='$a'";

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
				
			//	echo '</br> </br><a href="pm_home.php" style=" background:#000099; border:none; color:white; font-family:georgia; font-size:20px; height: 25px; width: 100px; border-radius:5px; left: 20px; top: 10px;">Return</a>';

			}
			

}

?>