var user_post = new Array();

var upload_post = function() {

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
			window.location.href = "index.php"
		}
	});
}