var user_response = new Array();

var register_user = function() {

	var user_details = {

		username: $("#username").val(),
		password: $("#password").val(),
		email: $("#email").val()
	}

	user_response.push(user_details);
	console.log(user_details);

	var json = JSON.stringify(user_response);

	$.ajax({
		url:"php/register.php",
		type:"POST",
		data: {
			user_details: json
		},
		success:function (data) {
			window.location.href = "index.php"
		}
	});
}