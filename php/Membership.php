<?php

require 'LogonMysql.php';

class Membership {
        
        function validate_user($un, $pwd) {
                $mysql = New LogonMysql();
                $ensure_credentials = $mysql->verify_Username_and_Pass($un, $pwd);

                if($ensure_credentials) {
                        $_SESSION['status'] = $ensure_credentials;
                        $_SESSION['username'] = $un;
                        $_SESSION['timeout'] = time();
                        header("location: index.php");
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

        
        function userOptions() {
                $mysql = New LogonMysql();
                
        }
        
}