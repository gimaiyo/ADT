<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Reports_Satellite extends MY_Controller {
	function __construct() {
		parent::__construct();
	}
	
	function index($satellite_facility){
		$data['title'] = "Satellite Reports";
		$data['banner_text'] = "Satellite Reports";
		$data['satellite_facility']=$satellite_facility;
		$facility_details=Facilities::getCodeFacility($satellite_facility);
		$data['facility_name'] =$facility_details->name;
		$this -> load -> view("report_satellite_v", $data);
	}
	
	
	
}
	
?>