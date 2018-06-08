<?php
class Admin extends MY_Controller {
	
	function __construct(){
	
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('Front_model');
	}
	
	function index() {
		// load view
		$this->load->view("admin/login.php");
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
	
}