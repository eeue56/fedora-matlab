<?php
include_once 'mysqlConnection.php';

    if(isset($_POST['direction']) && isset($_POST['id'])) {

        if($_POST['direction'] == "up") {

            $mysqli->query("UPDATE feed SET upscore=upscore+1 WHERE feedid='".$_POST['id']."'"); 
            $usr = $mysqli->query("SELECT * FROM members WHERE username='".$_POST['usr']."'");
            $mysqli->query("UPDATE members SET score=score+1 WHERE username=" + $usr);

        } else if($_POST['direction'] == "down") {

            $mysqli->query("UPDATE feed SET downscore=downscore+1 WHERE feedid='".$_POST['id']."'"); 
        }

    } 

        $mysqli->query("UPDATE feed SET totalscore=upscore-downscore WHERE feedid='".$_POST['id']."'");

?>