<?php
/*
Plugin Name: The Ultimate Syntax Highlighter
Plugin URI: http://www.samrudge.co.uk/160/projects/the-ultimate-wordpress-syntax-highlighter.php
Description: 100% JavaScript syntax highlighter This plugin makes using the <a href="http://code.google.com/p/syntaxhighlighter">Google Syntax highlighter</a> to highlight code snippets within WordPress simple. Supports C++, C#, CSS, Delphi, Java, JavaScript, PHP, Python, Ruby, SQL, VB, XML, and HTML. Read  <a href="http://code.google.com/p/syntaxhighlighter/wiki/Usage">usage directions.</a> - This plugin has been improved with the addition of a short tag [hlight lang="language"]Code[/hlight]
Version: 1.2.9
Author: Sam Rudge
Author URI: http://www.samrudge.co.uk/
*/

//Add Highlight Shorttag
function hlight_func($atts, $content) {
	extract(shortcode_atts(array(
		'lang' => 'lang',
	), $atts));
        $data = strip_tags($content);
	return "<pre name=\"code\" class=\"$lang\">$data</pre>";
}
add_shortcode('hlight', 'hlight_func');
add_shortcode('code', 'hlight_func');//Comment out if having dificulty

function insert_header() {
	$current_path = get_option('siteurl') .'/wp-content/plugins/' . basename(dirname(__FILE__)) .'/';
	?>
	<link href="<?php echo $current_path; ?>Styles/SyntaxHighlighter.css" type="text/css" rel="stylesheet" />
	<?php
}

function insert_footer(){
$current_path = get_option('siteurl') .'/wp-content/plugins/' . basename(dirname(__FILE__)) .'/';
	?>
<script class="javascript" src="<?php echo $current_path; ?>Scripts/shCore.js"></script>
<script class="javascript" src="<?php echo $current_path; ?>Scripts/shBrushCSharp.js"></script>
<script class="javascript" src="<?php echo $current_path; ?>Scripts/shBrushPhp.js"></script>
<script class="javascript" src="<?php echo $current_path; ?>Scripts/shBrushJScript.js"></script>
<script class="javascript" src="<?php echo $current_path; ?>Scripts/shBrushJava.js"></script>
<script class="javascript" src="<?php echo $current_path; ?>Scripts/shBrushVb.js"></script>
<script class="javascript" src="<?php echo $current_path; ?>Scripts/shBrushSql.js"></script>
<script class="javascript" src="<?php echo $current_path; ?>Scripts/shBrushXml.js"></script>
<script class="javascript" src="<?php echo $current_path; ?>Scripts/shBrushDelphi.js"></script>
<script class="javascript" src="<?php echo $current_path; ?>Scripts/shBrushPython.js"></script>
<script class="javascript" src="<?php echo $current_path; ?>Scripts/shBrushRuby.js"></script>
<script class="javascript" src="<?php echo $current_path; ?>Scripts/shBrushCss.js"></script>
<script class="javascript" src="<?php echo $current_path; ?>Scripts/shBrushCpp.js"></script>
<script class="javascript">
dp.SyntaxHighlighter.ClipboardSwf = '<?php echo $current_path; ?>Scripts/clipboard.swf';
dp.SyntaxHighlighter.HighlightAll('code');
</script>
<?php
}
add_action('wp_head','insert_header');
add_action('wp_footer','insert_footer');
?>
