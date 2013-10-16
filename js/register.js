var register_user = function() {

	var user_details = {

		username: $("#username").val(),
		password: $("#password").val(),
		email: $("#email").val()
	}

	console.log(user_details);

	var json = JSON.stringify(user_details);

	$.ajax({
		url:"register.php",
		type:"POST",
		data: {
			user_details: json
		},
		success:function (data) {
			//window.location.href = ""
		}
	});
}