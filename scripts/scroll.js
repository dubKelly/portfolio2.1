(function scroll() {
	/*** DOM ***/
	var scroll = document.getElementsByClassName("scroll");
	var fade = document.getElementsByClassName("fade");
	var rock = document.getElementsByClassName("rock");
	var mainNav = document.getElementsByClassName("mainNav");
	var sect = document.getElementsByTagName("section");
	var windowHeight;
	var pageTop = [];
	var latestScroll = 0;
	var ticking = false;
	// var lax = document.getElementsByClassName("lax");
	function xY() {
		$(".aboutScroll").each(function scrollP() {
			var offset = $(this).offset();
			var height = $(this).outerHeight();
			var sP = ((offset.top + height) / $(window).innerHeight()) - 1;
			$(this).attr("data-scrollPoint", sP);
		})
		windowHeight = window.innerHeight;
		sect[2].style.height = (window.innerWidth * 1.2) + "px";
		pageTop = [
			0,
			sect[0].clientHeight,
			(sect[1].clientHeight + sect[0].clientHeight),
			(sect[2].clientHeight + sect[1].clientHeight + sect[0].clientHeight),
			(sect[3].clientHeight + sect[2].clientHeight + sect[1].clientHeight + sect[0].clientHeight)
		];
	}
	xY();
	window.onresize = xY;
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
		for (var i = fade.length - 1; i >= 0; i--) {
			if ((currentScroll / (windowHeight / 2)) <= 1.5) {
				fade[i].style.opacity = 1 - (currentScroll / (windowHeight / 2));
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
		for (var i = rock.length - 1; i >= 0; i--) {
			if (currentScroll >= pageTop[3]) {
				rock[i].classList.add("bottom");
			}
			else {
				rock[i].classList.remove("bottom");
			}
		}
		// /*** parallaxBackground ***/
		// if (currentScroll <= windowHeight) {
		// 	lax[0].style.backgroundPosition = "0% " + (((currentScroll / windowHeight) * 50) + 50) + "%";
		// }
	}
}());