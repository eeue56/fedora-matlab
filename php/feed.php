<?php 

//if($_SESSION['status'] == "authorized") {

	include_once "mysqlConnection.php";
	include_once "hats.php";

	try {
	    $result = $mysqli->query("SELECT * FROM feed ORDER BY totalscore DESC LIMIT 20");

	    $html = "There are no feeds at this time"; 

	    $col_array = array('blue','orange','green','red','purple','teal');


	    if($result){
	    	$html = '';
	    }
	    $hat = new hatter("no");
	    while($row = $result->fetch_row()) {
	    	$randi = rand(0,5);
	    	$hat->changeHead($row[1]);
	    	$html .= "<div class='username'>".$row[1]." ".$hat->grabMyHat()."</div>";
	    	$html .= "<div class='post " .$col_array[$randi]. " ui segment piled'>";
		    $html .= "<div class='ui downscore left floated header scorer'>
		    			<img onclick='downboat(\"".$row[0]."\")' src='images/downboat.png' class='downboat voter' /> 
		    			<div id='".$row[0]."DOWN'>".$row[4]." 
		    			</div>
		    		</div>";
   		    $html .= "<div class='ui upscore right floated header '>
   		    			<img onclick='upboat(\"".$row[0]."\")' src='images/upboat.png' class='upboat voter' />
   		    			<div id='".$row[0]."UP'>".$row[3]."
   		    			</div>
   		    		</div>";
		    $html .= "<div class='post_text'>".$row[2]."</div>";
		    $html .= "</div>";
	    }

	    echo $html;
	    
	}
	catch (Exception $e){
	    error_log("it's broken");
	    echo "There are no feeds at this time";
	    die();
    }
//}else{
//	echo "login you tit.";
//}

?>