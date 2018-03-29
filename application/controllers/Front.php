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
		$patternId = $jumbo2['pattern'];
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
}