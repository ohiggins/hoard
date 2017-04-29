<?php

class User
{
	var $user;
	var $author;
	
	function set_id($current_id) { 
		$this->id = $current_id;  
 	}
 
   	function get_id() {
   		$id = $this->id;
   		return $id;
	}
	
	function get_name() {
		global $mysqli;
		$userid = $this->id;
		$query = mysqli_query($mysqli, "SELECT name FROM users WHERE user_id = $userid");
		if ($row_users = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			return htmlentities($row_users['name']);	
		}
	}
	
	function get_email() {
		global $mysqli;
		$userid = $this->id;
		$query = mysqli_query($mysqli, "SELECT email FROM users WHERE user_id = $userid");
		if ($row_users = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			return htmlentities($row_users['email']);	
		}
	}

	function get_gravatar() {
		global $mysqli;
		$userid = $this->id;
		$query = mysqli_query($mysqli, "SELECT email FROM users WHERE user_id = $userid");
		if ($row_users = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			$email = htmlentities($row_users['email']);
			return 'https://www.gravatar.com/avatar/' . md5($email) . '?d=mm';	
		}
	}
	
	function get_title() {
		global $mysqli;
		$userid = $this->id;
		$query = mysqli_query($mysqli, "SELECT title FROM users WHERE user_id = $userid");
		if ($row_users = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			$title = htmlentities($row_users['title']);
			return $title;	
		}
	}
	
	function get_timezone() {
		global $mysqli;
		$userid = $this->id;
		$query = mysqli_query($mysqli, "SELECT timezone FROM users WHERE user_id = $userid");
		if ($row_users = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			$timezone = htmlentities($row_users['timezone']);
			return $timezone;	
		}
	}
	
	function get_permissions() {
		global $mysqli;
		$userid = $this->id;
		$query = mysqli_query($mysqli, "SELECT permissions FROM users WHERE user_id = $userid");
		if ($row_users = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			$permissions = htmlentities($row_users['permissions']);
			return $permissions;	
		}
	}
	
	function is_admin() {
		global $mysqli;
		$userid = $this->id;
		$query = mysqli_query($mysqli, "SELECT permissions FROM users WHERE user_id = $userid");
		if ($row_users = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			$permissions = htmlentities($row_users['permissions']);
			if ($permissions = 1) {
				return true;
			}	else {
				return false;
			}
		}
	}
 }
 
 ?>
