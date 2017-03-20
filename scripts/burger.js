(function burger() {
	var gBurg = document.getElementsByClassName("goodBurger");
	gBurg[0].onclick = function() {
		this.classList.toggle("open");
	}
}());