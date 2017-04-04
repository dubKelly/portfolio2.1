(function formVerify() {
	var input = document.getElementsByClassName("input");
	var submit = document.getElementsByClassName("submit")[0];
	for (var i = 0; i < input.length; i++) {
		input[i].onkeypress = function() {
			if (input[0].value.length !== 0 && input[1].value.length !== 0 && input[2].value.length !== 0) {
				submit.disabled = false;
				submit.style.color = "#a9a9a9"
			}
			else {
				submit.disabled = true;
			}
		}
	}
}());