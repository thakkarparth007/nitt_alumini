var form1 = $("#frm1");
form1.on("submit", validateData);

function validateData() {
	var error = false;
	var tmp;
	var con = '', sec_con = '';

	for(var i in part1) {
		var o = part1[i];
		var name = o.name;
		var r_name = o.readable_name;

		var $field = $( "#" + name );

		tmp = (/contact/.test(name) ? $field.intlTelInput("getNumber")
										  : $field.val());

		if(name == 'contact')
			con = $field.intlTelInput("getNumber");
		if(name == 'sec_contact')
			sec_con = $field.intlTelInput("getNumber");

		if(o.required && !tmp) {
			$("#err" + name)
				.html(r_name + " is required")
				.removeClass("success")
				.addClass("error");

			error = true;
		}
		else if(o.rule(tmp)) {
			$("#err" + name)
				.html(o.rule(tmp))
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

	alert("yo");
	//if(!error) {
		$("#contact1").val(con);
		$("#sec_contact1").val(sec_con);
	//}
	alert("yoyo");
	return false;
}