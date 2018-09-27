<?php session_start(); ?>

<!DOCTYPE HTML>
<!--
	Dopetrope by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>Disc.Market - Buy and Sell Disc Golf Discs</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" href="assets/css/multirange.css" />
	<link rel="stylesheet" href="assets/css/rSlider.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
	<link rel="stylesheet" href="assets/fancybox/source/jquery.fancybox.css?v=2.1.7" type="text/css" media="screen" />
	<link rel="stylesheet" href="assets/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
	<link rel="stylesheet" href="assets/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
	<link rel="stylesheet" href="assets/css/jquery.simpleLens.css" />
	<link rel="stylesheet" href="assets/css/jquery.simpleGallery.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/basic.min.css">
	<link rel="stylesheet" href="assets/css/style.css" />
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>

<body class="homepage">
	<?php

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "discmarket";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
	?>
	<div id="page-wrapper">

		<!-- Header -->
		<div id="header-wrapper">
			<div id="header">

				<!-- Logo -->
				<h1>
					<a href="index.php">
						<img src="images/logo.png" alt="" />
					</a>
				</h1>

				<!-- Nav -->
				<nav id="nav">
					<ul>
						<li <?php if (basename($_SERVER['PHP_SELF']) == "index.php") echo 'class="current"'; ?>>
							<a href="index.php">Home</a>
						</li>
						<li <?php if (basename($_SERVER['PHP_SELF']) == "buy.php") echo 'class="current"'; ?>>
							<a href="buy.php">Buy</a>
						</li>
						<li <?php if (basename($_SERVER['PHP_SELF']) == "sell.php") echo 'class="current"'; ?>>
							<a href="sell.php">Sell</a>
						</li>
						<li <?php if (basename($_SERVER['PHP_SELF']) == "") echo 'class="current"'; ?>>
							<a href="">About</a>
						</li>
						<li <?php if (basename($_SERVER['PHP_SELF']) == "") echo 'class="current"'; ?>>
							<a href="" onclick="document.getElementById('id01').style.display='block'; openTab(event, 'Login');" style="width:auto;">
								<?php
									if (isset($_SESSION['u_id'])) {
										echo $_SESSION['u_uid'] . '&nbsp;&nbsp;<i class="fa fa-user" aria-hidden="true"></i>';
									} else {
										echo "Login/Sign Up";
									}
								?>
							</a>
						</li>
					</ul>
				</nav>

				<!-- Login -->
				<div id="id01" class="modal">
					<?php if (isset($_SESSION['u_id'])): ?> 
					<header class="" id="accountTitle">
							<h3><?php echo "My Account - " . $_SESSION['u_uid']; ?></h3>
					</header>
					<form class="modal-content" action="includes/logout.inc.php" method="POST">
						<div class="container">
							<button type="submit" name="submitLogout">Logout</button>
						</div>
					</form>
					<?php else: ?>
					<header class="" id="tabs">
						<div class="tab">
							<button name="button" class="loginButton" style="border-bottom: 1px solid black;" onclick="openTab(event, 'Login')">Login</button>
							<button name="button" class="signupButton" style="border-bottom: 1px solid black;" onclick="openTab(event, 'SignUp')">Sign Up</button>
							<button name="button" class="exit" id="exit" style="border-bottom: 1px solid white;"><i class="fa fa-times" aria-hidden="true"></i></button>
						</div>
					</header>
					<div id="Login" class="tabcontent">
					<form class="modal-content" action="includes/login.inc.php" method="POST">
							<div class="container">
								<label for="uid">
									<b>
										<h2>Email/Username</h2>
									</b>
								</label>
								<input type="text" placeholder="Enter Username" name="uid" required>

								<label for="pwd">
									<b>
										<h2>Password</h2>
									</b>
								</label>
								<input type="password" placeholder="Enter Password" name="pwd" style="margin-bottom: 2em;" required>
								<br>
								<label id="login">
									<input type="checkbox" checked="checked" name="remember"> Remember me
								</label>
								&nbsp;&nbsp;&nbsp;&nbsp;
								<label id="login">
									<a href="">Forgot Password?</a>
								</label>
								<br>
								<button type="submit" name="submitLogin">Login</button>
							</div>

							<div class="container" style="border-left: 2px solid #4d4d4d;">
								<a href="http://www.facebook.com" target="_blank">
									<img id="socialLogin" src="images/facebook.png" alt="Facebook Login">
								</a>
								<a href="http://www.google.com" target="_blank">
									<img id="socialLogin" src="images/google.png" alt="Google Login">
								</a>
								<a href="http://www.twitter.com" target="_blank">
									<img id="socialLogin" src="images/twitter.png" alt="Twitter Login">
								</a>
								<br>
								<h2 id="noAccount">Don't have an account?</h2>
								<input type="button" value="Create Account" id="accountCreate" onclick="openTab(event, 'SignUp')">
							</div>
					</form>
					</div>
					<div id="SignUp" class="tabcontent" style="display: none;">
					<form class="modal-content" action="includes/signup.inc.php" method="POST">
							<div class="container">
								<label for="name">
									<b>
										<h2>First Name</h2>
									</b>
								</label>
								<input type="text" placeholder="First Name" name="first" required>

								<label for="name">
									<b>
										<h2>Last Name</h2>
									</b>
								</label>
								<input type="text" placeholder="Last Name" name="last" required>

								<label for="uname">
									<b>
										<h2>Username</h2>
									</b>
								</label>
								<input type="text" placeholder="Username" name="uid" required>
								<br>
								<label for="email">
									<b>
										<h2>Email</h2>
									</b>
								</label>
								<input type="text" placeholder="E-mail" name="email" required>
								<br><br>
							</div>
							<div class="container" style="border-right: 2px white">
								<label for="pwd">
									<b>
										<h2>Password</h2>
									</b>
								</label>
								<input type="password" placeholder="Password" name="pwd" required>

								<label for="pswagain">
									<b>
										<h2>Password Again</h2>
									</b>
								</label>
								<input type="password" placeholder="Password Again" name="pswagain">
								<br>
								<img id="socialLogin" src="images/recaptcha-robot.png" alt="Captcha" style="width: 100%; padding: 0 1em 0 1em;">
								<br>
								<button type="submit" name="submitSignup">Sign Up</button>
							</div>

							<div class="container" style="border-left: 2px solid #4d4d4d;">
								<a href="http://www.facebook.com" target="_blank">
									<img id="socialLogin" src="images/facebook.png" alt="Facebook Login">
								</a>
								<a href="http://www.google.com" target="_blank">
									<img id="socialLogin" src="images/google.png" alt="Google Login">
								</a>
								<a href="http://www.twitter.com" target="_blank">
									<img id="socialLogin" src="images/twitter.png" alt="Twitter Login">
								</a>
								<br>
								<h2 id="noAccount">Already Have an Account?</h2>
								<input type="button" id="accountLogin" value="Login" onclick="openTab(event, 'Login')">
							</div>
					</form>
					</div>
					<?php endif; ?>
				</div>