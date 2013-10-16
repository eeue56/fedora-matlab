function update() {
  $.get("php/feed.php", function(data) {
    $("#feed").html(data);
    window.setTimeout(update, 10000);
  });
}

upboat(feedid) {
	$.post({
	  "php/vote.php",
	  data: data,
	  direction: "up",
	  id: feedid
	}).done(update());

}

downboat(feedid) {
	$.post({
	  "php/vote.php",
	  data: data,
	  direction: "down",
	  id:feedid
	}).done(update());
}