<?

class Feed {

	var $username;
	var $postText;
	var $upscore;
	var $downscore;

	__construct($username,$postText,$upscore,$downscore) {

		$this->username = $username;
		$this->postText = $postText;
		$this->upscore = $upscore;
		$this->downscore = $downscore;
	}

	
}

?>