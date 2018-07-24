<?php
class Admin extends MY_Controller {
	
	function __construct(){
	
		parent::__construct();
		$this->load->model('admin_model');
// 		$this->load->library('email');
	}
	
	function index() {
		$this->data['page'] = $this->admin_model->callbackPage();
// 		print_r(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2));
		var_dump($this->data['page']);
		$this->data['title'] = $this->admin_model->getPageTitle('title', $this->data['page'], NULL);
		var_dump($this->data['title']);
		
		if (isset($_SESSION['login']) && $_SESSION['login']) {
			
			$this->load->library('calendar');
			echo $this->calendar->generate();
			// load view
			$this->data['subview'] = 'admin/subviews/index';
			$this->load->view('admin/mainLayout.php', $this->data);
		} else {
		
		// load view
		$this->data['subview'] = 'admin/subviews/login';
		$this->load->view('admin/mainLayout.php', $this->data);
		}
	}
	
	function login_user(){
		$user_login=array(
				'email'=> filter_input(INPUT_POST, 'email'),
				'password'=> md5(filter_input(INPUT_POST, 'password'))
		);
// 				var_dump($user_login);
		$data = $this->admin_model->login_user($user_login['email'],$user_login['password']);
// 				var_dump($data);
		
		// 		var_dump($_SESSION['referer']);
		if($data) {
			$this->session->set_userdata('client_id',$data['client_id']);
			$this->session->set_userdata('email',$data['email']);
			$this->session->set_userdata('user_name',$data['user_name']);
			// 			$this->session->set_userdata('mobile',$data['mobile']);
			$this->session->set_userdata('login', TRUE);
			redirect(base_url('admin/home'));
		}
		else{
			$this->session->set_flashdata('error_msg', 'Error occured,Try again.');
			$this->load->view("admin/login.php");
		}
	}
	
	function home() {
		$this->data['page'] = $this->admin_model->callingBack();
		$this->data['title'] = $this->admin_model->getRow('title', 'slug', $this->data['page']);
		print_r($this->data['page']);
		//check if login 
		if ($_SESSION['login']) {
			echo "home";
			
			// load view
			$this->data['subview'] = 'admin/subviews/index';
			$this->load->view('admin/mainLayout.php', $this->data);
		} else {
			unset($_SESSION);
			redirect(base_url('admin/login.php'));
		}
	}
	
	function addclient() {			
		
		$post_array = array(
				'first_name' => filter_input(INPUT_POST, 'first_name'),
				'last_name' => filter_input(INPUT_POST, 'last_name'),
				'email' => filter_input(INPUT_POST, 'email'),
				'temp_password' => md5(filter_input(INPUT_POST, 'temp_password'))
		);
		
		$email_check = $this->admin_model->check_email($post_array['email']);
// 		var_dump($email_check);
		if (!$email_check) {
			echo "enter in another email";
			$this->session->set_flashdata('error_add_msg', 'enter in another email.');
			redirect('admin');
		} else {
			var_dump($post_array);
			$result = $this->admin_model->add_user($post_array);
			if ($result) {
				echo "it worked";
				$this->session->set_flashdata('success_add_msg', 'client has been added to system');
				redirect('admin');
			}
		}
		
	}
	
	function registarclient() {				// WORKING HERE TO ADD PASSWORD UPDATE
		if (isset($_POST['login'])){
			var_dump($_POST);
			$temp_password = $this->admin_model->check_temp_password($array = array('email' => $_POST['email'],
					'temp_password' => $_POST['temp_password']));
			if ($temp_password) {
				$password_confirm = $this->admin_model->check_passwords(md5(filter_input(INPUT_POST, 'new_password')), md5(filter_input(INPUT_POST, 'confirm_password')));
				if ($password_confirm === 0) {
					echo "passwords match";
					$this->admin_model->sendEmail($_POST['email']);
// 					mail($_POST['email'], 'test email', 'test email form controller', 'From: pineknobskischool@gamil.com');
				} else {
					$this->session->set_flashdata('reg_error_msg', "passwords don't match. Please try again");
// 					redirect('admin/registarclient');
					$this->data['subview'] = 'admin/subviews/registar';
					$this->load->view('admin/mainLayout.php', $this->data);
				}
			}
			
		} else {
		// load view
			$this->data['subview'] = 'admin/subviews/registar';
			$this->load->view('admin/mainLayout.php', $this->data);
		}
	}
	
	
	
}