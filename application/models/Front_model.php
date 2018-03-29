<?php
class Front_model extends MY_Model {
    
    function __construct() {
        
        parent::__construct();
    }
    
    public function getAll($table){
    
    	$query = $this->db->get($table)->result_array();
    	return $query;
    }
    
}