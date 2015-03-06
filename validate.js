/*
var o = {
	Name: {
		type: "text",
		required: true,
		rule: function(s) {
			if(s.length > 50) 				return "Name can not exceed 50 characters";
			if(!/^[a-zA-Z \.']+$/.test(s)) 	return "Enter a valid name";
			return true;
		}
	},
	Email: {
		type: "email",
		required: true,
		rule: function(s) {
			if(!/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(s))
				return "Enter a valid email id";
			return true;
		}
	},
	Mobile: {
		type: "email",
		required: true,
		rule: function(s) {
			if(!/^\d{10,11}$/.test(s))		return "Enter a valid 10 or 11 digit mobile number";

			return true;
		}
	},
	Batch: {
		type: "text",
		required: true,
		rule: function(s) {
			if(!/^[12][90]\d\d$/.test(s))	return "Enter a valid batch year (e.g. 2010)";
			var y = parseInt(s);
			if(y > SERVER_CURRENT_YEAR || y < 1968)
				return "Enter a valid batch year";

			return true; 
		}
	},
	Department: {
		type: "select",
		options: ["Architecture", "Chemical", "Civil", "CSE", "ECE", "EEE", "ICE", "Mechanical", "MME", "Production"],
		required: true,
		rule: function(s) {
			for(var i in this.options) {
				if(this.options[i] == s) return true;
			}
			return "Enter a valid Department name";
		}
	}
}
*/
var form1 = $("#frm1");
alert(form1);
form1.on("submit", validateData);

function validateData() {
	var error = false;
	var data = {};

	for(var i in part1) {
		var o = part1[i];
		var name = o.name;

		var $field = $( "#" + name );

		data[name] = /contact/.test(name) ? $field.intlTelInput("getNumber")
										  : $field.val();

		alert("ho");
		if(/contact/.test(name))
			alert($field.intlTelInput("getNumber"));


		if(obj.required && !data[name]) {
			$("#err" + name)
				.html(name + " is required")
				.removeClass("success")
				.addClass("error");

			error = true;
		}
		else if(obj.rule(data[name])) {
			$("#err" + name)
				.html(obj.rule(data[name]))
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

	return false;
}