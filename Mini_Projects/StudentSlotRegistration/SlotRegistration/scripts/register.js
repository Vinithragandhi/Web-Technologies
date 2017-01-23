var $ = function(id) {
	return document.getElementById(id);
};
function loadPage(userPresent,timing){
	if(userPresent == 1){
		if(!confirm('You have already booked a slot on '+timing+'. Do you want to change it')){
			window.location = "index.php";
		}
	}
}
