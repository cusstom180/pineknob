<?php
class Front extends MY_Controller {
	
	function __construct(){
		
		parent::__construct();
		$this->load->model('Front_model');
		$this->data['nav'] = $this->Front_model->getAllRows('page');
// 		$this->load->helper('url');
	}
	
	function index() {
		
		$this->data['page'] = $this->Front_model->callingBack();
		$this->data['title'] = $this->Front_model->getRow('title', 'slug', $this->data['page']);
		$this->data['meta'] = $this->Front_model->getAllRows('meta', 'slug', $this->data['page']);
		$whereArray = array('deploy' => '1', 'slug' => $this->data['page']);
		$this->data['alert'] = $this->Front_model->getRow('banner', $whereArray);
		if (isset($_SERVER['HTTP_REFERER'])) {
		    echo "session is empty" .$_SERVER['HTTP_REFERER'];
		    $this->session->set_userdata('referer', $_SERVER['HTTP_REFERER']);
		}
		
		#get jumbotron row
		$jumbotron = $this->Front_model->getRow('jumbotron', $whereArray);
		foreach ($jumbotron as $key => $value) {						#create array to just capture the tag_ elements
			if ( strpos($key, 'ag') && !empty($value)) {
				$jumbotronTag[] = $value;
			}
		}
		# get pattern template
		$pattern = $this->Front_model->getRow('pattern','pattern_id', $jumbotron['pattern_id']);
// 		var_dump($pattern);
// 		$pattern2 = array();
		foreach ($pattern as $key => $value) {						#create array to just capture the tag_ elements
			if ( strpos($key, 'ag') && !empty($value)) {
				$patternTag[] = $value;
			}
		}
		# create array of key value paris of html tag with value 
		$jumbotronArray = array();
		
		for ($i = 0; $i < sizeof($patternTag); $i++) {
					$jumbotronArray[$patternTag[$i]] = $jumbotronTag[$i];
		}		
		$this->data['jumbotron'] = $jumbotronArray;
		
		#create form 
		$this->data['form'] = 1;
		
		// see session data
		print_r($this->session->userdata);
		//load the page view
		$this->data['subview'] = 'front/Index';
		$this->load->view('front/_mainlayout', $this->data);
		
	}
	
	function shoppingcart() {
		//get page meta data
		$this->data['page'] = $this->Front_model->callingBack();
		$this->data['title'] = $this->Front_model->getRow('title', 'slug', $this->data['page']);
		$this->data['meta'] = $this->Front_model->getAllRows('meta', 'slug', $this->data['page']);
		$whereArray = array('deploy' => '1', 'slug' => $this->data['page']);
		$this->data['alert'] = $this->Front_model->getRow('banner', $whereArray);
		//check what last page was
		if (isset($_SERVER['HTTP_REFERER'])) {
// 		    echo "session is " . $_SERVER['HTTP_REFERER'];
		    $this->session->set_userdata('referer', $_SERVER['HTTP_REFERER']);
		}
// 		var_dump($_SERVER);
		// check for submitted values for empty, if empty redirect back to index
		//create array from post 
		$this->data['form'] = array();
		echo "post array = ";
		var_dump($_POST);
		$requiredFields = array('sport', 'age', 'skill', 'date');
		$check = 0;
		if ($_POST) {
			echo "in if post check";
			foreach ($this->input->post(null, TRUE) as $key => $value) {
				$this->data['form'][$key] = $value;
				if (in_array($key, $requiredFields) && $value !== '') {
					// 				echo $key;
					$check++;
					
				}
// 				$this->session->set_userdata($this->data['form']);
			}
			$this->session->set_userdata($this->data['form']);
		}
		
		// if check variable is less then the required array redirect back to index
		if ($check === count($requiredFields) || $_SESSION['login']) {
			//get product details
// 			var_dump($_SESSION['lesson']);
// 			$this->session->form = $this->data['form'];
			$this->data['description'] = $this->Front_model->getRow('lesson', 'lesson_id', $_SESSION['lesson']);
// 			var_dump($this->data['form']);
// 			$_SESSION['form'] = $this->data['form'];
			
			
			print_r($this->session->userdata);
			//load the page view
			$this->data['subview'] = 'front/components/shoppingcart';
			$this->load->view('front/_mainlayout', $this->data);
		} 
		else {
			$this->session->set_flashdata('form', 'didnt work');
			print_r($this->session->userdata);
// 			redirect(base_url(), 'index');
		}
// 		if ($check) {
// 			$this->session->set_flashdata('form', $this->data['form']);
// 			redirect(base_url(), 'index');
// 		} 
// 		else {
// 			//get all available employees who can work that day
// 			$this->data['instructor'] = $this->Front_model->getAllworkingEmplList('employee_time_slot', $this->data['form']['date']);
			
// 			//load the page view
// 			$this->data['subview'] = 'front/components/formAjax';
// 			$this->load->view('front/_mainlayout', $this->data);
// 		}
	}
	
	function checkout() {
		
		//get page meta data
		$this->data['page'] = $this->Front_model->callingBack();
		$this->data['title'] = $this->Front_model->getRow('title', 'slug', $this->data['page']);
		$this->data['meta'] = $this->Front_model->getAllRows('meta', 'slug', $this->data['page']);
		$whereArray = array('deploy' => '1', 'slug' => $this->data['page']);
		$this->data['alert'] = $this->Front_model->getRow('banner', $whereArray);
		
		foreach ($this->input->get(null, TRUE) as $key => $value) {
			$this->data[$key] = $value;
		}
		var_dump($this->data);
		print_r($this->session->userdata);
		
		if ($this->data['success']) {
			$appointArray = array(
					'sport_id' => $_SESSION['sport'],
					'age_id' => $_SESSION['age'],
					'skill_id' => $_SESSION['skill'],
					'date' => $_SESSION['date'],
					'lesson_id' => $_SESSION['lesson'],
					'client_id' => $_SESSION['client_id'],
						
			);
			$insertSuccess = $this->db->insert('appointment', $appointArray);
				
			//load the page view
			$this->data['subview'] = 'front/components/successcart';
			$this->load->view('front/_mainlayout', $this->data);
		} else {
			echo "something failed";
			redirect(base_url(), 'front/shoppingcart');
		}
		
	}
	
	function thunderbolt() {
		function pre_r($array) {
			echo "<pre>";
			print_r($array);
			echo "</pre>";
		}
		//get page meta data
		$this->data['page'] = $this->Front_model->callingBack();
		$this->data['title'] = $this->Front_model->getRow('title', 'slug', $this->data['page']);
		$this->data['meta'] = $this->Front_model->getAllRows('meta', 'slug', $this->data['page']);
		$whereArray = array('deploy' => '1', 'slug' => $this->data['page']);
		$this->data['alert'] = $this->Front_model->getRow('banner', $whereArray);
		
// 		session_destroy();
		
		//get all products from db
		$this->data['products'] = $this->Front_model->getAll('products');
		
		$product_ids = array();
		if (filter_input(INPUT_POST, 'add_to_cart', FILTER_SANITIZE_STRING)) {
			if (isset($_SESSION['shopping_cart'])) {
				echo "in if statement";
				$count = count($_SESSION['shopping_cart']);
				// create sequential array for matching array keys to product id's
				$product_ids = array_column($_SESSION['shopping_cart'], 'id');
				
				pre_r($product_ids);
			}
			else { // if shopping cart doesn't exist create first product with array key 0
				//create a array using submitted from data, start form key 0 and fill it with values
				$_SESSION['shopping_cart'][0] = array (
					'id' => $_GET['id'],
// 					'id' =>   filter_input(INPUT_GET, 'id'),
					'name' => filter_input(INPUT_POST, 'name'),
					'price' => filter_input(INPUT_POST, 'price'),
					'quantity' => filter_input(INPUT_POST, 'quantity')
				);
				
			}
		}
		pre_r($_SESSION['shopping_cart']);
		
		//load the page view
		$this->data['subview'] = 'front/thunderbolt/cart';
		$this->load->view('front/_mainlayout', $this->data);
	}
	
	function schedule2() {
		
		//old schedule
		foreach ($_POST as $key => $value) {
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
		
		$insertSuccess = $this->db->insert('appointment', $appointArray);
		if ($insertSuccess) {
		
			$this->data['appID'] = $this->Front_model->getRow('appointment', 'session_id', $appointArray['session_id']);
			// 				var_dump($appID);
		}
		$appointArray['price'] = $this->Front_model->getRow('lesson', 'id', $appointArray['lesson_id']);
		var_dump($appointArray['price']);
		
		var_dump($array) ;
		
		// 		$insertSuccess = $this->db->insert('appointment', $array);
		$array = array(
				'lesson' => '$array['
		);
		$this->session->set_userdata($array);
		var_dump($this->session);
		echo $insertSuccess;
		
		//old schedule2
		
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
		
		
		//old checkout functions
		// check for submitted values for empty, if empty redirect back to index
		//create array from post
		$this->data['form'] = array();
		foreach ($this->input->post(null, TRUE) as $key => $value) {
			$this->data['form'][$key] = $value;
		}
		var_dump($this->data['form']);
		// check for required fields by comparing arrays
		$requiredFields = array('sport', 'age', 'skill', 'date');
		$check = 0;
		foreach ($this->data['form'] as $key => $value) {
			// 			echo "$key ";
			if (in_array($key, $requiredFields) && $value !== '') {
				echo $key;
				$check++;
			}
		}
		// if check variable is less then the required array redirect back to index
		if ($check === count($requiredFields)) {
			//load the page view
			$this->data['subview'] = 'front/components/formAjax';
			$this->load->view('front/_mainlayout', $this->data);
		} else {
			$this->session->set_flashdata('form', $this->data['form']);
			redirect(base_url(), 'index');
		}
		
	}
}