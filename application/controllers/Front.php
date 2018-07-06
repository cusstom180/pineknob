<?php
class Front extends MY_Controller {
	
	function __construct(){
		
		parent::__construct();
		$this->load->model('Front_model');
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
// 		var_dump($jumbotron);
		if($jumbotron) {
			
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
			} else {
				$this->data['jumbotron'] = null;
			}
		
		#create form 
		$this->data['form'] = 1;
		
		// see session data
		print_r($this->session->userdata);
		print_r($this->data);
		//load the page view
		$this->data['subview'] = 'front/Index';
		$this->load->view('front/_mainlayout', $this->data);
		
	}
	
	function shoppingcart() {
		unset($_SESSION['appoint']);
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
// 		echo "post array = ";
// 		var_dump($_POST);
		$requiredFields = array('sport', 'age', 'skill', 'date');
		$check = 0;
		if ($_POST) {
			echo "in if post check ";
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
		if ($check === count($requiredFields)) {  //removed  || $_SESSION['login'] don't know why i have this
			//get product details
// 			var_dump($_SESSION['lesson']);
// 			$this->session->form = $this->data['form'];
			$this->data['description'] = $this->Front_model->getRow('lesson', 'lesson_id', $_SESSION['lesson']);
// 			var_dump($this->data['form']);
// 			$_SESSION['form'] = $this->data['form'];
			
			unset($_SESSION['from']);
			print_r($this->session->userdata);
			//load the page view
			$this->data['subview'] = 'front/components/shoppingcart';
			$this->load->view('front/_mainlayout', $this->data);
		} 
		else {
			$this->session->set_flashdata('form', 'didnt work');
// 			print_r($this->session->userdata);
			redirect(base_url(), 'index');
		}
	}
	
	function checkout() {
		// redirect for a page refresh after appoint is inserted
		if (isset($_SESSION['appoint'])) {
			redirect(base_url(), 'index');
		}
		
		//get page meta data
		$this->data['page'] = $this->Front_model->callingBack();
		$this->data['title'] = $this->Front_model->getRow('title', 'slug', $this->data['page']);
		$this->data['meta'] = $this->Front_model->getAllRows('meta', 'slug', $this->data['page']);
		$whereArray = array('deploy' => '1', 'slug' => $this->data['page']);
		$this->data['alert'] = $this->Front_model->getRow('banner', $whereArray);
		
		foreach ($this->input->get(null, TRUE) as $key => $value) {
			$this->data[$key] = $value;
		}
		print_r($this->data);
// 		print_r($this->session->userdata);
		
		if ($this->data['success']) {
			$appointArray = array(
					'sport_id' => $_SESSION['sport'],
					'age_id' => $_SESSION['age'],
					'skill_id' => $_SESSION['skill'],
					'date' => $_SESSION['date'],
					'lesson_id' => $_SESSION['lesson'],
					'client_id' => $_SESSION['client'],
					'price' => $this->data['price'],
					'quantity' => $this->data['quantity'],
					'total' => $this->data['total']
						
			);
			$insertSuccess = $this->db->insert('appointment', $appointArray);
			
			//load the page view
			$this->data['subview'] = 'front/components/successcart';
			$this->load->view('front/_mainlayout', $this->data);
			
			unset($_SESSION['sport'], $_SESSION['age'], $_SESSION['skill'], $_SESSION['date'], $_SESSION['lesson'], $_SESSION['check1']);
			$_SESSION['appoint'] = TRUE;
			print_r($this->session->userdata);
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
		
		print_r($_GET);
		print_r($_POST);
		if (filter_input(INPUT_POST, 'add_to_cart', FILTER_SANITIZE_STRING)) {
			if (isset($_SESSION['shopping_cart'])) {
				array_push($_SESSION['shopping_cart'], array (
// 					'id' => filter_input($_GET['id']),
				 	'id' => filter_input(INPUT_GET, 'id'),
				 	'name' => filter_input(INPUT_POST, 'name'),
				 	'price' => filter_input(INPUT_POST, 'price'),
				 	'quantity' => filter_input(INPUT_POST, 'quantity')
				 ));
			} else {  					// if shopping cart doesn't exist create first product with array key 0
				$_SESSION['shopping_cart'][0] = array (
// 					'id' => filter_input($_GET['id']),
				 	'id' =>   filter_input(INPUT_GET, 'id'),
				 	'name' => filter_input(INPUT_POST, 'name'),
				 	'price' => filter_input(INPUT_POST, 'price'),
				 	'quantity' => filter_input(INPUT_POST, 'quantity')
				 );
			}
		}
		print_r($this->session->userdata);
		// not working 
// 		$product_ids = array();
// 		if (filter_input(INPUT_POST, 'add_to_cart', FILTER_SANITIZE_STRING)) {
// 			if (isset($_SESSION['shopping_cart'])) {
// 				echo "in if statement";
// 				$count = count($_SESSION['shopping_cart']);
// 				// create sequential array for matching array keys to product id's
// 				$product_ids = array_column($_SESSION['shopping_cart'], 'id');
				
// 				pre_r($product_ids);
// 			}
// 			else { // if shopping cart doesn't exist create first product with array key 0
// 				//create a array using submitted from data, start form key 0 and fill it with values
// 				$_SESSION['shopping_cart'][0] = array (
// // 					'id' => filter_input($_GET['id']),
// 					'id' =>   filter_input(INPUT_GET, 'id'),
// 					'name' => filter_input(INPUT_POST, 'name'),
// 					'price' => filter_input(INPUT_POST, 'price'),
// 					'quantity' => filter_input(INPUT_POST, 'quantity')
// 				);
				
// 			}
// 		}
// 		print_r($this->session->userdata);
		
		//load the page view
		$this->data['subview'] = 'front/thunderbolt/cart';
		$this->load->view('front/_mainlayout', $this->data);
	}
	  
	    
	function register() {
	    
	    //get page meta data
	    $this->data['page'] = $this->Front_model->callingBack();
	    $this->data['title'] = $this->Front_model->getRow('title', 'slug', $this->data['page']);
	    $this->data['meta'] = $this->Front_model->getAllRows('meta', 'slug', $this->data['page']);
	    $whereArray = array('deploy' => '1', 'slug' => $this->data['page']);
	    $this->data['alert'] = $this->Front_model->getRow('banner', $whereArray);
	    //check what last page was
	    if (isset($_SERVER['HTTP_REFERER'])) {
	        echo "session is " . $_SERVER['HTTP_REFERER'];
	        $this->session->set_userdata('referer', $_SERVER['HTTP_REFERER']);
	    }
	    var_dump($_SESSION);
	    //load view
	    $this->load->view("register.php");
	}
	
	
}