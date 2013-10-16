function update() {
  $.get("php/feed.php", function(data) {
    $("#feed").html(data);
  });
}

function updateRepeating() {
	update();
    window.setTimeout(updateRepeating, 10000);
}

function updloadBoat(){
	
}

function upboat(feedid) {
	$.post({
	  "php/vote.php",
	  data: data,
	  direction: "up",
	  id: feedid
	}).done(update());

}

function downboat(feedid) {
	$.post({
	  "php/vote.php",
	  data: data,
	  direction: "down",
	  id:feedid
	}).done(update());
}