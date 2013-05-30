<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Systemadmin_dashboard_Management extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> database();
	}
	
	function getDisabledUsers($display_names=0){
		$facility_code = $this -> session -> userdata("facility");
		$query = $this -> db -> query("SELECT u.id,u.Name,f.name,u.Phone_Number,u.Email_Address FROM users u LEFT JOIN facilities f ON f.facilitycode=u.Facility_Code WHERE u.Active='0' AND (u.Access_Level='1' or u.Access_Level='4')");
		$users=$query->result_array();
		$total_inactive=count($users);
		$data['total_inactive']=$total_inactive;
		$data['users']=$users;
		
		return $data;
	}
	
	//Get active users
	function getActiveUsers($facility=""){
		$user=array();
		$now= strtotime("now");
		//Get users who have been active for the past 5 mins(300 seconds)
		
		$get_active_user_sql=$this->db->query("SELECT user_data FROM user_sessions WHERE ('$now'-last_activity)<=300");
		//Total number of active users
		$users_array=$get_active_user_sql->result_array();
		$count_active=count($users_array);
		//Counter for system admin
		$counter_sysadmin=0;
		//Counter for facility users
		$counter_faciliityadmin=0;
		$counter=0;
		foreach ($users_array as $row) {
			$udata = unserialize($row['user_data']);
			//If getting users from a facility
			if($facility!=""){
				//Get Pharmacists and facility admins
				if($udata['facility']==$facility and ($udata["user_indicator"]=='facility_administrator' or $udata["user_indicator"]=='pharmacist')){
						
					$counter_faciliityadmin++;
					/* put data in array using username as key */
		    		$user[$counter]["user_id"] = $udata['user_id'];
		    		$user[$counter]["username"] = $udata['username'];
		    		//User type
		    		$user[$counter]["user_type"] = $udata['user_indicator'];
					$user[$counter]["full_name"] = $udata['full_name'];
					$user[$counter]["facility_code"] = $udata['facility'];//Facility code
					$user[$counter]["facility_name"] = $udata['facility_name'];//Facility name
					$county_id= $udata['county'];
					$user[$counter]["county_id"] =$county_id;
					$county="";
					//get county name
					$get_county_sql=$this->db->query("SELECT county FROM counties WHERE id='$county_id' LIMIT 1");
					$county_array=$get_county_sql->result_array();
					foreach ($county_array as $value) {
						$county=$value['county'];
					}
					$user[$counter]["county"] =$county;
				}
				//If user not pharmacist or from another facility, proceed
				else{
					continue;
				}
				//$total users active per facility
				$user['total_facility']=$counter_faciliityadmin;
			}

			//Getting all Nascop users and facility admins
			else{
				//Get Nascop pharmacists and system admins
				if($udata["user_indicator"]=='system_administrator' or $udata["user_indicator"]=='nascop_pharmacist'){
					$counter_sysadmin++;
					/* put data in array using username as key */
		    		$user[$counter]["user_id"] = $udata['user_id'];
		    		$user[$counter]["username"] = $udata['username'];
		    		//User type
		    		$user[$counter]["user_type"] = $udata['user_indicator'];
					$user[$counter]["full_name"] = $udata['full_name'];
					$user[$counter]["facility_code"] = $udata['facility'];//Facility code
					$user[$counter]["facility_name"] = $udata['facility_name'];//Facility name
					$county_id= $udata['county'];
					$user[$counter]["county_id"] =$county_id;
					$county="";
					//get county name
					$get_county_sql=$this->db->query("SELECT county FROM counties WHERE id='$county_id' LIMIT 1");
					$county_array=$get_county_sql->result_array();
					foreach ($county_array as $value) {
						$county=$value['county'];
					}
					$user[$counter]["county"] =$county;
				}
				//If user not nascop pharmacistt or sys admin proceed
				else{
					continue;
				}
				//$total users active for system
				$user['total_system']=$counter_sysadmin;
			}
			
			$counter++;
		}
		
		
		var_dump($user);
		//return $user;
		
	}

	//Function to filter array data
	public function filterArray($user_array){
		return $user_array['county_id']=1;
		
	}
	
}
?>