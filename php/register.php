<?php

        $userdetails_json = $_POST['user_details'];

        $stmt = $mysqli->prepare('INSERT INTO members VALUES (?,?,?,?,?');

        foreach($userdetails_json as $userdetail) {

                $username = $userdetail->username;
                $password = $userdetail->password;
                $email = $userdetail->email;
                $score = 0;
                $hats = '';

                $password = crypt($password, $username);

                $stmt->bind_param(sssib, $username, $password, $email, $score, $hats)

                $stmt->execute();
        }


        $stmt->close();

?>