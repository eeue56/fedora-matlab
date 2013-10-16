<?php $_SESSION['username'] = 'herpaderp' ?>
<html>
	<head>
		<script src='js/main.js' ></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.3.4/css/semantic.min.css"></link>
        <link rel="stylesheet" href="css/global.css"></link>
	</head>
	<body>
		<div id="top_bar">
			<div id= "user">
				User: <?php echo $_SESSION['username']; ?>
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

		<div id="feed" class="feed">

		</div>

		<!--JABASCRIPTS -->
		<script type="text/javascript" src="http://codeorigin.jquery.com/jquery-2.0.3.min.js"></script>

	</body>
</html>
