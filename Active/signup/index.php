<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$head = $root . '/inc/head.php';
$nav = $root . '/inc/nav.php';
include_once($head);
include_once($nav);
?>


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
<script type="text/javascript" src="/js/init_parse.js"></script>

<script type="text/javascript">

function addUser (fn, ln, em, ps, ph) {

	var User = Parse.Object.extend("User");
	var user = new User();

	user.set("firstName", fn);
	user.set("lastName", ln);
	user.set("password", ps);
	user.set("phone", parseInt(ph));
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

  	$(document).foundation();
</script>

</body>

</html>