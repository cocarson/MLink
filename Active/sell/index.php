
<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$head = $root . '/inc/head.php';
$nav = $root . '/inc/nav.php';
include_once($head);
include_once($nav);
?>

<div class="row">

	<div id="main-container" class="large-9 large-centered columns light-background large-radius text-centered">

		<h1>What are you looking for?</h1>

				<div class="row small-margin">

					<div class="large-6 large-centered columns text-centered">

						<a id="books" href="#" style="margin-right:40px !important" class="button small-radius">Books</a>

						<a href="#" class="button small-radius">Tickets</a>

					</div>

					<div id="tickets" class="large-6 columns"></div>

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
  	$(document).foundation();
</script>

</body>

</html>


