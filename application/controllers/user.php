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
		if ($this->input->post('first_name')) {
			echo 'ture ';}
	    var_dump($_SESSION);
	    
		$user=array(
				'first_name'	=> $this->input->post('first_name'),
		        'last_name'		=> $this->input->post('last_name'),
				'email'			=> $this->input->post('email'),
				'password'		=> md5($this->input->post('password')),
				'mobile'		=> $this->input->post('mobile')
		);
		var_dump($user);  //caused header to fail

		$email_check=$this->user_model->email_check($user['email']);
	
		if($email_check){
			$insert = $this->user_model->register_user($user);
			$this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
// 			redirect('user/user_profile', 'auto');
// 			redirect('user/login_view');
			echo "<script>$('#registarModal').modal('hide')</script>";
	
		}
		else {
	
			$this->session->set_flashdata('error_msg', 'Error occured,Try again.');
// 			redirect('user');
			echo 'failed';
			$this->session->set_flashdata('error_msg', 'Someone has registered with that email address. Please try another one');
// 			redirect(base_url('front/register'));
			echo "$email_check in else ";
	
		}
	
	}
	
	public function login_view(){
	
		$this->load->view("login.php");
	
	}
	
	function login_user(){
		
		$user_login=array(
	
				'email' => $this->input->post('email', TRUE),
				'password'=> md5($this->input->post('password'))
	
		);
		var_dump($_POST);
		echo "email = " . $user_login['email'];
		$login = $this->user_model->login_user($user_login);
// 		var_dump($login);
		if($login) {
			$_SESSION['login'] = TRUE;
			$_SESSION['user_id'] = $login['user_id'];
			$_SESSION['first_name'] = $login['first_name'];
			$_SESSION['last_name'] = $login['last_name'];
// 		    redirect($_SESSION['referer']);
			echo "success";
			echo "<script>location.reload();
                        $('#registarModal').modal('hide')</script>";
		}
		else{
		    $this->session->set_flashdata('error_msg', 'Username or password is incorrect. Try again.');
// 		    $this->load->view("login.php");
			echo "Username or password is incorrect. Try again.";
		}
	
	}
	
	function user_profile(){
	
		$this->load->view('user/user_profile.php');
	
	}
	
	function schedule_private() {
	    
	    $this->load->view('user/user_profile.php');
	}
	
	public function user_logout(){
		
		unset($_SESSION['login']);
		$this->session->sess_destroy();
		redirect('', 'refresh');
	}
	
	
}