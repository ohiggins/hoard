<?php
	
/*******************************
	
	Search Logic
	app/search_process.php
	
********************************/

// Get the label via hashtag

$search_label = $search->search_label(); 
$search_author = $search->search_author();
$search_order = $search->search_order();

$search_contents = trim(str_replace(
    array($search_label, $search_author, $search_order, '#', '^', '@', '+', '&lt;3'),
    array('','','','','','',''), 
    $q
));
$contents_search = "SELECT * FROM snippets WHERE snippet_title LIKE '%$search_contents%'";

// Grab label from search, work out what ID that label is, fish those snippet ID's out of tagging and write our query
$search_label = $search->search_label(); 
$label_search = '';
if($search_label) {
$label_query = mysqli_query($mysqli, "SELECT * FROM labels WHERE label_name LIKE '%$search_label%'");
$label_results = mysqli_fetch_array($label_query, MYSQLI_ASSOC);
if ($label_results) { $label_id = htmlentities($label_results['label_id']); } else { $label_id = false; }	
if ($label_id) { $label_search = " AND snippet_id IN (SELECT (snippet_id) FROM tagging WHERE label_id = $label_id)"; } else { $label_search = ""; }
}

$final_search = $contents_search . $label_search;

$snippets = mysqli_query($mysqli, "$final_search");

echo $final_search;

?>


