

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
			document.write('<a id="signout" href="#">' + currentUser.get('firstName') + ' ' + currentUser.get('lastName') + '</a>');
		}

		</script>

	</div>

</nav>	

<section class="row">
	
	<div class="large-8 large-centered columns">

		<h1>Buying</h1>

		<div id="buying">
			


		</div>

		<h1>Selling</h1>

		<div id="selling">
			

		</div>

	</div>

</section>


<script src="../js/vendor/jquery.js"></script>
<script type="text/javascript" src="../js/vendor/fastclick.js"></script>
<script type="text/javascript" src="../js/foundation.min.js"></script>

<script type="text/javascript">

function fillBuyDiv(item, callback) {

	var div = '<div class="row book medium-radius">';
	div += '<div class="large-8 columns">';

	if (item.get('textbook')) {
		var bookId = item.get('textbook').id;
		console.log('id: ' + bookId);
		var Textbook = Parse.Object.extend('Textbook');
		var query = new Parse.Query(Textbook);
		query.equalTo('objectId', bookId);
		query.first({
			success: function(object) {
				console.log(object);

				div += '<h3>' + object.get('class') + ': ' + object.get('name') + '</h3>';
				div += '<p>Edition: ' + object.get('edition') + '</p>';
				div += '<p>Less than: ' + item.get('maxPay') + '</p>';
				div += '</div>';
				div += '<div class="large-3 columns text-centered">';
				div += '<ul class="large-block-grid-1>"';
				div += '<li><a id="remove-book" item="' + item.id + '" book="' + object.id +' style="margin-bottom:0 !important;" class="button small small-radius">Remove</a></li>';
				div += '</ul>';
				div +='</div>';
				div +='</div>';

				return callback(null, div);
			}, 
			error: function(object, error) {
				callback(err);
			}
		});
	} 

}
	
$(document).ready(function() {
	Parse.initialize("AQ2Vfb0vhbBq3N6t2Aeu4fpLaZ5Xp8HI42P1fOxr", "0c6WqkXpLdtzqIlYePDnxgC0ZNMsVrD9VPshu5Mo");

	user = Parse.User.current();

	var ItemBuy = Parse.Object.extend("ItemBuy");
	var Textbook = Parse.Object.extend("Textbook");

	var innerquery = new Parse.Query(Textbook);

	var query = new Parse.Query(ItemBuy);

	query.containedIn('objectId', user.get('Buying'));

	query.find({
		success: function(results) {
			console.log("Successfully retrieved " + results.length + " scores.");

			for (var i = 0; i < results.length; i++) { 
				var object = results[i];
				fillBuyDiv(object, function(err, div) {
					if (!err) {
						console.log(div);
						$('#buying').append(div);
					} else {
						console.error(err);
					}
				})
			}
		},
		error: function(error) {
			console.log("Error: " + error.code + " " + error.message);
		}
	});

});

</script>

<script>

  	$(document).foundation({

	});
</script>

</body>

</html>