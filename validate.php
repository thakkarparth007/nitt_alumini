<?php
/* 
file: validate.php 
description:
	Contains the logic for the backend validation of the data.
	Only one "public" method - validate(). Uses the data from the 
	$_POST array (assuming that the form has been submitted already)
	and returns a json string of the form:
	{
		status: "success" or "error",
		if success, then for each data-field, returns a string containing the error
		description for that field, or false - indicating no error
	}
*/

$max_photo_size = 1048576;	// 1 MB
$upload_required = true;
$upload_dir = "C:/wamp/www/nitt_alumini/images/";
$mime_images = array("image/jpeg", "image/pjpeg", "image/png");

function validate_name() {
	$name = sanitize_input($_POST['name']);
	if(strlen($name) > 50)
		return "Name can not exceed 50 characters";
	if(!preg_match("/^[a-zA-Z \.']+$/", $name))
		return "Enter a valid name";

	return false;
}
function validate_email() {
	$email = sanitize_input($_POST['email']);
	
	if(!preg_match("/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/", $email))
		return "Enter a valid email id";

	return false;
}
function validate_contact() {
	//return false;
	$contact = sanitize_input($_POST['contact1']);
	
	// ?????
	if(!preg_match("/^[0\+]\d{12,13}$/", $contact))
		return "Enter a valid 10 digit or 11 digit mobile number = $contact";

	return false;
}
function validate_sec_contact() {
	//return false;

	$sec_contact = sanitize_input($_POST['sec_contact1']);
	
	// ?????
	if(!preg_match("/^[0\+]\d{12,13}$/", $sec_contact))
		return "Enter a valid 10 digit or 11 digit mobile number";

	return false;
}
function validate_batch() {
	$batch = (int) sanitize_input($_POST['batch']);
	
	if($batch < 1968 || $batch > (int) date('Y'))
		return "Enter a valid batch year (e.g. 2010)";

	return false;
}
function validate_roll() {
	$roll = sanitize_input($_POST['roll']);
	
	// ??
	if(!preg_match("/^\d{9}$/", $roll))
		return "Enter a valid roll number";

	// validate with database
	
	return false;
}
function validate_curr_addr() {
	$curr_addr = sanitize_input($_POST['curr_addr']);
	
	// ??
	return false;
}
function validate_india_addr() {
	$india_addr = sanitize_input($_POST['india_addr']);
	$curr_country = sanitize_input($_POST['curr_country']);

	if(strtolower($curr_country) != 'india' && !$india_addr) {
		return "Indian residential address is required";
	}
	// ??
	return false;
}
function validate_dob() {
	$dob = sanitize_input($_POST['dob']);
	
	$dob = new DateTime($dob);
	if(!$dob)
		return "Enter a valid date of birth";

	// ??
	if($dob->getTimeStamp() < strtotime("1 Jan 1930"))
		return "Enter a valid date of birth";

	$lower_bound = new DateTime();
	$lower_bound = $lower_bound->sub( date_interval_create_from_date_string("21 years") );

	if($dob->getTimeStamp() > $lower_bound->getTimeStamp())
		return "Enter a valid date of birth";

	return false;
}
function validate_company() {
	$company = sanitize_input($_POST['company']);
	
	// ??
	return false;
}
function validate_field() {
	$field = sanitize_input($_POST['field']);
	
	// ??
	return false;
}
function validate_desgn() {
	$desgn = sanitize_input($_POST['desgn']);
	
	// ??
	return false;
}
function validate_past_expr() {
	$past_expr = sanitize_input($_POST['past_expr1']);

	$i = 1;
	while(isset($_POST['past_expr' . $i])) {
		$past_expr .= ";" . sanitize_input($_POST['past_expr' . $i]);
		$i++;
	}
	// ??
	return false;
}
function validate_photo() {
	//$photo = sanitize_input($_POST['photo']);
	$file = $_FILES["photo"];

	if(!isset($_FILES["photo"])) {
		return "The photo is required";
	}

	switch($file['error']) {
		case UPLOAD_ERR_INI_SIZE:
			return "The uploaded image is too large";
		case UPLOAD_ERR_PARTIAL:
			return "The upload wasn't successfull. Please retry";
		case UPLOAD_ERR_NO_FILE:
			return "The photo is required";
		case UPLOAD_ERR_FORM_SIZE:
			return "The uploaded file is too large according to MAX_FIELD_SIZE";
		case UPLOAD_ERR_OK:
			break;

		default:
			return "An unknown error occurred. Please retry1";
	}

	if(!in_array($file['type'], $GLOBALS["mime_images"])) {
		return "Only images may be uploaded";
	}
	// ??
	return false;
}
function validate_nationality() {
	$nationality = sanitize_input($_POST['nationality']);
	
	// ??
	return false;
}
function validate_last_visit() {
	$last_visit = sanitize_input($_POST['last_visit']);
	
	// ??
	return false;
}
function validate_entreprenuer() {
	$entreprenuer = sanitize_input($_POST['entreprenuer']);
	
	if( strtolower($entreprenuer) != "yes" && strtolower($entreprenuer) != "no")
		return "Enter either 'Yes' or 'No' for this field";

	return false;
}

/*
	Data validation for page 2.
 */
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

function move_photo() {
	$file = $_FILES['photo'];
	$roll = sanitize_input($_POST['roll']);
	
	$upload_dir = $GLOBALS['upload_dir'];
	if(!@move_uploaded_file($file['tmp_name'], $upload_dir . $roll . "-" . $file['name'])) {
		return "An unknown error occurred. Please retry2";
	}
}


function sanitize_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function validate() {
	$err = array();
	// todo current country
	// todo past experience
	$err['name'] 		= validate_name();
	$err['email'] 		= validate_email();
	$err['contact'] 	= validate_contact();
	$err['sec_contact'] = validate_sec_contact();
	$err['batch'] 		= validate_batch();
	$err['roll'] 		= validate_roll();
	$err['curr_addr'] 	= validate_curr_addr();
	$err['india_addr'] 	= validate_india_addr();
	$err['dob'] 		= validate_dob();
	$err['company'] 	= validate_company();
	$err['field'] 		= validate_field();
	$err['desgn'] 		= validate_desgn();
	$err['past_expr']	= validate_past_expr();
	$err['photo'] 		= validate_photo();
	$err['nationality'] = validate_nationality();
	$err['last_visit'] 	= validate_last_visit();
	$err['entreprenuer']= validate_entreprenuer();

	// page 2
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

	if(!$prob) {
		$err["status"] = "success";
		// move the photo only if everything else was successful.
		move_photo();
		header('Location: success.php');
	}
	else
		$err["status"] = "error";

	$err = json_encode($err);
	return $err;
}

?>