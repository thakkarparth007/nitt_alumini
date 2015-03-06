<?php 

require_once("utils.php");
$data = array();

function validate_gl() {
	$gl = sanitize_input($_POST['gl']);
	
	if( strtolower($gl) != "yes" && strtolower($gl) != "no")
		return "Enter either 'Yes' or 'No' for this field";

	return false;
}

function validate_faculty() {
	$faculty = sanitize_input($_POST['faculty']);
	
	if( strtolower($faculty) != "yes" && strtolower($faculty) != "no")
		return "Enter either 'Yes' or 'No' for this field";

	return false;
}

function validate_last_reunion() {
	$last_reunion = sanitize_input($_POST['last_reunion']);
	
	if(strtotime($last_reunion) > strtotime("now"))
		return "Enter a valid date of last reunion";

	return false;
}

function validate_next_reunion() {
	$next_reunion = sanitize_input($_POST['next_reunion']);
	
	if(strtotime($next_reunion) < strtotime("now"))
		return "Enter a valid date of next reunion";

	return false;
}

function validate_DAA() {
	$DAA = sanitize_input($_POST['DAA']);
	
	if( strtolower($DAA) != "yes" && strtolower($DAA) != "no")
		return "Enter either 'Yes' or 'No' for this field";

	return false;
}


if( $_SERVER["REQUEST_METHOD"] == "POST") {
	$err = array();

	$err['gl']				= validate_gl();
	$err['faculty'] 		= validate_faculty();
	$err['last_reunion'] 	= validate_last_reunion();
	$err['next_reunion'] 	= validate_next_reunion();
	$err['DAA'] 			= validate_DAA();

	$prob = false;
	foreach($err as $name => $val) {
		if($val) {
			$prob = true;
			break;
		}
	}

	if(!$prob)
		Success();
	else
		Error($err);
}
else {
	Error();
}

?>
