<?php

class dummy
{

var $uname1;
var $id1;
var $emailid1;
var $pass1;
var $phone1;

var $err;

function signup() {
	
	global $uname1, $emailid1, $pass1, $phone1, $id1;
	
	$con = mysqli_connect('localhost', 'root', '');
	$db = mysqli_select_db($con,'accommodation');

	$query = "SELECT * FROM current_student WHERE id = '$id1'";
	$result = mysqli_query($con,$query);
	$num = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);

    if ($num != 0) {
	echo "ID already exists";
	}
	else { 
	$query = "INSERT INTO current_student (`username`, `id`, `email_id`, `pswd`, `ph_no`) VALUES ('$uname1', '$id1','$emailid1','$pass1','$phone1')";
	
	if (!$con->query($query)) {
		echo "INSERT failed: ";
	}
	else {
        	session_start();
			$_SESSION["id_1"]=$id1;
            header('location: cur_home.php');
	}

}
}

public function check($formData){

    global $uname1, $id1, $emailid1, $pass1, $phone1;
	global $err;

	$regex_name = "/^[a-z]+.$/";
	$regex_id = "/^(800)[0-9]{6}$/";
	$regex_email = "/^[a-z]+[a-z0-9]*(@uncc.edu)$/";
	$regex_num = "/^[0-9]{10}$/";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		if (!preg_match($regex_name, $formData[0])) {
			$err = "Please fill out a valid name.";
			return $err;
		}
		
		else if (!preg_match($regex_id, $formData[1])) {
				$err = "Please fill out a valid id.";
				return $err;
		}
			
		else if (!preg_match($regex_email, $formData[2])) {
				$err = "Please fill out a valid mail id.";
				return $err;
		}
			
		else if (!preg_match($regex_num, $formData[4])) {
				$err = "Please fill out a valid phone number.";
				return $err;
		}
	
        else 
		{
			$uname1 = $formData[0];
			$id1 = $formData[1];
			$emailid1 = $formData[2];
			$pass1 = $formData[3];
			$phone1 = $formData[4];
			
		//	return $formData;
			
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