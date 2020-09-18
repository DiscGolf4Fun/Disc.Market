<?php session_start(); ?>

<!DOCTYPE HTML>
<!--
	Dopetrope by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>Disc.Market - Buy and Sell Anything Disc Golf</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="/test/assets/css/main.css" />
	<link rel="stylesheet" href="/test/assets/css/multirange.css" />
	<link rel="stylesheet" href="/test/assets/css/rSlider.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
	<link rel="stylesheet" href="/test/assets/fancybox/source/jquery.fancybox.css?v=2.1.7" type="text/css" media="screen" />
	<link rel="stylesheet" href="/test/assets/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
	<link rel="stylesheet" href="/test/assets/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
	<link rel="stylesheet" href="/test/assets/css/jquery.simpleLens.css" />
	<link rel="stylesheet" href="/test/assets/css/jquery.simpleGallery.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/basic.min.css">
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	<link rel="stylesheet" href="/test/assets/css/jquery.bracket.min.css">
	<link rel="stylesheet" href="/test/assets/css/jConfirm.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
	<link rel="stylesheet" href="/test/assets/css/style.css" />

	<link rel="apple-touch-icon" sizes="180x180" href="/test/images/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/test/images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/test/images/favicon/favicon-16x16.png">
	<link rel="manifest" href="/test/images/favicon/site.webmanifest">
	<link rel="mask-icon" href="/test/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="/test/images/favicon/favicon.ico">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-config" content="/test/images/favicon/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">

	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>

	<script src='https://www.google.com/recaptcha/api.js'></script>


</head>

<body class="homepage">
	<?php

	$path = $_SERVER['DOCUMENT_ROOT'];
	$path .= "/test/includes/dbh.inc.php"; 
	include_once($path);


		if(isset($_SESSION['u_id'])) {
			$sql = "SELECT posts.id FROM posts WHERE user_id = " . $_SESSION['u_id'];
			$sql2 = "SELECT bids.id FROM bids WHERE user_id =". $_SESSION['u_id'] ." GROUP BY post_id";
			$totalPosts = mysqli_query($conn, $sql);
			$totalPosts = mysqli_num_rows($totalPosts);
			$totalBids = mysqli_query($conn, $sql2);
			$totalBids = mysqli_num_rows($totalBids);
		} else {
			$totalPosts = 0;
			$totalBids = 0;
		}


	?>



	<div class="dimmer2"></div>
	<div class="newAccount">
	<header class="" id="accountTitle" style="margin-top: 2em;">
		<img id="emailPicture" src="/test/images/email-icon.png" alt="Profile Picture">
		<a href="#" class="close-thik3"></a>
	</header>
		<h3 style="margin: 1em 2em 0 2em;">Thank you for creating an account</h3>
		<br>
		<h4 style="margin: 0 2em 0 2em;">An activation email should arive in your inbox in the next few minutes. If you do not recieve the email, check your spam folder or <a href="#" style="text-decoration: underline; color: #0a7e07;">click here</a> to resend the message.</h4>
	</div>



	<script type="text/javascript">
		if (location.href.indexOf("#NewAccount") != -1) {
			$('html, body').css("overflow","none");
			$('.dimmer2').show();
			$('.newAccount').show();
		} else {
			$('.dimmer2').hide();
			$('.newAccount').hide();
		}
	</script>

	<div id="page-wrapper">

		<!-- Header -->
		<div id="header-wrapper">
			<div id="header">

				<!-- Logo -->
					<a href="/test">
						<img id="logo_image" src="/test/images/logo.png" alt="" />
					</a>

				<!-- Nav -->
				<nav id="nav">
					<ul>
						<li <?php if ((basename($_SERVER['PHP_SELF']) == "index.php") && (strpos($_SERVER['REQUEST_URI'], "admin") != true) && (strpos($_SERVER['REQUEST_URI'], "account") != true))  echo 'class="current"'; ?>>
							<a href="/test">Home</a>
						</li>
						<li <?php if (basename($_SERVER['PHP_SELF']) == "buy.php") echo 'class="current"'; ?>>
							<a href="/test/buy.php">Buy</a>
						</li>
						<li <?php if (basename($_SERVER['PHP_SELF']) == "sell.php" || basename($_SERVER['PHP_SELF']) == "/sell-images.php") echo 'class="current"'; ?>>
							<a href="/test/sell.php">Sell</a>
						</li>
						<li <?php if (basename($_SERVER['PHP_SELF']) == "about.php") echo 'class="current"'; ?>>
							<a href="/test/about.php">About</a>
						</li>
						<li <?php if (basename($_SERVER['PHP_SELF']) == "faq.php" || basename($_SERVER['PHP_SELF']) == "store.php" || basename($_SERVER['PHP_SELF']) == "matchplay.php"){echo 'class="opener current"';}else{echo 'class="opener"';}  ?>>
							<a href="#">More&nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i></a>
							<ul class="dropdownMenu">
								<li><a href="/test/faq.php"><i class="fa fa-question" aria-hidden="true"></i><span class="ink">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>FAQs</a></li>
								<li><a href="/test/store.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i><span class="ink">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Our Store</a></li>
								<li><a href="https://www.youtube.com/user/213ultimate/videos" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YouTube Videos</a></li>
								<li><a href="https://www.pdga.com/faq/ratings/how-is-your-rating-calculated" target="_blank"><i class="fa fa-calculator" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ratings Calculator</a></li>
								<li><a href="/test/matchplay.php"><i class="fa fa-list-ol" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Matchplay</a></li>
								<li><a href="https://www.marshallstreetdiscgolf.com/flightguide" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Disc Lookup</a></li>
								<?php
									if (isset($_SESSION['u_id'])) {
										if($_SESSION['u_role'] <= 2) {
											echo '<hr class="moreHR">',
												'<li><a href="#" target="_blank"><i class="fa fa-comments" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Moderator Chat</a></li>',
												'<li><a href="#" target="_blank"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Accept Posts</a></li>';
										}
									}
								?>
							</ul>
						</li>
						<li <?php if (basename($_SERVER['PHP_SELF']) == "" || (strpos($_SERVER['REQUEST_URI'], "account") == true)) echo 'class="current"'; ?>>
							<a href="#login" id="loginToggle" class="btn">
								<?php
									if (isset($_SESSION['u_id'])) {
										if($_SESSION['u_role'] == 1) { 
											echo $_SESSION['u_uid'] . '&nbsp;&nbsp;<img src="/test/images/gold-crown.png" style="vertical-align: middle; height: 1em;"/>';
										} elseif ($_SESSION['u_role'] == 2) {
											echo $_SESSION['u_uid'] . '&nbsp;&nbsp;<img src="/test/images/silver-crown.png" style="vertical-align: middle; height: 1em;"/>';
										} else {
											echo $_SESSION['u_uid'] . '&nbsp;&nbsp;<i class="fa fa-user" aria-hidden="true"></i>';
										}
									} else {
										echo "Login/Sign Up";
									}
								?>
							</a>
						</li>
					</ul>
				</nav>	


				<!-- Nav MOBILE -->
				<nav id="navMobile">
					<ul>
						<li <?php echo 'class="current"'; ?>>
							<a href="/test/buy.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i>&nbsp;Buy</a>
						</li>
						<li <?php echo 'class="current"'; ?>>
							<a href="/test/sell.php"><i class="fa fa-money" aria-hidden="true"></i>&nbsp;Sell</a>
						</li>
						<li <?php echo 'class="opener current"';  ?>>
							<a href="#">More&nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i></a>
							<ul class="dropdownMenu">
								<li><a href="/test/about.php"><i class="fa fa-star" aria-hidden="true"></i><span class="ink">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>About</a></li>
								<li><a href="/test/faq.php"><i class="fa fa-question" aria-hidden="true"></i><span class="ink">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>FAQs</a></li>
								<li><a href="/test/store.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i><span class="ink">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Our Store</a></li>
								<li><a href="https://www.youtube.com/user/213ultimate/videos" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YouTube Videos</a></li>
								<li><a href="https://www.pdga.com/faq/ratings/how-is-your-rating-calculated" target="_blank"><i class="fa fa-calculator" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ratings Calculator</a></li>
								<li><a href="/test/matchplay.php"><i class="fa fa-list-ol" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Matchplay</a></li>
								<li><a href="https://www.marshallstreetdiscgolf.com/flightguide" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Disc Lookup</a></li>
								<?php
									if (isset($_SESSION['u_id'])) {
										if($_SESSION['u_role'] <= 2) {
											echo '<hr class="moreHR">',
												'<li><a href="#" target="_blank"><i class="fa fa-comments" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Moderator Chat</a></li>',
												'<li><a href="#" target="_blank"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Accept Posts</a></li>';
										}
									}
								?>
							</ul>
						</li>
						<li <?php echo 'class="current"'; ?>>
							<a href="#login" id="loginToggle" class="btn">
								<?php
									if (isset($_SESSION['u_id'])) {
										if($_SESSION['u_role'] == 1) { 
											echo $_SESSION['u_uid'] . '&nbsp;&nbsp;<img src="/test/images/gold-crown.png" style="vertical-align: middle; height: 1em;"/>';
										} elseif ($_SESSION['u_role'] == 2) {
											echo $_SESSION['u_uid'] . '&nbsp;&nbsp;<img src="/test/images/silver-crown.png" style="vertical-align: middle; height: 1em;"/>';
										} else {
											echo $_SESSION['u_uid'] . '&nbsp;&nbsp;<i class="fa fa-user" aria-hidden="true"></i>';
										}
									} else {
										echo "Login/Sign Up";
									}
								?>
							</a>
						</li>
					</ul>
				</nav>





				<div id='loginWrapper'>
					<div class="dimmer"></div>
					<div class="forgotPassword animated fadeIn">
						<a href="#" class="close-thik"></a>
						<h3>Forgot your Password?</h3>
						<form class="forgot-password-form" action="" method="POST">
							<input type="text" class="input" autocomplete="off" placeholder="Email or Username" style="margin-bottom: 1em;" required>
							<div class="g-recaptcha" data-sitekey="6LfNE4oUAAAAAMGBRJ9HHqEDMA3xkiOwYUM83obY" style="margin-bottom: 1em;"></div>
							<input type="submit" class="button" name="submitForgotPassword" style="margin-bottom: 1em;" value="Send Email">
						</form><!--.login-form-->
						<div class="help-text">
							<p><a href="#" class="forgot2">Back to Login?</a></p>
						</div><!--.help-text-->
					</div>
					<div class="termsOfService animated fadeIn">
						<a href="#" class="close-thik2"></a>
						<h3>Terms of Service</h3>
						<p>1. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis commodo odio aenean sed. Morbi non arcu risus quis varius quam quisque id. Bibendum ut tristique et egestas quis ipsum suspendisse. Vitae turpis massa sed elementum tempus egestas. Dolor magna eget est lorem. Lobortis feugiat vivamus at augue. Magna sit amet purus gravida quis blandit turpis. Ac feugiat sed lectus vestibulum. Velit egestas dui id ornare arcu. Amet venenatis urna cursus eget nunc scelerisque viverra mauris in. Maecenas ultricies mi eget mauris.</p>					
						<p>2. Sit amet nulla facilisi morbi tempus iaculis urna id volutpat. Convallis tellus id interdum velit. Ut consequat semper viverra nam libero justo laoreet. Pretium vulputate sapien nec sagittis aliquam malesuada bibendum arcu. Felis imperdiet proin fermentum leo vel orci. Viverra nam libero justo laoreet sit. Consectetur adipiscing elit ut aliquam purus sit amet luctus. In iaculis nunc sed augue lacus. Consequat mauris nunc congue nisi vitae suscipit tellus mauris. Feugiat vivamus at augue eget. Venenatis cras sed felis eget velit aliquet sagittis. Eget egestas purus viverra accumsan in nisl nisi. Eget nulla facilisi etiam dignissim diam quis enim lobortis scelerisque. Gravida rutrum quisque non tellus orci ac auctor. Suspendisse faucibus interdum posuere lorem ipsum dolor sit. Id nibh tortor id aliquet lectus proin. Iaculis nunc sed augue lacus viverra vitae congue eu. Et sollicitudin ac orci phasellus egestas tellus rutrum tellus pellentesque.</p>
						<p>3. Mauris cursus mattis molestie a iaculis at erat. Malesuada proin libero nunc consequat interdum. Cras ornare arcu dui vivamus arcu felis. Suspendisse sed nisi lacus sed. Diam vel quam elementum pulvinar etiam. Massa tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada. Mi quis hendrerit dolor magna. Morbi tempus iaculis urna id volutpat lacus laoreet. Sed odio morbi quis commodo. Nulla malesuada pellentesque elit eget. Consectetur adipiscing elit duis tristique sollicitudin nibh.</p>
						<p>4. Augue neque gravida in fermentum et. Sed augue lacus viverra vitae congue eu. Egestas egestas fringilla phasellus faucibus. Felis imperdiet proin fermentum leo vel orci porta non. Nunc congue nisi vitae suscipit tellus mauris a diam. Venenatis tellus in metus vulputate eu scelerisque felis imperdiet. Quis commodo odio aenean sed. Ultrices sagittis orci a scelerisque purus. Sem integer vitae justo eget magna fermentum. Non nisi est sit amet. Varius morbi enim nunc faucibus a pellentesque sit amet porttitor. Scelerisque fermentum dui faucibus in ornare quam viverra orci sagittis. Elit ullamcorper dignissim cras tincidunt lobortis feugiat.</p>
						<p>5. Lorem mollis aliquam ut porttitor leo a. Sit amet consectetur adipiscing elit. Posuere urna nec tincidunt praesent semper feugiat. Ultricies integer quis auctor elit. Proin sed libero enim sed faucibus turpis in. Id volutpat lacus laoreet non curabitur gravida arcu ac tortor. Scelerisque mauris pellentesque pulvinar pellentesque habitant morbi tristique. Facilisi morbi tempus iaculis urna id volutpat lacus. Ut aliquam purus sit amet luctus venenatis lectus magna fringilla. Fermentum posuere urna nec tincidunt praesent semper feugiat nibh sed. Tellus in metus vulputate eu scelerisque felis imperdiet. Dictum fusce ut placerat orci nulla pellentesque dignissim enim. Viverra mauris in aliquam sem fringilla ut morbi tincidunt augue. In fermentum et sollicitudin ac. Pellentesque eu tincidunt tortor aliquam nulla. Aenean vel elit scelerisque mauris pellentesque pulvinar pellentesque habitant. Quis auctor elit sed vulputate mi sit amet mauris commodo.</p>			
						<button class="terms2" type="submit" name="submitLogout">Close</button>
					</div>
					<div class="loginDiv">
					<?php if (isset($_SESSION['u_id'])): ?> 
						<header class="" id="accountTitle">
							<?php 
								if($_SESSION['u_pic'] != "") {
									echo '<img id="profilePicture" src="/test/images/'. $_SESSION['u_pic'] .'" alt="Profile Picture">'; 
								} else {
									echo '<img id="profilePicture" src="/test/images/profile.png" alt="Profile Picture">'; 
								}
							?>
								<h3><?php echo $_SESSION['u_uid']; ?></h3>
								<p style="font-size: 1em; font-weight: 500; font-style: normal;"><a href="/test/account/#myposts" onClick="window.location.reload()" style="text-decoration: underline; cursor: pointer; color: #0a7e07;"><?php echo $totalPosts; ?></a>&nbsp;posts&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/test/account/#currentbids" onClick="window.location.reload()" style="text-decoration: underline; cursor: pointer; color: #0a7e07;"><?php echo $totalBids; ?></a>&nbsp;bids&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/test/account/#messages" onClick="window.location.reload()" style="text-decoration: underline; cursor: pointer; color: #0a7e07;">0</a>&nbsp;messages</p>
								<?php 
									if($_SESSION['u_role'] == 1) { 
										echo '<a href="/test/admin" style="position: absolute; top: 0; right: 0; margin: 1em; text-decoration: underline; color: #0a7e07;">Admin&nbsp;&nbsp;<img src="/test/images/gold-crown.png" style="vertical-align: middle; height: 1em;"/></a>';
									} elseif ($_SESSION['u_role'] == 2) {
										echo '<a href="/test/admin" style="position: absolute; top: 0; right: 0; margin: 1em; text-decoration: underline; color: #0a7e07;">Admin&nbsp;&nbsp;<img src="/test/images/silver-crown.png" style="vertical-align: middle; height: 1em;"/></a>';
									}
								?>
						</header>
						<hr style="margin: 0 20% 0 20%;">
						<a href="/test/account/#myaccount" onClick="window.location.reload()" style="text-decoration: none;"><h3 class="profilePopup"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;My Account</h3></a>
						<hr style="margin: 0 20% 0 20%;">
						<a href="/test/account/#myposts" onClick="window.location.reload()" style="text-decoration: none;"><h3 class="profilePopup"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;&nbsp;My Posts</h3></a>
						<hr style="margin: 0 20% 0 20%;">
						<a href="/test/account/#currentbids" onClick="window.location.reload()" style="text-decoration: none;"><h3 class="profilePopup"><i class="fa fa-gavel" aria-hidden="true"></i>&nbsp;&nbsp;Current Bids</h3></a>
						<hr style="margin: 0 20% 0 20%;">	
						<a href="/test/account/#messages" onClick="window.location.reload()" style="text-decoration: none;"><h3 class="profilePopup"><i class="fa fa-comments" aria-hidden="true"></i>&nbsp;&nbsp;Messages</h3></a>
						<hr style="margin: 0 20% 0 20%;">
						<a href="/test/account/#pastsales" onClick="window.location.reload()" style="text-decoration: none;"><h3 class="profilePopup"><i class="fa fa-money" aria-hidden="true"></i>&nbsp;&nbsp;Past Sales</h3></a>
						<hr style="margin: 0 20% 0 20%;">
						<a href="/test/account/#pastpurchases" onClick="window.location.reload()" style="text-decoration: none;"><h3 class="profilePopup"><i class="fa fa-usd" aria-hidden="true"></i>&nbsp;&nbsp;Past Purchases</h3></a>
						<hr style="margin: 0 20% 0 20%;">
						<form id="logoutForm" action="/test/includes/logout.inc.php" method="POST" style="display: block;">
							<h3 id="logoutButton" class="profilePopup"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;Logout</h3>
						</form>
						<hr style="margin: 0 20% 0 20%;">
					<?php else: ?>
						<div class="form-wrap">
							<div class="tabs">
								<h3 class="login-tab"><a class="active" href="#login-tab-content">Login</a></h3>
								<h3 class="signup-tab"><a href="#signup-tab-content">Sign Up</a></h3>
							</div><!--.tabs-->

							<div class="tabs-content">
								<div id="login-tab-content" class="active">
									<form class="login-form" action="/test/includes/login.inc.php" method="POST">									
										<input type="text" class="input" name="uid" id="uid" autocomplete="off" placeholder="Email or Username" required>
										<input type="password" class="input" name="pwd" id="pwd" autocomplete="off" placeholder="Password" required>
										<div class="row" style="margin-bottom: 1em;">
											<div class="6u">
												<input type="checkbox" class="checkbox" id="remember_me">
												<label for="remember_me">Remember me</label>
											</div>
											<div class="6u">
												<p style="margin: 0;"><a href="#" class="forgot">Forgot your password?</a></p>
											</div>
										</div>
										<input type="submit" class="button" name="" value="Login">
									</form><!--.login-form-->
									<div class="help-text" style="margin-top: 1em; margin-bottom: 1.5em;">
									<div class="hr-sect" style="color: black;">OR</div>
									</div><!--.help-text-->
									<div class="row" style="margin-bottom: 1em;">
											<div class="6u">
												<a href="#" class="social-button" id="facebook-connect"> <span>Login with Facebook</span></a>
											</div>
											<div class="6u">
												<a href="#" class="social-button" id="google-connect"> <span>Login with Google</span></a>
											</div>
											<div class="6u" style="padding-top: 1.5em;">
												<a href="#" class="social-button" id="twitter-connect"> <span>Login with Twitter</span></a>
											</div>
											<div class="6u" style="padding-top: 1.5em;">
												<a href="#" class="social-button" id="amazon-connect"> <span>Login with Amazon</span></a>
											</div>
									</div>
								</div><!--.login-tab-content-->
								<div id="signup-tab-content">
									<form class="signup-form" action="/test/includes/signup.inc.php" method="post">
										<div class="row" style="margin-bottom: 0;">
											<div class="6u">
												<input type="text" class="input" id="user_firstname" name="user_firstname" autocomplete="off" placeholder="First Name" required>
											</div>
											<div class="6u">
												<input type="text" class="input" id="user_lastname" name="user_lastname" autocomplete="off" placeholder="Last Name" required>
											</div>
											<div class="12u" style="padding-top: 0em;">
												<input type="email" class="input" id="user_email" name="user_email" autocomplete="off" placeholder="Email" required>
											</div>
											<div class="12u" style="padding-top: 0em;">
												<input type="text" class="input" id="user_name" name="user_name" autocomplete="off" placeholder="Username" required>
											</div>
											<div class="6u" style="padding-top: 0em;">
												<input type="password" class="input" id="user_pass"  name="user_pass" autocomplete="off" placeholder="Password" required>
											</div>
											<div class="6u" style="padding-top: 0em;">
												<input type="password" class="input" id="user_pass2"  name="user_pass2" autocomplete="off" placeholder="Repeat Password" required>
											</div>
											<div class="6u 12u(mobile)" style="padding-top: 0em;">
											<div class="g-recaptcha" data-sitekey="6LfNE4oUAAAAAMGBRJ9HHqEDMA3xkiOwYUM83obY" style="transform:scale(0.68);transform-origin:0 0"></div>
											</div>
											<div class="6u 12u(mobile)" style="padding-top: 0em;">
												<div class="help-text" style="margin-top: 0px;">
													<p>By signing up, you agree to our</p>
													<p style="margin-top: -.8em;"><a href="#" class="terms">Terms of service</a></p>
												</div>
											</div>
										</div>									
										<input type="submit" class="button" name="submitSignup" value="Sign Up">
									</form><!--.login-form-->
								</div><!--.signup-tab-content-->
							</div><!--.tabs-content-->
						</div><!--.form-wrap-->
					<?php endif; ?>
					</div>
				</div>


		