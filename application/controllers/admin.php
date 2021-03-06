<?php
require 'calendar_template.php';
 
class Admin extends MY_Controller {
	
	function __construct(){
	
		parent::__construct();
		$this->load->model('admin_model');
// 		$this->load->library('email');
	}
	
	function index() {
		$this->data['page'] = $this->admin_model->callbackPage();
// 		print_r(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2));
// 		var_dump($this->data['page']);
		$this->data['title'] = $this->admin_model->getPageTitle('title', $this->data['page'], NULL);
// 		var_dump($this->data['title']);
		
		if (isset($_SESSION['login_instructor']) && $_SESSION['login_instructor']) {
			if ($_SESSION['role'] === ( '1' || '2')) {
			// calendar format
			$prefs['template'] = '
			
		        {table_open}<table border="0" cellpadding="0" cellspacing="0">{/table_open}
					
		        {heading_row_start}<tr>{/heading_row_start}
					
		        {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
		        {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
		        {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}
					
		        {heading_row_end}</tr>{/heading_row_end}
					
		        {week_row_start}<tr>{/week_row_start}
		        {week_day_cell}<td>{week_day}</td>{/week_day_cell}
		        {week_row_end}</tr>{/week_row_end}
					
		        {cal_row_start}<tr>{/cal_row_start}
		        {cal_cell_start}<td>{/cal_cell_start}
		        {cal_cell_start_today}<td>{/cal_cell_start_today}
		        {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}
					
		        {cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}
		        {cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}
					
		        {cal_cell_no_content}{day}{/cal_cell_no_content}
		        {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}
					
		        {cal_cell_blank}&nbsp;{/cal_cell_blank}
					
		        {cal_cell_other}{day}{/cal_cel_other}
					
		        {cal_cell_end}</td>{/cal_cell_end}
		        {cal_cell_end_today}</td>{/cal_cell_end_today}
		        {cal_cell_end_other}</td>{/cal_cell_end_other}
		        {cal_row_end}</tr>{/cal_row_end}
					
		        {table_close}</table>{/table_close}';
			// get data for table
			$this->data['calendar'] = array();
			$days = cal_days_in_month(CAL_GREGORIAN,10,2018);
			$year = date('Y');
			$month = date('m');
			$day = date('d');
			for ($i = 0; $i <= $days; $i++) {
				array_push($this->data['calendar'], base_url('admin/calendardayview?date=' . $year . '-' . $month . '-' . $i));
			}
// 			var_dump($this->data['calendar']);
// 			$prefs['show_other_days'] = TRUE;
			$prefs['show_next_prev'] = true;
			var_dump($this->session->userdata);
			$this->load->library('calendar', $prefs);
// 			echo $this->calendar->generate(2010,3);

			// load calendarDayView table
// 			$date = date('Y-m-d');
			$date = '2018-08-31';
			$this->data['appt'] = $this->admin_model->getApptDetails($date);
			
			// load view
			$this->data['subview'] = 'admin/subviews/index';
			$this->load->view('admin/mainLayout.php', $this->data);
			}
			elseif ($_SESSION === '3') {
				echo 'instructor view';
			}
		} else {
		
		// load view
		$this->data['subview'] = 'admin/subviews/login';
		$this->load->view('admin/mainLayout.php', $this->data);
		}
	}
	
	function login_user(){
		$user_login=array(
				'email'=> filter_input(INPUT_POST, 'email'),
				'password'=> md5(filter_input(INPUT_POST, 'password'))
		);
// 				var_dump($user_login);
		$data = $this->admin_model->login_user($user_login['email'],$user_login['password']);
// 				var_dump($data);
		
		// 		var_dump($_SESSION['referer']);
		if($data) {
			$this->session->set_userdata('instructor_id',$data['instructor_id']);
			$this->session->set_userdata('first_name',$data['first_name']);
			$this->session->set_userdata('last_name',$data['last_name']);
			$this->session->set_userdata('email',$data['email']);
			$this->session->set_userdata('role',$data['role']);
			// 			$this->session->set_userdata('mobile',$data['mobile']);
			$this->session->set_userdata('login_instructor', TRUE);
			redirect(base_url('admin'));
		}
		else{
			$this->session->set_flashdata('error_msg', 'Error occured,Try again.');
			redirect(base_url('admin'));
		}
	}
	
	public function logout(){
	
		unset($_SESSION['login']);
		$this->session->sess_destroy();
		redirect('admin', 'refresh');
	}
	
	public function send_email() {
		$this->load->library('email');
		$config['protocol']='smtp';
		$config['smtp_host']='ssl://smtp.gmail.com';
		$config['smtp_port']='465';
// 		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['smtp_timeout']='30';
		$config['smtp_user']='pineknobskischooltest@gmail.com';
		$config['smtp_pass']='itchyMoon10';
		$config['charset']='utf-8';
		$config['newline']="\r\n";
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->from('no-reply@your-site.com', 'Site name');
		$this->email->to('to-address-mail-id');
		$this->email->subject('Notification Mail');
		$this->email->message('Your message');
		$this->email->send();
		echo $this->email->print_debugger();
	}
	
	function adduser() {	
		$this->load->helper('string');
// 		var_dump($_POST);
		$instuctor_cde = array();
		
		$post_array = array(
				'first_name' => filter_input(INPUT_POST, 'first_name'),
				'last_name' => filter_input(INPUT_POST, 'last_name'),
				'email' => filter_input(INPUT_POST, 'email'),
				'role' => filter_input(INPUT_POST, 'role'),
				'instructor_cde' => filter_input(INPUT_POST, 'instructor_cde'),
				'active' => FALSE,
				'register_cde' => md5(random_string('alpha', 12))
		);
// 		var_dump($post_array);
		$email_check = $this->admin_model->check_email($post_array['email']);
// 		var_dump($email_check);
		if (!$email_check) {
			echo "enter in another email";
			$this->session->set_flashdata('error_add_msg', 'enter in another email.');
			redirect('admin');
		} else {
// 			var_dump($post_array);
			$result = $this->admin_model->add_user($post_array);
			if ($result) {
				echo "it worked";
				// send link link
// 				$sender_email = 'pineknobskischooltest@gmail.com';
			
				
				
// 				$this->email->from('your@example.com', 'Your Name');
// 				$this->email->to('someone@example.com');
				
// 				$this->email->subject('Email Test');
// 				$this->email->message('Testing the email class.');
				
// 				$this->send_email();
				
				$linkarray = $this->admin_model->getLinkAddress($post_array);
				$link = base_url('admin/registarclient') . '/' . $linkarray['first_name'] . '/' . $linkarray['last_name'] . '/' . $linkarray['register_cde'];
				var_dump($link);
				$this->session->set_flashdata('success_add_msg', 'client has been added to system');
// 				redirect('admin');
			}
		}
		
	}
	
	
	
	function registarclient() {				// WORKING HERE TO ADD PASSWORD UPDATE
		$first = $this->uri->segment(3);
		$last = $this->uri->segment(4);
		$reg_cde = $this->uri->segment(5);
		echo "$first $first $reg_cde";
		$data = $this->admin_model->getRow('instructor', $where = array('first_name' => $first, 'last_name' => $last, 'register_cde' => $reg_cde, 'active' => 0));
		var_dump($data);
		if($data) {
			$this->data['instructor_form'] = TRUE;
		}
		if (filter_input(INPUT_POST, 'submit')) {
			echo 'submit true';
			var_dump($_POST);
			if ($this->admin_model->getRow('instructor', $where2 = array('email' => filter_input(INPUT_POST, 'email'), 'active' => 0 ))) {
				$result = $this->admin_model->setInstructorPassword(filter_input(INPUT_POST, 'new_password'), filter_input(INPUT_POST, 'email'));
				if ($result) {
					$this->data['set_pass'] = TRUE;
				}
				
			}
		}
		// load view
			$this->data['subview'] = 'admin/subviews/registar';
			$this->load->view('admin/mainLayout.php', $this->data);
	
	}
	
	function calendardayview() {
		
// 		$this->data['appt'] = $this->admin_model->getAllRows('appointment', 'date', filter_input(INPUT_GET, 'date'));
		$this->data['appt'] = $this->admin_model->getApptDetails($this->input->get('date', true));
// 		$this->data['header'] = $this->admin_model->getTitlecolumns($this->input->get('date'));
// 		var_dump($this->data['appt']);
// 		echo $this->db->last_query();
		var_dump($this->data['appt']);
// 		echo $this->db->last_query();
		
		// load view
		$this->data['subview'] = 'admin/subviews/day_appointments';
		$this->load->view('admin/mainLayout.php', $this->data);
	}
	
	function dayview() {
// 		var_dump($this->input->get('id', TRUE));
		$this->data['day'] = $this->admin_model->getDayViewDetails($this->input->get('id', TRUE));
		var_dump($this->data['day']);
				echo $this->db->last_query();
		
		// ***************************************************
		$intructor_array = array();
// 		var_dump($this->data['day']['sport']);
		switch ($this->data['day']['sport']) {
			case 'ski':
				array_push($intructor_array, '1');
				array_push($intructor_array, '3');
				break;
					
			case 'snowboard':
				array_push($intructor_array, '2');
				array_push($intructor_array, '3');
				break;
		
			case 'both':
				array_push($intructor_array, '1');
				array_push($intructor_array, '2');
				array_push($intructor_array, '3');
				break;
					
			default:
				array_push($intructor_array, '3');
				break;
		}
		
		// write a query to get all the instructors with teh proper instructor cde 
		$this->data['instructor'] = $this->admin_model->getAllInstructor($intructor_array);
// 		var_dump($this->data['instructor']);
// 		echo $this->db->last_query();
		// load view
		$this->data['subview'] = 'admin/subviews/day_view';
		$this->load->view('admin/mainLayout.php', $this->data);
	}
	
	function updateInstructor() {
		var_dump($_POST);
		if ($this->input->post('check1', TRUE)) {
			$update = $this->admin_model->updateInstructor($this->input->post('appt', TRUE), $this->input->post('instructor', TRUE));	
// 			var_dump($update);

			if($update) {
				redirect(base_url('admin/calendardayview?date=' . $this->input->post('date', True)));
			} else {
				echo 'something went wrong';
			}
		}
	}
	
	// 	function home() {
	// 		$this->data['page'] = $this->admin_model->callingBack();
	// 		$this->data['title'] = $this->admin_model->getRow('title', 'slug', $this->data['page']);
	// 		print_r($this->data['page']);
	// 		//check if login
	// 		if ($_SESSION['login']) {
	// 			echo "home";
		
	// 			// load view
	// 			$this->data['subview'] = 'admin/subviews/index';
	// 			$this->load->view('admin/mainLayout.php', $this->data);
	// 		} else {
	// 			unset($_SESSION);
	// 			redirect(base_url('admin/login.php'));
	// 		}
	// 	}
	
}