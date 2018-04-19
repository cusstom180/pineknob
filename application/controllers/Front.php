<?php
class Front extends MY_Controller {
	
	function __construct(){
		
		parent::__construct();
		$this->load->model('Front_model');
		$this->data['nav'] = $this->Front_model->getAllRows('page');
	}
	
	function index() {
		
		$this->data['page'] = $this->Front_model->callingBack();
		$this->data['title'] = $this->Front_model->getAllRows('title', 'slug', $this->data['page']);
		$this->data['meta'] = $this->Front_model->getAllRows('meta', 'slug', $this->data['page']);
		$whereArray = array('deploy' => '1', 'slug' => $this->data['page']);
		$this->data['alert'] = $this->Front_model->getAllRows('banner', $whereArray);
		
		#get jumbotron row
		$jumbo = $this->Front_model->getAllRows('jumbotron', $whereArray);
// 		var_dump($jumbo);
		#shorten array
		foreach ($jumbo as $key) {
			$jumbo2 = $key;
		}
// 		var_dump($jumbo2);											#content array
		$jumbo3 = array();
		foreach ($jumbo2 as $key => $value) {
			if ( strpos($key, 'ag') && !empty($value)) {
				$jumbo3[] = $value;
			}
		}
// 		var_dump($jumbo3);
		# get pattern template
		$patternId = $jumbo2['pattern_id'];
		$pattern = $this->Front_model->getAllRows('pattern','id', $patternId);
		
		#shorten array
		foreach ($pattern as $value) {
			$pattern2 = $value;
		}
		foreach ($pattern2 as $key => $value) {
			if ( strpos($key, 'ag') && !empty($value)) {
				$pattern3[] = $value;
			}
		}
// 		var_dump($pattern3);										#pattern array
// 		echo sizeof($pattern3);
		# create array of key value paris of html tag with value 
		$jumbotron = array();
		
		for ($i = 0; $i < sizeof($pattern3); $i++) {
					$jumbotron[$pattern3[$i]] = $jumbo3[$i];
// 					echo "$i ";
		}			
		
		$this->data['jumbotron'] = $jumbotron;
		
		
		#create form 
		$this->data['form'] = 1;
		
		//load the page view
		$this->data['subview'] = 'front/Index';
		$this->load->view('front/_mainlayout', $this->data);
		
	}
	
	function schedule() {
		
		$this->data['page'] = $this->Front_model->callingBack();
		$this->data['title'] = $this->Front_model->getAllRows('title', 'slug', $this->data['page']);
		$this->data['meta'] = $this->Front_model->getAllRows('meta', 'slug', $this->data['page']);
		$whereArray = array('deploy' => '1', 'slug' => $this->data['page']);
		$this->data['alert'] = $this->Front_model->getAllRows('banner', $whereArray);
		$this->data['form'] = array();
		
		// get instructor names
		//$this->data['instructor'] = $this->Front_model->getAll('employee');
		
		foreach ($_POST as $key => $value) {
			$this->data['form'][$key] = $value;
		}
// 		var_dump($this->data['form']);
		
		// search for working instructors
		$intArray = array(
				'date' => $this->data['form']['date'],
				'working' => '1'
		);
		$this->data['instructor'] = $this->Front_model->getAllworkingEmpl('employee_day_sch', $intArray);
// 		var_dump($this->data['instructor']);
		
		//load the page view
		$this->data['subview'] = 'front/components/formAjax';
		$this->load->view('front/_mainlayout', $this->data);
		
	}
	
	function checkout() {
		foreach ($_POST as $key => $value) {
			$this->data['form'][$key] = $value;
		}
		var_dump($this->data['form']) ;
	}
	
	function schedule2() {
		
// 		var_dump($_POST);
// 		$sport = null !== $this->input->post('sport_id') ? $this->input->post('sport_id', TRUE) : NULL;
// 		$lesson = null !== $this->input->post('lesson_id') ? $this->input->post('lesson_id', TRUE) : NULL;
// 		$age = null !== $this->input->post('age_id') ? $this->input->post('age_id', TRUE) : NULL;
// 		$skill = null !== $this->input->post('skill_id') ? $this->input->post('skill_id', TRUE) : NULL;
// 		$date = date('Y-m-d',strtotime($_POST['date']));
		$this->data['instructor'] = null !== $this->input->post('instructor') ? $this->input->post('instructor', TRUE) : NULL;
// 		$duration = null !== $this->input->post('duration') ? $this->input->post('duration', TRUE) : NULL;
// 		$time = null !== $this->input->post('time') ? $this->input->post('time', TRUE) : NULL;
		
		// get instructor names
		$this->data['instructor'] = $this->Front_model->getAll('employee');
		
		$this->data['time'] = array();
		
		$time = $this->Front_model->getAll('employee');
		foreach ($time as $key => $value) {
			if (strpos($key, 'slot_')) {
				$newtime = date('h:i a');
				array_push($this->data['time'], $newtime);
			}
		}
// 		var_dump($_POST);
		
		
// 		$this->data['form'] = array(
// 				'sport_id' => $sport,
// 				'lesson_id' => $lesson,
// 				'age_id' => $age,
// 				'skill_id' => $skill,
// 				'date' => $date,
// 				'instructor' => $instructor,
// 				'duration' => $duration,
// 				'time' => $time
// 		);
		//load the page view
		//load the page view
		$this->data['subview'] = 'front/components/form5';
		$this->load->view('front/_mainlayout', $this->data);
		
		
		
		//old schedule
		$sport = null !== $this->input->post('sport') ? $this->input->post('sport', TRUE) : NULL;
		$lesson = null !== $this->input->post('lesson') ? $this->input->post('lesson', TRUE) : NULL;
		$age = null !== $this->input->post('age') ? $this->input->post('age', TRUE) : NULL;
		$skill = null !== $this->input->post('skill') ? $this->input->post('skill', TRUE) : NULL;
		$date3 = date('Y-m-d',strtotime($_POST['date']));
		echo "$sport ";
		echo "$lesson ";
		echo "$age ";
		echo "$skill ";
		echo "$date3 ";
		
		$this->data['form'] = array(
				'sport_id' => $sport,
				'lesson_id' => $lesson,
				'age_id' => $age,
				'skill_id' => $skill,
				'date' => $date3
		);
		
		// get instructor names
		$this->data['instructor'] = $this->Front_model->getAll('employee');
		
		//load the page view
		$this->data['subview'] = 'front/components/form5';
		$this->load->view('front/_mainlayout', $this->data);
		
	}
}