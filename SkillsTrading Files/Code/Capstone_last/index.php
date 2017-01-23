<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
		<meta name="viewport" content="width=device-width">
		<link rel="shortcut icon" href="../favicon.ico">
		<title>Trade'A'Skill</title>
		<!-- CSS FILES -->
		<link href="css/demo.css" media="screen, projection" rel="stylesheet" type="text/css">
		<link href="css/component.css" media="screen, projection" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="css/homestyle.css">
	</head>
	<body>
		<header>
			<!-- FOR HEADER -->
			<div id="headercontainer">
				<div id="tagline">
					<span class="site_name">Trade'A'Skill</span>
					<br>
					<span class="tag_line">Meet,share and learn.</span>
				</div>
				<!-- LOGIN PAGE EMBEDDED IN FIRST PAGE -->
				<div id="login_section">
					<?php
					include ('login.php');
					?>
				</div>

			</div>
		</header>

		<div id="common">
			<!-- FOR IMAGE SLIDE SHOW -->
			<div class="container" style="float: center; clear:left;">
				<article id="cc-slider">
					<input checked="checked" name="cc-slider" id="slide1" type="radio">
					<input name="cc-slider" id="slide2" type="radio">
					<input name="cc-slider" id="slide3" type="radio">
					<input name="cc-slider" id="slide4" type="radio">
					<input name="cc-slider" id="slide5" type="radio">

					<div id="cc-slides">
						<div id="overflow">
							<div class="inner">
								<article>
									<!-- IAMGES AND IMAGE CAPTIONS -->
									<img src="images/cooking.jpg" width="450px" height="550px">
									<div>
										Bring variety in your dinner plates!!
									</div>
								</article>
								<article>
									<img src="images/billiards.jpg" width="450px" height="550px">
									<div>
										Wanna play billiards, but can't find a partner??
									</div>
								</article>
								<article>
									<img src="images/dancing.jpg" width="450px" height="550px">
									<div>
										Learning Salsa isn't expensive anymore!!
									</div>
								</article>
								<article>

									<img src="images/Camera.jpg" width="450px" height="550px">
									<div>
										Good with piano, learn photography too !!
									</div>
								</article>
								<article>
									<img src="images/computer.jpg" width="450px" height="550px">
									<div>
										Its never too late to learn new things!!
									</div>
								</article>
							</div>
						</div>
					</div>

					<div id="controls">
						<label for="slide1"> </label>
						<label for="slide2"></label>
						<label for="slide3"></label>
						<label for="slide4"></label>
						<label for="slide5"></label>
					</div>
				</article>
			</div>

		</div>

	</body>
	<footer>
		<?php
		include ('footerpage.html');
		?>
	</footer>
</html>
