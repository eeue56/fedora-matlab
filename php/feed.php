<?php 
include_once 'Feed_object.php';

if($_SESSION['status'] == "authorized") {

	include_once "mysqlConnection.php";

	try {
	    var $result = $mysqli->execute("SELECT * FROM feed LIMIT 20 ORDER BY totalscore");
	    var $html = "There are no feeds at this time"; 
	    var $i = 0;

	    while($row ->$result->fetch_assoc()) {
	    	$dbField[$i] = $row;
	    	$i++;
	    }

	    if($dbField){
	    	$html = "";
	    }
	    
	    foreach($dbField as $row => $cell) {
	    	$html .= "<div class='post'>";
		    $html .= "<div class='upscore'>".$dbField[$row]['upscore']."</div>";
	    	$html .= "<div class='username'>".$dbField[$row]['username']."</div>";
		    $html .= "<div class='post_text'>".$dbField[$row]['post_text']."</div>";
		    $html .= "<div class='downscore'>".$dbField[$row]['downscore']."</div>";
		    $html .= "</div>";
	    }

	    echo $html;
	    
	}
	catch (Exception $e){
	    error_log("it's broken");
	    echo "There are no feeds at this time";
	    die();
    }
}

?>