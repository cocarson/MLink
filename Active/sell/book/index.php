<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$head = $root . '/inc/head.php';
$nav = $root . '/inc/nav.php';
include_once($head);
include_once($nav);
?>


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

			<div class="large-8 large-centered columns" style="margin-bottom: 16px !important;">

				<input id="title" type="text" placeholder="Book Title" />

			</div>

			<div class="large-4 columns"></div>

		</div>

		<div class="row">
			
			<div class="large-8 large-centered columns">
				
				<div class="row">
					

					<div class="large-12 columns">
						
					<textarea id="description" placeholder="Describe the book condition"></textarea>

					</div>

				</div>

			</div>

		</div>

		<div class="row">
			
			<div class="large-8 large-centered columns">
				
				<div class="row">

					<div class="large-4 columns">
						<input type="radio" name="condition" value="new" id="newCond"><label for='newCond'>New</label>
					</div>
					<div class="large-4 columns">
						<input type="radio" name="condition" value="fair" id="fairCond"><label for='fairCond'>Fair</label>
					</div>
					<div class="large-4 columns">
						<input type="radio" name="condition" value="used" id="usedCond"><label for='usedCond'>Used</label>
					</div>

				</div>

			</div>

		</div>

		<div class="row">

			<div class="large-8 large-centered columns">

				<div class="row">

					<div class="large-6 columns">

						<input id="edition" type="text" placeholder="Edition" />

					</div>

					<div class="large-6 columns">

						<input id="price" type="text" placeholder="Price" />

					</div>

				</div>

			</div>

		</div>

		<div class="row">

			<div class="large-8 large-centered columns text-left">

				<a id="submit" href="#" class="button small-radius">Post Book</a>

			</div>

		</div>

	</div>

</div>


<script src="/js/vendor/jquery.js"></script>
<script type="text/javascript" src="/js/vendor/fastclick.js"></script>
<script type="text/javascript" src="/js/foundation.min.js"></script>
<script type="text/javascript" src="/js/init_parse.js"></script>
<script type="text/javascript" src="/js/signout.js"></script>

<script type="text/javascript">

function itemSell(book, user, price) {

	var ItemSell = Parse.Object.extend('ItemSell');
	var item = new ItemSell;

	item.set('textbook', book);
	item.set('cost', parseInt(price));
	item.set('user', user);
	item.set('sportsTicket', null);

	item.save(null, {
		success: function(item) {
			document.location.href = document.URL + 'search/?max=' + item.get('cost') + '&course=' + book.get('class');
		},
		error: function(item, error) {
			console.log('error: ' + error.message);
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
			console.log('success: ' + book.id);
		},
		error: function(book, error) {
			console.log('error: ' + error.message);
		}
	});

	return book;

}

function uploadBook(course, title, edition, price, desc, cond) {

	var Textbook = Parse.Object.extend('Textbook');
	var book = new Textbook;

	book.set('class', course);
	book.set('title', title);
	book.set('edition', edition);
	book.set('price', price);
	book.set('description', desc);
	book.set('condition', cond);
	book.set('user', Parse.User.current());
	book.set('selling', true);

	book.save(null, {
		success: function(book) {
			console.log('success: ' + book.id);
		}, 
		error: function(book, error) {
			console.log('error: ' + error.message);
		}
	})

}

$(document).ready(function() {

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
		var price = parseInt($('#price').val());
		var desc = $('#description').val();
		var cond = $('input[name="condition"]:checked').val();

		uploadBook(s + n, title, edition, price, desc, cond);
	});

});

</script>


<script>

  	$(document).foundation({

	});
</script>

</body>

</html>


