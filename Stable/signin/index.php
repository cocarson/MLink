



<!DOCTYPE html>

<html lang="en-US">

<head>

	<title>MLink</title>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/foundation.css">
	<link rel="stylesheet" type="text/css" href="../css/normalize.css">

	<script type="text/javascript" src="../js/vendor/modernizr.js"></script>

	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700' rel='stylesheet' type='text/css'>

	<script src="//www.parsecdn.com/js/parse-1.2.19.min.js"></script>


</head>

<body>

<nav class="row">

	<div class="large-12 columns">

		<img src="../img/logo-dark.png" style="height: 40px !important; margin-top: 10px;">

	</div>

</nav>	

<div class="row">

	<div id="main-container" class="large-12 columns light-background large-radius">

		<div class="row">

			<div class="large-6 large-centered columns">

				<h1>Sign In</h1>
				<p style="margin-bottom: 10px !important;">Get started finding books cheaper and faster.</p>

				<div class="row">

					<div class="large-12 columns">

						<label>EMAIL
							<input id="email" class="small-radius" type="text"  />
						</label>

					</div>

				</div>

				<div class="row">

					<div class="large-12 columns">

						<label>PASSWORD
							<input id="password" class="small-radius" type="password"  />
						</label>

					</div>

				</div>

				<div class="row">

					<div class="large-4 columns">

						<a id="submit" class="button small-radius">Sign In</a>

					</div>

					<div class="large-8 columns">

						<p style="height: 52px !important; line-height: 52px !important;">Don't have an account? <a href="../signup/">Sign up here.</a></p>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>


<script src="../js/vendor/jquery.js"></script>
<script type="text/javascript" src="../js/vendor/fastclick.js"></script>
<script type="text/javascript" src="../js/foundation.min.js"></script>


<script type="text/javascript">

$(document).ready(function() {
	Parse.initialize("AQ2Vfb0vhbBq3N6t2Aeu4fpLaZ5Xp8HI42P1fOxr", "0c6WqkXpLdtzqIlYePDnxgC0ZNMsVrD9VPshu5Mo");

	$(document).on('click', '#submit', function(e) {
		e.preventDefault();

		var em = $('#email').val();
		var ps = $('#password').val();

		Parse.User.logIn(em, ps, {
			success: function(user) {
				window.location.href = 'http://localhost:8888/action/';
			},
			error: function(user, error) {
				console.log('Login failed: ' + error.message);
			}
		})
	});

});




</script>

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