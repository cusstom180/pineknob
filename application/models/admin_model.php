<?php
class Admin_model extends MY_Model {

	function __construct() {

		parent::__construct();
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
	
}
