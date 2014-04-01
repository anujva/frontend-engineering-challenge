<?php
/* 
We will be expecting json feeds from our API's and we need to know when a new feed was generated.
To keep track of the new feeds we can look up the id of the feeds that we have currently seen and index them in a hashmap.
This will be used to quickly find a feed that was new and then just add that data to the json object.
*/

class SaveFeeds{
	private $arrayOfApi = array();

	function __construct($arrApi){
		$this->arrayOfApi = $arrApi;
	}

	public function getApiJSON(){
		
		var $json = array();
		var $handle;
		var $file_read;
		var $file_array;

		if(file_exists("datastore.txt")){
			if($handle = 	fopen("datastore.txt", "r+")){
				$file_read = fread($handle, filesize("datastore.txt"));
				$file_array = json_decode($file_read);
			}else{
				echo " Permissions problem probably !! ";
			}
		}else{
			//No feeds have been stored yet
		}

		foreach($this->arrayOfApi as &$arrayApi){
			$json = json_decode(file_get_contents($arrayApi), true);
			$response = $http_response_header[0];
			if(strpos($response, "503") !== false){
				throw new Exception("503");
				return;
			}else{
				checkIds($json);
			}
		}
	}

	public function checkIds($json){
		if(!is_null($json)){
			foreach($json['data'] as $datafeed){
				
			}
		}
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