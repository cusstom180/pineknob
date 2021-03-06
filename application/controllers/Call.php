<?php
class Call extends MY_Controller {

	function __construct(){

		parent::__construct();
		$this->load->model('service_calls');
	}

	function index() {
	
		echo'hi';
	}
	
	function cashout() {
		$this->data['page'] = $this->service_calls->callingBack();
		$this->data['title'] = $this->service_calls->getRow('title', 'slug', $this->data['page']);
		$this->data['meta'] = $this->service_calls->getAllRows('meta', 'slug', $this->data['page']);
		$whereArray = array('deploy' => '1', 'slug' => $this->data['page']);
		$this->data['alert'] = $this->service_calls->getRow('banner', $whereArray);
	    
		foreach ($this->input->get(null, TRUE) as $key => $value) {
			$this->data[$key] = $value;
		}
		if (isset($_SESSION['guest']) && $_SESSION['guest'] ) {
			$appointArray['client_id'] = 69;
		} else if (isset($_SESSION['user_id'])) {
			$appointArray['client_id'] = $_SESSION['user_id'];
			unset($_SESSION['guest']);
		}
		var_dump($_SESSION);
		if ($this->data['success']) {
// 			var_dump($_GET);
// 			var_dump($this->session->userdata());
			foreach ($_SESSION['form'] as $key => $value) {
				if($key === 'sport') {
					$key = $key . '_id';
				}
				if($key === 'lesson') {
					$key = $key . '_id';
				}
				if($key === 'age') {
					$key = $key . '_id';
				}
				if($key === 'instructor') {
					$key = 'employee_id';
				}
				if($key === 'duration') {
					$key = $key . '_id';
				}
				if($key === 'skill') {
					$key = $key . '_id';
				}
				if($key === 'check1') {
					$key = NULL;
					$value = NULL;
				} else {
					$appointArray[$key] = $value;
				}
			}
			$appointArray['session_id'] = $_SESSION['__ci_last_regenerate'];
			if (isset($_SESSION['guest']) && $_SESSION['guest'] ) {
				$appointArray['client_id'] = 69;
			} else if (isset($_SESSION['user_id'])) { 
				$appointArray['client_id'] = $_SESSION['user_id'];
				unset($_SESSION['guest']);
			}
			var_dump($this->session->userdata());
			var_dump($appointArray);
			$insertSuccess = $this->db->insert('appointment', $appointArray);
			
			//load the page view
			$this->data['subview'] = 'front/components/successcart';
			$this->load->view('front/_mainlayout', $this->data);
			
		} else {
			echo "something failed";
			redirect(base_url(), 'front/shoppingcart');
		}
	}
	
	public function guestuser() {		// only using this one
		echo "guest user is zero";
		$this->session->set_userdata('customer', TRUE);
// 		$this->session->set_userdata('user_id', TRUE);
	}
	
	public function destroy() {		// only using this one
		echo "destroy session data";
		session_unset();
		redirect(base_url('front/thunderbolt'));
	}
	
	function callForm() {
		# collect post varaibles
		foreach ($this->input->post(null, TRUE) as $key => $value) {
			$this->data['form'][$key] = $value;
		}
		if (!empty($this->data['form']['instructor'])) {
// 			$array = array(
// 					'employee_id' => $this->data['form']['instructor'],
// 					'day' => $this->data['form']['date']
// 			);
// 			echo $this->data['form']['instructor'];
			#get time slots in DB
			$this->data['timeSlot'] = $this->service_calls->getAllworkingEmplTime('employee_time_slot', $this->data['form']['date'], $this->data['form']['instructor']);
// 			echo $this->db->last_query();
			
			$this->load->view('front/components/pickAForm', $this->data);
		}
		
	}
	
	function callDropdown() {
		# collect post varaibles
		$check = 0;
		foreach ($_POST as $key => $value) {
			$this->data['form'][$key] = $value;
			if (!$value) {
				$check++;
				echo ' hi ';
			}
		}
		// check for empty form values
		
		
// 		var_dump($this->data['form']);
// 		echo $check;
		if ($check) {
			$this->session->set_flashdata('form', $this->data['form']);
			
		} else {
		
			#if time is posted 
			#check if an instructor has been selected
			var_dump($this->data['form']);
			if (isset($this->data['form']['instructor'])) {
				$array = array(
						 'employee_id' => $this->data['form']['instructor'],
						'day' => $this->data['form']['date']
						);
				#get time slots in DB
				$this->data['timeSlot'] = $this->service_calls->getEmployeeTimeSlot('employee_day_time_sch', 'employee_day_sch', $this->data['form']['instructor'], $this->data['form']['date']);
// 				var_dump($this->data['timeSlot']);
// 				echo $this->db->last_query();
			}	
		}
		
// 		echo  json_encode($this->data['timeSlot']);
		$this->load->view('front/components/pickAForm', $this->data);
	}
	
	function callFormTwo() {
		
	    foreach ($_POST as $key => $value) {
	        $this->data['form'][$key] = $value;
	    }
// 	    var_dump($this->data['form']);
	    if (isset($this->data['form']['instructor'])) {
	        $time = $this->Front_model->getAllRows('employee_day_time_sch', 'employee_id', $this->data['form']['instructor']);
	       foreach ($time as $value) {
	           $this->data['time'] = $value;
	       }
	    }
	    
// 	    var_dump($this->data['form']);
// 	    var_dump($this->data['time']);
	    $this->load->view('front/components/pickAForm', $this->data);
	    
	}
	
}