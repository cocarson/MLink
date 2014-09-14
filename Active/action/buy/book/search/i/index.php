
<!DOCTYPE html>

<html lang="en-US">

<head>

	<title>MLink</title>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<link rel="stylesheet" type="text/css" href="../../../../../css/main.css">
	<link rel="stylesheet" type="text/css" href="../../../../../css/foundation.css">
	<link rel="stylesheet" type="text/css" href="../../../../../css/normalize.css">

	<script type="text/javascript" src="../../../../../js/vendor/modernizr.js"></script>

	<script src="../../../../../js/vendor/jquery.js"></script>

	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700' rel='stylesheet' type='text/css'>

	<script src="//www.parsecdn.com/js/parse-1.2.19.min.js"></script>

	<link rel="stylesheet" href="//assets.ziggeo.com/css/ziggeo-betajs-player.min.css" />
	<script src="//assets.ziggeo.com/js/ziggeo-jquery-json2-betajs-player.min.js"></script>
	<script>ZiggeoApi.token = "4c869a1807cc7e8495872922a824bce1";</script>

</head>

<body>


<div class="row">

	<div id="main-container" class="large-8 large-centered columns large-radius" style="background-color: white">

		<div class="row">

			<div id="left" class="large-8 columns">



			</div>

			<div id="right" class="large-4 columns">



			</div>

		</div>

	</div>

</div>

<script type="text/javascript" src="../../../../../js/vendor/fastclick.js"></script>
<script type="text/javascript" src="../../../../../js/foundation.min.js"></script>

<script type="text/javascript">

function getBook(bookId, callback) {
	var bookName;
	var bookClass;
	var bookEdition;

	var Textbook = Parse.Object.extend('Textbook');
	var query = new Parse.Query(Textbook);
	query.equalTo('objectId', bookId);
	query.first({
		success: function(book) {
			bookName = book.get('name');
			bookClass = book.get('class');
			bookEdition = book.get('edition');
			ziggeoToken = book.get('ziggeoToken');

			var div = '<h1>' + bookName + '</h1>';
			div += '<p>For: ' + bookClass + '</p>';
			div += '<p>Edition: ' + bookEdition + '</p>'; 
			div += '<ziggeo ziggeo-height="240px" ziggeo-width="320px" ziggeo-video="' + ziggeoToken + '">';

			return callback(null, div);
		},
		error: function(object, error) {
			callback(err);
		}
	});
}

function getUser(userId, callback) {

	var firstName;
	var lastName;
	var email;
	var phone;

	var User = Parse.Object.extend('User');
	var query = new Parse.Query(User);
	query.equalTo('objectId', userId);
	query.first({
		success: function(user) {
			firstName = user.get('firstName');
			lastName = user.get('lastName');
			email = user.get('email');
			phone = user.get('phoneNumber');

			var div = '<p>Seller: ' + firstName + '&nbsp;' + lastName;
			div += '<p>Email: ' + email + '</p>';
			div += '<p>Phone: ' + phone + '</p>';

			return callback(null, div);
		},
		error: function(error) {
			callback(err);
		}
	});

}

$(document).ready(function() {
	Parse.initialize("AQ2Vfb0vhbBq3N6t2Aeu4fpLaZ5Xp8HI42P1fOxr", "0c6WqkXpLdtzqIlYePDnxgC0ZNMsVrD9VPshu5Mo");

	var bookId = <?php echo json_encode($_GET['b']); ?>;
	var userId = <?php echo json_encode($_GET['u']); ?>;
	var price = <?php echo json_encode($_GET['p']); ?>;

	$('#right').append('<h1>$' + price + '</h1>');

	getBook(bookId, function (err, div) {
		if (!err) {
			console.log(div);
			$('#left').append(div);

			getUser(userId, function (err, div) {
				if (!err) {
					console.log(div);
					$('#left').append(div);
				} else {
					console.error(err);
				}
			});

		} else {
			console.error(err);
		}
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


