function update() {
  $.get("php/feed.php", function(data) {
    $("#feed").html(data);
  });
}

function updateRepeating() {
	update();
    //window.setTimeout(updateRepeating, 10000);
}

function uploadBoat(){

	var user_post = new Array();

	var post_details = {
		posttext: $("#posttext").val(),
	}

	user_post.push(post_details);
	console.log(post_details);

	var json = JSON.stringify(user_post);

	$.ajax({
		url:"php/post.php",
		type:"POST",
		data: {
			post_details: json
		},
		success:function (data) {
			//window.location.href = "index.php"
			$("#posttext").val("");
			$('.ui.modal').modal('show');
			update();

		}
	});
}

function upboat(feedid) {
	$.ajax({
		url:"php/vote.php",
		type:"POST",
		data: {
			direction: "up",
			id: feedid
		},
		success:function (data) {
			//window.location.href = "index.php"
			console.log(data);
			$("#"+feedid+"UP").html(parseInt($("#"+feedid+"UP").html()) + 1)
	}
});


}

function downboat(feedid) {
	$.ajax({
		url:"php/vote.php",
		type:"POST",
		data: {
			direction: "down",
			id: feedid
		},
		success:function (data) {
			//window.location.href = "index.php"
			console.log(data);
			$("#"+feedid+"DOWN").html(parseInt($("#"+feedid+"DOWN").html()) + 1)
	}
});
}