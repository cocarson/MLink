
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

		<h1 style="margin-bottom: 15px !important;">Select Your Book</h1>

		<div class="row">

			<div class="large-8 large-centered columns" style="margin-bottom: 16px !important;">

				<div id="school-div">

				<?php 

				echo '<select id="school">';

				foreach ($data->getSOCSchoolsResponse->School as $school) {
					echo '<option value="' . $school->SchoolCode . '">' . $school->SchoolDescr . '</option>';
				}
					
				echo '</select>';

				?>
				</div>

			</div>

		</div>

		<div class="row">

			<div class="large-8 large-centered columns" style="margin-bottom: 16px !important;">

				<div id="subject-div">
					<select id="subject">
						<option>Please select a school</option>
					</select>
				</div>

			</div>

		</div>

		<div class="row">

			<div class="large-8 large-centered columns" style="margin-bottom: 16px !important;">

				<div id="course-div">
				<select id="course">
					<option>Please select a subject</option>
				</select>
				</div>

			</div>

		</div>

		<div class="row">

			<div class="large-8 large-centered columns">

				<input id="title" type="text" placeholder="Book Title" />

			</div>

		</div>

		<div class="row">

			<div class="large-8 large-centered columns">

				<div class="row">

					<div class="large-6 columns">

						<input id="edition" type="text" placeholder="Edition" />

					</div>

					<div class="large-6 columns">

						<input id="max" type="text" placeholder="Max Price" />

					</div>

				</div>

			</div>

		</div>

		<div class="row">

			<div class="large-8 large-centered columns text-left">

				<a id="submit" href="#" class="button small-radius">Search Books</a>

			</div>

		</div>

	</div>

</div>


<script src="../../../js/vendor/jquery.js"></script>
<script type="text/javascript" src="../../../js/vendor/fastclick.js"></script>
<script type="text/javascript" src="../../../js/foundation.min.js"></script>


<script type="text/javascript">

function itemBuy(book, user, maxPrice) {

	var ItemBuy = Parse.Object.extend('ItemBuy');
	var item = new ItemBuy;

	item.set('textbook', book);
	item.set('maxPay', parseInt(maxPrice));
	item.set('user', user);
	item.set('sportsTicket', null);

	item.save(null, {
		success: function(item) {
			document.location.href = document.URL + 'search/?max=' + item.get('maxPay') + '&course=' + book.get('class');
		},
		error: function(item, error) {
			console.log('buy error: ' + error.message);
		}
	});

}

function book(s, n, title, edition) {

	var course = s + n;

	var Textbook = Parse.Object.extend('Textbook');
	var book = new Textbook();
	book.set('class', course);
	book.set('name', title);
	book.set('edition', parseInt(edition));

	book.save(null, {
		success: function(book) {
			alert('success: ' + book.id);
		},
		error: function(book, error) {
			alert('error: ' + error.message);
		}
	});

	return book;

}

$(document).ready(function() {
	Parse.initialize("AQ2Vfb0vhbBq3N6t2Aeu4fpLaZ5Xp8HI42P1fOxr", "0c6WqkXpLdtzqIlYePDnxgC0ZNMsVrD9VPshu5Mo");

	$('#school').change(function() {

		var d = $('#school').find(':selected').val();
		if (d) {
			$(document).on('change', '#school', function() {
				$('#subject-div').load('../../../ajax/new_college.php', {college: d});
			});
		}
	});

	$(document).on('change', '#subject', function() {
		var d = $('#school').find(':selected').val();
		var e = $('#subject').find(':selected').val();
		$('#course-div').load('../../../ajax/new_subject.php', {college: d, subject: e});
	});

	$(document).on('click', '#submit', function(e) {
		e.preventDefault();
		var s = $('#subject').val();
		var n = $('#course').val();
		var title = $('#title').val();
		var edition = $('#edition').val();
		var max = parseInt($('#max').val());

		var b = book(s, n, title, edition);
		var user = Parse.User.current();

		itemBuy(b, user, max);
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


