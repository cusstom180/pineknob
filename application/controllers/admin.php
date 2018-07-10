<?php
class Admin extends MY_Controller {
	
	function __construct(){
	
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('Front_model');
	}
	
	function index() {
		// load view
		$this->data['subview'] = 'admin/subviews/login';
		$this->load->view('admin/mainLayout.php', $this->data);
	}
	
	function login_user(){
		$user_login=array(
	
				'email'=>$this->input->post('email', TRUE),
				'password'=>md5($this->input->post('password', TRUE))
	
		);
	
		// 		var_dump($_SERVER);
		$data=$this->admin_model->login_user($user_login['email'],$user_login['password']);
				var_dump($data);
		
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
		$this->data['page'] = $this->Front_model->callingBack();
		$this->data['title'] = $this->Front_model->getRow('title', 'slug', $this->data['page']);
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
			$this->session->set_flashdata('error_msg', 'enter in another email.');
			redirect('admin/home');
		} else {
			var_dump($post_array);
			
			$result = $this->admin_model->add_user($post_array);
			if ($result) {
				echo "it worked";
			}
		}
		
	}
	
	function registerclient() {
		echo "hello from register";
	}
	
}