<?php
class Service_calls extends MY_Model {
    
    function __construct() {
        
        parent::__construct();
        
    }
    
    public function getAll($table){
    
    	$query = $this->db->get($table)->result_array();
    	return $query;
    }
    
    public function getOneRow($tablename, $array) {
    	$query = $this->db->where($array);
    	$result = $query->get($tablename)->row_array();
    	return $result;
    }
    
    public function getAllworkingEmplTime($tableName, $date, $employee_id) {
    	 
    	$this->db->select($tableName . '.employee_id');
    	$this->db->select('slot.time_slot');
    	$this->db->from($tableName);
    	$this->db->join('slot', 'slot.id = ' . $tableName . '.slot_id');
    	$this->db->join('date', 'date.id = ' . $tableName . '.date_id');
    	$array = array(
    			$tableName . '.employee_id' => $employee_id,
    			'date.date' => $date,
    	);
    	$query = $this->db->where($array);
    	$result = $query->get()->result_array();
//     	var_dump($result);
    	return $result;
    }
    
    public function getEmployeeTimeSlot($table1, $table2, $employee_id, $date) {
    	$this->db->select($table2 . '.employee_id');
    	$this->db->select($table1 . '.slot_1');
    	$this->db->select($table1 . '.slot_2');
    	$this->db->select($table1 . '.slot_1');
    	$this->db->select($table1 . '.slot_2');
    	$this->db->select($table1 . '.slot_3');
    	$this->db->select($table1 . '.slot_4');
    	$this->db->select($table1 . '.slot_5');
    	$this->db->select($table1 . '.slot_6');
    	$this->db->select($table1 . '.slot_7');
    	$this->db->select($table1 . '.slot_8');
    	$this->db->select($table1 . '.slot_9');
    	$this->db->select($table1 . '.slot_10');
    	$this->db->select($table1 . '.slot_11');
    	$this->db->from($table1);
    	$this->db->join($table2, $table2 . '.employee_id = ' . $table1 . '.employee_id');
    	$array = array(
    			$table1 . '.employee_id' => $employee_id,
    			$table2 . '.date' => $date
    	);
    	$this->db->where($array);
    	$query = $this->db->get()->row_array();
    	return $query;
    	
    }
    
    
 
}