<?php

// remove admin bar (comment / uncomment as necesary)
add_filter('show_admin_bar', '__return_false');


// set up file paths
define( 'TEMPPATH', get_bloginfo('stylesheet_directory'));
define( 'IMAGES', TEMPPATH. "/images");
define( 'STYLE', TEMPPATH. "/style");
define( 'SCRIPT', TEMPPATH. "/script");


// add support for custom post thumbnails
add_theme_support( 'post-thumbnails' );
add_image_size( 'blog-post-thumb', 340, 0, true ); //340 pixels x unlimited height
add_image_size( 'blog-archive-thumb', 340, 300, true ); //340 pixels x unlimited height
add_image_size('portfolio-item-thumb', 275, 210, ture);

// picture fill images
add_image_size('large', 1000, 9999);
add_image_size('medium', 720, 9999);
add_image_size('small', 400, 9999);

// get the theme's custom options
require_once('theme-options.php');

// add support for custom nav menus
add_theme_support( 'nav-menus' );
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
		  'main' => 'Main Nav'
		)
	);
}

// create a custom sidebar for widgets
if ( function_exists( 'register_sidebar' ) ) {
	register_sidebar( array (
		'name' => __( 'Primary Sidebar', 'primary-sidebar' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'dir' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}

// Load CDN jquery is there is a connection
function getJqueryURL() {
	$googleCDN = "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js";
	$test_url = @fopen($googleCDN,'r');

	if ($test_url !== false){
		return $googleCDN;
	} else {
		return SCRIPT. '/jquery-1.11.3.min.js';
	}
}

// Load CDN Font Awesome if there is a connection
function getFontAwesomeURL() {
	$fontAwesomeCDN = "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css";
	$test_url = @fopen($fontAwesomeCDN,'r');

	if ($test_url !== false) {
		return $fontAwesomeCDN;
	} else {
		return STYLE. '/font-awesome.min.css';
	}
}

//enqueue scripts, loading them in the footer
function load_scripts() {

	if ( !is_admin() ) { // do not load scripts on admin page
		//de register the built in jquery
		wp_deregister_script('jquery');

		// Get the jquery file url dependent on connection_status
		$jqueryURL = getJqueryURL();

		//register all scripts
		// wp_register_script($handle, $src, $deps, $ver, $in_footer);
    wp_register_script('jquery', $jqueryURL, false, '1.11.3', true);
    wp_register_script('myScript', get_template_directory_uri().'/script/min/script.min.js', array('jquery'), null, true);

    // enqueue scripts for every page
    wp_enqueue_script('jquery');
    wp_enqueue_script('myScript');

		// Remove the rainbow highlight stuff
		wp_deregister_style('wp-rainbow-css');
		wp_deregister_style('wp-rainbow-linenumber-fix');
		wp_deregister_script('rainbow-core');
		wp_deregister_script('rainbow-linenumbers');
	}
}
add_action( 'wp_enqueue_scripts', 'load_scripts' );

// Make some js async
function asyncScripts( $tag, $handle ) {
    if( is_admin() ) {
        return $tag;
    }
		if (strpos($tag,'jetpack') !== false) {
			return str_replace( ' src', ' defer src', $tag );
		}
		if (!strpos($tag,'jquery') !== false) {
	    return str_replace( ' src', ' async src', $tag );
		} else {
			return $tag;
		}
}
add_filter( 'script_loader_tag', 'asyncScripts', 10, 2);

// enqueue styles, loading them in the header
function load_my_styes(){

		$fontAwesomeURL = getFontAwesomeURL();
	  wp_register_style( 'font-awesome', $fontAwesomeURL,  array(), '4.1.0', 'all' );
	  wp_enqueue_style( 'font-awesome' );

}
add_action( 'wp_enqueue_scripts', 'load_my_styes');

// show the portfolio post type on the front page. MOVE TO PLUGIN????
function my_get_posts( $query ) {
	if ( ( is_home() && $query->is_main_query() ) || is_feed() )
		$query->set( 'post_type', array( 'post', 'portfolio' ) );

	return $query;
}
add_filter( 'pre_get_posts', 'my_get_posts' );

// Get all attached images for a post, wrapping them in <li>'s
// Used with the slider on single portfolio pages
function getAttachedImages(){
	$attachments = get_attached_media( 'image', $post->ID );

	foreach ($attachments as $attachment_id => $attachment) {
		echo "<li>".wp_get_attachment_image( $attachment_id, 'large' )."</li>";
	}
}

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="button button-blue"';
}

// Add a summary metabox to all posts to use in theme
function smry_custom_meta(){
	// post types to apply extra metabox too.
	$postTypes = array('post', 'portfolio');

	// loop the array of post types
	foreach ($postTypes as $postType) {
		add_meta_box(
			'summary-meta-box', // id
			__('Post Summary'), // title
			'smry_show_meta_box', // callback
			$postType, // post type
			'normal' // position
			);
	}
}
add_action('add_meta_boxes', 'smry_custom_meta');

function smry_show_meta_box(){
	// get the stored meta values
	global $post;
	$meta = get_post_meta($post->ID, 'smry_text', true);

	//build the input area ?>
	<p>
		<label>Summary Text</label>
		<textarea name="smry_text" id="smry_text" cols="60" rows="5"><?php echo $meta; ?></textarea>
	</p>
	<?php
}

function save_summary_meta($post_id){
	//check for saving
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		return $post_id;
	}

	//retrieve the values
	$old = get_post_meta($post_id, 'smry_text', true);
	$new = $_POST["smry_text"];

	//save new values if changes are made
	if ($new && $new != $old){
		update_post_meta($post_id, 'smry_text', $new);
	} elseif ('' == $new && $old){
		delete_post_meta($post_id, 'smry_text', $old);
	}
}
add_action('save_post', 'save_summary_meta');

// get the custom meta summary
function get_smry_text($post){

	// retriev the summary from the database
	$smry = get_post_meta($post->ID, 'smry_text', true);

	if ($smry != ""){
		echo $smry;
	}
}

// change the default more link
function new_excerpt_more($more) {
	global $post;

	return '.....';
}
add_filter('excerpt_more', 'new_excerpt_more');

// disable contact form 7 from loading assets on every page
function deregister_cf7_javascript() {
    if ( !is_page(12) ) {
        wp_deregister_script( 'contact-form-7' );
    }
}
add_action( 'wp_print_scripts', 'deregister_cf7_javascript', 12 );

function deregister_cf7_styles() {
    if ( !is_page(12) ) {
        wp_deregister_style( 'contact-form-7' );
    }
}
add_action( 'wp_print_styles', 'deregister_cf7_styles', 12 );

// picture fill stuff
//
// get image alt
function get_img_alt($image){
	$img_alt = trim(strip_tags( get_post_meta($image,
		'_wp_attachment_image_alt', true)));
	return $img_alt;
}

// build the source set for the picture element
function add_picture_sources($image){

	//get the images
	$img_medium = wp_get_attachment_image_src( $image, 'medium' );
	$img_large = wp_get_attachment_image_src( $image, 'large' );

	$srcset = '<source srcset= "' . $img_large[0] . '" media="(min-width: 720px)">';
	$srcset .= '<source srcset= "' . $img_medium[0] . '" media="(min-width: 400px)">';

	return srcset;
}

// build the source set for the image
function add_src_element($image){

	$sizes = array('small', 'medium', 'large');
	$arr = array();
	$get_sizes = wp_get_attachment_metadata($image);

	foreach ($sizes as $size) {
		$image_src = wp_get_attachment_image_src($image, $size );

		if(array_key_exists($size, $get_sizes['sizes'])){
			$image_size = $get_sizes['sizes'][$size]['width'];
			$arr[] = $image_src[0] . ' ' . $image_size . 'w';
		}
	}
	return implode(', ', $arr);
}

// build the shortcode for the img srcset
function responsive_insert_image($atts){

	extract( shortcode_atts( array (
		'id' => 1
	), $atts));

	$srcsets = add_src_element($id);
	$default = wp_get_attachment_image_src($id, 'large');

	return '<img srcset="'. $srcsets .'"
		src="' . $default[0] . '"
		alt="'. get_img_alt($id) .'">';
}
add_shortcode( 'resp_image', 'responsive_insert_image' );

// edit the post editor to use the shortcode
function responsive_editor_filter($html, $id, $caption, $title, $align, $url){
	return "[resp_image id='$id']";
}
add_filter( 'image_send_to_editor', 'responsive_editor_filter', 10, 9);

// prevent brute force amplification attacks againt XMLRPC
add_filter('xmlrpc_enabled','__return_false');

// Remove WordPress emojis
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// Minify HMTL
class WP_HTML_Compression
{
	// Settings
	protected $compress_css = true;
	protected $compress_js = true;
	protected $info_comment = true;
	protected $remove_comments = true;

	// Variables
	protected $html;
	public function __construct($html){
		if (!empty($html)){
			$this->parseHTML($html);
		}
	}
	public function __toString(){
		return $this->html;
	}
	protected function minifyHTML($html){
		$pattern = '/<(?<script>script).*?<\/script\s*>|<(?<style>style).*?<\/style\s*>|<!(?<comment>--).*?-->|<(?<tag>[\/\w.:-]*)(?:".*?"|\'.*?\'|[^\'">]+)*>|(?<text>((<[^!\/\w.:-])?[^<]*)+)|/si';
		preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);
		$overriding = false;
		$raw_tag = false;
		// Variable reused for output
		$html = '';
		foreach ($matches as $token){
			$tag = (isset($token['tag'])) ? strtolower($token['tag']) : null;

			$content = $token[0];

			if (is_null($tag)){
				if ( !empty($token['script']) ){
					$strip = $this->compress_js;
				}
				else if ( !empty($token['style']) ){
					$strip = $this->compress_css;
				}
				else if ($content == '<!--wp-html-compression no compression-->'){
					$overriding = !$overriding;

					// Don't print the comment
					continue;
				}
				else if ($this->remove_comments){
					if (!$overriding && $raw_tag != 'textarea')
					{
						// Remove any HTML comments, except MSIE conditional comments
						$content = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $content);
					}
				}
			}
			else{
				if ($tag == 'pre' || $tag == 'textarea'){
					$raw_tag = $tag;
				}
				else if ($tag == '/pre' || $tag == '/textarea'){
					$raw_tag = false;
				}
				else{
					if ($raw_tag || $overriding){
						$strip = false;
					}
					else{
						$strip = true;

						// Remove any empty attributes, except:
						// action, alt, content, src
						$content = preg_replace('/(\s+)(\w++(?<!\baction|\balt|\bcontent|\bsrc)="")/', '$1', $content);

						// Remove any space before the end of self-closing XHTML tags
						// JavaScript excluded
						$content = str_replace(' />', '/>', $content);
					}
				}
			}

			if ($strip){
				$content = $this->removeWhiteSpace($content);
			}

			$html .= $content;
		}

		return $html;
	}

	public function parseHTML($html){
		$this->html = $this->minifyHTML($html);
	}

	protected function removeWhiteSpace($str){
		$str = str_replace("\t", ' ', $str);
		$str = str_replace("\n",  '', $str);
		$str = str_replace("\r",  '', $str);

		while (stristr($str, '  ')){
			$str = str_replace('  ', ' ', $str);
		}

		return $str;
	}
}

function wp_html_compression_finish($html){
	return new WP_HTML_Compression($html);
}

function wp_html_compression_start(){
	ob_start('wp_html_compression_finish');
}
add_action('get_header', 'wp_html_compression_start');

?>
