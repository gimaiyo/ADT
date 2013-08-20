<?php
include_once ('system_management.php');
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Synchronization_Management extends System_Management {
	function __construct() {
		parent::__construct();
		$this -> load -> library('Synchronization');
	}

	public function upload_to_nascop() {
		//Variables
		$main_array = array();
		$temp_array = array();
		$table_array = array("cdrr_item", "maps_item", "order_comment");
		$sql = "";
		$unique_column = "";
		$order_number = "";

		foreach ($table_array as $table) {
			$sql = "select * from facility_order where is_uploaded='0'";
			$query = $this -> db -> query($sql);
			$order_array = $query -> result_array();
			if ($order_array) {
				$main_array["facility_order"] = $order_array;
				foreach ($table_array as $table) {
					if ($table == "cdrr_item") {
						$unique_column = "cdrr_id";
					} else if ($table == "maps_item") {
						$unique_column = "maps_id";
					} else if ($table == "order_comment") {
						$unique_column = "order_number";
					}
					foreach ($order_array as $order) {
						$order_number = $order['unique_id'];
						$sql = "select * from $table where $unique_column='$order_number'";
						$query = $this -> db -> query($sql);
						$temp_array = $query -> result_array();
						$sql = "update facility_order set is_uploaded='1' where unique_id='$order_number' ";
						$this -> db -> query($sql);
					}
					$main_array[$table] = $temp_array;
					unset($temp_array);
				}
			}
		}
		return $main_array;

	}

	public function synchronize($data_array = array()) {

		//Variables
		$sql = '';
		$order_number = '';
		$unique_column = 'unique_id';
		$table_array = array();
		$table_array = json_decode($data_array, TRUE);
		foreach ($table_array as $table => $table_contents) {
			if ($table == "facility_order") {
				foreach ($table_contents as $contents) {
					$order_number = $contents['unique_id'];
					$sql = "select is_uploaded as available from facility_order where unique_id='$order_number'";
					$query = $this -> db -> query($sql);
					$results = $query -> result_array();
					unset($contents['id']);
					if ($results) {
						if ($results[0]['available'] == 1) {
							//Record has not been uploaded(Hence Update)
							$this -> db -> where($unique_column, $order_number);
							$this -> db -> update($table, $contents);
						}
					} else {
						//No record Hence Insert
						$this -> db -> insert($table, $contents);
					}
				}
			} else {
				foreach ($table_contents as $contents) {
					foreach ($contents as $content) {
						$unique_id = $content['unique_id'];
						$sql = "select * from $table where $unique_column='$unique_id'";
						$query = $this -> db -> query($sql);
						$results = $query -> result_array();
						unset($content['id']);
						if ($results) {
							$order_number = $contents['unique_id'];
							$this -> db -> where($unique_column, $unique_id);
							$this -> db -> update($table, $content);
						} else {
							$this -> db -> insert($table, $content);
						}
					}
				}
			}
		}
	}

	public function startSync() {
		/*
		 * Initialize the Sysnchronization Library
		 * Get Order array from webADT
		 * Get Nascop Function Url
		 * Send Array of data from webADT to Nascop(function called 'synchronize')
		 */
		$string = '';
		$new_sync = new Synchronization();
		$main_url = file_get_contents(base_url() . 'assets/nascop.txt');
		$target_url = $main_url . "/synchronization_management/synchronize";
		$response = $new_sync -> upload_connect($target_url, $this -> upload_to_nascop());
		$facility = $this -> session -> userdata("facility");
		if ($response == true) {
			//Download Data from Nascop
			$target_url = $main_url . "/synchronization_management/download_to_adt/" . $facility;
			$download = file_get_contents($target_url);
			$message = "Upload Successful(100%) \r\n";
			if ($download) {
				/*
				 * 1.Removes the last string character ']' from the json
				 * 2.Remove the first 12 string characters which includes a '<pre>' tag up to the '['
				 * 3.Decoding the json array
				 * 4.This is where I convert String Manual to array
				 *
				 */
				$this -> synchronize($download);
				$message .= "Download Successful(100%) \r\n";
				$message .= "Synchronization Complete(100%)";
			} else {
				$message .= "Download encountered Problems(0%)\r\n";
				$message .= "Synchronization Failed(50%)\r\n";
			}

		} else {
			$message = "Upload encountered Problems(0%)\r\n";
			$message .= "Synchronization Failed(0%)\r\n";
		}
		echo $message;
	}

	public function base_params($data) {
		$data['title'] = "System Synchronization";
		$data['banner_text'] = "System Synchronization";
		$data['link'] = "synchronization_management";
		$this -> load -> view("template", $data);
	}

}
