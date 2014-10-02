
$(document).ready(function() {
	$(document).on('click', '#signout', function() {
		Parse.User.logOut();
		location.reload();
	});
});
