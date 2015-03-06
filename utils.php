<?php
	/* utils.php */

function sanitize_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function Success($part) {
	$_SESSION['part'] = $part + 1;
	include ("part" . $_SESSION['part'] . '.html');
}

function Error($err) {
	$err["status"] = "Error";
	echo json_encode($err);
}

?>