<?php
	
/*******************************
	
	Classes & Functions
	app/functions.php
	
********************************/	

/**
	User Class
**/

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
		include('db.php');
		$userid = $this->id;
		$name = mysqli_query($mysqli, "SELECT name FROM users WHERE user_id = $userid");
		if ($row_users = mysqli_fetch_array($name, MYSQLI_ASSOC)) {
			echo htmlentities($row_users['name']);	
		}
	}
	
	function get_email() {
		include('db.php');
		$userid = $this->id;
		$name = mysqli_query($mysqli, "SELECT email FROM users WHERE user_id = $userid");
		if ($row_users = mysqli_fetch_array($name, MYSQLI_ASSOC)) {
			echo htmlentities($row_users['email']);	
		}
	}

	function get_gravatar() {
		include('db.php');
		$userid = $this->id;
		$name = mysqli_query($mysqli, "SELECT email FROM users WHERE user_id = $userid");
		if ($row_users = mysqli_fetch_array($name, MYSQLI_ASSOC)) {
			$email = htmlentities($row_users['email']);
			echo 'https://www.gravatar.com/avatar/' . md5($email) . '?d=mm"';	
		}
	}
 }
 
 
/**
	Parent Snippet Class
**/
 
class Snippet
{
	var $snippet;
	
	function set_id($current_id) { 
		$this->id = $current_id;  
 	}
 
   	function get_id() {
   		$id = $this->id;
   		return $id;
	}
	
	function get_title() {
		include('db.php');
		$id = $this->id;
		$snippet_title = mysqli_query($mysqli, "SELECT snippet_title FROM snippets WHERE snippet_id = $id");
		if ($row_snippets = mysqli_fetch_array($snippet_title, MYSQLI_ASSOC)) {
			return htmlentities($row_snippets['snippet_title']);	
		}
	}
	
	function get_date() {
		include('db.php');
		$id = $this->id;
		$snippet_date = mysqli_query($mysqli, "SELECT snippet_published FROM snippets WHERE snippet_id = $id");
		if ($row_snippets = mysqli_fetch_array($snippet_date, MYSQLI_ASSOC)) {
			return htmlentities($row_snippets['snippet_published']);	
		}
	}
	
	function get_author() {
		include('db.php');
		$id = $this->id;
		$snippet_date = mysqli_query($mysqli, "SELECT snippet_author FROM snippets WHERE snippet_id = $id");
		if ($row_snippets = mysqli_fetch_array($snippet_date, MYSQLI_ASSOC)) {
			return htmlentities($row_snippets['snippet_author']);	
		}
	}
 }
 

 
/**
	Snippet Entry Class
**/
 
class Entry
{
	var $entry;
	
	function set_id($current_id) { 
		$this->id = $current_id;  
 	}
 
   	function get_id() {
   		$id = $this->id;
   		return $id;
	}
	
	function get_name() {
		include('db.php');
		$id = $this->id;
		$entry_name = mysqli_query($mysqli, "SELECT entry_name FROM snippets_entries WHERE entry_id = $id");
		if ($row_entries = mysqli_fetch_array($entry_name, MYSQLI_ASSOC)) {
			return htmlentities($row_entries['entry_name']);	
		}
	}
	
	function get_content() {
		include('db.php');
		$id = $this->id;
		$entry_content = mysqli_query($mysqli, "SELECT entry_content FROM snippets_entries WHERE entry_id = $id");
		if ($row_entries = mysqli_fetch_array($entry_content, MYSQLI_ASSOC)) {
			return htmlentities($row_entries['entry_content']);	
		}
	}
	
	function get_language() {
		include('db.php');
		$id = $this->id;
		$entry_language = mysqli_query($mysqli, "SELECT entry_language FROM snippets_entries WHERE entry_id = $id");
		if ($row_entries = mysqli_fetch_array($entry_language, MYSQLI_ASSOC)) {
			return htmlentities($row_entries['entry_language']);	
		}
	}
	
	function get_parent() {
		include('db.php');
		$id = $this->id;
		$snippet_id = mysqli_query($mysqli, "SELECT snippet_id FROM snippets_entries WHERE entry_id = $id");
		if ($row_entries = mysqli_fetch_array($snippet_id, MYSQLI_ASSOC)) {
			return htmlentities($row_entries['snippet_id']);	
		}
	}
	
 }


?>