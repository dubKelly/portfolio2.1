(function scroll() {
	var scroll = document.getElementsByClassName("scroll");
	var fade = document.getElementsByClassName("fade");
	var lax = document.getElementsByClassName("lax");
	window.onscroll = function() {
		if (window.pageYOffset > 0) {
			for (var i = scroll.length - 1; i >= 0; i--) {
				scroll[i].classList.add("scrolled");
			}
		}
		else {
			for (var i = scroll.length - 1; i >= 0; i--) {
				scroll[i].classList.remove("scrolled");
			}
		}
		// .5 cushion for missed scroll events
		if ((window.pageYOffset / (window.innerHeight / 3)) <= 1.5) {
			fade[0].style.opacity = 1 - (window.pageYOffset / (window.innerHeight / 3));
		}
		if (window.pageYOffset <= window.innerHeight) {
			lax[0].style.backgroundPosition = "0% " + (((window.pageYOffset / window.innerHeight) * 50) + 50) + "%";
		}
	}
}());