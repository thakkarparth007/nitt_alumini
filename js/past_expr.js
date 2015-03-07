var past_expr_count = 1;
var src = $("#past_expr_widget_tpl").html();
var tpl = Handlebars.compile(src);

function AddExpr() {
	var c = ++past_expr_count;
	$("#expr_container").append(tpl({ EXPR_COUNT: c }));

	$("#past_expr" + c).focus();
	
	$("#past_expr" + (c) + "_rem").click(function() {
		RemExpr(c);
		return false;
	});
	return false;
}

function RemExpr(c) {
	if(past_expr_count == 1) return;
	$("#past_expr" + c + "_span" ).remove();
	for(var i = c+1; i <= past_expr_count; i++) {
		$("#past_expr" + i).attr("id", "past_expr" + (i-1))
						   .attr("name", "past_expr" + (i-1));

		$("#past_expr" + i + "_span").attr("id", "past_expr" + (i-1) + "_span")
									.attr("name", "past_expr" + (i-1) + "_span");
		$("#past_expr" + i + "_rem").attr("id", "past_expr" + (i-1) + "_rem")
									.attr("name", "past_expr" + (i-1) + "_rem");

	}
	past_expr_count--;
	$("#past_expr" + past_expr_count).focus();
	return false;
}

$("#past_expr_add").click(AddExpr);
$("#past_expr1_rem").click(function() {
	RemExpr(1);
	return false;
})