
<?php 
$root = 'http://localhost:8888';
?>

<nav class="row">

	<div class="large-10 columns">

		<a href="#"><img src="<?php echo $root; ?>/img/logo-dark.png" style="height: 40px !important; margin-top: 10px;"></a>

	</div>

	<div class="large-2 columns text-centered" style="padding: 15px 0 !important">

		<script type="text/javascript">
		Parse.initialize("Hv2s5UNlCaykyL5JxX5EIGYaxQrXAV6Ci2W6TikL", "KI2ddu2z8Nxmsg3BX7Njgrg1sVJgaR2YITEG404e");
		var currentUser = Parse.User.current();
		if (currentUser) {
			document.write('<a id="signout" href="#">Sign Out</a>');
		} else {
			document.write('<a id="signin" href="/signin/">Sign In</a>');
		}

		</script>

	</div>

</nav>	