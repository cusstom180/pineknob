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
		#shorten array
		foreach ($jumbo as $key) {
			$jumbo2 = $key;
		}
// 		var_dump($jumbo2);											#content array
// 		echo sizeof($jumbo2);
		
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
		
		foreach ($jumbo2 as $key => $value) {}
		
		foreach ($pattern2 as $key => $value) {
			if ( strpos($key, 'ag') && !empty($value)) {
				$pattern3[] = $value;
			}
		}
// 		var_dump($pattern3);										#pattern array
		echo sizeof($pattern3);
		# create array of key value paris of html tag with value 
		$jumbotron = array();
		
		for ($i = 0; $i < sizeof($pattern3); $i++) {
// 			foreach ($jumbo3 as $key => $value) {
// 				if (strpos($key, 'ag') && !empty($value)) {
					$jumbotron[$i] = $value;
					echo $i;
// 				}
// 			}
		}
		
// 		$jumbotron[$pattern3['0']]= $jumbo2['tag_1'];
// 		$jumbotron[$pattern3['1']] = $jumbo2['tag_2'];
		var_dump($jumbotron);
		
// 		foreach ($jumbo2 as $key => $value) {
// 			if (strpos($key, 'ag') && !empty($value)) {
// 				$jumbotron[$key] = 
// 			}
// 		}
		
// 		if (!empty($jumbo2['tag_1'])) {
//  			$jumbotron = $jumbo2['tag_1'];
// 			$jumbotron[$pattern3['0']]= $jumbo2['tag_1'];
// 			$jumbotron[$pattern3['1']] = $jumbo2['tag_2'];
// 			$jumbotron[$trail2['tag_3']] = $jumbo2['tag_3'];
			
//  			var_dump($jumbotron);
			
// 		}
			
		
		$this->data['jumbotron'] = $jumbotron;
		
		
		
		
		
		
// 		foreach ($this->data['pattern'] as $key => $value) {
// 			if (!empty($value['tag_1'])) {
// 				echo 'not empty ';
// 				echo $value['tag_1'];
// // 				$comboarray[] = array('$value['tag_1']' => '');
// 			}
// 			else {
// 				echo 'empty';
// 			}
// 		}
// 		var_dump($jumbo);
// 		var_dump($this->data['pattern']);
		
		//load the page view
		$this->data['subview'] = 'front/Index';
		$this->load->view('front/_mainlayout', $this->data);
	}
}