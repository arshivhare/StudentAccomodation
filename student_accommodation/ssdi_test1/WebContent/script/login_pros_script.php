<?php

class dummy
{

var $id1;
var $pass1;

var $err;

function login() {
	
	global $id1, $pass1;
	
	$con = mysqli_connect('localhost', 'root', '');
	$db = mysqli_select_db($con,'accommodation');

	$query = "SELECT id, pass FROM prospective_student WHERE id='$id1'";

	$result = mysqli_query($con,$query);
	$num = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);


	if ($num == 0)
		echo "Student ID Doesn't Exist";

	else
		if ($pass1 == $row['pass'])
			{
			session_start();
			$_SESSION["id_1"]=$id1;
			header('location: pros_home.php');		
			}
		else
			echo "Incorrect Password";
}

public function check($formData){

    global $id1, $pass1;
	global $err;

	$regex_id = "/^(800)[0-9]{6}$/";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		if (!preg_match($regex_id, $formData[0])) {
				$err = "Please fill out a valid student id.";
				return $err;
		}
			
        else 
		{
			$id1 = $formData[0];
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