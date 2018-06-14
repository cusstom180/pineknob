<?php
class user_model extends MY_Model {
	
	function __construct() {
	
		parent::__construct();
	}
	
	public function register_user($user){
	
	
		$this->db->insert('client', $user);
	
	}
	
	public function login_user($email,$pass){
	
		$this->db->select('*');
		$this->db->from('client');
		$this->db->where('email',$email);
		$this->db->where('password',$pass);
	
		if($query=$this->db->get())
		{
			return $query->row_array();
		}
		else{
			return false;
		}
	}
	
	public function email_check($email){
	
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

}
