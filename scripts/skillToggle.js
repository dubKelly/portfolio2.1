(function skillToggle() {
	var toggle = document.getElementsByClassName("sToggle");
	for (var i = toggle.length - 1; i >= 0; i--) {
		toggle[i].onclick = function() {
			var li = document.getElementsByTagName("li");
			for (var i = li.length - 1; i >= 0; i--) {
			li[i].classList.toggle("focus");
			}
		}
	}
}());