<?php
	
include('config.php');


class User
{

	
	var $user;


	function set_id($current_id) { 
		$this->id = $current_id;  
 	}
 
   	function get_id() {
   		$id = $this->id;
   		return $id;
	}
	
	function get_name() {
		include('db.php');
		$userid = $this->id;
		$name = mysqli_query($mysqli, "SELECT name FROM users WHERE user_id = $userid");
		if ($row_users = mysqli_fetch_array($name, MYSQLI_ASSOC)) {
			echo htmlentities($row_users['name']);	
		}
	}


 }


?>