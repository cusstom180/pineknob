<?php
class Call extends MY_Controller {

	function __construct(){

		parent::__construct();
		$this->load->model('service_calls');
	}

	function index() {
	
		echo'hi';
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