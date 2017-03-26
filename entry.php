<?php
	
	include('parts/header.php');

	
	if(!empty($_GET["id"])) {
		$id = htmlspecialchars($_GET["id"]);
	} else {
		$id = false;
	}
	$snippet = new Snippet();
	$snippet->set_id($id); 
	
	$user = new User();
	$user->set_id($current_user['user_id']); 
?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="background: red; height: 50px;">
      <h1>
        Add New Entry
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>


<div class="stretch-container">
<?php
if($id and $snippet->get_title()) {

?>

<div id="register-prompt">
<h1>add snippet entry</h1>
<form action="app/entry_process.php" method="post">

<input name="snippet" type="hidden" value="<?php echo $snippet->get_id(); ?>" />
<p><label>Entry Title:</label> <input tabindex="1" id="start-here" name="title" type="text" placeholder="test" /></p>
<p><label>Snippet Entry:</label> <textarea name="entry" type="text"></textarea></p>
<p><label>Lanauge:</label> <select id="mode" name="language" size="1">
        <option value="" disabled selected hidden>Please Choose...</option><option value="abap">ABAP</option><option value="abc">ABC</option><option value="actionscript">ActionScript</option><option value="ada">ADA</option><option value="apache_conf">Apache Conf</option><option value="asciidoc">AsciiDoc</option><option value="assembly_x86">Assembly x86</option><option value="autohotkey">AutoHotKey</option><option value="batchfile">BatchFile</option><option value="bro">Bro</option><option value="c_cpp">C and C++</option><option value="c9search">C9Search</option><option value="cirru">Cirru</option><option value="clojure">Clojure</option><option value="cobol">Cobol</option><option value="coffee">CoffeeScript</option><option value="coldfusion">ColdFusion</option><option value="csharp">C#</option><option value="css">CSS</option><option value="curly">Curly</option><option value="d">D</option><option value="dart">Dart</option><option value="diff">Diff</option><option value="dockerfile">Dockerfile</option><option value="dot">Dot</option><option value="drools">Drools</option><option value="dummy">Dummy</option><option value="dummysyntax">DummySyntax</option><option value="eiffel">Eiffel</option><option value="ejs">EJS</option><option value="elixir">Elixir</option><option value="elm">Elm</option><option value="erlang">Erlang</option><option value="forth">Forth</option><option value="fortran">Fortran</option><option value="ftl">FreeMarker</option><option value="gcode">Gcode</option><option value="gherkin">Gherkin</option><option value="gitignore">Gitignore</option><option value="glsl">Glsl</option><option value="gobstones">Gobstones</option><option value="golang">Go</option><option value="groovy">Groovy</option><option value="haml">HAML</option><option value="handlebars">Handlebars</option><option value="haskell">Haskell</option><option value="haskell_cabal">Haskell Cabal</option><option value="haxe">haXe</option><option value="hjson">Hjson</option><option value="html">HTML</option><option value="html_elixir">HTML (Elixir)</option><option value="html_ruby">HTML (Ruby)</option><option value="ini">INI</option><option value="io">Io</option><option value="jack">Jack</option><option value="jade">Jade</option><option value="java">Java</option><option value="javascript">JavaScript</option><option value="json">JSON</option><option value="jsoniq">JSONiq</option><option value="jsp">JSP</option><option value="jsx">JSX</option><option value="julia">Julia</option><option value="kotlin">Kotlin</option><option value="latex">LaTeX</option><option value="less">LESS</option><option value="liquid">Liquid</option><option value="lisp">Lisp</option><option value="livescript">LiveScript</option><option value="logiql">LogiQL</option><option value="lsl">LSL</option><option value="lua">Lua</option><option value="luapage">LuaPage</option><option value="lucene">Lucene</option><option value="makefile">Makefile</option><option value="markdown">Markdown</option><option value="mask">Mask</option><option value="matlab">MATLAB</option><option value="maze">Maze</option><option value="mel">MEL</option><option value="mushcode">MUSHCode</option><option value="mysql">MySQL</option><option value="nix">Nix</option><option value="nsis">NSIS</option><option value="objectivec">Objective-C</option><option value="ocaml">OCaml</option><option value="pascal">Pascal</option><option value="perl">Perl</option><option value="pgsql">pgSQL</option><option value="php">PHP</option><option value="powershell">Powershell</option><option value="praat">Praat</option><option value="prolog">Prolog</option><option value="properties">Properties</option><option value="protobuf">Protobuf</option><option value="python">Python</option><option value="r">R</option><option value="razor">Razor</option><option value="rdoc">RDoc</option><option value="rhtml">RHTML</option><option value="rst">RST</option><option value="ruby">Ruby</option><option value="rust">Rust</option><option value="sass">SASS</option><option value="scad">SCAD</option><option value="scala">Scala</option><option value="scheme">Scheme</option><option value="scss">SCSS</option><option value="sh">SH</option><option value="sjs">SJS</option><option value="smarty">Smarty</option><option value="snippets">snippets</option><option value="soy_template">Soy Template</option><option value="space">Space</option><option value="sql">SQL</option><option value="sqlserver">SQLServer</option><option value="stylus">Stylus</option><option value="svg">SVG</option><option value="swift">Swift</option><option value="tcl">Tcl</option><option value="tex">Tex</option><option value="text">Text</option><option value="textile">Textile</option><option value="toml">Toml</option><option value="tsx">TSX</option><option value="twig">Twig</option><option value="typescript">Typescript</option><option value="vala">Vala</option><option value="vbscript">VBScript</option><option value="velocity">Velocity</option><option value="verilog">Verilog</option><option value="vhdl">VHDL</option><option value="wollok">Wollok</option><option value="xml">XML</option><option value="xquery">XQuery</option><option value="yaml">YAML</option><option value="django">Django</option></select>
<p><input type="submit" value="add snippet" /></p>
</form>
</div>
<?php
}
	 
	else {
	echo '
		<div class="callout callout-danger">
        <h4><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Snippet not found!</h4>
        <p>It may have been deleted by the author.</p>
        </div>';
	}
	?>
</div>
	
<?php include('parts/footer.php'); ?>