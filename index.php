<?php
session_start();
function generateFormToken($form) {
	$token = md5(uniqid(microtime(), true));
	$_SESSION[$form.'_token'] = $token;
	return $token;
}
function verifyFormToken($form) {
	if (!isset($_SESSION[$form.'_token'])) {
		return false;
	}
	if (!isset($_POST['token'])) {
		return false;
	}
	if ($_SESSION[$form.'_token'] !== $_POST['token']) {
		return false;
	}
	return true;
}
function check_input($data, $problem='')
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	if ($problem && strlen($data) == 0)
	{
		show_error($problem);
	}
	return $data;
}
function show_error($myError)
{
?>
	<html>
	<body>
	<b>Please correct the following test error:</b><br />
	<?php echo $myError; ?>
	</body>
	</html>
<?php
exit();
}
if (verifyFormToken('form1')) {
	$myemail = 'holla@jordanneeb.com';
	$name = check_input($_POST['name'], "Enter your name.");
	$email = check_input($_POST['email']);
	$comments = check_input($_POST['message'], "Please include a message.");
	$subject = "Site Contact";
	if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
	{
	    show_error("E-mail address not valid");
	}
	$message = "Name: $name
	Email: $email
	Message: $comments";
	mail($myemail, $subject, $message);
	header('Location: index.php');
	exit();
} else {
}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Jordan Neeb | Toronto Freelance Web Developer</title>
	<meta name="description" content="Toronto freelance front-end web developer portfolio">
	<link rel="canonical" href="http://jordanneeb.com/">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,800|Poiret+One|Roboto:500" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
	<link rel="stylesheet" type="text/css" href="styleSheets/indexStyles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-96845073-1', 'auto');
  ga('send', 'pageview');

	</script>
<!--
_____________________________________________________________________
_____________________________________________________________________
_____________________________________________________________________
_____________________________________________________________________
_____________________________________________________________________
_____________________________________________________________________
_____________________________________________________________________
_____________________________________________________________________
_____________________________________________/////\__________________
____________________________________________/////\/\_________________
___________________________________________/////\/\/\________________
__________________________________________/////\/\/\/\_______________
_________________________________________/////\/\/\/\/\______________
________________________________________/////\/\/\\\/\/\_____________
_______________________________________/////\/\/\\\\\/\/\____________
______________________________________/////\/\/__\\\\\/\/\___________
_____________________________________/////\/\/____\\\\\/\/\__________
____________________________________///////////////\\\\\/\/\_________
___________________________________/////////////////\\\\\/\/\________
___________________________________\\\\\\\\\\\\\\\\\\\\\\\/\/________
____________________________________\\\\\\\\\\\\\\\\\\\\\\\/_________
_____________________________________________________________________
_____________________________________________________________________
_____________________________________________________________________

-->
</head>
<?php
$newToken = generateFormToken('form1');
?>
<body>
	<div class="goodBurger scroll rock" data-scrollPoint="0">
		<span></span>
		<span></span>
		<span></span>
		<span></span>
	</div>
	<div class="mobileNav">
		<div class="mWrap">
			<div class="container scrolled">
				<a class="mNavList" href="#landing">Home</a>
			</div><br>
			<div class="container scrolled">
				<a class="mNavList" href="#about">About</a>
			</div><br>
			<div class="container scrolled">
				<a class="mNavList" href="#work">Work</a>
			</div><br>
			<div class="container scrolled">
				<a class="mNavList" href="#contact">Contact</a>
			</div>
		</div>
		<div class="mobileIcons">
			<a class="icon noLine" href="https://github.com/dubKelly">
				<svg enable-background="new 0 0 32 32" height="25px" class="gH" version="1.0" viewBox="0 0 32 32" width="25px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path class="gitHub" clip-rule="evenodd" d="M16.003,0C7.17,0,0.008,7.162,0.008,15.997  c0,7.067,4.582,13.063,10.94,15.179c0.8,0.146,1.052-0.328,1.052-0.752c0-0.38,0.008-1.442,0-2.777  c-4.449,0.967-5.371-2.107-5.371-2.107c-0.727-1.848-1.775-2.34-1.775-2.34c-1.452-0.992,0.109-0.973,0.109-0.973  c1.605,0.113,2.451,1.649,2.451,1.649c1.427,2.443,3.743,1.737,4.654,1.329c0.146-1.034,0.56-1.739,1.017-2.139  c-3.552-0.404-7.286-1.776-7.286-7.906c0-1.747,0.623-3.174,1.646-4.292C7.28,10.464,6.73,8.837,7.602,6.634  c0,0,1.343-0.43,4.398,1.641c1.276-0.355,2.645-0.532,4.005-0.538c1.359,0.006,2.727,0.183,4.005,0.538  c3.055-2.07,4.396-1.641,4.396-1.641c0.872,2.203,0.323,3.83,0.159,4.234c1.023,1.118,1.644,2.545,1.644,4.292  c0,6.146-3.74,7.498-7.304,7.893C19.479,23.548,20,24.508,20,26c0,2,0,3.902,0,4.428c0,0.428,0.258,0.901,1.07,0.746  C27.422,29.055,32,23.062,32,15.997C32,7.162,24.838,0,16.003,0z" fill="#424242" fill-rule="evenodd"/><g/><g/><g/><g/><g/><g/></svg>
			</a>
			<a class="icon noLine" href="http://codepen.io/dubKelly/">
				<svg enable-background="new 0 0 128 128" class="cP" version="1.1" viewBox="0 0 128 128" width="25px" height="25px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="_x36__stroke"><g class="Codepen"><rect clip-rule="evenodd" fill="none" fill-rule="evenodd" height="50px" width="50px"/><path clip-rule="evenodd" d="M117,73.204L103.24,64L117,54.796V73.204z     M69.5,112.22V86.568L93.348,70.62l19.248,12.872L69.5,112.22z M64,77.012L44.548,64L64,50.988L83.456,64L64,77.012z M58.5,112.22    L15.404,83.492L34.656,70.62L58.5,86.568V112.22z M11,54.796L24.764,64L11,73.204V54.796z M58.5,15.78v25.652L34.656,57.384    L15.404,44.508L58.5,15.78z M69.5,15.78l43.096,28.728L93.348,57.384L69.5,41.432V15.78z M127.952,43.784    c-0.012-0.084-0.032-0.16-0.044-0.24c-0.028-0.156-0.056-0.312-0.096-0.46c-0.024-0.092-0.06-0.18-0.088-0.268    c-0.044-0.136-0.088-0.268-0.14-0.4c-0.036-0.092-0.08-0.184-0.124-0.268c-0.056-0.128-0.116-0.248-0.188-0.364    c-0.048-0.088-0.104-0.172-0.156-0.256c-0.072-0.116-0.148-0.228-0.232-0.336c-0.06-0.08-0.124-0.16-0.188-0.236    c-0.088-0.104-0.18-0.204-0.276-0.3c-0.072-0.072-0.14-0.148-0.216-0.212c-0.104-0.092-0.208-0.18-0.312-0.264    c-0.084-0.064-0.164-0.128-0.248-0.188c-0.032-0.02-0.06-0.048-0.092-0.068l-58.5-39c-1.848-1.232-4.252-1.232-6.104,0l-58.496,39    c-0.032,0.02-0.06,0.048-0.092,0.068c-0.088,0.06-0.168,0.124-0.248,0.188C2.004,40.264,1.9,40.352,1.8,40.444    c-0.076,0.064-0.148,0.14-0.22,0.212c-0.096,0.096-0.188,0.196-0.272,0.3c-0.068,0.076-0.132,0.156-0.192,0.236    c-0.08,0.108-0.156,0.22-0.228,0.336c-0.056,0.084-0.108,0.168-0.16,0.256C0.66,41.9,0.6,42.02,0.54,42.148    c-0.04,0.084-0.084,0.176-0.12,0.268c-0.056,0.132-0.1,0.264-0.144,0.4c-0.028,0.088-0.06,0.176-0.084,0.268    c-0.04,0.148-0.068,0.304-0.096,0.46c-0.016,0.08-0.036,0.156-0.044,0.24C0.02,44.016,0,44.256,0,44.5v39    c0,0.24,0.02,0.48,0.052,0.72c0.008,0.076,0.028,0.156,0.044,0.236c0.028,0.156,0.056,0.308,0.096,0.46    c0.024,0.092,0.056,0.18,0.084,0.268c0.044,0.132,0.088,0.268,0.144,0.404c0.036,0.088,0.08,0.176,0.12,0.264    c0.06,0.124,0.12,0.244,0.188,0.368c0.052,0.084,0.104,0.168,0.16,0.252c0.072,0.116,0.148,0.224,0.228,0.332    c0.06,0.084,0.124,0.164,0.192,0.24c0.084,0.1,0.176,0.204,0.272,0.296c0.072,0.076,0.144,0.148,0.22,0.216    c0.1,0.092,0.204,0.18,0.312,0.264c0.08,0.064,0.16,0.128,0.248,0.188c0.032,0.02,0.06,0.048,0.092,0.068l58.496,39    C61.872,127.692,62.936,128,64,128s2.128-0.308,3.052-0.924l58.5-39c0.032-0.02,0.06-0.048,0.092-0.068    c0.084-0.06,0.164-0.124,0.248-0.188c0.104-0.084,0.208-0.172,0.312-0.264c0.076-0.068,0.144-0.14,0.216-0.216    c0.096-0.092,0.188-0.196,0.276-0.296c0.064-0.076,0.128-0.156,0.188-0.24c0.084-0.108,0.16-0.216,0.232-0.332    c0.052-0.084,0.108-0.168,0.156-0.252c0.072-0.124,0.132-0.244,0.188-0.368c0.044-0.088,0.088-0.176,0.124-0.264    c0.052-0.136,0.096-0.272,0.14-0.404c0.028-0.088,0.064-0.176,0.088-0.268c0.04-0.152,0.068-0.304,0.096-0.46    c0.012-0.08,0.032-0.16,0.044-0.236c0.032-0.24,0.048-0.48,0.048-0.72v-39C128,44.256,127.984,44.016,127.952,43.784z" fill="#424242" fill-rule="evenodd" class="codePen"/></g></g></svg>
			</a>
			<a class="icon noLine" href="https://www.linkedin.com/in/jordan-neeb-00407413b/">
				<svg enable-background="new 0 0 32 32" height="20px" class="lI" version="1.0" viewBox="0 0 32 32" width="20px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><rect class="linkedIn" fill="#424242" height="23" width="7" y="9"/><path class="linkedIn" d="M24.003,9C20,9,18.89,10.312,18,12V9h-7v23h7V19c0-2,0-4,3.5-4s3.5,2,3.5,4v13h7V19C32,13,31,9,24.003,9z" fill="#424242"/><circle class="linkedIn" cx="3.5" cy="3.5" fill="#424242" r="3.5"/></g><g/><g/><g/><g/><g/><g/></svg>
			</a>
		</div>
	</div>
<section id="landing" class="landing lax blur">
	<div class="lWrap">
		<div class="home scroll" data-scrollPoint="0">
			<a class="noLine rock" href="#landing"><h1>
				<span class="fName scroll" data-scrollPoint="0"><span class="fOut scroll" data-scrollPoint="0">J</span><span class="fMid scroll" data-scrollPoint="0">ord<span class="deltaXi">&#x0394;</span></span><span class="fOut scroll" data-scrollPoint="0">n</span></span>
				<span class="line scroll rock" data-scrollPoint="0"></span>
				<span class="jTitle scroll" data-scrollPoint="0">Front-End Developer</span>
				<span class="lName scroll" data-scrollPoint="0"><span class="lOut scroll" data-scrollPoint="0">N</span><span class="lMid scroll" data-scrollPoint="0"><span class="deltaXi">&#x039E;</span>e</span><span class="lOut scroll" data-scrollPoint="0">b</span></span>
			</h1></a>
		</div>
		<div class="header scroll rock" data-scrollPoint="0">
			<div class="nav">
				<div class="container scroll" data-scrollPoint="0">
					<a class="mainNav rock" href="#landing">Home</a>
				</div>
				<div class="container scroll" data-scrollPoint="0">
					<a class="mainNav rock" href="#about">About</a>
				</div>
				<div class="container scroll" data-scrollPoint="0">
					<a class="mainNav rock" href="#work">Work</a>
				</div>
				<div class="container scroll" data-scrollPoint="0">
					<a class="mainNav rock" href="#contact">Contact</a>
				</div>
			</div>
		</div>
		<h2 class="hook fade">Let's<span class="pow">Create</span>Something.</h2>
		<div class="mainIcons fade">
			<a class="icon noLine" href="https://github.com/dubKelly">
				<svg enable-background="new 0 0 32 32" height="25px" class="gH" version="1.0" viewBox="0 0 32 32" width="25px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path class="gitHub" clip-rule="evenodd" d="M16.003,0C7.17,0,0.008,7.162,0.008,15.997  c0,7.067,4.582,13.063,10.94,15.179c0.8,0.146,1.052-0.328,1.052-0.752c0-0.38,0.008-1.442,0-2.777  c-4.449,0.967-5.371-2.107-5.371-2.107c-0.727-1.848-1.775-2.34-1.775-2.34c-1.452-0.992,0.109-0.973,0.109-0.973  c1.605,0.113,2.451,1.649,2.451,1.649c1.427,2.443,3.743,1.737,4.654,1.329c0.146-1.034,0.56-1.739,1.017-2.139  c-3.552-0.404-7.286-1.776-7.286-7.906c0-1.747,0.623-3.174,1.646-4.292C7.28,10.464,6.73,8.837,7.602,6.634  c0,0,1.343-0.43,4.398,1.641c1.276-0.355,2.645-0.532,4.005-0.538c1.359,0.006,2.727,0.183,4.005,0.538  c3.055-2.07,4.396-1.641,4.396-1.641c0.872,2.203,0.323,3.83,0.159,4.234c1.023,1.118,1.644,2.545,1.644,4.292  c0,6.146-3.74,7.498-7.304,7.893C19.479,23.548,20,24.508,20,26c0,2,0,3.902,0,4.428c0,0.428,0.258,0.901,1.07,0.746  C27.422,29.055,32,23.062,32,15.997C32,7.162,24.838,0,16.003,0z" fill="#424242" fill-rule="evenodd"/><g/><g/><g/><g/><g/><g/></svg>
			</a>
			<a class="icon noLine" href="http://codepen.io/dubKelly/">
				<svg enable-background="new 0 0 128 128" class="cP" version="1.1" viewBox="0 0 128 128" width="25px" height="25px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="_x36__stroke"><g class="Codepen"><rect clip-rule="evenodd" fill="none" fill-rule="evenodd" height="50px" width="50px"/><path clip-rule="evenodd" d="M117,73.204L103.24,64L117,54.796V73.204z     M69.5,112.22V86.568L93.348,70.62l19.248,12.872L69.5,112.22z M64,77.012L44.548,64L64,50.988L83.456,64L64,77.012z M58.5,112.22    L15.404,83.492L34.656,70.62L58.5,86.568V112.22z M11,54.796L24.764,64L11,73.204V54.796z M58.5,15.78v25.652L34.656,57.384    L15.404,44.508L58.5,15.78z M69.5,15.78l43.096,28.728L93.348,57.384L69.5,41.432V15.78z M127.952,43.784    c-0.012-0.084-0.032-0.16-0.044-0.24c-0.028-0.156-0.056-0.312-0.096-0.46c-0.024-0.092-0.06-0.18-0.088-0.268    c-0.044-0.136-0.088-0.268-0.14-0.4c-0.036-0.092-0.08-0.184-0.124-0.268c-0.056-0.128-0.116-0.248-0.188-0.364    c-0.048-0.088-0.104-0.172-0.156-0.256c-0.072-0.116-0.148-0.228-0.232-0.336c-0.06-0.08-0.124-0.16-0.188-0.236    c-0.088-0.104-0.18-0.204-0.276-0.3c-0.072-0.072-0.14-0.148-0.216-0.212c-0.104-0.092-0.208-0.18-0.312-0.264    c-0.084-0.064-0.164-0.128-0.248-0.188c-0.032-0.02-0.06-0.048-0.092-0.068l-58.5-39c-1.848-1.232-4.252-1.232-6.104,0l-58.496,39    c-0.032,0.02-0.06,0.048-0.092,0.068c-0.088,0.06-0.168,0.124-0.248,0.188C2.004,40.264,1.9,40.352,1.8,40.444    c-0.076,0.064-0.148,0.14-0.22,0.212c-0.096,0.096-0.188,0.196-0.272,0.3c-0.068,0.076-0.132,0.156-0.192,0.236    c-0.08,0.108-0.156,0.22-0.228,0.336c-0.056,0.084-0.108,0.168-0.16,0.256C0.66,41.9,0.6,42.02,0.54,42.148    c-0.04,0.084-0.084,0.176-0.12,0.268c-0.056,0.132-0.1,0.264-0.144,0.4c-0.028,0.088-0.06,0.176-0.084,0.268    c-0.04,0.148-0.068,0.304-0.096,0.46c-0.016,0.08-0.036,0.156-0.044,0.24C0.02,44.016,0,44.256,0,44.5v39    c0,0.24,0.02,0.48,0.052,0.72c0.008,0.076,0.028,0.156,0.044,0.236c0.028,0.156,0.056,0.308,0.096,0.46    c0.024,0.092,0.056,0.18,0.084,0.268c0.044,0.132,0.088,0.268,0.144,0.404c0.036,0.088,0.08,0.176,0.12,0.264    c0.06,0.124,0.12,0.244,0.188,0.368c0.052,0.084,0.104,0.168,0.16,0.252c0.072,0.116,0.148,0.224,0.228,0.332    c0.06,0.084,0.124,0.164,0.192,0.24c0.084,0.1,0.176,0.204,0.272,0.296c0.072,0.076,0.144,0.148,0.22,0.216    c0.1,0.092,0.204,0.18,0.312,0.264c0.08,0.064,0.16,0.128,0.248,0.188c0.032,0.02,0.06,0.048,0.092,0.068l58.496,39    C61.872,127.692,62.936,128,64,128s2.128-0.308,3.052-0.924l58.5-39c0.032-0.02,0.06-0.048,0.092-0.068    c0.084-0.06,0.164-0.124,0.248-0.188c0.104-0.084,0.208-0.172,0.312-0.264c0.076-0.068,0.144-0.14,0.216-0.216    c0.096-0.092,0.188-0.196,0.276-0.296c0.064-0.076,0.128-0.156,0.188-0.24c0.084-0.108,0.16-0.216,0.232-0.332    c0.052-0.084,0.108-0.168,0.156-0.252c0.072-0.124,0.132-0.244,0.188-0.368c0.044-0.088,0.088-0.176,0.124-0.264    c0.052-0.136,0.096-0.272,0.14-0.404c0.028-0.088,0.064-0.176,0.088-0.268c0.04-0.152,0.068-0.304,0.096-0.46    c0.012-0.08,0.032-0.16,0.044-0.236c0.032-0.24,0.048-0.48,0.048-0.72v-39C128,44.256,127.984,44.016,127.952,43.784z" fill="#424242" fill-rule="evenodd" class="codePen"/></g></g></svg>
			</a>
			<a class="icon noLine" href="https://www.linkedin.com/in/jordan-neeb-00407413b/">
				<svg enable-background="new 0 0 32 32" height="20px" class="lI" version="1.0" viewBox="0 0 32 32" width="20px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><rect class="linkedIn" fill="#424242" height="23" width="7" y="9"/><path class="linkedIn" d="M24.003,9C20,9,18.89,10.312,18,12V9h-7v23h7V19c0-2,0-4,3.5-4s3.5,2,3.5,4v13h7V19C32,13,31,9,24.003,9z" fill="#424242"/><circle class="linkedIn" cx="3.5" cy="3.5" fill="#424242" r="3.5"/></g><g/><g/><g/><g/><g/><g/></svg>
			</a>
		</div>
	</div>
</section>
<section id="about" class="about blur hide">
	<h1 class="aboutHead">About</h1>
	<h1 class="aboutHead skills none">Skills</h1>
	<h1 class="aboutHead tech none">Tech</h1>
	<div class="blurb">
			<div class="aboutCont intro">
				<p class="scroll aboutScroll" data-scrollPoint="">Originally from St. Jacobs, I recently moved to Toronto where I spend an unhealthy amount of time coding for the web.</p>
				<p class="scroll aboutScroll" data-scrollPoint="">If you have a new or existing project that needs some work, or if your team could use an extra set of hands, <a class="pLink noLine" href="#contact">hit me up</a> and let's see if we can make something happen.</p>
			</div>
			<div class="aboutCont skills none">
				<div class="skillToggle right">
					<ul class="scroll aboutScroll" data-scrollPoint="">
						<li class="sToggle focus">Hard</li>
						<li class="sToggle">Soft</li>
					</ul>
				</div>
				<div class="left">
					<ul class="scroll aboutScroll" data-scrollPoint="">
						<li class="focus">Responsive Design</li>
						<li class="focus">Search Engine Optimization</li>
						<li class="focus">Cross-Browser Compatibility</li>
						<li class="focus">Form Security</li>
						<li class="focus">Content Management</li>
						<li class="focus">E-Commerce</li>
					</ul>
				</div>
				<div class="right">
					<ul class="scroll aboutScroll" data-scrollPoint="">
						<li>Detail Orientated</li>
						<li>Problem Solver</li>
						<li>Creative</li>
						<li>Innovative</li>
					</ul>
				</div>
			</div>
			<div class="aboutCont tech none">
				<div class="skillToggle left">
					<ul class="scroll aboutScroll" data-scrollPoint="">
						<li class="sToggle">Languages</li>
						<li class="sToggle focus">Environment</li>
					</ul>
				</div>
				<div class="right">
					<ul class="scroll aboutScroll" data-scrollPoint="">
						<li>HTML5/Liquid</li>
						<li>CSS3/Scss</li>
						<li>JavaScript/jQuery/React/Es6</li>
						<li>PHP/Ajax/Json</li>
						<li>Bootstrap</li>
					</ul>
				</div>
				<div class="left">
					<ul class="scroll aboutScroll" data-scrollPoint="">
						<li class="focus">Ubuntu</li>
						<li class="focus">Sublime/Emmet</li>
						<li class="focus">Apache/PhpMyAdmin</li>
						<li class="focus">Git</li>
						<li class="focus">Gimp/DarkTable</li>
						<li class="focus">cmatrix</li>
					</ul>
				</div>
			</div>
	</div>
	<svg class="next arrow" enable-background="new 0 0 50 50" height="32px" id="Layer_1" version="1.1" viewBox="0 0 50 50" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><rect fill="none" height="50" width="50"/><polygon class="polygon" fill="#424242" points="47.25,15 45.164,12.914 25,33.078 4.836,12.914 2.75,15 25,37.25 "/></svg>
</section>
<section id="work" class="work blur hide">
	<div class="site sOne">
		<div class="siteWrap">
			<p>Demo</p>
		</div>
	</div>
	<div class="site sTwo">
		<div class="siteWrap">
			<p>Demo</p>
		</div>
	</div>
	<div class="site sThree">
		<div class="siteWrap">
			<p></p>
		</div>
	</div>
	<div class="site sFour">
		<div class="siteWrap">
			<p>Demo</p>
		</div>
	</div>
	<div class="site sFive">
		<div class="siteWrap">
			<p>Demo</p>
		</div>
	</div>
	<div class="site sSix">
		<div class="siteWrap">
			<p>Demo</p>
		</div>
	</div>
</section>
<section id="contact" class="contact blur hide">
	<div class="contactWrap">
		<h1><span>What's</span> <span>Up?</span></h1>
		<form action="index.php" id="form" method="post">
			<input type="hidden" name="token" value="<?php echo $newToken; ?>">
			<input class="input" type="text" name="name" placeholder="Name">
			<input class="input" type="text" name="email" placeholder="Email">
			<textarea class="input" name="message" rows="4" placeholder="Message"></textarea>
			<input class="submit" type="submit" name="submit" value="Send">
		</form>
		<div class="footIcons">
			<a class="footIcon noLine" href="https://github.com/dubKelly">
				<svg enable-background="new 0 0 32 32" height="25px" class="gH" version="1.0" viewBox="0 0 32 32" width="25px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path class="gitHub" clip-rule="evenodd" d="M16.003,0C7.17,0,0.008,7.162,0.008,15.997  c0,7.067,4.582,13.063,10.94,15.179c0.8,0.146,1.052-0.328,1.052-0.752c0-0.38,0.008-1.442,0-2.777  c-4.449,0.967-5.371-2.107-5.371-2.107c-0.727-1.848-1.775-2.34-1.775-2.34c-1.452-0.992,0.109-0.973,0.109-0.973  c1.605,0.113,2.451,1.649,2.451,1.649c1.427,2.443,3.743,1.737,4.654,1.329c0.146-1.034,0.56-1.739,1.017-2.139  c-3.552-0.404-7.286-1.776-7.286-7.906c0-1.747,0.623-3.174,1.646-4.292C7.28,10.464,6.73,8.837,7.602,6.634  c0,0,1.343-0.43,4.398,1.641c1.276-0.355,2.645-0.532,4.005-0.538c1.359,0.006,2.727,0.183,4.005,0.538  c3.055-2.07,4.396-1.641,4.396-1.641c0.872,2.203,0.323,3.83,0.159,4.234c1.023,1.118,1.644,2.545,1.644,4.292  c0,6.146-3.74,7.498-7.304,7.893C19.479,23.548,20,24.508,20,26c0,2,0,3.902,0,4.428c0,0.428,0.258,0.901,1.07,0.746  C27.422,29.055,32,23.062,32,15.997C32,7.162,24.838,0,16.003,0z" fill="#424242" fill-rule="evenodd"/><g/><g/><g/><g/><g/><g/></svg>
			</a>
			<a class="footIcon noLine" href="http://codepen.io/dubKelly/">
				<svg enable-background="new 0 0 128 128" class="cP" version="1.1" viewBox="0 0 128 128" width="25px" height="25px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="_x36__stroke"><g class="Codepen"><rect clip-rule="evenodd" fill="none" fill-rule="evenodd" height="50px" width="50px"/><path clip-rule="evenodd" d="M117,73.204L103.24,64L117,54.796V73.204z     M69.5,112.22V86.568L93.348,70.62l19.248,12.872L69.5,112.22z M64,77.012L44.548,64L64,50.988L83.456,64L64,77.012z M58.5,112.22    L15.404,83.492L34.656,70.62L58.5,86.568V112.22z M11,54.796L24.764,64L11,73.204V54.796z M58.5,15.78v25.652L34.656,57.384    L15.404,44.508L58.5,15.78z M69.5,15.78l43.096,28.728L93.348,57.384L69.5,41.432V15.78z M127.952,43.784    c-0.012-0.084-0.032-0.16-0.044-0.24c-0.028-0.156-0.056-0.312-0.096-0.46c-0.024-0.092-0.06-0.18-0.088-0.268    c-0.044-0.136-0.088-0.268-0.14-0.4c-0.036-0.092-0.08-0.184-0.124-0.268c-0.056-0.128-0.116-0.248-0.188-0.364    c-0.048-0.088-0.104-0.172-0.156-0.256c-0.072-0.116-0.148-0.228-0.232-0.336c-0.06-0.08-0.124-0.16-0.188-0.236    c-0.088-0.104-0.18-0.204-0.276-0.3c-0.072-0.072-0.14-0.148-0.216-0.212c-0.104-0.092-0.208-0.18-0.312-0.264    c-0.084-0.064-0.164-0.128-0.248-0.188c-0.032-0.02-0.06-0.048-0.092-0.068l-58.5-39c-1.848-1.232-4.252-1.232-6.104,0l-58.496,39    c-0.032,0.02-0.06,0.048-0.092,0.068c-0.088,0.06-0.168,0.124-0.248,0.188C2.004,40.264,1.9,40.352,1.8,40.444    c-0.076,0.064-0.148,0.14-0.22,0.212c-0.096,0.096-0.188,0.196-0.272,0.3c-0.068,0.076-0.132,0.156-0.192,0.236    c-0.08,0.108-0.156,0.22-0.228,0.336c-0.056,0.084-0.108,0.168-0.16,0.256C0.66,41.9,0.6,42.02,0.54,42.148    c-0.04,0.084-0.084,0.176-0.12,0.268c-0.056,0.132-0.1,0.264-0.144,0.4c-0.028,0.088-0.06,0.176-0.084,0.268    c-0.04,0.148-0.068,0.304-0.096,0.46c-0.016,0.08-0.036,0.156-0.044,0.24C0.02,44.016,0,44.256,0,44.5v39    c0,0.24,0.02,0.48,0.052,0.72c0.008,0.076,0.028,0.156,0.044,0.236c0.028,0.156,0.056,0.308,0.096,0.46    c0.024,0.092,0.056,0.18,0.084,0.268c0.044,0.132,0.088,0.268,0.144,0.404c0.036,0.088,0.08,0.176,0.12,0.264    c0.06,0.124,0.12,0.244,0.188,0.368c0.052,0.084,0.104,0.168,0.16,0.252c0.072,0.116,0.148,0.224,0.228,0.332    c0.06,0.084,0.124,0.164,0.192,0.24c0.084,0.1,0.176,0.204,0.272,0.296c0.072,0.076,0.144,0.148,0.22,0.216    c0.1,0.092,0.204,0.18,0.312,0.264c0.08,0.064,0.16,0.128,0.248,0.188c0.032,0.02,0.06,0.048,0.092,0.068l58.496,39    C61.872,127.692,62.936,128,64,128s2.128-0.308,3.052-0.924l58.5-39c0.032-0.02,0.06-0.048,0.092-0.068    c0.084-0.06,0.164-0.124,0.248-0.188c0.104-0.084,0.208-0.172,0.312-0.264c0.076-0.068,0.144-0.14,0.216-0.216    c0.096-0.092,0.188-0.196,0.276-0.296c0.064-0.076,0.128-0.156,0.188-0.24c0.084-0.108,0.16-0.216,0.232-0.332    c0.052-0.084,0.108-0.168,0.156-0.252c0.072-0.124,0.132-0.244,0.188-0.368c0.044-0.088,0.088-0.176,0.124-0.264    c0.052-0.136,0.096-0.272,0.14-0.404c0.028-0.088,0.064-0.176,0.088-0.268c0.04-0.152,0.068-0.304,0.096-0.46    c0.012-0.08,0.032-0.16,0.044-0.236c0.032-0.24,0.048-0.48,0.048-0.72v-39C128,44.256,127.984,44.016,127.952,43.784z" fill="#424242" fill-rule="evenodd" class="codePen"/></g></g></svg>
			</a>
			<a class="footIcon noLine" href="https://www.linkedin.com/in/jordan-neeb-00407413b/">
				<svg enable-background="new 0 0 32 32" height="20px" class="lI" version="1.0" viewBox="0 0 32 32" width="20px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><rect class="linkedIn" fill="#424242" height="23" width="7" y="9"/><path class="linkedIn" d="M24.003,9C20,9,18.89,10.312,18,12V9h-7v23h7V19c0-2,0-4,3.5-4s3.5,2,3.5,4v13h7V19C32,13,31,9,24.003,9z" fill="#424242"/><circle class="linkedIn" cx="3.5" cy="3.5" fill="#424242" r="3.5"/></g><g/><g/><g/><g/><g/><g/></svg>
			</a>
		</div>
	</div>
</section>
<script type="text/javascript" src="scripts/scripts.js"></script>
</body>
</html>