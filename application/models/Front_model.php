<?php
class Front_model extends MY_Model {
    
    function __construct() {
        
        parent::__construct();
    }
    
    public function getAll($table){
    
    	$query = $this->db->get($table)->result_array();
    	return $query;
    }
    
    //function to call all employees that are scheduled to work a specific day
    public function getAllworkingEmplList($tableName, $date) {
        
        $this->db->select($tableName . '.employee_id');
        $this->db->select('employee.first_name');
        $this->db->select('employee.last_name');
        $this->db->from($tableName);
        $this->db->join('date', 'date.id = ' . $tableName . '.date_id');
        $this->db->join('employee', 'employee.employee_id = ' . $tableName . '.employee_id');
       
        $query = $this->db->where('date.date', $date);
    	$result = $query->get()->result_array();
//     	var_dump($result);
//     	$teacher = array();
//     	foreach ($result as $key => $value) {
//     		$data = $this->getAllRows('employee', 'employee_id', $value['employee_id']);
//     		array_push($teacher, $data);
// //     		var_dump($value);
//     	}
//     	var_dump($teacher);
    	return $result;
    }
    
    public function login_user($array){
    
    	$this->db->select('customer_id, first_name, last_name');
    	$this->db->from('customer');
    	$this->db->where($array);
    
    	// 		var_dump($query=$this->db->get());
    	if($query = $this->db->get())
    	{
    		return $query->row_array();
    	}
    	else{
    		return false;
    			
    	}
    }
    
    

//     // search for working instructors
//     $intArray = array(
//     		'date' => $date,
//     		'working' => '1'
//     );
    
//     $query = $this->db->where($intArray);
//     $result = $query->get($tableName)->result_array();
//     //     	var_dump($result);
//     $teacher = array();
//     foreach ($result as $key => $value) {
//     	$data = $this->getAllRows('employee', 'employee_id', $value['employee_id']);
//     	array_push($teacher, $data);
//     	//     		var_dump($value);
//     }
//     //     	var_dump($teacher);
//     return $teacher;
}
