var register_user = function() {

	var user_details = {

		username: $("#username").text(),
		password: $("#password").text(),
		email: $("#email").text()
	}

	console.log(user_details);

	var json = JSON.stringify(user_details);

	$.ajax({
		url:"register.php",
		type:"POST",
		data {
			user_details: json
		};
		success:function (data) {
			console.log(data);
			window.location.href = "success.html"
		}
	});
}