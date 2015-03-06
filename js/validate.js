var form1 = $("#frm1");
form1.on("submit", validateData);

function validateData() {
	var error = false;
	var data = {};

	for(var i in part1) {
		var o = part1[i];
		var name = o.name;
		var r_name = o.readable_name;

		var $field = $( "#" + name );

		data[name] = (/contact/.test(name) ? $field.intlTelInput("getNumber")
										  : $field.val());

		if(/contact/.test(name))
			alert($field.intlTelInput("getNumber"));


		if(o.required && !data[name]) {
			$("#err" + name)
				.html(r_name + " is required")
				.removeClass("success")
				.addClass("error");

			error = true;
		}
		else if(o.rule(data[name])) {
			$("#err" + name)
				.html(o.rule(data[name]))
				.removeClass("success")
				.addClass("error");

			error = true;
		}
		else {
			$("#err" + name)
				.html("")
				.removeClass("error")
				.addClass("success");
		}
	}

	$.ajax({
		type: "POST",
		url: "submit1.php",
		timeout: 3000,
		data: data,
		success: function(data) {
			alert(data);
		},
		error: function() {
			alert("HPVP. Error");
		}
	});

//	return false;
}