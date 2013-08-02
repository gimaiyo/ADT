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
		$dyn_table .= "<thead><tr><th>County Name</th><th> Options</th></tr></thead><tbody>";
		if ($results) {
			foreach ($results as $result) {
				if ($result['active'] = 1) {
					$option = "<a href='" . base_url() . "admin_management/edit/counties/" . $result['id'] . "'>Edit</a> | <a href='" . base_url() . "admin_management/disable/counties/" . $result['id'] . "' class='red'>Disable</a>";
				} else {
					$option = "<a href='" . base_url() . "admin_management/edit/counties/" . $result['id'] . "'>Edit</a> | <a href='" . base_url() . "admin_management/enable/counties/" . $result['id'] . "' class='green'>Enable</a>";
				}
				$dyn_table .= "<tr><td>" . $result['county'] . "</td><td>" . $option . "</td></tr>";
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
		$dyn_table .= "<thead><tr><th>Facility Code</th><th>Facility Name</th><th>Options</th></tr></thead><tbody>";
		if ($results) {
			foreach ($results as $result) {
				$option = "<a href='" . base_url() . "admin_management/remove/" . $result['facilitycode'] . "'' class='red'>Remove</a>";
				$dyn_table .= "<tr><td>" . $result['facilitycode'] . "</td><td>" . $result['name'] . "</td><td>" . $option . "</td></tr>";
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
		$dyn_table .= "<thead><tr><th>District Name</th><th> Options</th></tr></thead><tbody>";
		if ($results) {
			foreach ($results as $result) {
				if ($result['active'] = 1) {
					$option = "<a href='" . base_url() . "admin_management/edit/district/" . $result['id'] . "'>Edit</a> | <a href='" . base_url() . "admin_management/disable/district/" . $result['id'] . "' class='red'>Disable</a>";
				} else {
					$option = "<a href='" . base_url() . "admin_management/edit/district/" . $result['id'] . "'>Edit</a> | <a href='" . base_url() . "admin_management/enable/district/" . $result['id'] . "' class='green'>Enable</a>";
				}
				$dyn_table .= "<tr><td>" . $result['Name'] . "</td><td>" . $option . "</td></tr>";
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
		$dyn_table .= "<thead><tr><th>Menu Name</th><th>Menu URL</th><th>Menu Description</th><th> Options</th></tr></thead><tbody>";
		if ($results) {
			foreach ($results as $result) {
				if ($result['active'] = 1) {
					$option = "<a href='" . base_url() . "admin_management/edit/menu/" . $result['id'] . "'>Edit</a> | <a href='" . base_url() . "admin_management/disable/menu/" . $result['id'] . "' class='red'>Disable</a>";
				} else {
					$option = "<a href='" . base_url() . "admin_management/edit/menu/" . $result['id'] . "'>Edit</a> | <a href='" . base_url() . "admin_management/enable/menu/" . $result['id'] . "' class='green'>Enable</a>";
				}
				$dyn_table .= "<tr><td>" . $result['Menu_Text'] . "</td><td>" . $result['Menu_Url'] . "</td><td>" . $result['Description'] . "</td><td>" . $option . "</td></tr>";
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
		$dyn_table .= "<thead><tr><th>Full Name</th><th>UserName</th><th>Access Level</th><th>Email Address</th><th>Phone Number</th><th>Account Creator</th><th> Options</th></tr></thead><tbody>";
		$option = "";
		if ($results) {
			foreach ($results as $result) {
				if ($result['id'] != $this -> session -> userdata("user_id")) {
					if ($result['Active'] = 1) {
						$option = "<a href='" . base_url() . "admin_management/disable/users/" . $result['id'] . "' class='red'>Disable</a>";
					} else {
						$option = "<a href='" . base_url() . "admin_management/enable/users/" . $result['id'] . "' class='green'>Enable</a>";
					}
				}
				$dyn_table .= "<tr><td>" . $result['Name'] . "</td><td>" . $result['Username'] . "</td><td>" . $result['Access'] . "</td><td>" . $result['Email_Address'] . "</td><td>" . $result['Phone_Number'] . "</td><td>" . $result['Creator'] . "</td><td>" . $option . "</td></tr>";
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
		$dyn_table .= "<thead><tr><th>Access Level</th><th>Menu</th><th> Options</th></tr></thead><tbody>";
		if ($results) {
			foreach ($results as $result) {
				if ($result['active'] = 1) {
					$option = "<a href='" . base_url() . "admin_management/edit/user_right/" . $result['id'] . "'>Edit</a> | <a href='" . base_url() . "admin_management/disable/user_right/" . $result['id'] . "' class='red'>Disable</a>";
				} else {
					$option = "<a href='" . base_url() . "admin_management/edit/user_right/" . $result['id'] . "'>Edit</a> | <a href='" . base_url() . "admin_management/enable/user_right/" . $result['id'] . "' class='green'>Enable</a>";
				}
				$dyn_table .= "<tr><td>" . $result['level_name'] . "</td><td>" . $result['menu_text'] . "</td><td>" . $option . "</td></tr>";
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
		$data['column'] = 'active';
		$data['table'] = '';
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
				$dyn_table .= "<tr><td>" . $result['Name'] . "</td><td>" . date('d-M-Y h:i:s a', strtotime($result['timestamp'])) . "</td><td>" . $result['access_type'] . "</td></tr>";
			}
		}
		$dyn_table .= "</tbody></table>";
		$data['label'] = 'Access Logs';
		$data['column'] = 'active';
		$data['table'] = '';
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
				$dyn_table .= "<tr><td>" . $result['Name'] . "</td><td>" . date('d-M-Y h:i:s a', strtotime($result['timestamp'])) . "</td></tr>";
			}
		}
		$dyn_table .= "</tbody></table>";
		$data['label'] = 'Denied Logs';
		$data['column'] = 'active';
		$data['table'] = '';
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
