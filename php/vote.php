<?php
include_once 'mysqlConnection.php';

    if(isset($_POST['direction']) && isset($_POST['id'])) {

        if($_POST['direction'] == "up") {

            $mysqli->query("UPDATE feed SET upscore=upscore+1 WHERE feedid=".$_POST['id']);  

        } else if($_POST['direction'] == "down") {

            $mysqli->query("UPDATE feed SET downscore=downscore+1 WHERE feedid=".$_POST['id']);
        }

    } echo "hello";

?>