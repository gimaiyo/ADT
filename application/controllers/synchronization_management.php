<?php
include_once ('system_management.php');
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Synchronization_Management extends System_Management {
	function __construct() {
		parent::__construct();
		$this -> load -> library('Synchronization');
	}

	/*
	 public function synchronize_orders() {
	 $mainstrSQl = "";
	 $table_lists = array("facility_order", "cdrr_item", "maps_item", "order_comment");
	 foreach ($table_lists as $table_list) {
	 $strSQl = "";
	 $table_name = $table_list;
	 $sql = "select * from  $table_name";
	 $query = $this -> db -> query($sql);
	 $results = $query -> result_array();
	 if ($results) {
	 foreach ($results as $val => $value_array) {
	 $fields = "";
	 $values = "";
	 $temp_val = "";
	 $strSQl .= "INSERT INTO $table_list (";
	 foreach ($value_array as $col => $value) {
	 if ($col != 'id') {
	 $temp_val .= "," . $col . "=" . "\"" . trim($value) . "\"";
	 $fields .= "," . $col;
	 $values .= ",\"" . trim($value) . "\"";
	 }
	 }
	 $fields = substr($fields, 1);
	 $values = substr($values, 1);
	 $temp_val = substr($temp_val, 1);
	 $strSQl .= $fields . ")VALUES(" . $values . ") ON DUPLICATE KEY UPDATE $temp_val ;";
	 }
	 }
	 $mainstrSQl .= $strSQl;
	 }
	 if ($mainstrSQl != '') {
	 echo $mainstrSQl = base64_encode($mainstrSQl);
	 } else {
	 echo $mainstrSQl = "";
	 }
	 }

	 public function uploadSQL($session_id) {
	 $sql = "select machine_code from access_log where user_id='$session_id' and access_type='Login' order by id desc LIMIT 1";
	 $query = $this -> db -> query($sql);
	 $results = $query -> result_array();
	 $session_array = explode(",", $results[0]['machine_code']);
	 $session_data = array('user_id' => $session_array[0], 'user_indicator' => $session_array[1], 'facility_name' => $session_array[2], 'access_level' => $session_array[3], 'username' => $session_array[4], 'full_name' => $session_array[5], 'Email_Address' => $session_array[6], 'Phone_Number' => $session_array[7], 'facility' => $session_array[8], 'facility_id' => $session_array[9], 'county' => $session_array[10]);
	 $this -> session -> set_userdata($session_data);

	 //Setup menus
	 $rights = User_Right::getRights($session_array[3]);
	 $menu_data = array();
	 $menus = array();
	 $counter = 0;
	 foreach ($rights as $right) {
	 $menu_data['menus'][$right -> Menu] = $right -> Access_Type;
	 $menus['menu_items'][$counter]['url'] = $right -> Menu_Item -> Menu_Url;
	 $menus['menu_items'][$counter]['text'] = $right -> Menu_Item -> Menu_Text;
	 $menus['menu_items'][$counter]['offline'] = $right -> Menu_Item -> Offline;
	 $counter++;
	 }
	 $this -> session -> set_userdata($menu_data);
	 $this -> session -> set_userdata($menus);
	 $this -> load_assets();
	 $sql = "";
	 if ($this -> input -> post("sql")) {
	 $sql = $this -> input -> post("sql");
	 if ($sql != '') {
	 $sql = base64_decode($sql);
	 $queries = explode(";", $sql);
	 foreach ($queries as $query) {
	 if (strlen($query) > 0) {
	 $this -> db -> query($query);
	 }
	 }
	 }
	 }
	 }
	 *
	 */
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
						//$sql = "update facility_order set is_uploaded='1' where unique_id='$order_number' ";
						//$this -> db -> query($sql);
					}
					$main_array[$table] = $temp_array;
					unset($temp_array);
				}
			}
		}
		//header('Content-type: application/json');
		return $main_array;

	}

	public function synchronize($data_array = array()) {
		//Variables
		$sql = '';
		$order_number = '';
		$unique_column = 'unique_id';
		$table_array = json_decode($data_array, TRUE);
		$insert_array = array();
		$update_array = array();
		foreach ($table_array as $table => $table_contents) {
			foreach ($table_contents as $contents) {
				if ($table == "facility_order") {
					$order_number = $contents['unique_id'];
					$sql = "select is_uploaded as uploadload from facility_order where unique_id='$order_number'";
					$query = $this -> db -> query($sql);
					$results = $query -> result_array();
					if ($results) {
						if ($results[0]['upload'] == 0) {
							//Record has not been downloaded(Hence Update)
							$update_array[] = $order_number;
						}
					} else {
						//No record Hence Insert
						$insert_array[] = $order_number;
					}
				} else {
					//If not facility_order table
					unset($contents['id']);
					if (in_array($order_number, $update_array)) {
						foreach ($contents as $content) {
							$order_number = $content['unique_id'];
							$this -> db -> where($unique_column, $order_number);
							$this -> db -> update($table, $content);
						}

					} else if (in_array($order_number, $insert_array)) {
						foreach ($contents as $content) {
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
		//$facility=$this->session->userdata("facility");
		$facility = '13050';
		if ($response == true) {
			//Download Data from Nascop
			$target_url = $main_url . "/synchronization_management/download_to_adt/" . $facility;
			$download = file_get_contents($target_url);
			$message = "Upload Successful(100%) \n";
			if ($download) {
				/*
				 * 1.Removes the last string character ']' from the json
				 * 2.Remove the first 12 string characters which includes a '<pre>' tag up to the '['
				 * 3.Decoding the json array
				 * 4.This is where I convert String Manual to array
				 */
				$download = substr($download, 0, -1);
				$download = substr($download, 12);
				$string = $download;
				$download = json_decode($download, TRUE);
				$download = $this -> objectToArray($download);
				$this -> synchronize($download);
				$message .= "Download Successful(100%) \n";
				$message .= "Synchronization Complete(100%)";
			} else {
				$message .= "Download encountered Problems(0%)";
				$message .= "Synchronization Failed(50%)";
			}

		} else {
			$message = "Upload encountered Problems(0%)";
			$message .= "Synchronization Failed(0%)";
		}
		echo $message;
	}

	public function objectToArray($object) {
		if (!is_object($object) && !is_array($object)) {
			return $object;
		}
		if (is_object($object)) {
			$object = (array)$object;
		}
		return array_map('objectToArray', $object);
	}

	public function base_params($data) {
		$data['title'] = "System Synchronization";
		$data['banner_text'] = "System Synchronization";
		$data['link'] = "synchronization_management";
		$this -> load -> view("template", $data);
	}

}
