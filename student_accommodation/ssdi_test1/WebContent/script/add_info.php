<?php

$a=$_SESSION['id_1'];

class dummy
{

var $p_name;
var $contact_no1;
var $dt_arrival;
var $no_days;
var $f_choice;


var $err;

function add() {
	
	global $p_name,$contact_no1,$dt_arrival,$no_days,$f_choice;
	global $a;
	
	$con = mysqli_connect('localhost', 'root', '');
	$db = mysqli_select_db($con,'accommodation');

	$query = "SELECT * FROM p_info WHERE id='$a' and name = '$p_name'";
	$result = mysqli_query($con,$query);
	$num = mysqli_num_rows($result);

	if ($num != 0) {
		echo "information Already Exists";
		}
	else{ 
		$query = "INSERT into p_info (`id`,`name`, `contact_no`, `date_of_arrival`, `no_days`, `food_choice`) VALUES ('$a','$p_name','$contact_no1','$dt_arrival','$no_days','$f_choice')";
		
		if (!$con->query($query)) {
			echo "INSERT failed";
		}
		else {
			
		echo "Information Added Successfully";
		}
	}
}

public function check($formData){
    global $p_name,$contact_no1,$dt_arrival,$no_days,$f_choice;
	global $err;
	
	$regex_p_name = "/^[A-Za-z]+$/";
    $regex_contact_no1 = "/^[0-9]{10}$/";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
	/*		if (!preg_match($regex_p_name, $formData[0])) {
				$err = "Please fill out a valid Name Starting with an Alphabet";
				return $err;
			}
			else if (!preg_match($regex_contact_no1, $formData[1])) {
					$err = "Please fill out a valid 10 Digit Contact Number ";
				return $err;
            }
				
			else{		*/
				$p_name = $formData[0];
				$contact_no1 = $formData[1];
				$dt_arrival = $formData[2];
				$no_days = $formData[3];
				$f_choice = $formData[4];
				
				
		//		return $formData;

				$this->add();
	//		}
		}
    
}
			
	function result(){
	global $err;

	echo $err;
}
}

?>