(function iframeLoad() {
	var iframeCont = document.getElementsByClassName("iframeCont");
	var iframes = [];
	setTimeout(function() {
		for (var i = iframeCont.length - 1; i >= 0; i--) {
			var src = iframeCont[i].getAttribute("data-src");
			var iframe = document.createElement("iframe");
			iframe.src = src;
			iframe.scrolling = "yes";
			iframes.push(iframe);
			iframeCont[i].appendChild(iframe);
		}
	}, 4000);
})();

(function toggleIframe() {

	var view = document.getElementsByClassName("view");
	var viewHide = document.getElementsByClassName("viewHide");
	var index;

	for (var i = view.length - 1; i>= 0; i--) {
		view[i].onclick = function() {
			index = this.getAttribute("data-index");
			if (window.innerWidth >= 640) {
				this.parentNode.style.display = "none";
				viewHide[index].style.display = "inline-block";
			}
			else {
				var iframeCont = document.getElementsByClassName("iframeCont");
				window.location.href = iframeCont[index].getAttribute("data-src");
			}
		}
	}
	for (var i = viewHide.length - 1; i >= 0; i--) {
		viewHide[i].onclick = function() {
			index = this.getAttribute("data-index");
			this.style.display = "none";
			view[index].parentNode.style.display = "inline-block";
		}
	}
})();

(function aboutToggle() {
	var sect = document.getElementsByClassName("aboutCont");
	var head = document.getElementsByClassName("aboutHead");
	var next = document.getElementsByClassName("next")[0];
	var count = 0;
	next.onclick = function() {
		if (count < 2) {
			count++;
			sect[count].classList.toggle("none");
			head[count].classList.toggle("none");
			sect[count - 1].classList.toggle("none");
			head[count - 1].classList.toggle("none");
		}
		else if (count === 2) {
			count = 0;
			sect[2].classList.toggle("none");
			head[2].classList.toggle("none");
			sect[0].classList.toggle("none");
			head[0].classList.toggle("none");
		}
	}
}());

(function burger() {
	var gBurg = document.getElementsByClassName("goodBurger");
	var nav = document.getElementsByClassName("mobileNav");
	var icons = document.getElementsByClassName("mainIcons");
	var blur = document.getElementsByClassName("blur");
	var toggle = 0;
	var navOpen = function() {
			gBurg[0].classList.toggle("open");
			nav[0].classList.toggle("open");
			for (var i = blur.length - 1; i >= 0; i--) {
				blur[i].classList.toggle("open");
			}
		if (toggle === 0) {
			toggle++;
			nav[0].style.zIndex = "3";
		}
		else {
			toggle--;
			setTimeout(function() {
				nav[0].style.zIndex = "-1";
			}, 200);
		}
	}
	gBurg[0].addEventListener("click", navOpen, false);
	var mNav = document.getElementsByClassName("mNavList");
	for (var i = mNav.length - 1; i >= 0; i--) {
		mNav[i].addEventListener("click", navOpen, false);
	}
}());

(function formVerify() {
	var input = document.getElementsByClassName("input");
	var submit = document.getElementsByClassName("submit")[0];
	for (var i = 0; i < input.length; i++) {
		input[i].onkeypress = function() {
			if (input[0].value.length !== 0 && input[1].value.length !== 0 && input[2].value.length !== 0) {
				submit.disabled = false;
				submit.style.color = "#a9a9a9"
			}
			else {
				submit.disabled = true;
			}
		}
	}
}());

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

	/* Assign a fade-in point */
	function xY() {
		$(".aboutScroll").each(function scrollP() {
			var offset = $(this).offset();
			var height = $(this).outerHeight();
			var sP = ((offset.top + height) / $(window).innerHeight()) - 1;
			$(this).attr("data-scrollPoint", sP);
		})
		windowHeight = window.innerHeight;
		// sect[2].style.height = (window.innerWidth * 1.2) + "px";
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
		/*** rockBottom ***/
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

/* Highlight selected skill section */
(function skillToggle() {
	var toggle = document.getElementsByClassName("sToggle");
	for (var i = toggle.length - 1; i >= 0; i--) {
		toggle[i].onclick = function() {
			var li = this.parentNode.parentNode.parentNode.getElementsByTagName("li");
			for (var i = li.length - 1; i >= 0; i--) {
				li[i].classList.toggle("focus");
			}
		}
	}
}());

/* Unstick hover state on iOS */
(function sticky() {
	var link = document.getElementsByTagName("a");
	for (var i = 0; i < link.length; i++) {
		link[i].ontouchend = function() {
			var a = this;
			setTimeout(function() {
				a.classList.add("clicked");
			}, 300);
		}
		link[i].ontouchstart = function() {
			this.classList.remove("clicked");
		}
	}
}());

(function featureToggle() {

	var forGeeks = document.getElementsByClassName("forGeeks");

	for (var i = forGeeks.length - 1; i >= 0; i--) {
		forGeeks[i].onclick = function() {
			var ul = this.parentNode.getElementsByClassName("featureList");
			for (var i = ul.length - 1; i >= 0; i--) {
				ul[i].classList.toggle("hide");
			}
		}
	}
})();

(function sourceCode() {

	var srcCode = document.getElementsByClassName("viewSource");

	for (var i = srcCode.length - 1; i >= 0; i--) {
		srcCode[i].onclick = function() {
			window.open("view-source:" + this.getAttribute("data-srcCode"), "_blank");
		}
	}
})