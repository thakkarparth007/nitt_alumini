<?php

include "validate.php";

$err = "{}";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	// a json string that contains the errors and 
	// a status message (success/error)
	$err = validate();
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>NITT Alumini</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="js/intl-tel-input/build/css/intlTelInput.css">
</head>
<body>
	<div id="error_message">
		<span id="error_message_text">
			There are errors in the form you submitted. Please make the necessary corrections. 

			<br><br>

			Click this box to dismiss this message.
		</span>
	</div>
	<div id="tabContainer">
		<div id="tabWrapper">
			<a href="#part1" id="link_p1" class="tab active">Part 1 : Contact Details</a>
			<a href="#part2" id="link_p2" class="tab">Part 2 : Contribution to NITT</a>
			<a href="#part3" id="link_p3" class="tab">Part 3 : Services from Students</a>
		</div>
	</div>
	<script id="past_expr_widget_tpl" type="text/x-handlebars-template">
		<span class="past_expr_span" id="past_expr{{EXPR_COUNT}}_span">
			<label></label>
			<input type="text" name="past_expr{{EXPR_COUNT}}" id="past_expr{{EXPR_COUNT}}">
			<a href="" class="past_expr_rem" id="past_expr{{EXPR_COUNT}}_rem" name="past_expr{{EXPR_COUNT}}_rem">Remove</a>
		</span>
	</script>
	<!-- First form -->
	<form id="frm" enctype="multipart/form-data" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
	<div id="page1" class="page">
		<p>
			<label for="name">Name</label>
			<input type="text" name="name" id="name">
			<span id="succname" class="success">✓ Valid</span><span id="errname" class="error"></span>
		</p>
		<br>

		<p>
			<label for="email">Email</label>
			<input type="email" name="email" id="email">
			<span id="succemail" class="success">✓ Valid</span><span id="erremail" class="error"></span>
		</p>
		<br>

		<p>
			<label for="contact">Contact</label>
			<input type="tel" name="contact" id="contact">
			<span id="succcontact" class="success">✓ Valid</span><span id="errcontact" class="error"></span>
		</p>
		<br>

		<p>
			<label for="sec_contact">Secondary Contact</label>
			<input type="tel" name="sec_contact" id="sec_contact">
			<span id="succsec_contact" class="success">✓ Valid</span><span id="errsec_contact" class="error"></span>
		</p>
		<br>

		<p>
			<label for="batch">Batch</label>
			<input type="text" name="batch" id="batch">
			<span id="succbatch" class="success">✓ Valid</span><span id="errbatch" class="error"></span>
		</p>
		<br>

		<p>
			<label for="roll">Roll Number</label>
			<input type="text" name="roll" id="roll">
			<span id="succroll" class="success">✓ Valid</span><span id="errroll" class="error"></span>
		</p>
		<br>

		<p>
			<label for="curr_addr">Current Address</label>
			<textarea name="curr_addr" id="curr_addr"></textarea>
			<span id="succcurr_addr" class="success">✓ Valid</span><span id="errcurr_addr" class="error"></span>
		</p>
		<br>
		<p>
			<label for="curr_country">Current Country</label>
			<input type="text" name="curr_country" id="curr_country" value="India">
			<span id="succcurr_country" class="success">✓ Valid</span><span id="errcurr_country" class="error"></span>
		</p>
		<br>

		<p id="p_india_addr">
			<label for="india_addr">Address in India</label>
			<textarea name="india_addr" id="india_addr"></textarea>
			<span id="succindia_addr" class="success">✓ Valid</span><span id="errindia_addr" class="error"></span>
		</p>
		<br>

		<p>
			<label for="dob">Date of birth</label>
			<input type="date" name="dob" id="dob">
			<span id="succdob" class="success">✓ Valid</span><span id="errdob" class="error"></span>
		</p>
		<br>

		<p>
			<label for="company">Company</label>
			<input type="text" name="company" id="company">
			<span id="succcompany" class="success">✓ Valid</span><span id="errcompany" class="error"></span>
		</p>
		<br>

		<p>
			<label for="field">Field</label>
			<input type="text" name="field" id="field">
			<span id="succfield" class="success">✓ Valid</span><span id="errfield" class="error"></span>
		</p>
		<br>

		<p>
			<label for="desgn">Designation</label>
			<input type="text" name="desgn" id="desgn">
			<span id="succdesgn" class="success">✓ Valid</span><span id="errdesgn" class="error"></span>
		</p>
		<br>

		<p>
			<label for="past_expr">Past Experiences</label>
			<div id="expr_container">
				<span class="past_expr_span" id="past_expr1_span">
					<input type="text" name="past_expr1" id="past_expr1">
					<a href="" class="past_expr_rem" id="past_expr1_rem" name="past_expr1_rem">Remove</a>
				</span>
			</div>
			<br>
			<!-- filler -->
			<label></label>
			<a href="" id="past_expr_add" name="past_expr_add">Add</a>
			<span id="succpast_expr" class="success">✓ Valid</span><span id="errpast_expr" class="error"></span>
		</p>
		<br>

		<p>
			<label for="photo">Photo</label>
			<input type="file" name="photo" id="photo">
			<span id="succphoto" class="success">✓ Valid</span><span id="errphoto" class="error"></span>
		</p>
		<br>

		<p>
			<label for="nationality">Nationality</label>
			<input type="text" name="nationality" id="nationality" value="Indian">
			<span id="succnationality" class="success">✓ Valid</span><span id="errnationality" class="error"></span>
		</p>
		<br>

		<p>
			<label for="last_visit">Last visit to campus</label>
			<input type="date" name="last_visit" id="last_visit">
			<span id="succlast_visit" class="success">✓ Valid</span><span id="errlast_visit" class="error"></span>
		</p>
		<br>

		<p>
			<label for="entreprenuer">Entreprenuer or not</label>
			<select name="entreprenuer" id="entreprenuer">
				<option value="0">Select...</option>
				<option value="yes">Yes</option>
				<option value="no">No</option>
			</select>
			<span id="succentreprenuer" class="success">✓ Valid</span><span id="errentreprenuer" class="error"></span>
		</p>
		<br>
	</div>
	<div id="page2" class="page">
		<p>
			<label for="gl">Are you interested in giving Guest Lectures or Group Interactions</label>
			<select name="gl" id="gl">
				<option value="0">Select...</option>
				<option value="yes">Yes</option>
				<option value="no">No</option>
			</select>
			<span id="succgl" class="success">✓ Valid</span><span id="errgl" class="error"></span>
		</p>
		<br>

		<p>
			<label for="faculty">Are you interested in being a Visiting or Adjunct Faculty</label>
			<select name="faculty" id="faculty">
				<option value="0">Select...</option>
				<option value="yes">Yes</option>
				<option value="no">No</option>
			</select>
			<span id="succfaculty" class="success">✓ Valid</span><span id="errfaculty" class="error"></span>
		</p>
		<br>

		<p>
			<label for="last_reunion">When was the last reunion held?</label>
			<input type="date" name="last_reunion" id="last_reunion">
			<span id="succlast_reunion" class="success">✓ Valid</span><span id="errlast_reunion" class="error"></span>
		</p>
		<br>

		<p>
			<label for="next_reunion">When would you like to have the next reunion?</label>
			<input type="date" name="next_reunion" id="next_reunion">
			<span id="succnext_reunion" class="success">✓ Valid</span><span id="errnext_reunion" class="error"></span>
		</p>
		<br>

		<p>
			<label for="DAA">Are you a DAA recepient?</label>
			<select name="DAA" id="DAA">
				<option value="0">Select...</option>
				<option value="yes">Yes</option>
				<option value="no">No</option>
			</select>
			<span id="succDAA" class="success">✓ Valid</span><span id="errDAA" class="error"></span>
		</p>
		<br>
	</div>
	<div id="page3" class="page">
		<p>
			<label for="DAA">Are you a DAA1 recepient?</label>
			<select name="DAA1" id="DAA1">
				<option value="0">Select...</option>
				<option value="yes">Yes</option>
				<option value="no">No</option>
			</select>
			<span id="succDAA1" class="success">✓ Valid</span><span id="errDAA1" class="error"></span>
		</p>
	</div>
		<!-- Max size of the file? -->
		<input type="hidden" name="MAX_FILE_SIZE" value="16000">
		<input type="hidden" name="contact1" id="contact1">
		<input type="hidden" name="sec_contact1" id="sec_contact1">
		<a id="button_at_bottom" class="disabled">Complete Part 1 to proceed</a>
		<input type="submit" name="Submit" id="Submit" disabled="disabled" value="Submit">
	
	</form>

	<script type="text/javascript" src="js/handlebars.js"></script>
	<script type="text/javascript" src="js/jquery-min.js"></script>
	<script type="text/javascript" src="js/route.js"></script>
	<script type="text/javascript" src="js/details.js"></script>
	<script type="text/javascript" src="js/intl-tel-input/build/js/intlTelInput.min.js"></script>
	<script type="text/javascript">
		$("#contact,#sec_contact").intlTelInput({
			defaultCountry: "in",
			utilsScript: "js/intl-tel-input/lib/libphonenumber/build/utils.js"
		});
	</script>

	<?php
		$err = $GLOBALS["err"];
		echo "<script type='text/javascript'>";
			echo "var __status = " . $err . ";";
			echo "var SERVER_TODAY = new Date('" . date('Y-m-d') . "');";
		echo "</script>";
	?>
	<script type="text/javascript" src="js/past_expr.js"></script>
	<script type="text/javascript" src="js/validate.js"></script>
	<script type="text/javascript">
	function alertUser() {
		$("body").css("overflow", "hidden");
		$("#name").blur();
		$("#error_message")
			.show("slow")
			.on('click', function() {
				$(this).hide("slow");
				$("body").css("overflow", "auto");
				$("#name").focus();
			});
	}
	if(__status && __status.status == "error") {
		alertUser();

		for(var i = 0, key='', l = localStorage.length; i < l; i++)
		{
			key = localStorage.key(i);
			if(localStorage[key] && key != 'photo')
				$("#" + key).val( localStorage[key] );
		}
		for(var name in __status) {
			if(name == "status") continue;
			if(!__status[name]) {
				$("#succ" + name).hide();
				$("#err" + name)
					.show()
					.html(__status[name]);
			}
			else {
				$("#err" + name).hide();
				$("#succ" + name).show();
			}
		}

		$("#button_at_bottom").html("Complete Part 1 to proceed").show();
		$("#Submit").hide().attr("disabled","disabled");

		validateData(1, false);
	}
	</script>
</body>
</html>