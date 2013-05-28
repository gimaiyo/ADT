<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Facilityadmin_dashboard_Management extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> database();
	}
	
	function getDisabledUsers(){
		
	}
	
	function getPatientNotified(){
		
	}
}

?>
	