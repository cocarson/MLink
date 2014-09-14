
<?php

include '../../../../api.php';

$data = 0;

$url = 'https://api-gw.it.umich.edu/Curriculum/SOC/v1/Terms/2010/Schools';
$class = new UMapis;
$json = $class->call_api($url);
$data = json_decode($json);

?>

<!DOCTYPE html>

<html lang="en-US">

<head>

	<title>MLink</title>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<link rel="stylesheet" type="text/css" href="../../../../css/main.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/foundation.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/normalize.css">

	<script type="text/javascript" src="../../../../js/vendor/modernizr.js"></script>

	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700' rel='stylesheet' type='text/css'>

	<script src="//www.parsecdn.com/js/parse-1.2.19.min.js"></script>

	<script src="../../../../js/vendor/jquery.js"></script>

</head>

<body>


<div class="row">

	<div id="main-container" class="large-8 large-centered columns light-background large-radius">

		<h1>Select Your Book</h1>

		<script type="text/javascript">

		function createBookDiv(itemSell, callback) {

			var bookId = itemSell.get('textbook').id;
			var userId = itemSell.get('user').id;

			var div = '<div class="row book medium-radius">';

			div += '<div class="large-8 columns">';
			
			var Textbook = Parse.Object.extend('Textbook');
			var query = new Parse.Query(Textbook);
			query.equalTo('objectId', bookId);
			query.first({
				success: function(object) {
					console.log(object);

					div += '<h3>' + object.get("name") + '</h3>';
					div += '<p>Class: ' + object.get("class") + '</p>';
					div += '<p>Edition: ' + object.get("edition") + '</p>';
					div += '</div>';
					div += '<div class="large-3 columns text-centered">';
					div += '<ul class="large-block-grid-1>"';
					div += '<li style="margin-bottom:0 !important;"><h3 style="margin-bottom:10px !important;">$' + itemSell.get("cost") + '</h3></li>';
					div += '<li><a price="' + itemSell.get('cost') + '" user="' + userId +'"book="' + bookId + '" href="#" style="margin-bottom:0 !important;" class="button small small-radius">Buy</a></li>';
					div += '</ul>';
					div += '</div>';
					div += '</div>';
					
					return callback(null, div);
				},
				error: function(object, error) {
					callback(err);
				}
			});


		}

		$(document).ready(function() {

			var maxPay = <?php echo json_encode($_GET['max']); ?>;
			var course = <?php echo json_encode($_GET['course']); ?>;

			Parse.initialize("AQ2Vfb0vhbBq3N6t2Aeu4fpLaZ5Xp8HI42P1fOxr", "0c6WqkXpLdtzqIlYePDnxgC0ZNMsVrD9VPshu5Mo");

			var ItemSell = Parse.Object.extend('ItemSell');
			var Textbook = Parse.Object.extend('Textbook');

			var innerQuery = new Parse.Query(Textbook);
			innerQuery.equalTo('class', course);

			var query = new Parse.Query(ItemSell);
			query.lessThan('cost', parseInt(maxPay));	
			
			query.exists('textbook');

			query.matchesQuery('textbook', innerQuery);
			query.find({
				success: function(results) {
					for (var i = 0; i < results.length; i++) { 
						var object = results[i];
						createBookDiv(object, function (err, div) {
							if (!err) {
								console.log(div);
								$('#main-container').append(div);
							} else {
								console.error(err);
							}
						});
				    }
				},
				error: function(error) {
					console.log("Error: " + error.code + " " + error.message);
				}
			});

		});

		</script>

	</div>

</div>

<script type="text/javascript" src="../../../../js/vendor/fastclick.js"></script>
<script type="text/javascript" src="../../../../js/foundation.min.js"></script>


<script type="text/javascript">

$(document).ready(function() {

	$(document).on('click', '.button', function(e) {
		e.preventDefault();
		var b = $(this).attr('book');
		var u = $(this).attr('user');
		var c = $(this).attr('price');
		window.location.href = 'http://localhost:8888/action/buy/book/search/i/?b=' + b + '&u=' + u + '&p=' + c;
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


