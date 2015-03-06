/* routing between the form parts */

function route() {
	var hash = window.location.hash || "";

	if(hash == "#part3")
		$("form").hide().filter("#frm3").show();
	else if(hash == "#part2")
		$("form").hide().filter("#frm2").show();
	else
		$("form").hide().filter("#frm1").show();
}

$(window).on("hashchange", route);

route();