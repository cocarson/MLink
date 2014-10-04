
<?php

$root = $_SERVER['DOCUMENT_ROOT'];
$head = $root . '/inc/head.php';
$nav = $root . '/inc/nav.php';
include_once($head);
include_once($nav);

?>


<div class="row">

	<div id="main-container" class="large-8 large-centered columns light-background large-radius">

		<h1>Select Your Book</h1>

	</div>

</div>

<script src="/js/vendor/jquery.js"></script>
<script type="text/javascript" src="/js/init_parse.js"></script>
<script type="text/javascript" src="/js/signout.js"></script>
<script type="text/javascript" src="/js/user_signed_in.js"></script>
<script type="text/javascript" src="../../../js/vendor/fastclick.js"></script>
<script type="text/javascript" src="../../../js/foundation.min.js"></script>

<script type="text/javascript">
/*
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


}*/

function showBook(book) {

	var div = '<div class="row book medium-radius">';
	div += '<div class="large-8 columns">';
	div += '<h3>' + book.get("title") + '</h3>';
	div += '<p>Class: ' + book.get("class") + '</p>';
	div += '<p>Edition: ' + book.get("edition") + '</p>';
	div += '</div>';
	div += '<div class="large-3 columns text-centered">';
	div += '<ul class="large-block-grid-1>"';
	div += '<li style="margin-bottom:0 !important;"><h3 style="margin-bottom:10px !important;">$' + book.get("price") + '</h3></li>';
	div += '<li><a price="' + book.get('price') + '" href="#" style="margin-bottom:0 !important;" class="button small small-radius">Buy</a></li>';
	div += '</ul>';
	div += '</div>';
	div += '</div>';

	$('#main-container').append(div);
}

$(document).ready(function() {

	var price = <?php echo json_encode($_GET['p']); ?>;
	var course = <?php echo json_encode($_GET['c']); ?>;

	var Textbook = Parse.Object.extend('Textbook');

	var query = new Parse.Query(Textbook);
	query.lessThanOrEqualTo('price', parseInt(price));
	query.equalTo('class', course);
	query.equalTo('selling', true);

	query.find({
		success: function(results) {
			for (var i = 0; i < results.length; i++) { 
				var object = results[i];
				console.log(object);
				showBook(object);
		    }
		},
		error: function(error) {
			console.log("Error: " + error.code + " " + error.message);
		}
	});

});

	</script>

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


