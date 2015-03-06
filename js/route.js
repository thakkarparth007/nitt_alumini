/* routing between the form parts */

var _part2 = false,
	_part3 = false;

function route() {
	var hash = window.location.hash || "";

	if(hash == "#part3")
		if(_part3)
			$(".page").hide().filter("#page3").show();
		else
			window.location.hash = "#part2";
	else if(hash == "#part2")
		if(_part2)
			$(".page").hide().filter("#page2").show();
		else
			window.location.hash = "#part1";
	else if(hash == "#part1" || hash == "")
		$(".page").hide().filter("#page1").show();
	else
		window.location.hash = "#part1";
}

function activatePart(x) {
	if(x == 2)
		_part2 = true;
	if(x == 3)
		_part3 = true;
	if(x == 4)
		activateSubmit();
}

function activateSubmit() {
	$("#Submit").removeAttr("disabled");
}

$(window).on("hashchange", route);

route();