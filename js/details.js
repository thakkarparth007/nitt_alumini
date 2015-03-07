var part1 = [
{
	name: "name",
	readable_name: "Name",
	type: "text",
	required: true,
	rule: function(s) {
		if(s.length > 50) 				return "Name can not exceed 50 characters";
		if(!/^[a-zA-Z \.']+$/.test(s)) 	return "Enter a valid name";
		return false;
	}
},
{
	name: "email",
	readable_name: "Email",
	type: "email",
	required: true,
	rule: function(s) {
		if(!/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(s))
			return "Enter a valid email id";
		return false;
	}
},
{
	name: "contact",
	readable_name: "Contact",
	type: "tel",
	required: true,
	rule: function(s) {
		if(!/^[0\+]\d{12,13}$/.test(s))		return "Enter a valid mobile number";

		return false;
	}
},
{
	name: "sec_contact",
	readable_name: "Secondary Contact",
	type: "tel",
	required: false,
	rule: function(s) {
		if(!/^[0\+]\d{12,13}$/.test(s))		return "Enter a valid mobile number";

		return false;
	}
},
{
	name: "batch",
	readable_name: "Batch",
	type: "text",
	required: true,
	rule: function(s) {
		if(!/^[12][90]\d\d$/.test(s))	return "Enter a valid batch year (e.g. 2010)";
		var y = parseInt(s);
		var server_year = SERVER_TODAY.getFullYear();
		if(y > server_year || y < 1968)
			return "Enter a valid batch year";

		return false; 
	}
},
{
	name: "roll",
	readable_name: "Roll Number",
	type: "text",
	required: true,
	rule: function(s) {
		if(!/^\d{9}$/.test(s))			return "Enter a valid roll number";

		return false;
	}
},
{
	name: "curr_addr",
	readable_name: "Current Address",
	type: "text",
	required: true,
	rule: function(s) {
		// ??
		return false;
	}
},
{
	name: "curr_country",
	readable_name: "Current Country",
	type: "text",
	required: true,
	rule: function(s) {
		// ??
		return false;
	}
},
{
	name: "india_addr",
	readable_name: "Address in India",
	type: "text",
	required: true,
	rule: function(s) {
		// ??
		
		return false;
	}
},
{
	name: "dob",
	readable_name: "Date of birth",
	type: "date",
	required: true,
	rule: function(s) {
		var match = s.match(/^(\d\d\d\d)-\d\d-\d\d$/);
		if(!match || match.length < 2)
			return "Enter a valid date of birth";

		var yr = parseInt( match[1] );
		if(!yr) return "Enter a valid date of birth";
		if(yr < 1930)
			return "Enter a valid date of birth";
		// the person must be at least 21 years old to be an aluminus
		var server_year = SERVER_TODAY.getFullYear();
		if(yr > server_year - 21)
			return "Enter a valid date of birth";
		return false;
	}
},
{
	name: "company",
	readable_name: "Company",
	type: "text",
	required: true,
	rule: function(s) {
		// ??
		
		return false;
	}
},
{
	name: "field",
	readable_name: "Field",
	type: "text",
	required: true,
	rule: function(s) {
		// ??
		
		return false;
	}
},
{
	name: "desgn",
	readable_name: "Designation",
	type: "text",
	required: true,
	rule: function(s) {
		// ??
		
		return false;
	}
},
{
	name: "past_expr1",
	readable_name: "Past Experiences",
	type: "text",
	required: true,
	rule: function(s) {
		// ??
		
		return false;
	}
},
{
	name: "photo",
	readable_name: "Photo",
	type: "file",
	required: true,
	rule: function(s) {
		// ??
		
		return false;
	}
},
{
	name: "nationality",
	readable_name: "Nationality",
	type: "text",
	required: true,
	rule: function(s) {
		// ??
		
		return false;
	}
},
{
	name: "last_visit",
	readable_name: "Last visit to campus",
	type: "date",
	required: false,
	rule: function(s) {
		var d = new Date(s);
		if(d.getTime() > SERVER_TODAY.getTime())
			return "Enter a valid date of last visit";

		return false;
	}
},
{
	name: "entreprenuer",
	readable_name: "Entreprenuer or not",
	type: "text",
	required: true,
	rule: function(s) {
		if(s.toLowerCase() != "yes" && s.toLowerCase() != "no")
			return "Choose either 'Yes' or 'No'";

		return false;
	}
}
];


var part2 = [
{
	name: "gl",
	readable_name: "Are you interested in giving Guest Lectures or Group Interactions",
	type: "text",
	required: true,
	rule: function(s) {
		if(s.toLowerCase() != "yes" && s.toLowerCase() != "no")
			return "Choose either 'Yes' or 'No'";

		return false;
	}
},
{
	name: "faculty",
	readable_name: "Are you interested in being a Visiting or Adjunct Faculty",
	type: "text",
	required: true,
	rule: function(s) {
		if(s.toLowerCase() != "yes" && s.toLowerCase() != "no")
			return "Choose either 'Yes' or 'No'";
		
		return false;
	}
},
{
	name: "last_reunion",
	readable_name: "When was the last reunion held?",
	type: "date",
	required: true,
	rule: function(s) {
		var d = new Date(s);
		if(d.getTime() > SERVER_TODAY.getTime())
			return "Enter a valid date of last reunion";
		
		return false;
	}
},
{
	name: "next_reunion",
	readable_name: "When would you like to have the next reunion?",
	type: "date",
	required: false,
	rule: function(s) {
		var d = new Date(s);
		if(d.getTime() < SERVER_TODAY.getTime())
			return "Enter a valid date of next reunion";
		
		return false;
	}
},
{
	name: "DAA",
	readable_name: "Are you a DAA recepient?",
	type: "text",
	required: true,
	rule: function(s) {
		if(s.toLowerCase() != "yes" && s.toLowerCase() != "no")
			return "Choose either 'Yes' or 'No'";

		return false; 
	}
}
];

var part3 = [
{
	name: "DAA1",
	readable_name: "Are you a DAA recepient?",
	type: "text",
	required: true,
	rule: function(s) {
		if(s.toLowerCase() != "yes" && s.toLowerCase() != "no")
			return "Choose either 'Yes' or 'No'";
 
		return false; 
	}
}
];

