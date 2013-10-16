function update() {
  $.get("php/feed.php", function(data) {
    $("#feed").html(data);
    window.setTimeout(update, 10000);
  });
}

upboat(feedid) {
	$.ajax({
	  type: "POST",
	  url: "php/vote.php",
	  direction: "up",
	  id: feedid
	});
}

downboat(feedid) {
	$.ajax({
	  type: "POST",
	  url: "php/vote.php",
	  direction: "down",
	  id:feedid
	});
}