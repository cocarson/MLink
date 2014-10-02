<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$head = $root . '/inc/head.php';
$nav = $root . '/inc/nav.php';
include_once($head);
include_once($nav);
?>


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
<script type="text/javascript" src="/js/init_parse.js"></script>
<script type="text/javascript" src="/js/signout.js"></script>

<script type="text/javascript">

$(document).ready(function() {

	$(document).on('click', '#submit', function(e) {
		e.preventDefault();

		var em = $('#email').val();
		var ps = $('#password').val();

		Parse.User.logIn(em, ps, {
			success: function(user) {
				window.location.href = <?php echo json_encode($root); ?> + '/action/';
			},
			error: function(user, error) {
				console.log('Login failed: ' + error.message);
			}
		})
	});

});




</script>

<script>

  	$(document).foundation();
</script>

</body>

</html>