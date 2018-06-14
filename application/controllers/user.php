<?php
class User extends MY_Controller {

	function __construct(){

		parent::__construct();
		$this->load->model('user_model');
	}
	
	public function index()
	{
		
		$this->load->view("register.php");
	}
	
	public function register_user(){
	
		$user=array(
				'first_name'=>$this->input->post('first_name', TRUE),
				'last_name'=>$this->input->post('last_name', TRUE),
				'email'=>$this->input->post('email', TRUE),
				'password'=>md5($this->input->post('password', TRUE)),
				'mobile'=>$this->input->post('mobile', TRUE)
		);
		print_r($user);
		
		$email_check=$this->user_model->email_check($user['email']);
	
		if($email_check){
			$this->user_model->register_user($user);
			$this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
			redirect('user/login_view');
			echo "$email_check in if ";
	
		}
		else {
	
			$this->session->set_flashdata('error_msg', 'Someone has registered with that email address. Please try another one');
			redirect(base_url('front/register'));
			echo "$email_check in else ";
	
		}
	
	}
	
	public function login_view(){
	
		$this->load->view("login.php");
	
	}
	
	function login_user(){
		$user_login=array(
	
				'email'=>$this->input->post('email'),
				'password'=>md5($this->input->post('password'))
	
		);
		
// 		var_dump($_SERVER);
		$data=$this->user_model->login_user($user_login['email'],$user_login['password']);
// 		var_dump(current_url());
		if (isset($_SERVER['HTTP_REFERER'])) {
// 		    echo "session is empty";
		    $this->session->set_userdata('referer', $_SERVER['HTTP_REFERER']);
		}
// 		var_dump($_SESSION['referer']);
		if($data) {
			$this->session->set_userdata('client_id',$data['client_id']);
			$this->session->set_userdata('email',$data['email']);
			$this->session->set_userdata('user_name',$data['user_name']);
// 			$this->session->set_userdata('mobile',$data['mobile']);
			$this->session->set_userdata('login', TRUE);
			// NEED TO LOOK AT THIS---------------------------------------------------------------
			
// 			$this->load->view('user_profile.php');
// 			header('Location: ' . $_SERVER['HTTP_REFERER']);
// 			var_dump($_SESSION['referer']);
			redirect($_SESSION['referer']);
		}
		else{
			$this->session->set_flashdata('error_msg', 'Error occured,Try again.');
			$this->load->view("login.php");
		}
	
	}
	
	function user_profile(){
	
		$this->load->view('user_profile.php');
	
	}
	
	public function user_logout(){
	
		$this->session->sess_destroy();
		redirect('', 'refresh');
	}
	
	
}