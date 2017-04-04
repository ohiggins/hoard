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
			return htmlentities($row_users['name']);	
		}
	}
	
	function get_email() {
		include('db.php');
		$userid = $this->id;
		$name = mysqli_query($mysqli, "SELECT email FROM users WHERE user_id = $userid");
		if ($row_users = mysqli_fetch_array($name, MYSQLI_ASSOC)) {
			return htmlentities($row_users['email']);	
		}
	}

	function get_gravatar() {
		include('db.php');
		$userid = $this->id;
		$name = mysqli_query($mysqli, "SELECT email FROM users WHERE user_id = $userid");
		if ($row_users = mysqli_fetch_array($name, MYSQLI_ASSOC)) {
			$email = htmlentities($row_users['email']);
			return 'https://www.gravatar.com/avatar/' . md5($email) . '?d=mm';	
		}
	}
	
	function get_title() {
		include('db.php');
		$userid = $this->id;
		$name = mysqli_query($mysqli, "SELECT title FROM users WHERE user_id = $userid");
		if ($row_users = mysqli_fetch_array($name, MYSQLI_ASSOC)) {
			$title = htmlentities($row_users['title']);
			return $title;	
		}
	}
	
	function get_timezone() {
		include('db.php');
		$userid = $this->id;
		$name = mysqli_query($mysqli, "SELECT timezone FROM users WHERE user_id = $userid");
		if ($row_users = mysqli_fetch_array($name, MYSQLI_ASSOC)) {
			$timezone = htmlentities($row_users['timezone']);
			return $timezone;	
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
	
	function get_description() {
		include('db.php');
		$id = $this->id;
		$snippet_description = mysqli_query($mysqli, "SELECT snippet_description FROM snippets WHERE snippet_id = $id");
		if ($snippet_description && $row_snippets = mysqli_fetch_array($snippet_description, MYSQLI_ASSOC)) {
			return htmlentities($row_snippets['snippet_description']);	
		}
	}
	
	function get_author() {
		include('db.php');
		$id = $this->id;
		$snippet_author = mysqli_query($mysqli, "SELECT snippet_author FROM snippets WHERE snippet_id = $id");
		if ($row_snippets = mysqli_fetch_array($snippet_author, MYSQLI_ASSOC)) {
			return htmlentities($row_snippets['snippet_author']);	
		}
	}
	
	function get_author_name() {
		include('db.php');
		$id = $this->id;
		$snippet_author = mysqli_query($mysqli, "SELECT snippet_author FROM snippets WHERE snippet_id = $id");
		if ($row_snippets = mysqli_fetch_array($snippet_author, MYSQLI_ASSOC)) {
			$authorid = htmlentities($row_snippets['snippet_author']);	
		}
		$snippet_author_name = mysqli_query($mysqli, "SELECT name FROM users WHERE user_id = $authorid");
		if ($row_snippets = mysqli_fetch_array($snippet_author_name, MYSQLI_ASSOC)) {
			return htmlentities($row_snippets['name']);	
		}
	}
	
	function get_labels() {
		include('db.php');
		$id = $this->id;
		$query = mysqli_query($mysqli, "SELECT label_id FROM tagging WHERE snippet_id = $id");
		$result = mysqli_fetch_all($query, MYSQLI_ASSOC);
		return $result;
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
	
	function pretty_lang($lang) {
		$labels = array(
			"abap" => "ABAP", "abc" => "ABC", "actionscript" => "ActionScript", "ada" => "ADA", "apache_conf" => "Apache Conf", "asciidoc" => "AsciiDoc", "assembly_x86" => "Assembly x86", "autohotkey" => "AutoHotKey", "batchfile" => "BatchFile", "bro" => "Bro", "c_cpp" => "C and C++", "cirru" => "Cirru", "clojure" => "Clojure", "cobol" => "Cobol", "coffee" => "CoffeeScript", "coldfusion" => "ColdFusion", "csharp" => "C#", "css" => "CSS", "curly" => "Curly", "d" => "D", "dart" => "Dart", "diff" => "Diff", "dockerfile" => "Dockerfile", "dot" => "Dot", "drools" => "Drools", "eiffel" => "Eiffel", "ejs" => "EJS", "elixir" => "Elixir", "elm" => "Elm", "erlang" => "Erlang", "forth" => "Forth", "fortran" => "Fortran", "ftl" => "FreeMarker", "gcode" => "Gcode", "gherkin" => "Gherkin", "gitignore" => "Gitignore", "glsl" => "Glsl", "gobstones" => "Gobstones", "golang" => "Go", "groovy" => "Groovy", "haml" => "HAML", "handlebars" => "Handlebars", "haskell" => "Haskell", "haskell_cabal" => "Haskell Cabal", "haxe" => "haXe", "hjson" => "Hjson", "html" => "HTML", "html_elixir" => "HTML (Elixir)", "html_ruby" => "HTML (Ruby)", "ini" => "INI", "io" => "Io", "jack" => "Jack", "jade" => "Jade", "java" => "Java", "javascript" => "JavaScript", "json" => "JSON", "jsp" => "JSP", "jsx" => "JSX", "julia" => "Julia", "kotlin" => "Kotlin", "latex" => "LaTeX", "less" => "LESS", "liquid" => "Liquid", "lisp" => "Lisp", "livescript" => "LiveScript", "logiql" => "LogiQL", "lsl" => "LSL", "lua" => "Lua", "luapage" => "LuaPage", "lucene" => "Lucene", "makefile" => "Makefile", "markdown" => "Markdown", "mask" => "Mask", "matlab" => "MATLAB", "maze" => "Maze", "mel" => "MEL", "mushcode" => "MUSHCode", "mysql" => "MySQL", "nix" => "Nix", "nsis" => "NSIS", "objectivec" => "Objective-C", "ocaml" => "OCaml", "pascal" => "Pascal", "perl" => "Perl", "pgsql" => "pgSQL", "php" => "PHP", "powershell" => "Powershell", "praat" => "Praat", "prolog" => "Prolog", "properties" => "Properties", "protobuf" => "Protobuf", "python" => "Python", "r" => "R", "razor" => "Razor", "rdoc" => "RDoc", "rhtml" => "RHTML", "rst" => "RST", "ruby" => "Ruby", "rust" => "Rust", "sass" => "SASS", "scad" => "SCAD", "scala" => "Scala", "scheme" => "Scheme", "scss" => "SCSS", "sh" => "SH", "sjs" => "SJS", "smarty" => "Smarty", "snippets" => "snippets", "soy_template" => "Soy Template", "space" => "Space", "sql" => "SQL", "sqlserver" => "SQLServer", "stylus" => "Stylus", "svg" => "SVG", "swift" => "Swift", "tcl" => "Tcl", "tex" => "Tex", "text" => "Text", "textile" => "Textile", "toml" => "Toml", "tsx" => "TSX", "twig" => "Twig", "typescript" => "Typescript", "vala" => "Vala", "vbscript" => "VBScript", "velocity" => "Velocity", "verilog" => "Verilog", "vhdl" => "VHDL", "wollok" => "Wollok", "xml" => "XML", "yaml" => "YAML", "django" => "Django"
   		);
   		return $labels[$lang];
	}	
}



/**
	Label Class
**/
 
class Label
{
	var $label;
	
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
		$label_name = mysqli_query($mysqli, "SELECT label_name FROM labels WHERE label_id = $id");
		if ($row_labels = mysqli_fetch_array($label_name, MYSQLI_ASSOC)) {
			return htmlentities($row_labels['label_name']);	
		}
	}	
	
	function get_hex() {
		include('db.php');
		$id = $this->id;
		$label_hex = mysqli_query($mysqli, "SELECT label_hex FROM labels WHERE label_id = $id");
		if ($row_labels = mysqli_fetch_array($label_hex, MYSQLI_ASSOC)) {
			return htmlentities($row_labels['label_hex']);	
		}
	}	
	
	function has_label($snippet_id) {
		include('db.php');
		$id = $this->id;
		$has_label = mysqli_query($mysqli, "SELECT * FROM tagging WHERE label_id = $id AND snippet_id = $snippet_id");
		if ($row_labels = mysqli_fetch_array($has_label, MYSQLI_ASSOC)) {
			return true;
		}
	}
}


?>