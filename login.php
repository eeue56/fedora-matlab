<?php
    require_once "php/Membership.php";
    $membership = new Membership();

    if(isset($_GET['status']) && $_GET['status'] == 'loggedout') {
        $membership->log_User_Out();
    }

    if($_POST && !empty($_POST['username']) && !empty($_POST['pwd'])) {
        $response = $membership->validate_User($_POST['username'],crypt($_POST['pwd'],$_POST['username']));
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.3.4/css/semantic.min.css"></link>
        <link rel="stylesheet" href="css/global.css"></link>
    </head>
    <body>

    	<br />
    	<br />

        <div id="login_form">

        <h1> Login!</h1>
        <form type="post" action="">
        	<div class="ui small form segment piled">
                <h2> Please enter your details below. </h2>
        		<div class="field">
        			<label>Username</label>
        			<input type="text" id="username">
        		</div>

        		<div class="field">
        			<label>Password</label>
        			<input type="text" id="password">
        		</div>

                <div class="inline ui buttons">
                    <div class="ui button">Cancel</div>
                    <div class="or"></div>
                    <button type="submit" id="submit" name="submit">Submit</button>
                </div>


        	</div>
        </form>
        </div>
        <?php if(isset($reponse)) echo "you suck balls " . $response ?>

        <!--Load scripts-->
        <script type="text/javascript" src="http://codeorigin.jquery.com/jquery-2.0.3.min.js"></script> 
        <script type="text/javascript" src="js/register.js"></script>     
    </body>
</html>