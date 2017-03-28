(function cvHide() {
	var next = document.getElementsByClassName("next");
	var prev = document.getElementsByClassName("prev");
	var blurb = document.getElementsByClassName("blurb");
	var cv = document.getElementsByClassName("cv");
	var counter = 0;
	next[0].onclick = function() {
		counter++;
		cv[counter - 1].classList.add("hide");
		setTimeout(function() {
			cv[counter - 1].style.visibility = "hidden";
			cv[counter].style.visibility = "visible";
			cv[counter].classList.remove("hide");
			prev[0].classList.remove("hide");
		}, 2000);
		if (counter >= 1) {
			blurb[0].style.top = "calc(50% + 29px)";
		}
	}
	prev[0].onclick = function() {
		counter--;
		cv[counter + 1].classList.add("hide");
		setTimeout(function() {
			cv[counter + 1].style.visibility = "hidden";
			cv[counter].style.visibility = "visible";
			cv[counter].classList.remove("hide");
		}, 2000);
		if (counter === 0) {
			blurb[0].style.top = "calc(45% + 29px)"
			prev[0].classList.add("hide");
		}
	}
}());