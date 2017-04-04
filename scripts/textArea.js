(function formVerify() {
	var input = document.getElementsByClassName("input");
	var submit = document.getElementsByClassName("submit")[0];
	for (var i = input.length - 1; i >= 0; i--) {
		if (input[i].value === "") {
			submit.setAttribute("disabled", true);
		}
		else {
			submit.setAttribute("disabled", false);
		}
	}
}());