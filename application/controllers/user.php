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
	   
	    var_dump($_SESSION);
	    
		$user=array(
<<<<<<< HEAD
				'first_name'=>$this->input->post('first_name'),
		        'last_name'=>$this->input->post('last_name'),
				'email'=>$this->input->post('email'),
				'password'=>md5($this->input->post('password')),
				'mobile'=>$this->input->post('mobile')
=======
				'first_name'=>$this->input->post('first_name', TRUE),
				'last_name'=>$this->input->post('last_name', TRUE),
				'email'=>$this->input->post('email', TRUE),
				'password'=>md5($this->input->post('password', TRUE)),
				'mobile'=>$this->input->post('mobile', TRUE)
>>>>>>> 4853bdbf95156db4e60aeacbe5736bf3bc1900c3
		);
// 		print_r($user);  //caused header to fail

		$email_check=$this->user_model->email_check($user['email']);
	
		if($email_check){
			$this->user_model->register_user($user);
			$this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
<<<<<<< HEAD
// 			redirect('user/user_profile', 'auto');
            echo 'success';
=======
			redirect('user/login_view');
			echo "$email_check in if ";
	
>>>>>>> 4853bdbf95156db4e60aeacbe5736bf3bc1900c3
		}
		else {
	
<<<<<<< HEAD
			$this->session->set_flashdata('error_msg', 'Error occured,Try again.');
// 			redirect('user');
			echo 'failed';
=======
			$this->session->set_flashdata('error_msg', 'Someone has registered with that email address. Please try another one');
			redirect(base_url('front/register'));
			echo "$email_check in else ";
	
>>>>>>> 4853bdbf95156db4e60aeacbe5736bf3bc1900c3
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
		$this->data = $this->user_model->login_user($user_login['email'],$user_login['password']);
// 		var_dump($this->data);
		if (isset($_SERVER['HTTP_REFERER'])) {
// 		    echo "session is empty";
		    $this->session->set_userdata('referer', $_SERVER['HTTP_REFERER']);
		}
// 		var_dump($_SESSION['referer']);
		if($this->data) {
// 			$this->load->view('user_profile.php');
// 			header('Location: ' . $_SERVER['HTTP_REFERER']);
// 			var_dump($_SESSION['referer']);
//          echo 'data is true';
// 			$this->data['subview'] = 'front/thunderbolt/cart';
//             var_dump($this->data);
// 			$this->load->view('user/user_profile', $this->data);
		    redirect($_SESSION['referer']);
		}
		else{
		    $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
		    $this->load->view("login.php");
		}
	
	}
	
	function user_profile(){
	
		$this->load->view('user/user_profile.php');
	
	}
	
	function schedule_private() {
	    
	    $this->load->view('user/user_profile.php');
	}
	
	public function user_logout(){
	
		$this->session->sess_destroy();
		redirect('', 'refresh');
	}
	
	
}