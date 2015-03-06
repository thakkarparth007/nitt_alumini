<?php
	/* utils.php */

function sanitize_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function Success() {
	echo json_encode(array("status" => "Success"));
}

function Error($err) {
	$err["status"] = "Error";
	echo json_encode($err);
}

?>