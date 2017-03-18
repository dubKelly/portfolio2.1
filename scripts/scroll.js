(function scroll() {
	var header = document.getElementsByClassName("header");
	var cont = document.getElementsByClassName("container");
	window.onscroll = function() {
		if (window.pageYOffset > 0) {
			header[0].classList.add("scrolled");
			for (var i = cont.length - 1; i >= 0; i--) {
				cont[i].classList.add("scrolled");
			}
		}
		else {
			header[0].classList.remove("scrolled");
			for (var i = cont.length - 1; i >= 0; i--) {
				cont[i].classList.remove("scrolled");
			}
		}
	}
}());