<?php

include('config.php');

// make a new snippet

if (!isset($_POST['title']) || trim($_POST['title']) == '') {
	die('you forgot to put in a title');
}

if (!isset($_POST['entry']) || trim($_POST['entry']) == '') {
	die('you forgot to put in an entry');
}

require_once('db.php');

$new_entry_snippet = "'".$mysqli->escape_string(trim($_POST['snippet']))."'";
$new_entry_content = "'".$mysqli->escape_string(trim($_POST['entry']))."'";
$new_entry_title = "'".$mysqli->escape_string(trim($_POST['title']))."'";
$new_entry_language = "'".$mysqli->escape_string(trim($_POST['language']))."'";

$new_entry = $mysqli->query("INSERT INTO snippets_entries (snippet_id, entry_content, entry_name, entry_language) VALUES ($new_entry_snippet, $new_entry_content, $new_entry_title, $new_entry_language)");
if (!$new_entry) {
	die('error creating new entry: '.$mysqli->error);
}

header('Location: ../snippet.php?id=' . trim($_POST['snippet']) . '&entry_success');

?>


