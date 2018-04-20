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
    public function getAllworkingEmpl($tableName, $date) {
        
        // search for working instructors
        $intArray = array(
            'date' => $date,
            'working' => '1'
        );
    	 
        $query = $this->db->where($intArray);
    	$result = $query->get($tableName)->result_array();
//     	var_dump($result);
    	$teacher = array();
    	foreach ($result as $key => $value) {
    		$data = $this->getAllRows('employee', 'id', $value['employee_id']);
    		array_push($teacher, $data);
//     		var_dump($value);
    	}
//     	var_dump($teacher);
    	return $teacher;
    }
    
}