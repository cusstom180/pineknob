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
		
		$sport = null !== $this->input->post('sport') ? $this->input->post('sport', TRUE) : NULL;
		$lesson = null !== $this->input->post('lesson') ? $this->input->post('lesson', TRUE) : NULL;
		$age = null !== $this->input->post('age') ? $this->input->post('age', TRUE) : NULL;
		$duration = null !== $this->input->post('duration') ? $this->input->post('duration', TRUE) : NULL;
		$skill = null !== $this->input->post('skill') ? $this->input->post('skill', TRUE) : NULL;
		$old_date = null !== $this->input->post('date') ? $this->input->post('date', TRUE) : NULL;
		$date = date('d-m-Y');
		$client = null !== $this->input->post('client') ? $this->input->post('client', TRUE) : NULL;
		$date3 = date('Y-m-d',strtotime($_POST['date']));
		echo "$sport ";
		echo "$lesson ";
		echo "$age ";
		echo "$duration ";
		echo "$skill ";
		echo "$old_date ";
		echo "$date ";
		echo "$date3 ";
		
		$this->data['form'] = array(
		    'sport_id' => $sport,
		    'lesson_id' => $lesson,
			'age_id' => $age,
			'duration_id' => $duration,
			'skill_id' => $skill,
			'date' => $date,
			'client_id' => $client
		);
		
		//load the page view
		$this->data['subview'] = 'front/components/form2';
		$this->load->view('front/_mainlayout', $this->data);
		
// 		it inserted into db
// 		$insert = array(
// 				'sport_id' => $sport,
// 				'lesson_id' => $lesson,
// 				'age_id' => $age,
// 				'duration_id' => $duration,
// 				'skill_id' => $skill,
// 				'date' => $date,
// 				'client_id' => $client
				
// 		);
// 		var_dump($insert);
// 		$work = $this->db->insert('appointment', $insert);
// 		echo $work;
	}
}