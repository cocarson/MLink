<?php

$root = $_SERVER['DOCUMENT_ROOT'];
$head = $root . '/inc/head.php';
$nav = $root . '/inc/nav.php';
include_once($head);
include_once($nav);

?>



<div class="row">

	<div id="main-container" class="large-8 large-centered columns light-background large-radius">

		<h1>Select Your Ticket</h1>

		<script type="text/javascript">

		function createTicketDiv(itemSell, callback) {

			var ticketId = itemSell.get('sportsTicket').id;
			var userId = itemSell.get('user').id;

			var div = '<div class="row book medium-radius">';

			div += '<div class="large-8 columns">';
			
			var SportsTicket = Parse.Object.extend('SportsTicket');
			var query = new Parse.Query(SportsTicket);
			query.equalTo('objectId', ticketId);
			query.first({
				success: function(object) {
					console.log(object);

					div += '<h3>' + object.get("game") + ' - ' + object.get("date").toLocaleDateString() + '</h3>';
					div += '<p>Section: ' + object.get("section") + '</p>';
					div += '<p>Row: ' + object.get("row") + '</p>';
					div += '<p>Seat: ' + object.get("seat") + '</p>';
					div += '</div>';
					div += '<div class="large-3 columns text-centered">';
					div += '<ul class="large-block-grid-1>"';
					div += '<li style="margin-bottom:0 !important;"><h3 style="margin-bottom:10px !important;">$' + itemSell.get("cost") + '</h3></li>';
					div += '<li><a price="' + itemSell.get('cost') + '" user="' + userId +'"ticket="' + ticketId + '" href="#" style="margin-bottom:0 !important;" class="button small small-radius">Buy</a></li>';
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
			var game = <?php echo json_encode($_GET['game']); ?>;

			var ItemSell = Parse.Object.extend('ItemSell');
			var SportsTicket = Parse.Object.extend('SportsTicket');

			var innerQuery = new Parse.Query(SportsTicket);
			innerQuery.equalTo('game', game);

			var query = new Parse.Query(ItemSell);
			query.lessThan('cost', parseInt(maxPay));	
			
			query.exists('sportsTicket');

			query.matchesQuery('sportsTicket', innerQuery);
			query.find({
				success: function(results) {
					for (var i = 0; i < results.length; i++) { 
						var object = results[i];
						createTicketDiv(object, function (err, div) {
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
					alert("Error: " + error.code + " " + error.message);
				}
			});

		});

		</script>

	</div>

</div>

<script type="text/javascript" src="../../../js/vendor/fastclick.js"></script>
<script type="text/javascript" src="../../../js/foundation.min.js"></script>
<script type="text/javascript" src="/js/init_parse"></script>

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

  	$(document).foundation();
</script>

</body>

</html>


