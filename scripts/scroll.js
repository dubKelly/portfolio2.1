(function scroll() {
	/*** DOM ***/
	var scroll = document.getElementsByClassName("scroll");
	var fade = document.getElementsByClassName("fade");
	var mainNav = document.getElementsByClassName("mainNav");
	var sect = document.getElementsByTagName("section");
	var windowHeight = window.innerHeight;
	var pageTop = [0, sect[0].clientHeight, (sect[1].clientHeight + sect[0].clientHeight), (sect[2].clientHeight + sect[1].clientHeight + sect[0].clientHeight)];
	var latestScroll = 0;
	var ticking = false;
	// var lax = document.getElementsByClassName("lax");
	window.onresize = function xY() {
		windowHeight = window.innerHeight;
		pageTop = [0, sect[0].clientHeight, (sect[1].clientHeight + sect[0].clientHeight), (sect[2].clientHeight + sect[1].clientHeight + sect[0].clientHeight)];
	}
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
			var scrollPoint = scroll[i].getAttribute("data-scrollPoint");
			if (currentScroll > (windowHeight * scrollPoint)) {
				scroll[i].classList.add("scrolled");
			}
			else {
				scroll[i].classList.remove("scrolled");
			}
		}
		/*** addFade ***/
		// .5 cushion for missed scroll events
		if ((currentScroll / (windowHeight / 3)) <= 1.5) {
			for (var i = fade.length - 1; i >= 0; i--) {
				fade[i].style.opacity = 1 - (currentScroll / (windowHeight / 3));
			}
		}
		/*** pagination ***/
		for (var i = mainNav.length - 1; i >= 0; i--) {
			if (currentScroll >= pageTop[i] && currentScroll < pageTop[i + 1]) {
				mainNav[i].classList.add("page");
			}
			else {
				mainNav[i].classList.remove("page");
			}
		}
		// /*** parallaxBackground ***/
		// if (currentScroll <= windowHeight) {
		// 	lax[0].style.backgroundPosition = "0% " + (((currentScroll / windowHeight) * 50) + 50) + "%";
		// }
	}
}());