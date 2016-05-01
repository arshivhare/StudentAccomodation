<?php

class dummy
{

var $emailid1;
var $pass1;

var $err;

function login() {
	
	global $emailid1, $pass1;
	
	$con = mysqli_connect('localhost', 'root', '');
	$db = mysqli_select_db($con,'accommodation');

	$query = "SELECT email_id, pass FROM property_manager WHERE email_id='$emailid1'";

	$result = mysqli_query($con,$query);
	$num = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);


	if ($num == 0)
		echo "Property Manager Doesn't Exist";

	else {
		if ($pass1 == $row['pass'])
			{
				$q2 = "SELECT id FROM property_manager WHERE email_id='$emailid1'";
				$result = mysqli_query($con,$q2);
				$row = mysqli_fetch_row($result);

				$id1 = $row[0];
				
				session_start();
				$_SESSION["id_1"]=$id1;
				header('location: pm_home.php');		
			}
		else
			echo "Incorrect Password";
	}
}

public function check($formData){

    global $emailid1, $pass1;
	global $err;

	$regex_email = "/^[A-z0-9_\-]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z.]{2,4}$/";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		if (!preg_match($regex_email, $formData[0])) {
				$err = "Please fill out a valid email address.";
				return $err;
		}
			
        else 
		{
			$emailid1 = $formData[0];
			$pass1 = $formData[1];
			
			$this->login();
		}
	}
}

function result(){
	global $err;

	echo $err;
}
}


?>