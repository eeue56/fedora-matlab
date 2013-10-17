<?php 
require_once 'php/Membership.php';
$membership = New Membership();

$membership->confirm_Member();
?>
<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.3.4/css/semantic.min.css"></link>
        <link rel="stylesheet" href="css/global.css"></link>
	</head>
	<body onLoad="updateRepeating()">
		<div id="top_bar">
			<div id= "user">
				User: <?php echo $_SESSION['username']; ?> <a href="login.php?status=loggedout">(Log Out)</a>
			</div>
		</div>

		<!--<img src='http://botops.net/images/Under-Construction.gif' /> -->
		<div id="something_else">
			<div  class="ui small form segment piled make-post">
				<input id="posttext" type="text" placeholder="Write your own boats!"/>
				<br />
				<div id="submit_post" class="ui button blue" onclick="uploadBoat()">post</div>
			</div>
		</div>

		<div class="ui modal">
		  <i class="close icon"></i>
		  <div class="header">
		    Thank you for the postings!
		  </div>
		</div>


		<div id="feed" class="ui small segment piled">

		</div>

		<!--JABASCRIPTS -->
		<script src='js/main.js' ></script>
		<script type="text/javascript" src="http://codeorigin.jquery.com/jquery-2.0.3.min.js"></script>
		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.3.4/javascript/semantic.min.js"></script>

	</body>
</html>
