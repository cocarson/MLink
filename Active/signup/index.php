

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

	<div class="large-10 columns">

		<a href="#"><img src="../img/logo-dark.png" style="height: 40px !important; margin-top: 10px;"></a>

	</div>

	<div class="large-2 columns text-centered" style="padding: 15px 0 !important">


		<script type="text/javascript">
		Parse.initialize("AQ2Vfb0vhbBq3N6t2Aeu4fpLaZ5Xp8HI42P1fOxr", "0c6WqkXpLdtzqIlYePDnxgC0ZNMsVrD9VPshu5Mo");

		var currentUser = Parse.User.current();

		if (currentUser) {
			document.write('<a id="signout" href="#">Sign Out</a>');
		}

		</script>

	</div>

</nav>	

<div class="row">

	<div id="main-container" class="large-12 columns light-background large-radius" style="margin-top: 0 !important">

		<div class="row">

			<div class="large-6 large-centered columns">

				<h1>Sign Up</h1>
				<p style="margin-bottom: 10px !important;">Get started finding books cheaper and faster.</p>

				<div class="row">

					<div class="large-12 columns">

						<label>FIRST NAME
							<input id="firstName" class="small-radius" type="text" />
						</label>

					</div>

				</div>

				<div class="row">

					<div class="large-12 columns">

						<label>LAST NAME
							<input id="lastName" class="small-radius" type="text"/>
						</label>
						
					</div>

				</div>

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

					<div class="large-12 columns">

						<label>PHONE
							<input id="phoneNumber" class="small-radius" type="text"  />
						</label>

					</div>

				</div>

				<div class="row">

					<div class="large-4 columns">

						<a id="submit" class="button small-radius">Submit</a>

					</div>

					<div class="large-8 columns">

						<p style="height: 52px !important; line-height: 52px !important;">Already have an account? <a href="../signin/">Sign in here.</a></p>

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

function addUser (fn, ln, em, ps, ph) {

	Parse.initialize("AQ2Vfb0vhbBq3N6t2Aeu4fpLaZ5Xp8HI42P1fOxr", "0c6WqkXpLdtzqIlYePDnxgC0ZNMsVrD9VPshu5Mo");

	var User = Parse.Object.extend("User");
	var user = new User();

	user.set("firstName", fn);
	user.set("lastName", ln);
	user.set("password", ps);
	user.set("phoneNumber", ph);
	user.set("email", em);
	user.set("username", em);

	user.signUp(null, {
		success: function(user) {
			document.location.href = 'http://localhost:8888/action/';
		}, 
		error: function(user, error) {
			console.log('failed:' + error.message);
		}
	});	

}

$(document).ready(function() {

	$(document).on('click', '#submit', function(e) {
		e.preventDefault();

		var fn = $('#firstName').val();
		var ln = $('#lastName').val();
		var em = $('#email').val();
		var ps = $('#password').val();
		var ph = $('#phoneNumber').val();

		addUser(fn, ln, em, ps, ph);
	});

	$(document).on('click', '#signout', function(e) {
		e.preventDefault();

		Parse.User.logOut();
		location.reload();
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