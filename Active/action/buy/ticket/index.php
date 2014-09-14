
<?php

include '../../../api.php';

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

	<link rel="stylesheet" type="text/css" href="../../../css/main.css">
	<link rel="stylesheet" type="text/css" href="../../../css/foundation.css">
	<link rel="stylesheet" type="text/css" href="../../../css/normalize.css">

	<script type="text/javascript" src="../../../js/vendor/modernizr.js"></script>

	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700' rel='stylesheet' type='text/css'>

	<script src="//www.parsecdn.com/js/parse-1.2.19.min.js"></script>

</head>

<body>



<div class="row">

	<div id="main-container" class="large-8 large-centered columns light-background large-radius text-centered">

		<h1 style="margin-bottom: 15px !important;">Find Your Ticket</h1>

		<div class="row">

			<div class="large-8 large-centered columns" style="margin-bottom: 16px !important;">

				<select id="games">



				</select>

			</div>

		</div>

		<div class="row">

			<div class="large-8 large-centered columns">

				<input id="max" type="text" placeholder="Max Price" />

			</div>

		</div>

		<div class="row">

			<div class="large-8 large-centered columns text-left">

				<a id="submit" href="#" class="button small-radius">Search Tickets</a>

			</div>

		</div>

	</div>

</div>


<script src="../../../js/vendor/jquery.js"></script>
<script type="text/javascript" src="../../../js/vendor/fastclick.js"></script>
<script type="text/javascript" src="../../../js/foundation.min.js"></script>

<script type="text/javascript">

Parse.initialize("AQ2Vfb0vhbBq3N6t2Aeu4fpLaZ5Xp8HI42P1fOxr", "0c6WqkXpLdtzqIlYePDnxgC0ZNMsVrD9VPshu5Mo");

var options = '';

var FootballGames = Parse.Object.extend('FootballGames');
var query = new Parse.Query(FootballGames);
query.find({
	success: function(results) {
		for (var i = 0; i < results.length; i++) {
			var object = results[i];
			options += ('<option>' + object.get('game') + ' - ' + object.get('date').toLocaleDateString() + '</option>');
		}
		$('#games').append(options);
	},
	error: function(results, error) {
		alert('error: ' + error.message);
	}
})

</script>

<script type="text/javascript">

function itemBuy(ticket, user, maxPrice) {

	var ItemBuy = Parse.Object.extend('ItemBuy');
	var item = new ItemBuy;

	item.set('textbook', null);
	item.set('maxPay', parseInt(maxPrice));
	item.set('user', user);
	item.set('sportsTicket', ticket);

	item.save(null, {
		success: function(item) {
			document.location.href = document.URL + 'search/?max=' + item.get('maxPay') + '&game=' + ticket.get('game');
		},
		error: function(item, error) {
			console.log('buy error: ' + error.message);
		}
	});

}

function ticket(game, date) {

	var d = new Date(date);

	var SportsTicket = Parse.Object.extend('SportsTicket');
	var ticket = new SportsTicket();
	ticket.set('game', game);
	ticket.set('date', d);
	ticket.set('section', null);
	ticket.set('row', null);
	ticket.set('seat', null);

	ticket.save(null, {
		success: function(ticket) {
			alert('success: ' + ticket.id);
		},
		error: function(ticket, error) {
			alert('error: ' + error.message);
		}
	});

	return ticket;

}

$(document).ready(function() {
	Parse.initialize("AQ2Vfb0vhbBq3N6t2Aeu4fpLaZ5Xp8HI42P1fOxr", "0c6WqkXpLdtzqIlYePDnxgC0ZNMsVrD9VPshu5Mo");

	$(document).on('click', '#submit', function(e) {
		e.preventDefault();

		var arr = $('#games').val().split(/\s*\-\s*/g);
		var price = $('#max').val();

		var t = ticket(arr[0], arr[1]);
		var user = Parse.User.current();

		itemBuy(t, user, price);
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


