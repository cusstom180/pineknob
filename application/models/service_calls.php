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
    
    
    
}