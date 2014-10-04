
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


<script src="../../js/vendor/jquery.js"></script>
<script type="text/javascript" src="../../js/vendor/fastclick.js"></script>
<script type="text/javascript" src="../../js/foundation.min.js"></script>
<script type="text/javascript" src="/js/init_parse.js"></script>
<script type="text/javascript" src="/js/signout.js"></script>
<script type="text/javascript" src="/js/user_signed_in.js"></script>

<script type="text/javascript">

function uploadBook(course, title, edition, price) {
	var Textbook = Parse.Object.extend('Textbook');
	var book = new Textbook();

	var user = Parse.User.current();
	var relation = book.relation("userId");
	relation.add(user);

	book.set('class', course);
	book.set('title', title);
	book.set('edition', edition);
	book.set('price', parseInt(price));
	book.set('selling', false);

	book.save(null, {
		success: function(book) {
			document.location.href = document.URL + 'search/?p=' + price + '&c=' + course;
		},
		error: function(book, error)  {
			console.log('error: ' + error.message);
		}
	});
}

$(document).ready(function() {

	$('#school').change(function() {

		var d = $('#school').find(':selected').val();
		if (d) {
			$(document).on('change', '#school', function() {
				$('#subject-div').load('../../ajax/new_college.php', {college: d});
			});
		}
	});

	$(document).on('change', '#subject', function() {
		var d = $('#school').find(':selected').val();
		var e = $('#subject').find(':selected').val();
		$('#course-div').load('../../ajax/new_subject.php', {college: d, subject: e});
	});

	$(document).on('click', '#submit', function(e) {
		e.preventDefault();
		var s = $('#subject').val();
		var n = $('#course').val();
		var title = $('#title').val();
		var edition = $('#edition').val();
		var max = parseInt($('#max').val());

		var course = s + n;
		uploadBook(course, title, edition, max);
	});

});

</script>


<script>
  	$(document).foundation();
</script>

</body>

</html>


