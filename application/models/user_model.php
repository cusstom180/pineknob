<?php
class user_model extends MY_Model {
	
	function __construct() {
	
		parent::__construct();
	}
	
	public function register_user($user){
	
	
		$check = $this->db->insert('user', $user);
// 		echo $this->db->last_query();
		return $check;
	}
	
	public function login_user($array){
	
		$this->db->select('user_id, first_name, last_name');
		$this->db->from('user');
		$this->db->where($array);
		
// 		var_dump($query=$this->db->get());
		if($query = $this->db->get())
		{
			return $query->row_array();
		}
		else{
			return false;
			
		}
	}
	
	public function email_check($email){
	
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('email',$email);
		$query=$this->db->get();
	
		if($query->num_rows()>0){
			return false;
		}else{
			return true;
		}
	}

}
