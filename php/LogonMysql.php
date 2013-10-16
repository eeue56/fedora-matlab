<?php

require_once 'includes/Logonconstants.php';

class LogonMysql {
        private $conn;

        function __construct() {
                $this->conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or
                die('There was a problem connecting to the database.');
        }

        function verify_Username_and_Pass($un, $pwd) {

                //let's not have any nasty accidents
                if(preg_match('%^[A-Za-z0-9]\S{1,20}$%',$un)){
                        $un = $this->conn->real_escape_string($un);
                } else {
                        return false;
                }
                $pwd = $this->conn->real_escape_string($pwd);

                $query = "SELECT *
                FROM users
                WHERE username = ? AND password = ?
                LIMIT 1";

                if($stmt = $this->conn->prepare($query)) {
                        $stmt->bind_param('ss', $un, $pwd);
                        $stmt->execute();
                        $stmt->bind_result($un,$pwd,$auth);
                        if($stmt->fetch()) {
                                if($auth)
                                        
                                        $stmt->close();
                                        return "authorized";
                                }
                                

                                return true;
                        }
                }

        }
}