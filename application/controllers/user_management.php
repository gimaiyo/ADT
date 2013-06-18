<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class User_Management extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('encrypt');
		$this -> load -> helper('geoiploc');
		$this -> load -> database();
		ini_set("SMTP",'ssl://smtp.googlemail.com');
		ini_set("smtp_port",'465');
		ini_set("sendmail_from",'webadt.chai@gmail.com');
	}

	public function index() {
		$this -> listing();
	}

	public function login() {
		$data = array();
		$data['title'] = "System Login";
		$this -> load -> view("login_v", $data);
	}

	public function listing() {
		$access_level = $this -> session -> userdata('user_indicator');
		$user_type="1";
		$facilities="";
		//If user is a super admin, allow him to add only facilty admin and nascop pharmacist
		if($access_level=="system_administrator"){
			$user_type="indicator='nascop_pharmacist' or indicator='facility_administrator'";
			$facilities = Facilities::getAll();
			$users = Users::getAll();
			
		}
		//If user is a facility admin, allow him to add only facilty users
		else if($access_level=="facility_administrator"){
			$facility_code = $this -> session -> userdata('facility');
			$user_type="indicator='pharmacist'";
			$facilities = Facilities::getCurrentFacility($facility_code);
			$q="u.Facility_Code='".$facility_code."' and Access_Level !='1'";
			$users = Users::getUsersFacility($q);
			
		}
		$user_types = Access_Level::getAll($user_type);
		
		$tmpl = array('table_open' => '<table class=" table table-bordered table-striped setting_table ">');
		$this -> table -> set_template($tmpl);
		$this -> table -> set_heading('id', 'Name', 'Username', 'Email Address', 'Phone Number', 'Access Level', 'Registered By', 'Options');

		foreach ($users as $user) {

			//Is user is a system admin, allow him to edit only system  admin and nascop users
			if($access_level=="system_administrator"){
				if($user['Access'] == "System Administrator" or $user['Access'] == "NASCOP Pharmacist" or $user['Access'] == "Facility Administrator"){
					$links = anchor('user_management/edit/' . $user['id'], 'Edit', array('class' => 'edit_user', 'id' => $user['id']));
					$links .= " | ";
				}
				else{
					$links="";
				}
			}
			else{
				$links = anchor('user_management/edit/' . $user['id'], 'Edit', array('class' => 'edit_user', 'id' => $user['id']));
				
			}
			

			if ($user['Active'] == 1) {
				if($access_level=="system_administrator"){
					$links .= " | ";
					$links .= anchor('user_management/disable/' . $user['id'], 'Disable', array('class' => 'disable_user'));
				}
				else if($access_level=="facility_administrator" and $user['Access']=="Pharmacist"){
					$links .= " | ";
					$links .= anchor('user_management/disable/' . $user['id'], 'Disable', array('class' => 'disable_user'));
				}
				
			} else {
				$links .= anchor('user_management/enable/' . $user['id'], 'Enable', array('class' => 'enable_user'));
			}
			if ($user['Access'] == "Pharmacist") {
				$level_access = "User";
			} else {
				$level_access = $user['Access'];
			}
			$this -> table -> add_row($user['id'], $user['Name'], $user['Username'], $user['Email_Address'], $user['Phone_Number'], $level_access, $user['Creator'], $links);
		}

		$data['users'] = $this -> table -> generate();
		;
		$data['user_types'] = $user_types;
		$data['facilities'] = $facilities;
		$data['title'] = "System Users";
		$data['content_view'] = "users_v";
		$data['banner_text'] = "System Users";
		$data['link'] = "users";
		$actions = array(0 => array('Edit', 'edit'), 1 => array('Disable', 'disable'));
		$data['actions'] = $actions;
		$this -> load -> view("template", $data);
	}

	public function change_password() {
		$data = array();
		$data['title'] = "Change User Password";
		$data['content_view'] = "change_password_v";
		$data['link'] = "settings_management";
		$data['banner_text'] = "Change Pass";
		$this -> load -> view('template', $data);
	}

	public function activation_view() {
		$data = array();
		$data['title'] = "Activate User";
		$data['invalid']=
		$data['content_view'] = "activation_code_v";
		$data['link'] = "settings_management";
		$data['banner_text'] = "Activate User";
		$this -> load -> view('template', $data);

	}

	public function activation() {
		$activation_code = $_POST['activation_code'];
		$user_id = $this -> session -> userdata('user_id');
		$this -> load -> database();
		$query = $this -> db -> query("select * from users where id='$user_id' and Signature='$activation_code' and Active='1'");
		$results = $query -> result_array();
		if ($results) {
			$query = $this -> db -> query("update users set Signature='1' where id='$user_id' and Active='1'");
			$this -> session -> set_userdata("changed_password", "Your Account Has Been Activated");
            redirect("home_controller/home");
		} else {
			$this -> session -> set_userdata("changed_password", "Your Actvation code was incorrect");
			redirect("user_management/activation_view");
		}
	}

	public function save_new_password() {
		$valid = $this -> _submit_validate_password();
		if ($valid) {
			$key = $this -> encrypt -> get_key();
			$encrypted_password = md5($key . $this -> input -> post("new_password"));
			$user_id = $this -> session -> userdata('user_id');
			$timestamp = date("Y-m-d");
			
			//check if password matches last three passwords for this user
			$checkpassword_query = $this -> db -> query("SELECT * FROM (SELECT password FROM `password_log` WHERE user_id='$user_id' order by id desc limit 3) as pl where pl.password='$encrypted_password'");
			$check_results = $checkpassword_query -> result_array();
			if ($check_results) {
				$this -> session -> set_userdata("matching_password", "The current password Matches a Previous Password");
				$this -> change_password();
			} else {
				$query = $this -> db -> query("update users set Password='$encrypted_password',Time_Created='$timestamp' where id='$user_id'");
				$new_password_log = new Password_Log();
				$new_password_log -> user_id = $user_id;
				$new_password_log -> password = $encrypted_password;
				$new_password_log -> save();

				$data['expired'] = true;
				$this -> session -> set_userdata("changed_password", "Your Password Has Been Changed");
				redirect("user_management/login");
			}
		} else {
			$this -> change_password();
		}
	}

	private function _submit_validate_password() {
		// validation rules
		$this -> form_validation -> set_rules('old_password', 'Current Password', 'trim|required|min_length[6]|max_length[30]');
		$this -> form_validation -> set_rules('new_password', 'New Password', 'trim|required|min_length[6]|max_length[30]|matches[new_password_confirm]');
		$this -> form_validation -> set_rules('new_password_confirm', 'New Password Confirmation', 'trim|required|min_length[6]|max_length[30]');
		$temp_validation = $this -> form_validation -> run();
		if ($temp_validation) {
			$this -> form_validation -> set_rules('old_password', 'Current Password', 'trim|required|callback_correct_current_password');
			return $this -> form_validation -> run();
		} else {
			return $temp_validation;
		}

	}

	public function correct_current_password($pass) {
		$key = $this -> encrypt -> get_key();
		$pass = $key . $pass;
		$user = Users::getUserDetail($this -> session -> userdata('user_id'));
		$dummy_user = new Users();
		$dummy_user -> Password = $pass;
		if ($user[0]['Password'] != $dummy_user -> Password) {
			$this -> form_validation -> set_message('correct_current_password', 'The current password you provided is not correct.');
			return FALSE;
		} else {
			return TRUE;
		}

	}

	public function authenticate() {
		$data = array();
		$validated = $this -> _submit_validate();
		if ($validated) {
			$username = $this -> input -> post("username");
			$password = $this -> input -> post("password");
			$remember = $this -> input -> post("remember");
			$key = $this -> encrypt -> get_key();
			$encrypted_password = $key . $password;
			$logged_in = Users::login($username, $encrypted_password);
			//This code checks if the credentials are valid
			if ($logged_in == false) {
				$data['invalid'] = true;
				$data['title'] = "System Login";
				$this -> load -> view("login_v", $data);
			}
			//Check if credentials are valid for username not password
			
else if (isset($logged_in["attempt"]) && $logged_in["attempt"] == "attempt") {

				//check to see whether the user is active
				if ($logged_in["user"] -> Active == 0) {
					$data['inactive'] = true;
					$data['title'] = "System Login";
					$data['login_attempt'] = "<p class='error'>The Account has been deactivated. Seek help from the Facility Administrator</p>";
					$this -> load -> view("login_v", $data);
				} else {
					$data['invalid'] = false;
					$data['title'] = "System Login";
					//Check if there is a login attempt
					if (!$this -> session -> userdata($username . '_login_attempt')) {
						$login_attempt = 1;
						$this -> session -> set_userdata($username . '_login_attempt', $login_attempt);
						$fail = $this -> session -> userdata($username . '_login_attempt');
						$data['login_attempt'] = "(Attempt: " . $fail . " )";
					} else {

						//Check if login Attempt is below 4
						if ($this -> session -> userdata($username . '_login_attempt') && $this -> session -> userdata($username . '_login_attempt') <= 4) {
							$login_attempt = $this -> session -> userdata($username . '_login_attempt');
							$login_attempt++;
							$this -> session -> set_userdata($username . '_login_attempt', $login_attempt);
							$fail = $this -> session -> userdata($username . '_login_attempt');
							$data['login_attempt'] = "(Attempt: " . $fail . " )";
						}

						if ($this -> session -> userdata($username . '_login_attempt') > 4) {
							$fail = $this -> session -> userdata($username . '_login_attempt');
							$data['login_attempt'] = "<p class='error'>The Account has been deactivated. Seek help from the Facility Administrator</p>";
							$this -> session -> set_userdata($username . '_login_attempt', 0);
							$this -> load -> database();
							$query = $this -> db -> query("UPDATE users SET Active='0' WHERE(username='$username' or email_address='$username' or phone_number='$username')");
							//Log Denied User in denied_log
							$new_denied_log = new Denied_Log();
							$new_denied_log -> ip_address = $_SERVER['REMOTE_ADDR'];
							$new_denied_log -> location = $this -> getIPLocation();
							$new_denied_log -> user_id = Users::getUserID($username);
							$new_denied_log -> save();

						}
					}
					$this -> load -> view("login_v", $data);
				}
			}

			//If the credentials are valid, continue
			else {
				$today_time = strtotime(date("Y-m-d"));
				$create_time = strtotime($logged_in -> Time_Created);
				//check to see whether the user is active
				if ($logged_in -> Active == "0") {
					$data['inactive'] = true;
					$data['title'] = "System Login";
					$this -> load -> view("login_v", $data);
				} else if (($today_time - $create_time) > (30 * 24 * 3600)) {
					$user_id = Users::getUserID($username);
					$this -> session -> set_userdata('user_id', $user_id);
					$data['title'] = "System Login";
					$data['expired'] = true;
					$data['login_attempt'] = "Your Password Has Expired.<br/>Please Click <a href='change_password'>Here</a> to Change your Current Password";
					$this -> load -> view("login_v", $data);

				} else if ($logged_in -> Active == "1" && $logged_in -> Signature != 1) {
					$user_id = Users::getUserID($username);
					$this -> session -> set_userdata('user_id', $user_id);
					$facility_details = Facilities::getCurrentFacility($logged_in -> Facility_Code);
					$session_data = array('user_id' => $logged_in -> id, 'user_indicator' => $logged_in -> Access -> Indicator, 'facility_name' => $logged_in -> Facility -> name, 'access_level' => $logged_in -> Access_Level, 'username' => $logged_in -> Username, 'full_name' => $logged_in -> Name,'Email_Address'=> $logged_in ->Email_Address,'Phone_Number'=>$logged_in->Phone_Number, 'facility' => $logged_in -> Facility_Code, 'facility_id' => $facility_details[0]['id'],'county'=>$facility_details[0]['county']);
					$this -> session -> set_userdata($session_data);
					$this -> activation_view();
				}
				//looks good. Continue!
				else {

					$facility_details = Facilities::getCurrentFacility($logged_in -> Facility_Code);
					$session_data = array('user_id' => $logged_in -> id, 'user_indicator' => $logged_in -> Access -> Indicator, 'facility_name' => $logged_in -> Facility -> name, 'access_level' => $logged_in -> Access_Level, 'username' => $logged_in -> Username, 'full_name' => $logged_in -> Name,'Email_Address'=> $logged_in ->Email_Address,'Phone_Number'=>$logged_in->Phone_Number, 'facility' => $logged_in -> Facility_Code, 'facility_id' => $facility_details[0]['id'],'county'=>$facility_details[0]['county']);
					$this -> session -> set_userdata($session_data);
					//Execute queries that update the patient statuses
					/*
					 $sql_pep = "update patient set current_status = '3' WHERE service='2' and current_status = '1' AND datediff(now(),date_enrolled)>=30;";
					 $sql_pmtct = "update patient set current_status = '4' WHERE service='3' and current_status = '1' AND datediff(now(),date_enrolled)>=270;";
					 $sql_inactive = "update patient,(SELECT patient from patient_appointment pa left join patient p on p.patient_number_ccc = pa.patient where  datediff(now(),appointment)>90 and p.current_status = '1' and p.service = '1' group by patient) patient_ids set current_status = '5' where patient_number_ccc  = patient_ids.patient ;";
					 $this -> load -> database();
					 $this -> db -> query($sql_pep);
					 $this -> db -> query($sql_pmtct);
					 $this -> db -> query($sql_inactive);
					 *
					 *
					 */

					$new_access_log = new Access_Log();
					$new_access_log -> ip_address = $_SERVER['REMOTE_ADDR'];
					$new_access_log -> location = $this -> getIPLocation();
					$new_access_log -> user_id = $this -> session -> userdata('user_id');
					$new_access_log -> facility_code = $this -> session -> userdata('facility');
					$new_access_log -> access_type = "Login";
					$new_access_log -> save();

					redirect("home_controller/home");

				}

			}

		} else {//Not validated
			$data = array();
			$data['title'] = "System Login";
			$this -> load -> view("login_v", $data);
		}
	}

	private function _submit_validate() {
		// validation rules
		$this -> form_validation -> set_rules('username', 'Username', 'trim|required|min_length[6]|max_length[30]');


		$this -> form_validation -> set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[30]');



		return $this -> form_validation -> run();
	}

	public function go_home($data) {
		$data['title'] = "System Home";
		$data['content_view'] = "home_v";
		$data['banner_text'] = "Dashboards";
		$data['link'] = "home";
		$this -> load -> view("template", $data);
	}

	public function save() {
		$creator_id = $this -> session -> userdata('user_id');
		$source = $this -> input -> post('facility');

		$user = new Users();
		$user -> Name = $this -> input -> post('fullname');
		$user -> Username = $this -> input -> post('username');
		$user -> Password = "md5(123456)";
		$user -> Access_Level = $this -> input -> post('access_level');
		$user -> Facility_Code = $source;
		$user -> Created_By = $creator_id;
		$user -> Time_Created = date('Y-m-d , h:i:s A');
		$user -> Phone_Number = $this -> input -> post('phone');
		$user -> Email_Address = $this -> input -> post('email');
		$phone=$this -> input -> post('phone');
		$email=$this -> input -> post('email');
		$username=$this -> input -> post('username');
		if($phone!=""){
			$code=rand(11111,99999);
			$user -> Signature = $code;
			$this->sendActivationCode($username,$phone,$code,'phone');
		}
		else {
			$code=md5($user.$email);
			$user -> Signature=$code; 
			$this->sendActivationCode($username,$email,$code,'email');
		}
		$user -> Active = "1";

		$user -> save();
		$this -> session -> set_userdata('message_counter', '1');
		$this -> session -> set_userdata('message', $this -> input -> post('username') . ' was Added');
		redirect('user_management');
	}

	public function edit() {
		$access_level = $this -> session -> userdata('user_indicator');
		$user_type="1";
		$facilities="";
		//If user is a super admin, allow him to add only facilty admin and nascop pharmacist
		if($access_level=="system_administrator"){
			$user_type="indicator='nascop_pharmacist' or indicator='facility_administrator'";
			$facilities = Facilities::getAll();
		}
		//If user is a facility admin, allow him to add only facilty users
		else if($access_level=="facility_administrator"){
			$facility_code = $this -> session -> userdata('facility');
			$user_type="indicator='pharmacist'";
			$facilities = Facilities::getCurrentFacility($facility_code);
		}
		
		$user_id = $this -> input -> get('u_id');
		$data['users'] = Users::getUser($user_id);
		$data['user_type']=Access_Level::getAll($user_type);
		echo json_encode($data);
	}

	public function update() {
		$user_id = $this -> input -> post('user_id');
		$name = $this -> input -> post('fullname');
		$username = $this -> input -> post('username');
		$access_Level = $this -> input -> post('access_level');
		$phone_number = $this -> input -> post('phone');
		$email_address = $this -> input -> post('email');
		$facility = $this -> input -> post('facility');

		$this -> load -> database();
		$query = $this -> db -> query("UPDATE users SET Name='$name',Username='$username',Access_Level='$access_Level',Phone_Number='$phone_number',Email_Address='$email_address',Facility_Code='$facility' WHERE id='$user_id'");
		$this -> session -> set_userdata('message_counter', '1');
		$this -> session -> set_userdata('message', $this -> input -> post('username') . ' was Updated');
		redirect('user_management');
	}

	public function enable($user_id) {
		$results = Users::getUser($user_id);
		$name=$results['Name'];
		$query = $this -> db -> query("UPDATE users SET Active='1'WHERE id='$user_id'");
		$this -> session -> set_userdata('message_counter', '1');
		$this -> session -> set_userdata('message', $name . ' was enabled');
		redirect('user_management');
	}

	public function disable($user_id) {
		$results = Users::getUser($user_id);
		$name=$results['Name'];
		$query = $this -> db -> query("UPDATE users SET Active='0'WHERE id='$user_id'");
		$this -> session -> set_userdata('message_counter', '2');
		$this -> session -> set_userdata('message', $name . ' was disabled');
		redirect('user_management');
	}

	

	public function logout() {
		$machine_code=$this->session->userdata("machine_code_id");
		$new_access_log = new Access_Log();
		$new_access_log -> machine_code = $machine_code;
		$new_access_log -> ip_address = $_SERVER['REMOTE_ADDR'];
		$new_access_log -> location = $this -> getIPLocation();
		$new_access_log -> user_id = $this -> session -> userdata('user_id');
		$new_access_log -> facility_code = $this -> session -> userdata('facility');
		$new_access_log -> access_type = "Logout";
		$new_access_log -> save();
		$this -> session -> sess_destroy();
		redirect("user_management/login");
		//$this->fixlogout();
	}

	public function getIPLocation() {
		$ip = $_SERVER['REMOTE_ADDR'];
		return getCountryFromIP($ip, " NamE ");
	}

	public function update_machinecode($machine_code) {
		$machine_code=trim($machine_code);
		$this->session->set_userdata("machine_code_id",$machine_code);
		$user_id = $this -> session -> userdata("user_id");
		$this -> load -> database();
		$this -> db -> query("UPDATE access_log al,(SELECT MAX( id ) AS id FROM  `access_log` WHERE user_id = '$user_id' AND access_type =  'Login') as temp_log SET al.machine_code='$machine_code' WHERE al.id=temp_log.id");
	}
	
	public function sendActivationCode($username,$contact,$code="",$type="phone"){
		
		//If activation code is to be sent through email
		if($type=="email"){
			$email=$contact;
			//setting the connection variables
			$config['mailtype']="html";
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
			$this -> email -> message("Dear $username, Please click the following link to activate your account.
			<form action='".base_url()."user_management/activation' method='post'>
			<input type='submit' value='Activate account' id='btn_activate_account'>
			<input type='hidden' name='activation_code' id='activation_code' value='".$code."'>
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
			ob_end_flush();
			
			
		}
		
		//If activatio code is to be sent via sms
		else if($type=='phone'){
			$phone=$contact;
			$message="Your Web adt verification code is : ".$code;
			//$x= file_get_contents("http://41.57.109.238:13000cgi-bin/sendsms?username=clinton&password=ch41sms&to=$phone&text=$message");
			//ob_flush();
			
		}
		
	}
	public function fixlogout(){
		$this->load->view("fix_v");
	}
	public function resetPassword($data=""){
		
		$data['title'] = "Reset password";
		$this -> load -> view("resend_password_v", $data);
		
		
	}
	public function resendPassword(){
		$type=$this -> input -> post("type");
		//If user want to reset his password using email
		$input = array("Jpqw_!90)", "Jpqop_!290-", "Ksqop_!293-", "W9qip_!290", "W01ip_!134","T41tf_!126","442et_!237","CJai34_*5","34Tgd!*_","Jat_23@*");
		$rand_keys = array_rand($input, 2);
		$password= $input[$rand_keys[0]];
		$key = $this -> encrypt -> get_key();
		$encrypted_password =md5($key . $password);
		$timestamp = date("Y-m-d");
		
		//Change the password
		if($type=='email'){
			$email=$this -> input -> post("contact_email");
			$user_id_sql=$this->db->query("SELECT id FROM users WHERE Email_Address='$email' LIMIT 1");
			$arr=$user_id_sql->result_array();
			$count=count($arr);
			$user_id="";
			if($count==0){
				$data['error']='<p class="alert-error">The email you entered was not found ! </p>';
				$this ->resetPassword($data);
			}
			else{
				foreach($arr as $us_id){
					$user_id=$us_id['id'];
				}
				$query = $this -> db -> query("update users set Password='$encrypted_password',Time_Created='$timestamp' where Email_Address='$email'");
				$new_password_log = new Password_Log();
				$new_password_log -> user_id = $user_id;
				$new_password_log -> password = $encrypted_password;
				$new_password_log -> save();
				$this->sendPassword($email,$password,'email');
			}
			
		}
		else if($type=='phone'){
			$phone=$this -> input -> post("contact_phone");
			$user_id_sql=$this->db->query("SELECT id FROM users WHERE Phone_Number='$phone' LIMIT 1");
			$arr=$user_id_sql->result_array();
			$count=count($arr);
			$user_id="";
			if($count==0){
				$data['error']='<p class="alert-error">The phone number your entered was not found ! </p>';
				$this ->resetPassword($data);
			}
			else{
				foreach($arr as $us_id){
					$user_id=$us_id['id'];
				}
				$query = $this -> db -> query("update users set Password='$encrypted_password',Time_Created='$timestamp' where Phone_Number='$phone'");
				$new_password_log = new Password_Log();
				$new_password_log -> user_id = $user_id;
				$new_password_log -> password = $encrypted_password;
				$new_password_log -> save();
				$this->sendPassword($phone,$password,"phone");
			}
			
		}
		
		
	}
	
	public function sendPassword($contact,$code="",$type="phone"){
		
		//If activation code is to be sent through email
		if($type=="email"){
			
			$email=$contact;
			//setting the connection variables
			$config['mailtype']="html";
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
			$this -> email -> message("Dear $contact, This is your new password: $code.<br>
										<br>
										Regards,<br>
										Web ADT Team
										");
			
			//success message else show the error
			if ($this -> email -> send()) {
				$data['message']= '<span class="alert-info">An email was successfully sent to <b>' . $email . '</b>. Please Click <a href="'.base_url().'user_management/login">Here</a> to proceed to login</span><br/>';
				//unlink($file);
				$this -> email -> clear(TRUE);
				
			} else {
				$data['error']=$this -> email -> print_debugger();
				//show_error($this -> email -> print_debugger());
			}
			ob_end_flush();
			$this->load->view("resend_password_success_v",$data);
			
		}
		
		//If activatio code is to be sent via sms
		else if($type=='phone'){
			$phone=$contact;
			$message="Your Web adt verification code is : ".$code;
			//$x= file_get_contents("http://41.57.109.238:13000cgi-bin/sendsms?username=clinton&password=ch41sms&to=$phone&text=$message");
			//ob_flush();
			
		}
		
	}

	public function profile($data=""){
		$data['title']='User Profile';
		$data['banner_text']='My Profile';
		$data['content_view']='user_profile_v';
		$this->base_params($data);
	}
	
	public function profile_update(){
		$data['title']='User Profile';
		$data['banner_text']='My Profile';
		$user_id=$this->session->userdata('user_id');
		$full_name=$this->input->post('u_fullname');
		$user_name=$this->input->post('u_username');
		$email=$this->input->post('u_email');
		$phone=$this->input->post('u_phone');
		$c_user=0;
		$e_user=0;
		
		//Check if username does not already exist
		//If username was changed by the user, check if it exists in the db
		if($this->session->userdata('username')!=$user_name){
			$username_exist_sql=$this->db->query("SELECT * FROM users WHERE username='$user_name'");
			$c_user=count($username_exist_sql->result_array());
		}
		//If email was changed by the user, check if it exists in the db
		if($this->session->userdata('Email_Address')!=$email){
			$email_exist_sql=$this->db->query("SELECT * FROM users WHERE Email_Address='$email'");
			$e_user=count($email_exist_sql->result_array());
		}
		
		if($c_user>0 and $e_user>0){
			$data['error']="<span class='alert-error'>The username and email entered are already in use!</span>";
			
		}
		else if($c_user>0){
			$data['error']="<span class='alert-error'>The username entered is already in use !</span>";
		}
		else if($e_user>0){
			$data['error']="<span class='alert-error'>The email entered is already in use !</span>";
		}
		
		//Neither email nor username is in use
		else if($e_user==0 and $c_user==0){
			//Update user details
			$update_user_sql=$this->db->query("UPDATE users SET Name='$full_name',username='$user_name',Email_Address='$email',Phone_Number='$phone' WHERE id='$user_id'");
			if($update_user_sql==1){
				$data['message_success']="<span class='alert-info'>Your details were successfully updated!<span>";
			}
			//Update session details!
			$session_data = array('username' => $user_name, 'full_name' => $full_name,'Email_Address'=> $email,'Phone_Number'=>$phone);
			$this -> session -> set_userdata($session_data);
			
		}
		$this->profile($data);
		
	}
	
	public function base_params($data) {
		$this -> load -> view("template", $data);
	}

}
