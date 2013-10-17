<?php

require 'LogonMysql.php';
include_once "mysqlConnection.php";

class Membership {
        
        function validate_user($un, $pwd) {
                $mysql = New LogonMysql(); 
                $ensure_credentials = $mysql->verify_Username_and_Pass($un, $pwd);
                return $ensure_credentials;
                if($ensure_credentials) {
                        $_SESSION['status'] = $ensure_credentials;
                        $_SESSION['username'] = $un;
                        $_SESSION['timeout'] = time();
                        header("location: http://198.211.122.209/fedora-matlab/index.php");
                } else return "Please enter a correct username and password";
                
        } 
        
        function log_User_Out() {
                if(isset($_SESSION['status'])) {
                        unset($_SESSION['status']);
                        
                        if(isset($_COOKIE[session_name()])) 
                                setcookie(session_name(), '', time() - 1000);
                                session_destroy();
                }
        }
        
        function confirm_Member() {
                session_start();
                if($_SESSION['status'] !='authorized') header("location: login.php");
        }

        function registerUser() {

                $userdetails_json = $_POST['user_details'];

                $stmt = $mysqli->prepare('INSERT INTO members VALUES (?,?,?,?,?');

                foreach($userdetails_json as $userdetail) {

                        $username = $userdetail->username;
                        $password = $userdetail->password;
                        $email = $userdetail->email;
                        $score = 0;
                        $hats = '';

                        $password = crypt($password, $username);

                        $stmt->bind_param(sssib, $username, $password, $email, $score, $hats);

                        $stmt->execute();
                }


                $stmt->close();


        }
        
};