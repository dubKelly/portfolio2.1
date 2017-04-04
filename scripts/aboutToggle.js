(function aboutToggle() {
	var sect = document.getElementsByClassName("aboutCont");
	var head = document.getElementsByClassName("aboutHead");
	var next = document.getElementsByClassName("next")[0];
	var count = 0;
	next.onclick = function() {
		if (count < 2) {
			count++;
			sect[count].classList.toggle("none");
			head[count].classList.toggle("none");
			sect[count - 1].classList.toggle("none");
			head[count - 1].classList.toggle("none");
		}
		else if (count === 2) {
			count = 0;
			sect[2].classList.toggle("none");
			head[2].classList.toggle("none");
			sect[0].classList.toggle("none");
			head[0].classList.toggle("none");
		}
	}
}());