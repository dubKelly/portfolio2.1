(function scroll() {
	var scroll = document.getElementsByClassName("scroll");
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
	}
}());