(function scroll() {
	var scroll = document.getElementsByClassName("scroll");
	var fade = document.getElementsByClassName("fade");
	// var lax = document.getElementsByClassName("lax");
	var latestScroll = 0;
	var ticking = false;
	window.onscroll = function() {
		latestScroll = window.pageYOffset;
		requestTick();
	}
	function requestTick() {
		if (!ticking) {
			requestAnimationFrame(paint);
		}
		ticking = true;
	}
	function paint() {
		ticking = false;
		var currentScroll = latestScroll;
		/*** addScrolled ***/
		for (var i = scroll.length - 1; i >= 0; i--) {
			var y = scroll[i].getAttribute("data-scrollPoint");
			if (currentScroll > (window.innerHeight * y)) {
				scroll[i].classList.add("scrolled");
			}
			else {
				scroll[i].classList.remove("scrolled");
			}
		}
		/*** addFade ***/
		// .5 cushion for missed scroll events
		if ((currentScroll / (window.innerHeight / 3)) <= 1.5) {
			fade[0].style.opacity = 1 - (currentScroll / (window.innerHeight / 3));
		}
		/*** pagination ***/
		var mainNav = document.getElementsByClassName("mainNav");
		var pageTop = [0, 1, 2, 3];
		for (var i = mainNav.length - 1; i >= 0; i--) {
			if (currentScroll >= (window.innerHeight * pageTop[i]) && currentScroll < (window.innerHeight * pageTop[i + 1])) {
				mainNav[i].classList.add("page");
			}
			else {
				mainNav[i].classList.remove("page");
			}
		}
		/*** cvScroll ***/
		var skills = document.getElementsByClassName("skills");
		if (currentScroll === window.innerHeight) {
			skills[0].style.display = "block";
		}
		else {
			skills[0].style.display = "none";
		}
		// /*** parallaxBackground ***/
		// if (currentScroll <= window.innerHeight) {
		// 	lax[0].style.backgroundPosition = "0% " + (((currentScroll / window.innerHeight) * 50) + 50) + "%";
		// }
	}
}());