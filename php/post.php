<?php
include_once 'mysqlConnection.php';
session_start();

       $post_json = $_POST['post_details'];

        $stmt = $mysqli->prepare("INSERT INTO feed VALUES (?,?,?,?,?,?)");

        $post_details = json_decode($post_json);

        foreach($post_details as $postdetail) {

                $feedid = uniqid();
                $username = 'test';
                $posttext = $postdetail->posttext;
                $upscore = 0;
                $downscore = 0;
                $total = 0;

                $stmt->bind_param('sssiii', $feedid, $username, $posttext, $upscore, $downscore, $total);

                $stmt->execute();
        }


        $stmt->close();

?>