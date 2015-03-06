<?php 

require_once("utils.php");

$data = array();

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
	$contact = sanitize_input($_POST['contact']);
	
	// ?????
	if(!preg_match("/^\+\d{12,13}$/", $contact))
		return "Enter a valid 10 digit or 11 digit mobile number = $contact";

	return false;
}
function validate_sec_contact() {
	$sec_contact = sanitize_input($_POST['sec_contact']);
	
	// ?????
	if(!preg_match("/^\+\d{12,13}$/", $sec_contact))
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
	$past_expr = sanitize_input($_POST['past_expr']);
	
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

	$upload_dir = $GLOBALS['upload_dir'];
	if(!@move_uploaded_file($file['tmp_name'], $upload_dir . $file['name'])) {
		return "An unknown error occurred. Please retry2";
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

if( $_SERVER["REQUEST_METHOD"] == "POST") {
	$err = array();
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
