(function burger() {
	var gBurg = document.getElementsByClassName("goodBurger");
	var nav = document.getElementsByClassName("mobileNav");
	var blur = document.getElementsByClassName("blur");
	var toggle = 0;
	gBurg[0].onclick = function() {
			this.classList.toggle("open");
			nav[0].classList.toggle("open");
			for (var i = blur.length - 1; i >= 0; i--) {
				blur[i].classList.toggle("open");
			}
		if (toggle === 0) {
			toggle++;
			nav[0].style.zIndex = "2";
		}
		else {
			toggle--;
			setTimeout(function() {
				nav[0].style.zIndex = "-1";
			}, 200);
		}
	}
}());