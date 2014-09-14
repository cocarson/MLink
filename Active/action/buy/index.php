
<!DOCTYPE html>

<html lang="en-US">

<head>

	<title>MLink</title>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<link rel="stylesheet" type="text/css" href="../../css/main.css">
	<link rel="stylesheet" type="text/css" href="../../css/foundation.css">
	<link rel="stylesheet" type="text/css" href="../../css/normalize.css">

	<script type="text/javascript" src="../../js/vendor/modernizr.js"></script>

	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700' rel='stylesheet' type='text/css'>


</head>

<body>

<nav class="row">

	<div class="large-12 columns">

		<img src="../../img/logo-dark.png" style="height: 40px !important; margin-top: 10px;">

	</div>

</nav>

<div class="row">

	<div id="main-container" class="large-9 large-centered columns light-background large-radius text-centered">

		<h1>What are you looking for?</h1>

				<div class="row small-margin">

					<div class="large-6 large-centered columns text-centered">

						<a id="books" style="margin-right:40px !important" href="#" class="button small-radius">Books</a>

						<a href="#" class="button small-radius">Tickets</a>
						
					</div>

					<div id="tickets" class="large-6 columns"></div>

				</div>

		</div>

	</div>

</div>


<script src="../../js/vendor/jquery.js"></script>
<script type="text/javascript" src="../../js/vendor/fastclick.js"></script>
<script type="text/javascript" src="../../js/foundation.min.js"></script>

<script type="text/javascript">

$(document).ready(function() {

	$(document).on('click', '.button', function(e) {

		e.preventDefault();
		if ($(this).attr('id') == 'books') {
			document.location.href = document.URL + 'book/';
		} else {}

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


