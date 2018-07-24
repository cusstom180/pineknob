<?php
class Product {
	
		// database connection and table name
		private $table_name="products";
		// object properties
		public $id;
		public $name;
		public $price;
		public $description;
		public $category_id;
		public $category_name;
		public $timestamp;
	
	function function_name() {
		//$CI->load->database();
    //$this->load->library('database');
    $this->CI =& get_instance();
    $this->CI->load->database();
	}
	
	
}
// need pagination
// 	// to prevent undefined index notice
// 	$action = isset($_GET['action']) ? $_GET['action'] : "";
	
// 	// for pagination purposes
// 	$page = isset($_GET['page']) ? $_GET['page'] : 1; // page is the current page, if there's nothing set, default is page 1
// 	$records_per_page = 6; // set records or rows of data per page
// 	$from_record_num = ($records_per_page * $page) - $records_per_page; // calculate for the query LIMIT clause

// 	view 
// 	// read all products in the database
// 	$stmt=$product->read($from_record_num, $records_per_page);
	
// 	// count number of retrieved products
// 	$num = $stmt->rowCount();
	
// 	// if products retrieved were more than zero
// 	if($num>0){
// 		// needed for paging
// 		$page_url="products.php?";
// 		$total_rows=$product->count();
	
// 		// show products
// 		include_once "read_products_template.php";
// 	}
	
// 	// tell the user if there's no products in the database
// 	else{
// 		echo "<div class='col-md-12'>";
// 		echo "<div class='alert alert-danger'>No products found.</div>";
// 		echo "</div>";
// 	}
	
// need product methods:
// 	read and count
	
// 	// read all products
// 	function read($from_record_num, $records_per_page){
	
// 		// select all products query
// 		$query = "SELECT
//                 id, name, description, price
//             FROM
//                 " . $this->table_name . "
//             ORDER BY
//                 created DESC
//             LIMIT
//                 ?, ?";
	
// 		// prepare query statement
// 		$stmt = $this->conn->prepare( $query );
	
// 		// bind limit clause variables
// 		$stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
// 		$stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
	
// 		// execute query
// 		$stmt->execute();
	
// 		// return values
// 		return $stmt;
// 	}
	
// 	// used for paging products
// 	public function count(){
	
// 		// query to count all product records
// 		$query = "SELECT count(*) FROM " . $this->table_name;
	
// 		// prepare query statement
// 		$stmt = $this->conn->prepare( $query );
	
// 		// execute query
// 		$stmt->execute();
	
// 		// get row value
// 		$rows = $stmt->fetch(PDO::FETCH_NUM);
	
// 		// return count
// 		return $rows[0];
// 	}
	