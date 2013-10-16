<?php
include_once 'mysqlConnection.php';

       $post_json = $_POST['post_details'];

        $stmt = $mysqli->prepare("INSERT INTO feed VALUES (?,?,?,?,?,?)");

        $post_details = json_decode($postdetails_json);

        foreach($post_details as $postdetail) {


                $feedid = uniqid();
                $username = $postdetail->username;
                $posttext = $postdetail->postext;
                $upscore = 0;
                $downscore = 0;
                $total = 0;

                $stmt->bind_param('sssiii', $username, $password, $email, $score, $hats);

                $stmt->execute();
        }


        $stmt->close();

?>