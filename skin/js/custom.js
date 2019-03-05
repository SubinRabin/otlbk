function add_review() {
	$("#myTab li").removeClass("active");
	$("#myTab .reviews_li").addClass("active");
	$("#review_uname").focus();
	window.scrollTo(0, document.body.scrollHeight);
}

