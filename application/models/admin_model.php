<?php
class Admin_model extends MY_Model {

	function __construct() {

		parent::__construct();
		$this->load->library('Email');
	}
	
	public function login_user($email,$pass){
	
		$this->db->select('*');
		$this->db->from('instructor');
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
		
		$check = $this->db->insert('instructor', $array);
// 				echo $this->db->last_query();
		return $check;
	}
	
	public function check_email($email) {
		$this->db->select('*');
		$this->db->from('instructor');
		$this->db->where('email',$email);
		$query=$this->db->get();
		
		if($query->num_rows()>0){
			return false;
		}else{
			return true;
		}
	}
	
	public function checkEmailID($array) {
		$this->db->select('*');
		$this->db->from('instructor');
		$this->db->where($array);
		$query=$this->db->get();
		echo $this->db->last_query();
		if($query->num_rows()>0){
			return false;
		} else {
			return true;
		}
	}
	
// 	public function check_temp_password($array) {
// 		$this->db->select('*');
// 		$this->db->from('user');
// 		$this->db->where($array);
// 		$query=$this->db->get();
		
// 		if($query->num_rows()>0){
// 			return false;
// 		}else{
// 			return true;
// 		}
// 	}
	
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
	
	public function getAppt($date) {
		$this->db->select('*');
		$this->db->from('appointment_view');
		$this->db->where('date',$date);
		$query=$this->db->get();
		
		if($query->num_rows()>0){
			return false;
		}else{
			return true;
		}
	}
	
	public function getTitlecolumns($date){
// 	$query = $this->db->query('SELECT appointment.appt_id, customer.first_name, customer.last_name, sport.name, lesson.name, age.age, skill.name, instructor.first_name, instructor.last_name, appointment.date FROM appointment join customer on customer.customer_id = appointment.customer_id join sport on sport.id = appointment.sport_id join lesson on lesson.lesson_id = appointment.lesson_id join age on age_id = appointment.age_id join skill on skill.id = appointment.skill_id join instructor on instructor.instructor_id = appointment.instructor_id');
	$query = $this->db->query('SELECT 10 FROM DUAL');
		
				var_dump($query->result_array()) ;
				echo $this->db->last_query();
		
	}
	
	public function getAllInstructor($wherein) {
		$this->db->select('*');
		$this->db->from('instructor');
		$this->db->where_in('instructor_cde', $wherein);
		$query=$this->db->get();
		
		if($query->num_rows()>0){
			return $query->result_array();;
		}else{
			return FALSE;
		}
	}
	
	public function getApptDetails($date) {
		$query = $this->db->query("SELECT appointment.appt_id, customer.first_name as 'customer first', customer.last_name as 'customer last', sport.name as 'sport', lesson.name as 'lesson', 
				age.age, skill.name as skill, instructor.instructor_id, instructor.first_name as 'instructor first', instructor.last_name as 'instructor last', appointment.date FROM appointment 
                join customer on customer.customer_id = appointment.customer_id
				join sport on sport.id = appointment.sport_id 
                join lesson on lesson.lesson_id = appointment.lesson_id 
                join age on age.id = appointment.age_id
				join skill on skill.id = appointment.skill_id 
                join instructor on instructor.instructor_id = appointment.instructor_id  where appointment.date = '$date'");
		
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return FALSE;
		}
		
	}
	
	public function getDayViewDetails($id) {
		$query = $this->db->query("SELECT appointment.appt_id, customer.first_name as customer_first, customer.last_name as customer_last, sport.name as 'sport', lesson.name as 'lesson', 
				age.age, skill.name as skill, instructor.instructor_id, instructor.first_name as instructor_first, instructor.last_name as instructor_last, appointment.date FROM appointment 
                join customer on customer.customer_id = appointment.customer_id
				join sport on sport.id = appointment.sport_id 
                join lesson on lesson.lesson_id = appointment.lesson_id 
                join age on age.id = appointment.age_id
				join skill on skill.id = appointment.skill_id 
                join instructor on instructor.instructor_id = appointment.instructor_id where appointment.appt_id = '$id'");
		
		if($query->num_rows()>0){
			return $query->row_array();
		}else{
			return FALSE;
		}
	}
	
	public function updateInstructor($app_id, $instructor_id) {
		$this->db->set('instructor_id', $instructor_id);
		$this->db->where('appt_id', $app_id);
		return $result = $this->db->update('appointment');
	}
	
	public function getLinkAddress($array) {
		$this->db->select('*');
		$this->db->from('instructor');
		$this->db->where('active', 0);
		$this->db->where('register_cde', $array['register_cde']);
		$query=$this->db->get();
		
		if($query->num_rows()>0){
			return $query->row_array();
		}else{
			return FALSE;
		}
	}
	
	public function setInstructorPassword($password, $email) {
		$this->db->set('password', md5($password));
		$this->db->set('active', TRUE);
		$this->db->where('email', $email);
		return $result = $this->db->update('instructor');
	}
}
