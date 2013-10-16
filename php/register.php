<?php
include_once 'mysqlConnection.php';

       $userdetails_json = $_POST['user_details'];

        $stmt = $mysqli->prepare("INSERT INTO members VALUES (?,?,?,?,?)");

        $user_details = json_decode($userdetails_json);

        foreach($user_details as $userdetail) {

                $username = $userdetail->username;
                $password = $userdetail->password;
                $email = $userdetail->email;
                $score = 0;
                $hats = '';

                $password = crypt($password, $username);

                $stmt->bind_param('sssis', $username, $password, $email, $score, $hats);

                $stmt->execute();
        }


        $stmt->close();

?>