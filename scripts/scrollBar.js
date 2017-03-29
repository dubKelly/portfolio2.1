(function() {
	function scrollBar() {
		var cont = document.getElementsByClassName("blurbCont")[0];
		var x = (cont.offsetWidth - cont.clientWidth) + window.innerWidth;
		cont.style.width = x + "px";
	}
	window.onload = scrollBar;
	window.onresize = scrollBar;
}());