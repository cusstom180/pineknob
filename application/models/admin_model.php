<?php
class Admin_model extends MY_Model {

	function __construct() {

		parent::__construct();
		$this->load->library('Email');
	}
	
	public function login_user($email,$pass){
	
		$this->db->select('*');
		$this->db->from('client');
		$this->db->where('email', $email);
		$this->db->where('password', $pass);
	
		if($query=$this->db->get())
		{
			return $query->row_array();
		}
		else{
			return false;
		}
	}
	
	public function add_user($array) {
		
		$check = $this->db->insert('client', $array);
		// 		echo $this->db->last_query();
		return $check;
	}
	
	public function check_email($email) {
		$this->db->select('*');
		$this->db->from('client');
		$this->db->where('email',$email);
		$query=$this->db->get();
		
		if($query->num_rows()>0){
			return false;
		}else{
			return true;
		}
	}
	
	public function check_temp_password($array) {
		$this->db->select('*');
		$this->db->from('client');
		$this->db->where($array);
		$query=$this->db->get();
		
		if($query->num_rows()>0){
			return false;
		}else{
			return true;
		}
	}
	
	public function check_passwords($string1, $string2) {
		return $check = strcasecmp($string1, $string2);
	}
	
	public function sendEmail($address) {
		
		
		// The mail sending protocol.
		$config['protocol'] = 'smtp';
		// SMTP Server Address for Gmail.
		$config['smtp_host'] = 'ssl://smtp.gmail.com';
		// SMTP Port - the port that you is required
		$config['smtp_port'] = '465';
		// SMTP Username like. (abc@gmail.com)
		$config['smtp_user'] = 'pineknobskischooltest@gmail.com';
		// SMTP Password like (abc***##)
		$config['smtp_pass'] = 'itchyMoon10';
		
		$config['mailtype'] = 'html';
		
		$config['charset'] = 'utf-8';
		
		
		$this->email->initialize($config);
		
		$this->email->from('pineknobskischooltest');
		$this->email->to($address);
		$this->email->subject('email test');
		$this->email->message('testing the email function');
	
		$this->email->send();
		
// 		echo $this->email->print_debugger();
	}
}
