<?php
class admin_management extends MY_Controller {
	function __construct() {
		parent::__construct();
	}

	public function index() {
	}

	public function addCounty() {
		$results = Counties::getAll();
		$dyn_table = "<table border='1' id='patient_listing'  cellpadding='5' class='dataTables'>";
		$dyn_table .= "<thead><tr><th>County Name</th><th colspan='2'> Options</th></tr></thead><tbody>";
		if ($results) {
			foreach ($results as $result) {
				$dyn_table .= "<tr><td>" . $result['county'] . "</td></tr>";
			}
		}
		$dyn_table .= "</tbody></table>";
		$data['label'] = 'County';
		$data['table'] = 'counties';
		$data['column'] = 'active';
		$data['dyn_table'] = $dyn_table;
		$this -> base_params($data);
	}

	public function addSatellite() {
		$results = Facilities::getSatellites($this -> session -> userdata("facility"));
		$dyn_table = "<table border='1' id='patient_listing'  cellpadding='5' class='dataTables'>";
		$dyn_table .= "<thead><tr><th>Facility Code</th><th>Facility Name</th><th colspan='2'> Options</th></tr></thead><tbody>";
		if ($results) {
			foreach ($results as $result) {
				$dyn_table .= "<tr><td>" . $result['facilitycode'] . "</td><td>" . $result['name'] . "</td></tr>";
			}
		}
		$dyn_table .= "</tbody></table>";
		$data['label'] = 'Satellite';
		$data['table'] = 'facilities';
		$data['column'] = 'active';
		$data['dyn_table'] = $dyn_table;
		$this -> base_params($data);
	}

	public function addDistrict() {
		$results = District::getAll();
		$dyn_table = "<table border='1' id='patient_listing'  cellpadding='5' class='dataTables'>";
		$dyn_table .= "<thead><tr><th>District Name</th><th colspan='2'> Options</th></tr></thead><tbody>";
		if ($results) {
			foreach ($results as $result) {
				$dyn_table .= "<tr><td>" . $result['Name'] . "</td></tr>";
			}
		}
		$dyn_table .= "</tbody></table>";
		$data['label'] = 'District';
		$data['table'] = 'district';
		$data['column'] = 'active';
		$data['dyn_table'] = $dyn_table;
		$this -> base_params($data);
	}

	public function addMenu() {
		$results = Menu::getAll();
		$dyn_table = "<table border='1' id='patient_listing'  cellpadding='5' class='dataTables'>";
		$dyn_table .= "<thead><tr><th>Menu Name</th><th>Menu URL</th><th>Menu Description</th><th>Menu Status</th><th colspan='2'> Options</th></tr></thead><tbody>";
		if ($results) {
			foreach ($results as $result) {
				$dyn_table .= "<tr><td>" . $result['Menu_Text'] . "</td><td>" . $result['Menu_Url'] . "</td><td>" . $result['Description'] . "</td><td>" . $result['Offline'] . "</td></tr>";
			}
		}
		$dyn_table .= "</tbody></table>";
		$data['label'] = 'Menu';
		$data['table'] = 'menu';
		$data['column'] = 'active';
		$data['dyn_table'] = $dyn_table;
		$this -> base_params($data);
	}

	public function addUsers() {
		$results = Users::getThem();
		$dyn_table = "<table border='1' id='patient_listing'  cellpadding='5' class='dataTables'>";
		$dyn_table .= "<thead><tr><th>Full Name</th><th>UserName</th><th>Access Level</th><th>Email Address</th><th>Phone Number</th><th>Account Creator</th><th colspan='2'> Options</th></tr></thead><tbody>";
		if ($results) {
			foreach ($results as $result) {
				$dyn_table .= "<tr><td>" . $result['Name'] . "</td><td>" . $result['Username'] . "</td><td>" . $result['Access'] . "</td><td>" . $result['Email_Address'] . "</td><td>" . $result['Phone_Number'] . "</td><td>" . $result['Creator'] . "</td></tr>";
			}
		}
		$dyn_table .= "</tbody></table>";
		$data['label'] = 'Users';
		$data['table'] = 'users';
		$data['column'] = 'active';
		$data['dyn_table'] = $dyn_table;
		$this -> base_params($data);
	}

	public function assignRights() {
		$sql = "select * from user_right ur left join menu m on m.id=ur.menu left join access_level al on al.id=ur.access_level";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		$dyn_table = "<table border='1' id='patient_listing'  cellpadding='5' class='dataTables'>";
		$dyn_table .= "<thead><tr><th>Access Level</th><th>Menu</th><th colspan='2'> Options</th></tr></thead><tbody>";
		if ($results) {
			foreach ($results as $result) {
				$dyn_table .= "<tr><td>" . $result['level_name'] . "</td><td>" . $result['menu_text'] . "</td></tr>";
			}
		}
		$dyn_table .= "</tbody></table>";
		$data['label'] = 'User Rights';
		$data['table'] = 'user_right';
		$data['column'] = 'active';
		$data['dyn_table'] = $dyn_table;
		$this -> base_params($data);
	}

	public function nascopSettings() {
		$results = file_get_contents(base_url() . 'assets/nascop.txt');
		$dyn_table = "<table border='1' id='patient_listing'  cellpadding='5' class='dataTables'>";
		$dyn_table .= "<thead><tr><th>Link</th></tr></thead><tbody>";
		if ($results) {
			$dyn_table .= "<tr><td>" . $results . "</td></tr>";
		}
		$dyn_table .= "</tbody></table>";
		$data['label'] = 'Nascop Settings';
		$data['table'] = 'nascop';
		$data['column'] = 'active';
		$data['dyn_table'] = $dyn_table;
		$this -> base_params($data);
	}

	public function getAccessLogs() {
		$sql = "select * from access_log al left join users u on u.id=al.user_id";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		$dyn_table = "<table border='1' id='patient_listing'  cellpadding='5' class='dataTables'>";
		$dyn_table .= "<thead><tr><th>User</th><th>Timestamp</th><th>Status</th></tr></thead><tbody>";
		if ($results) {
			foreach ($results as $result) {
				$dyn_table .= "<tr><td>" . $result['Name'] . "</td><td>" .date('d-M-Y h:i:s a',strtotime($result['timestamp'])) . "</td><td>" . $result['access_type'] . "</td></tr>";
			}
		}
		$dyn_table .= "</tbody></table>";
		$data['label'] = 'Access Logs';
		$data['table'] = 'user_right';
		$data['column'] = 'active';
		$data['dyn_table'] = $dyn_table;
		$this -> base_params($data);
	}

	public function getDeniedLogs() {
		$sql = "select * from denied_log al left join users u on u.id=al.user_id";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		$dyn_table = "<table border='1' id='patient_listing'  cellpadding='5' class='dataTables'>";
		$dyn_table .= "<thead><tr><th>User</th><th>Timestamp</th></tr></thead><tbody>";
		if ($results) {
			foreach ($results as $result) {
				$dyn_table .= "<tr><td>" . $result['Name'] . "</td><td>" . date('d-M-Y h:i:s a',strtotime($result['timestamp'])) . "</td></tr>";
			}
		}
		$dyn_table .= "</tbody></table>";
		$data['label'] = 'Denied Logs';
		$data['table'] = 'user_right';
		$data['column'] = 'active';
		$data['dyn_table'] = $dyn_table;
		$this -> base_params($data);
	}

	public function base_params($data) {
		$data['content_view'] = "admin/add_param_a";
		$data['title'] = "webADT | System Admin";
		$data['banner_text'] = "System Admin";
		$this -> load -> view('admin/admin_template', $data);
	}

}
