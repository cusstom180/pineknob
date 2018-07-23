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
    			echo " in the array check";
    		} else {
    			$query = $this->db->where($where, $str);
    		}
    		
    		$result = $query->get($tableName)->result_array();
    	}
    	
    	return $result;
    }
    
    public function callingBack(){          // old call back method
    	echo "call from model";
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
    
    public function callbackPage(){         // new callback method with checking for controller and slug
    	$func = 'bob'; 
    	$class = 'billy';
    	
    	$call = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS,2);
    	foreach ($call as $array) {
    	foreach ($array as $key => $value) {
    		if($key == 'function') {
    			$func = $value;
    			
    		}
    		if($key === 'class') {
    			$class = $value;
//     			echo "key is $key and value is $value";
    		}
    		
    		}
    	}
    	$returnArray = array(
    	    'controller'   => $class,
    	    'slug'         => $func
    	);
    	return $returnArray;
    }
    
    public function getRow($tableName, $where = NULL, $str = NULL) {
    	 echo "where is array " ; echo is_array($where);
    	if ($where === NULL) {
    		$result = $this->db->get($tableName)->row_array();
    	} else {
    		if (is_array($where)) {
    			$query = $this->db->where($where);
    			echo "first  ";
    		} else {
    		    echo "third  ";
    			$query = $this->db->where($where, $str);
    		}
    
    		$result = $query->get($tableName)->row_array();
    	}
//     	echo $this->db->last_query();
    	return $result;
    }
    
    public function getPageTitle($tableName, $where) {
    	$query = $this->db->where($where);
    	return $result = $query->get($tableName)->row_array();
    }
}