<?php

class dummy
{

var $id1;
var $emailid1;
var $pass1;

var $err;


function signup() {
	
	global $id1, $emailid1, $pass1;
	
	$con = mysqli_connect('localhost', 'root', '');
	$db = mysqli_select_db($con,'accommodation');

	$query = "SELECT * FROM property_manager WHERE email_id = '$emailid1'";
	$result = mysqli_query($con,$query);
	$num = mysqli_num_rows($result);

	if ($num != 0) {
		echo "EmailID already exists";
		}
	else{ 
		$query = "INSERT INTO property_manager (`email_id`, `pass`) VALUES ('$emailid1','$pass1')";
		
		if (!$con->query($query)) {
			echo "INSERT failed";
		}
		else {
			
			$q2 = "SELECT id FROM property_manager WHERE email_id='$emailid1'";
			$result = mysqli_query($con,$q2);
			$row = mysqli_fetch_row($result);

			$id1 = $row[0];
			
			session_start();
			$_SESSION["id_1"]=$id1;
			header('location: pm_home.php');
		}
}

}

public function check($formData){

    global $emailid1, $pass1;
	global $err;

	$regex_email = "/^[A-z0-9_\-]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z.]{2,4}$/";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		if (!preg_match($regex_email, $formData[0])){
			$err = "Please fill out a valid mail id.";
			return $err;
			}
			
		else 
		{
			$emailid1 = $formData[0];
			$pass1 = $formData[1];
		
//		return $formData;
	
			$this->signup();
		}
	}
}

function result(){

	global $err;
	
	echo $err;

	}
}


?>