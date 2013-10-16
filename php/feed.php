<?php 

//if($_SESSION['status'] == "authorized") {

	include_once "mysqlConnection.php";

	try {
	    $result = $mysqli->query("SELECT * FROM feed ORDER BY totalscore DESC LIMIT 20");

	    $html = "There are no feeds at this time"; 

	    if($result){
	    	$html = '';
	    }

	    while($row = $result->fetch_row()) {

	    	$html .= "<div class='post ui'>";
		    $html .= "<div class='upscore'>".$row[3]."</div>";
	    	$html .= "<div class='username'>".$row[1]."</div>";
		    $html .= "<div class='post_text'>".$row[2]."</div>";
		    $html .= "<div class='downscore'>".$row[4]."</div>";
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