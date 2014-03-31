<?php
/* 
We will be expecting json feeds from our API's and we need to know when a new feed was generated.
To keep track of the new feeds we can look up the id of the feeds that we have currently seen and index them in a hashmap.
This will be used to quickly find a feed that was new and then just add that data to the json object.
*/

class SaveFeeds{
	var $arrayOfApi;

	function __construct($arrApi){
		$this->arrayOfApi = $arrApi;
	}

	public function getApiJSON(){
		$json = file_get_contents("http://rack1.citizennet.com/interviewtest/api?file=posts.json&access_token=AAAAAL2uajO8BAPcqOwZB6");
		$response = $http_response_header[0];
		if(strpos($response, "503") !== false){
			throw new Exception("503");
			return;
		}

		echo $json;
	}
}


$arrApi = array("http://rack1.citizennet.com/interviewtest/api?file=posts.json&access_token=AAAAAL2uajO8BAPcqOwZB6");
$saveFeeds = new SaveFeeds($arrApi);
try{
	$saveFeeds->getApiJSON();
}catch(Exception $e){
	echo "Caught Exception: ", $e->getMessage(), "\n";
}
?>