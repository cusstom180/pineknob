<?php
class MY_Model extends CI_Model {
    
    function __construct() {
        
        parent::__construct();
    }
    
    public function getAllRows($tableName, $where = NULL, $str = NULL) {
    	
    	if ($where === NULL) {
    		$result = $this->db->get($tableName)->result_array();
    	} else {
    		if (is_array($where)) {
    			$query = $this->db->where($where);
    		} else {
    			$query = $this->db->where($where, $str);
    		}
    		
    		$result = $query->get($tableName)->result_array();
    	}
    	
    	return $result;
    }
    
    public function callingBack(){
//         print_r(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2));
    	$call = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS,2);
    	foreach ($call as $array) {
    		foreach ($array as $key=>$value) {
    			if($key == 'function') {
    				$func = $value;
    			}
    		}
    	}
    	return $func;
    }
    
    public function getRow($tableName, $where = NULL, $str = NULL) {
    	 
    	if ($where === NULL) {
    		$result = $this->db->get($tableName)->row_array();
    	} else {
    		if (is_array($where)) {
    			$query = $this->db->where($where);
    		} else {
    			$query = $this->db->where($where, $str);
    		}
    
    		$result = $query->get($tableName)->row_array();
    	}
    	 
    	return $result;
    }
    
}