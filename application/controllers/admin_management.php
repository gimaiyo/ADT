<?php
class admin_management extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('encrypt');
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

	public function inactive() {
		$facility_code=$this->session->userdata("facility");
		$results = Users::getInactive($facility_code);
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

	public function save($table = "") {
		if ($table == "counties") {
			$county_name = $this -> input -> post("name");
			$new_county = new Counties();
			$new_county -> county = $county_name;
			$new_county -> save();
		} else if ($table == "facilities") {
			$satellite_code = $this -> input -> post("facility");
			if ($satellite_code) {
				$central_code = $this -> session -> userdata("facility");
				$sql = "update facilities set parent='$central_code' where facilitycode='$satellite_code'";
				$this -> db -> query($sql);
			}
		} else if ($table == "district") {
			$disrict_name = $this -> input -> post("name");
			$new_district = new District();
			$new_district -> Name = $disrict_name;
			$new_district -> save();
		} else if ($table == "menu") {
			$menu_name = $this -> input -> post("name");
			$menu_url = $this -> input -> post("url");
			$menu_desc = $this -> input -> post("description");
			$new_menu = new Menu();
			$new_menu -> Menu_Text = $menu_name;
			$new_menu -> Menu_Url = $menu_url;
			$new_menu -> Description = $menu_desc;
			$new_menu -> save();
		} else if ($table == "users") {
			$creator_id = $this -> session -> userdata('user_id');
			$source = $this -> input -> post('facility');

			$user = new Users();
			$user -> Name = $this -> input -> post('fullname');
			$user -> Username = $this -> input -> post('username');
			$key = $this -> encrypt -> get_key();
			$characters = strtoupper("abcdefghijklmnopqrstuvwxyz");
			$characters = $characters . 'abcdefghijklmnopqrstuvwxyz0123456789';
			$random_string_length = 8;
			$string = '';
			for ($i = 0; $i < $random_string_length; $i++) {
				$string .= $characters[rand(0, strlen($characters) - 1)];
			}
			$password = $string;
			$encrypted_password = $key . $password;
			$user -> Password = $encrypted_password;
			$user -> Access_Level = $this -> input -> post('access_level');
			$user -> Facility_Code = $source;
			$user -> Created_By = $creator_id;
			$user -> Time_Created = date('Y-m-d , h:i:s A');
			$user -> Phone_Number = $this -> input -> post('phone');
			$user -> Email_Address = $this -> input -> post('email');
			$phone = $this -> input -> post('phone');
			$email = $this -> input -> post('email');
			$username = $this -> input -> post('fullname');

			$code = md5($user . $email);
			$user -> Signature = $code;
			$this -> sendActivationCode($username, $email, $password, $code, 'email');

			$user -> Active = "1";

			$user -> save();
		} else if ($table == "user_right") {
			$access_level = $this -> input -> post("access_level");
			$menu = $this -> input -> post("menus");
			if ($menu) {
				$new_right = new User_Right();
				$new_right -> Access_Level = $access_level;
				$new_right -> Menu = $menu;
				$new_right -> Access_Type = "4";
				$new_right -> save();
			}
		}
		redirect("home_controller/home");
	}

	public function sendActivationCode($username, $contact, $password, $code = "", $type = "phone") {

		//If activation code is to be sent through email
		if ($type == "email") {
			$email = $contact;
			//setting the connection variables
			$config['mailtype'] = "html";
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'ssl://smtp.googlemail.com';
			$config['smtp_port'] = 465;
			$config['smtp_user'] = stripslashes('webadt.chai@gmail.com');
			$config['smtp_pass'] = stripslashes('WebAdt_052013');
			ini_set("SMTP", "ssl://smtp.gmail.com");
			ini_set("smtp_port", "465");
			$this -> load -> library('email', $config);
			$this -> email -> set_newline("\r\n");
			$this -> email -> from('webadt.chai@gmail.com', "WEB_ADT CHAI");
			$this -> email -> to("$email");
			$this -> email -> subject("Account Activation");
			$this -> email -> message("Dear $username,<p> You account has been created and your password is <b>$password</b></p>Please click the following link to activate your account.
			<form action='" . base_url() . "user_management/activation' method='post'>
			<input type='submit' value='Activate account' id='btn_activate_account'>
			<input type='hidden' name='activation_code' id='activation_code' value='" . $code . "'>
			</form>
			<br>
			Regards, <br>
			Web ADT Team.
			");

			//success message else show the error
			if ($this -> email -> send()) {
				echo 'Your email was successfully sent to ' . $email . '<br/>';
				//unlink($file);
				$this -> email -> clear(TRUE);

			} else {
				show_error($this -> email -> print_debugger());
			}
			//ob_end_flush();
		}
	}

	public function inactive_users() {
		$facility_code = $this -> session -> userdata("facility");
		$sql = "select count(*) as total from users where Facility_Code='$facility_code' and Active='0' and access_level !='2'";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		$total = 0;
		$temp = "";
		$order_link = site_url('admin_management/inactive');
		if ($results) {
			foreach ($results as $result) {
				$total = $result['total'];
			}
		}
		$temp =$total;
		echo $temp;
	}

	public function base_params($data) {
		$data['content_view'] = "admin/add_param_a";
		$data['title'] = "webADT | System Admin";
		$data['banner_text'] = "System Admin";
		$this -> load -> view('admin/admin_template', $data);
	}

}
