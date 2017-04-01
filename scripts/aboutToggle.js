(function aboutToggle() {
	var sect = document.getElementsByClassName("aboutCont");
	var next = document.getElementsByClassName("next")[0];
	var count = 0;
	next.onclick = function() {
		if (count < 2) {
			count++;
			sect[count].classList.toggle("none");
			sect[count].style.zIndex = "1";
			sect[count - 1].classList.toggle("none");
			sect[count - 1].style.zIndex = "-1"
		}
		else if (count === 2) {
			count = 0;
			sect[2].classList.toggle("none");
			sect[2].style.zIndex = "-1";
			sect[0].classList.toggle("none");
			sect[0].style.zIndex = "1";
		}
	}
}());