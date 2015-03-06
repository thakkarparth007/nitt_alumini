/*
var form1 = $("#frm1");
form1.on("submit", validateData);
*/

var part1_valid = {},
	part2_valid = {},
	part3_valid = {};

function get_part_valid_object(part) {
	return part == 1 ? part1_valid 
					 : part == 2 ? part2_valid
					 			 : part3_valid;
}

function get_part_obj(part) {
	return part == 1 ? part1 
					 : part == 2 ? part2
					 			 : part3;	
}
function validateData(part) {
	var error = false;
	var part_obj = get_part_obj(part);
	var part_valid = get_part_valid_object(part);

	for(var i in part_obj) {
		validate(part, part_obj[i], true);
		if(!part_valid[ part_obj[i].name ])
			error = true;
	}

	return !error;
}

function validate(part, field, silent) {
	var name = field.name,
		r_name = field.readable_name,
		$field = $("#" + name);
	
	var part_obj = get_part_obj(part);
	var part_valid = get_part_valid_object(part);
	
	tmp = (/contact/.test(name) ? $field.intlTelInput("getNumber")
								: $field.val());

	if(name == 'contact')
		$("#contact1").val( $field.intlTelInput("getNumber") );
	if(name == 'sec_contact')
		$("#sec_contact1").val( $field.intlTelInput("getNumber") );


	if(field.required && !tmp) {
		if(!silent) {
			$("#succ" + name).hide();
			
			$("#err" + name)
				.show()
				.html(r_name + " is required");
		}
		part_valid[name] = 0;
	}
	else if(field.rule(tmp)) {
		if(!silent) {
			$("#succ" + name).hide();

			$("#err" + name)
				.show()
				.html(field.rule(tmp));
		}

		part_valid[name] = 0;
	}
	else {
		if(!silent) {
			$("#err" + name).hide();
			$("#succ" + name).show();
		}

		part_valid[name] = 1;
	}

	if(!silent && part_valid[name] && validateData(part))
		activatePart(part + 1);
}

$("#curr_country").blur(function() {
	if(this.value.toLowerCase() == "india")
	{
		$("#p_india_addr").hide();
		$("#india_addr").val( $("#curr_addr").val() );
	}
	else {
		$("#p_india_addr").show();
		$("#india_addr").val( ' ' );
	}
});

for(var k = 1; k < 4; k++) {
	var part_obj = get_part_obj(k);

	for(var i in part_obj) {
		( function(k, i) { 
			var o = part_obj[i],
				name = o.name,
				r_name = o.readable_name,
				$field = $("#" + name);

			$field.on("blur", function(e) {
				validate(k, o);
			});

		})(k, i);
	}
}