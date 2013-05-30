<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Facilityadmin_dashboard_Management extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> database();
	}
	
	function getDisabledUsers($display_names=0){
		$facility_code = $this -> session -> userdata("facility");
		$query = $this -> db -> query("SELECT u.id,u.Name,f.name,u.Phone_Number,u.Email_Address FROM users u LEFT JOIN facilities f ON f.facilitycode=u.Facility_Code WHERE u.Active='0' AND f.facilitycode='$facility_code' AND (u.Access_Level='2')");
		$users=$query->result_array();
		$total_inactive=count($users);
		$data['total_inactive']=$total_inactive;
		$data['users']=$users;
		

		return $data;
	}
	
	function getPatientNotified(){
		
	}
	
	function getOrderStatus($status=""){
		$facility_code = $this -> session -> userdata("facility");
		$is_central_sql=$this->db->query("SELECT * FROM facilities WHERE Facilitycode='$facility_code' AND parent='$facility_code'");
		$count=count($is_central_sql->result_array());
		//If facility is a central order, get orders
		/*
		 * Statuses:0=>Pending,1=>Approve,2=>Declined,3=>Dispatched
		 * Codes:0=>Central;1=>Aggregated,2=> Satelitte
		 */
		if($count>0){
			$data=array();
			//Get all aggregated orders for that facility
			$get_orders_sql=$this->db->query("SELECT count(status) as total,status from facility_order WHERE facility_id='$facility_code' AND code='1' group by status");
			$orders_array=$get_orders_sql->result_array();
			$data['orders']=$orders_array;
			return $data;
			
		}
		
		
	}
	
	//Get orders in a specific status
	function getOrders($status){

		$orderVal=0;
		$order_array=array();
		$status_title="";
		if($status=='pending'){
			$status_title='Pending';
		}
		else if($status=='approved'){
			$status_title='Approved';
		}
		else if($status=='declined'){
			$status_title='Declined';
		}
		else if($status=='dispatched'){

			$status_title='Dispatched';
		}
		$facility_code = $this -> session -> userdata("facility");
		$is_central_sql=$this->db->query("SELECT * FROM facilities WHERE Facilitycode='$facility_code' AND parent='$facility_code'");
		$count=count($is_central_sql->result_array());
		
		if($count>0){
			$data=array();

			$get_orders_sql=$this->db->query("SELECT count(*)as total FROM facility_order WHERE status='$status'");
			$orderVal=$get_orders_sql->result_array();
			
		}
		$order_array['title']=$status_title;
		
		echo "<li class='status-title' ><i class='icon-tasks'></i>No. of ".$status_title." Orders</div><div class='badge badge-important'>".$orderVal[0]['total']."</li>";

		
	}
	
	
}

?>
	