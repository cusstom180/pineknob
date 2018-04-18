<?php
class Call extends MY_Controller {

	function __construct(){

		parent::__construct();
		$this->load->model('service_calls');
	}

	function index() {
	
		echo'hi';
	}
	
	function callDropdown() {
		
		foreach ($_POST as $key => $value) {
			$this->data['form'][$key] = $value;
		}
		var_dump($this->data['form']);
		if (isset($this->data['form']['instructor'])) {
			$array = array(
					 'employee_id' => $this->data['form']['instructor'],
					'day' => $this->data['form']['date']
			);
			
			$this->data['apptTime'] = $this->service_calls->getOneRow('employee_day_time_sch', $array);
			var_dump($this->data['apptTime']);
// 			echo $this->db->last_query();
		}
		
		$this->load->view('front/components/pickAForm', $this->data);
	}
	
	function callForm() {
		
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