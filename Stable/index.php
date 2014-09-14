
<!DOCTYPE html>

<html lang="en-US">

<head>

	<title>MLink</title>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/foundation.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">

	<script type="text/javascript" src="js/vendor/modernizr.js"></script>

	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700' rel='stylesheet' type='text/css'>

	<script src="//www.parsecdn.com/js/parse-1.2.19.min.js"></script>

</head>

<body>

<header>

	<nav>

		<div class="row">

			<div class="large-8 columns">

				<img id="logo" src="img/logo.png">

			</div>

			<div class="large-4 columns text-right">

				<a id="login" href="signin/">Login</a>

				<a id="signup" class="button" href="signup/">Sign Up</a>

			</div>

		</div>

	</nav>

	<div class="row">

		<div class="large-12 large-centered columns text-centered">

			<h1 class="big light-text" style="margin-top: 5rem !important">Simple on campus purchases.</h1>

			<p class="light-text">Buy books and sports tickets without the hassle.</p>

			<a href="action/" class="button large round" style="margin-top: 3rem !important; letter-spacing: 1.5; font-weight: 700">GET STARTED</a>

		</div>

	</div>

	<div class="row" style="margin-top: 9rem">

			<div class="large-1 large-centered columns">

				<img src="img/down-arrow.svg" height="70px;">

			</div>

		</div>

</header>

<section class="row" style="margin-top: 4.5rem; margin-bottom: 4.5rem">

	<div class="large-4 columns">

		<h2>Simple Search</h2>
		<p>Searching through our inventory can be done in just a couple of clicks. This save a lot of time compared to the slow scrolling of facebook pages.</p>

	</div>

	<div class="large-4 columns">

		<h2>Focused on Students</h2>
		<p>Link is made by Michigan students for Michigan students. We know the pains of finding used books for classes or find a ticket in a section with your friends.</p>

	</div>

	<div class="large-4 columns">

		<h2>No Hassle</h2>
		<p>Looking to sell? Just put enter a couple details about what you're selling and we'll handle the rest. Same goes for buying. No more time consuming paragraphs.  </p>

	</div>

</section>

<section style="background-color: white !important; padding-top: 4.5rem; padding-bottom: 4.5rem">

	<div class="row">

		<div class="large-10 columns">

			<h1 style="font-size: 2em !important">Change how you buy and sell.</h1>

			<p style="font-size: 1.25em !important;">The days of digging through every facebook group are over. Now you can find exactly what you are looking for in <span style="font-weight: 400">less than one minute.</span> 
				Selling is also made easy. Post your products and just want for the offers to come in. All you have to do is set up a meeting place.</p>

				<a href="signup/" class="button large round" style="margin-top: 30px !important;">GIVE IT A TRY</a>

		</div>

	</div>

</section>

<footer style="padding-top: 4.5rem; padding-bottom: 4.5rem">

	<div class="row">

		<div class="large-8 large-centered columns text-centered">

			<p>&copy; Link - Ann Arbor, MI 2014. All Right Reserved.</p>

		</div>

	</div>

</footer>

<script src="../js/vendor/jquery.js"></script>
<script type="text/javascript" src="../js/vendor/fastclick.js"></script>
<script type="text/javascript" src="../js/foundation.min.js"></script>

<script>

  	$(document).foundation({
		// specify the class used for active sections
		active_class: 'active',
		// how many pixels until the magellan bar sticks, 0 = auto
		threshold: 0,
		// pixels from the top of destination for it to be considered active
		destination_threshold: 0,
		// calculation throttling to increase framerate
		throttle_delay: 50,
		// top distance in pixels assigned to the fixed element on scroll
		fixed_top: 0
	});
</script>
</body>

</html>