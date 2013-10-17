<?php
include_once "Logonconstants.php";



class hatter{


	function __construct($username) {
		$this->hat = "nada";
		$this->user = $username;
		$this->totalScorage = 0;
		$this->mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or
			die('There was a problem connecting to the database.');
	}

	function grabMyHat(){
		$result = $this->mysqli->query("SELECT totalscore FROM feed WHERE username='".$this->user."'");

		while($row = $result->fetch_row()) {
			var_dump($row);
			$this->totalScorage += $row[0];
		}

		if($this->totalScorage > 10 && $this->totalScorage < 100) {
			$this->hat = "fedrah";
		} else if($this->totalScorage >= 100 && $this->totalScorage < 200) {
			$this->hat = "red fedrah";
		} else if($this->totalScorage >= 200 && $this->totalScorage < 300) {
			$this->hat = "blue fedrah";
		} else if($this->totalScorage >= 300 && $this->totalScorage < 400) {
			$this->hat = "pink fedrah";
		} else if($this->totalScorage >= 400 && $this->totalScorage < 500) {
			$this->hat = "kinky fedrah";
		} else if($this->totalScorage >= 500 && $this->totalScorage < 6000) {
			$this->hat = "avril's fedrah";
		} else if($this->totalScorage >= 6000) {
			$this->hat = "rodjah's fedrah";
		} 
		return $this->hat . " (" .$this->totalScorage .")";
	}
}
?>