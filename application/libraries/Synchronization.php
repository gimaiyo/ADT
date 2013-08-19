<?php

class Synchronization {
	public function __construct() {
	}

	public function upload_connect($url, $data) {
		 extract($_POST);
		 $url = $url;
		 $fields = $data;
		 $fields_string = '';
		 foreach ($fields as $key => $value) { $fields_string .= $key . '=' . $value . '&';
		 }
		 rtrim($fields_string, '&');
		 $ch = curl_init();
		 curl_setopt($ch, CURLOPT_URL, $url);
		 curl_setopt($ch, CURLOPT_POST, count($fields));
		 curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
		 $headers = array('Content-type: application/json');
		 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		 $result = curl_exec($ch);
		 curl_close($ch);
		 return $result;

	}

}
?>