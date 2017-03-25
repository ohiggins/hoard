<?php

include('config.php');

// make a new snippet

if (!isset($_POST['title']) || trim($_POST['title']) == '') {
	die('you forgot to put in a title');
}

session_start();
$userid = $_SESSION['userid'];

require_once('db.php');

// ok, make a new snippet

$new_snippet_title = "'".$mysqli->escape_string(trim($_POST['title']))."'";
$author = "'".$userid."'";
$published = "'".date('Y-m-d H:i:s')."'";

$new_snippet = $mysqli->query("INSERT INTO snippets (snippet_title, snippet_published, snippet_author) VALUES ($new_snippet_title, $published, $author)");
if (!$new_snippet) {
	die('error creating new snippet: '.$mysqli->error);
}

$new_snippet = $mysqli->insert_id;

header('Location: ../add.php?snippet_success');

?>