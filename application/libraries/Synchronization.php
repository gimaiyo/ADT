<?php

class Synchronization {
	const URL = 'http://localhost/NASCOP/synchronization_management/';

	public function __construct() {
		$this -> _requestUrl = self::URL;
	}

	public function connect($url, $data) {
		//extract data from the post
		extract($_POST);

		//set POST variables
		$url = $this -> _requestUrl . $url;
		$fields = $data;
		$fields_string = '';
		//$fields = array('lname' => urlencode($last_name), 'fname' => urlencode($first_name), 'title' => urlencode($title), 'company' => urlencode($institution), 'age' => urlencode($age), 'email' => urlencode($email), 'phone' => urlencode($phone));

		//url-ify the data for the POST
		foreach ($fields as $key => $value) { $fields_string .= $key . '=' . $value . '&';
		}
		rtrim($fields_string, '&');

		//open connection
		$ch = curl_init();

		//set the url, number of POST vars, POST data
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, count($fields));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
		$headers = array('Content-type: application/json');
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		//execute post
		$result = curl_exec($ch);
		//close connection
		curl_close($ch);
		
		return json_decode($result);
	}

}
?>