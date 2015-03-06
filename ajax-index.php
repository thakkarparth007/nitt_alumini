<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>NITT Alumini</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="js/intl-tel-input/build/css/intlTelInput.css">
</head>
<body>

	<div id="tabContainer">
		<a href="#part1" class="tab">Part 1</a>
		<a href="#part2" class="tab">Part 2</a>
		<a href="#part3" class="tab">Part 3</a>
	</div>
	<script type="text/x-handlebars-template" id="tpl_part1">
		<p>
		<label for="{{name}}">{{readable_name}}</label>
		<input type="{{type}}" name="{{name}}" id="{{name}}" />
		<span id="err{{name}}"></span>
		</p>
		<br>
	</script>

	<!-- First form -->
	<form id="frm1" enctype="multipart/form-data" action="submit1.php" method="post">
		<!-- Max size of the file? -->
		<input type="hidden" name="MAX_FILE_SIZE" value="16000" />
		<input type="submit" name="Submit1" id="Submit1" value="Submit" />
	</form>
	
	<!-- Second form -->
	<form id="frm2" action="submit2.php" method="post">
		<input type="submit" name="Submit2" id="Submit2" value="Submit" />
	</form>

	<!-- Third form -->
	<form id="frm3" action="submit3.php" method="post">
		<label for="Name">Name3</label>
		<input type="text" name="Name" id="Name" />
		<span id="errName"></span>
		<br>

		<label for="Email">Email</label>
		<input type="email" name="Email" id="Email" />
		<span id="errEmail"></span>
		<br>

		<label for="Mobile">Mobile</label>
		<input type="text" name="Mobile" id="Mobile" />
		<span id="errMobile"></span>
		<br>

		<label for="Batch">Batch</label>
		<input type="text" name="Batch" id="Batch" />
		<span id="errBatch"></span>
		<br>

		<label for="Department">Department</label>
		<input type="text" name="Department" id="Department" />
		<span id="errDepartment"></span>
		<br>

		<input type="submit" name="Submit" id="Submit" value="Submit" />
	</form>

	
	<script type="text/javascript" src="js/handlebars.js"></script>
	<script type="text/javascript" src="js/jquery-min.js"></script>
	<script type="text/javascript" src="js/route.js"></script>
	<script type="text/javascript" src="js/details.js"></script>
	<script type="text/javascript" src="js/intl-tel-input/build/js/intlTelInput.min.js"></script>
	<script type="text/javascript">
	
	var html1 = "";
	var src = $("#tpl_part1").html();
	var tpl = Handlebars.compile(src);
	for(var i in part1) {
		html1 += tpl( part1[i] );
	}

	$("#frm1").html(html1 + $("#frm1").html());

	var html2 = "";
//	var src = $("#tpl_part2").html();
//	var tpl = Handlebars.compile(src);
	for(var i in part2) {
		html2 += tpl( part2[i] );
	}

	$("#frm2").html(html2 + $("#frm2").html());

	$("#contact,#sec_contact").intlTelInput({
		defaultCountry: "in",
		utilsScript: "js/intl-tel-input/lib/libphonenumber/build/utils.js"
	});
	</script>

	<script type="text/javascript" src="js/validate.js"></script>
</body>
</html>