<?php

require_once 'Logonconstants.php';

class LogonMysql  {
        private $conn;

        function __construct() {
                $this->conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or
                die('There was a problem connecting to the database.');
        }

        function update_score($user, $score) {

                $stmt = $this->conn->prepare('UPDATE members SET score= ? WHERE username=?');

                $stmt->bind_param('is', $score, $username);
                $stmt->execute();

                $stmt->close();
        }

        function verify_Username_and_Pass($un, $pwd) {

                //let's not have any nasty accidents
                if(preg_match('%^[A-Za-z0-9]\S{1,20}$%',$un)){
                        $un = $this->conn->real_escape_string($un);
                } else {
                        return false;
                }
                $pwd = $this->conn->real_escape_string($pwd);

                $query = "SELECT COUNT(*)
                FROM members
                WHERE username = ? AND password = ?
                LIMIT 1";

                if($stmt = $this->conn->prepare($query)) {
                        $stmt->bind_param('ss', $un, $pwd);
                        $stmt->execute();
                        $stmt->bind_result($result);
                        $stmt->fetch();
                        //$count = $result->rowCount();
                        ob_start();
                        var_dump($result);
                        $c = ob_get_contents();
                        ob_end_clean();
                        error_log($c);
                        //return $stmt;
                        if($result) {

                                return "authorized";
                        }
                        return false;
                        // $stmt->bind_result($un,$pwd);
                        // if($stmt->fetch()) {
                        //         if($auth)
                                        
                        //                 $stmt->close();
                        //                 return "authorized";
                        //         }
                                

                        //         return "authorized";
                        // }
                }

        }
}