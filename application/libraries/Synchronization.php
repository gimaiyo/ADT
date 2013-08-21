<?php

class Synchronization {
	public function __construct() {
	}

	public function upload_connect($url, $data) {
		extract($_POST);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS,array("data"=>json_encode($data)));
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}

}
?>