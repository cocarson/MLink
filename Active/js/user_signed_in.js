

$(document).ready(function() {
	
	Parse.initialize("AQ2Vfb0vhbBq3N6t2Aeu4fpLaZ5Xp8HI42P1fOxr", "0c6WqkXpLdtzqIlYePDnxgC0ZNMsVrD9VPshu5Mo");
	console.log(Parse.User.current());
	if (!Parse.User.current()) {
		alert('You must be signed in to search for books.');
		//document.location.href = '/';
	}
});
