<?php
 
class Search {
	var $search;
	
	function set_query($query) {
		$this->query = $query;
	}
	
	function search_label() {
		global $mysqli;
		$query = $this->query;
		$search_label = getBetween($query,"#"," ");
		if($search_label) {
			return $mysqli->escape_string($search_label);
		} else {
			return false;
		}
	}
	
	function search_author() {
		global $mysqli;
		$query = $this->query;
		$search_label = getBetween($query,"@"," ");
		if($search_label) {
			return $mysqli->escape_string($search_label);
		} else {
			return false;
		}
	}
	
	function search_order() {
		global $mysqli;
		$query = $this->query;
		$search_label = getBetween($query,"^"," ");
		if($search_label) {
			return $mysqli->escape_string($search_label);
		} else {
			return false;
		}
	}
	
	function search_favourite() {
		$query = $this->query;
		if(strpos($query, "&lt;3") !== false) {
			return true;
		} else {
			return false;
		}
	}
		
	function query_label() {
		global $mysqli;
		$query = $this->query;
		$search_label = get_between($query,"#"," ");
		if($search_label) {
			$label = mysqli_query($mysqli, "SELECT * FROM labels WHERE label_name LIKE = $search_label");
			return $mysqli->escape_string(htmlentities($label['label_id']));	
		} else {
			return '*';
		}
	}
}

?>
