<?php
	
/*******************************
	
	Search Logic
	app/search_process.php
	
********************************/

// Define our special search terms (#, @, ^, <3)
$search_label = $search->search_label(); 
$search_author = $search->search_author();
$search_order = $search->search_order();

// Strip out everything else and leave us with the primary search string
$search_contents = $mysqli->escape_string(trim(str_replace(
    array($search_label, $search_author, $search_order, '#', '^', '@', '+', '&lt;3'),
    array('','','','','','',''), 
    $q
)));

// The primary search query
$contents_search = "SELECT * FROM snippets WHERE snippet_title LIKE '%$search_contents%'";


// Label Search -------------------

// Get label from search query (Anything between a # and a space)
$search_label = $search->search_label();

// Set some empty variables 
$label_search = null;
$label_results = null;

// If a label search detected...
if($search_label) {
	
	// Get the label from our labels database
	$label_query = mysqli_query($mysqli, "SELECT * FROM labels WHERE label_name LIKE '%$search_label%' LIMIT 1");
	$label_results = mysqli_fetch_array($label_query, MYSQLI_ASSOC);
	
	// If it's not found, run a query we know will fail to show 0 results (TODO: a better way of handling this?)
	if($label_query) { $label_id = htmlentities($label_results['label_id']); } else { $label_id = "'$search_label'"; }
	
	// Create our bit of the main query
	$label_search = " AND snippet_id IN (SELECT (snippet_id) FROM tagging WHERE label_id = '$label_id')";
}


// User Search -------------------
/**
// Grab user from search, work out what ID that user has, fish those snippet ID's out of snippets and write our query
$search_author = $search->search_author(); 
$author_search = '';
if($search_author) {
$author_query = mysqli_query($mysqli, "SELECT * FROM users WHERE name LIKE '%$search_author%'");
$author_results = mysqli_fetch_array($author_query, MYSQLI_ASSOC);
if ($author_results) { $user_id = htmlentities($author_results['user_id']); } else { $user_id = false; }	
if ($user_id) { $author_search = " AND snippet_author = $user_id"; } else { $author_search = ""; }
}
**/

// Assemble our final query
$final_search = $contents_search . $label_search;
$snippets = mysqli_query($mysqli, "$final_search");
echo $final_search;

?>


