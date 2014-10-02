
<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$head = $root . '/inc/head.php';
$nav = $root . '/inc/nav.php';
include_once($head);
include_once($nav);
?>

<div class="row">

	<div id="main-container" class="large-9 large-centered columns light-background large-radius text-centered">

		<h1>Do you want to buy or sell?</h1>

			<div class="row small-margin">

				<div class="large-5 large-centered columns text-centered">

					<a id="buy" href="../buy" style="margin-right:40px !important" class="button small-radius">Buy</a>

					<a id="sell" href="../sell" class="button small-radius">Sell</a>
					
				</div>

			</div>

		</div>

	</div>

</div>


<script src="../js/vendor/jquery.js"></script>
<script type="text/javascript" src="../js/vendor/fastclick.js"></script>
<script type="text/javascript" src="../js/foundation.min.js"></script>
<script type="text/javascript" src="/js/init_parse.js"></script>
<script type="text/javascript" src="/js/signout.js"></script>

<script>
  	$(document).foundation();
</script>

</body>

</html>


