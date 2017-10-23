<?php
if (session_id() == '') session_start();

// global function
if (!function_exists("curPageURL")) {
	function curPageURL() {
	 if (isset($_SERVER["HTTPS"])) { 
	 	$https = $_SERVER["HTTPS"];
	 }
	 else {
	 	$https = 'off';
	 }
	 $pageURL = 'http';
	 if ($https == "on") { $pageURL .= "s"; }
	 $pageURL .= "://";
	 if ($_SERVER["SERVER_PORT"] != "80") {
	  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	 } else {
	  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	 }
	 return $pageURL;
	}  
}

if (!function_exists("wpfw_get_page_template")) {
	function wpfw_get_page_template() {
		global $post;
		
		if (have_posts()) { 
			
			$template_name = get_post_meta($post->ID, '_wp_page_template', true);	
			if ($template_name == 'page-blog.php' || is_archive() || is_author() || is_category() || is_tag() || is_date() || is_day() || is_year() || is_singular('post') || is_search()) {
				return 'blog';
			}
			else {
				return str_replace(".php", "", $template_name);
			}
		}
	}
}

if (!function_exists("is_wpfw_visual_editor")) {
	function is_wpfw_visual_editor() {
		if (!$_GET['visual_editor']) {
			return false;
		}
		else {
			return true;
		}
	}
}

if (!function_exists("wpfw_nice_name")) {
	function wpfw_nice_name($name, $sep='-') {
		return strtolower(str_replace(" ", $sep, $name));
	}
}

if (!function_exists("get_wpfw_file")) {
	function get_wpfw_file($file, $mi=false) {
		global $wpdb, $metaboxes, $sliders_config, $lighbox_config, $wp_query, $custom_fonts, $post, $lib_config, $wpfw_icons;
		
		if ($mi == true) {
			require_once($file.'.php');
		} else {
			include($file.'.php');
		}
	}
}

// include main config
get_wpfw_file('framework/settings/config');

// include options panel framework
get_wpfw_file('framework/options_panel/options-framework');

// include css and js library
get_wpfw_file('framework/settings/library_css');
get_wpfw_file('framework/settings/library_elements');
get_wpfw_file('framework/settings/library_js');
get_wpfw_file('framework/settings/library_addons');

// include config files for building admin options
get_wpfw_file('framework/settings/config_cpt');
get_wpfw_file('framework/settings/config_images');
get_wpfw_file('framework/settings/config_menus');
get_wpfw_file('framework/settings/config_meta_boxes');
get_wpfw_file('framework/settings/config_sidebars');

// include files just for admin
if(is_admin()) {
	get_wpfw_file('framework/settings/admin_css');
	get_wpfw_file('framework/visualeditor/data');
	get_wpfw_file('framework/visualeditor/add_icons');
	get_wpfw_file('framework/visualeditor/main');
}

// load function for building front-end editor grid
if(!is_admin() && !is_wpfw_visual_editor()) {
	get_wpfw_file('framework/visualeditor/visual-editor-functions');
}

get_wpfw_file('framework/functions/wp_bootstrap_navwalker');

// here starts other functions

if (!isset($content_width)) $content_width = 900;

function widget_title_color($args, $content) {
  
	$content = '<span>'.$content.'</span>';
	
	return $content;
	
}
add_shortcode('b', 'widget_title_color');

function new_excerpt_more($more) {
  global $post;
	
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

function add_lists_class($content) {
  
  $content = str_replace("<ul>", "<ul class='inc'>", $content);
  $content = str_replace("<ol>", "<ol class='inc'>", $content);
	
	return $content;
}
add_filter('the_content', 'add_lists_class');

function get_all_images($postID, $nr=4) {
	
	$args = array(
	'post_type' => 'attachment',
	'numberposts' => $nr,
	'post_status' => null,
	'post_parent' => $postID,
	'orderby' => 'menu_order', 
	'order' => 'ASC'
	);
	$attachments = get_posts($args);
	
	return $attachments;
}

if (!function_exists("get_excr")) {
	function get_excr($charlength, $content='') {
	   if (!$content) { 
	   	$excerpt = get_the_excerpt();
	 	 }
	 	 else {
	 	 	$excerpt = $content;
	 	 }
	   $charlength++;
	   if(strlen($excerpt)>$charlength) {
	       $subex = substr($excerpt,0,$charlength-5);
	       $exwords = explode(" ",$subex);
	       $excut = -(strlen($exwords[count($exwords)-1]));
	       if($excut<0) {
	            return substr($subex,0,$excut);
	       } else {
	       	    return $subex;
	       }
	       return "";
	   } else {
		   return $excerpt;
	   }
	}
}

if (!function_exists("excr")) {
	function excr($charlength, $content='') {
	   echo get_excr($charlength, $content);
	}
}

// Function name:
//  - get_browser 
// Description:
//  - retreive the browser name
// Parameters:
// 	- no parameter
// Returns:
//  - the browser name: Chrome, Safari, Gecko, Netscape, Firefox, MSIE 6, MSIE 7, MSIE 8, Opera

function get_php_browser() {
if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') )
{
   $browser = 'chrome';
}
elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') )
{
   $browser = 'safari';
}
else if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Gecko') )
{
   if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Netscape') )
   {
     $browser = 'netscape';
   }
   else if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') )
   {
     $browser = 'firefox';
   }
   else
   {
     $browser = 'mozilla';
   }
}
else if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') )
{
	if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6')){
		$browser = 'ie6';
	}
	elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 7')){
		$browser = 'ie7';
	}
	elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 8')){
		$browser = 'ie8';
	}
	elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 9')){
		$browser = 'ie9';
	}	
	elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 10')){
		$browser = 'ie10';
	}		
	else{
		$browser = 'ie';
	}
}
else if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== false)
{
   $browser = 'opera';
}
else
{
   $browser = 'other';
}

	return $browser;

}

function theme_queue_js(){
if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') )
  wp_enqueue_script( 'comment-reply' );
}
add_action('wp_print_scripts', 'theme_queue_js');

function get_image_id($image_url) {
    global $wpdb;
    $prefix = $wpdb->prefix;
    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM " . $prefix . "posts" . " WHERE guid='" . $image_url . "';"));
    return $attachment[0];
}

class custom_nav_walker extends Walker_Nav_Menu {
  
// add classes to ul sub-menus
function start_lvl( &$output, $depth ) {
    // depth dependent classes
    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
    $display_depth = ( $depth + 1); // because it counts the first submenu as 0
    $classes = array(
        'sub-menu',
        ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
        ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
        'menu-depth-' . $display_depth
        );
    $class_names = implode( ' ', $classes );
  
  	if($depth > 0) {
	  	$type = 2;
  	}
  	else {
  		$type = 1;  		
  	}
    // build html
    $output .= "\n" . $indent . '<div class="sm type'.$type.'"><span class="arrow"></span><ul class="' . $class_names . '">' . "\n";
}

function end_lvl(&$output, $depth=0, $args=array()) {  
  $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
  $display_depth = ( $depth + 1); // because it counts the first submenu as 0
	if ($display_depth > 0) {
		$output .= "</ul></div>\n";  
	}
	else {
		$output .= "</ul>\n";  
	}
}  
  
// add main/sub classes to li's and links
 function start_el( &$output, $item, $depth, $args ) {
    global $wp_query;
    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
  
    // depth dependent classes
    $depth_classes = array(
        ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
        ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
        ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
        'menu-item-depth-' . $depth
    );
    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
  
    // passed classes
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
  
    // build html
    $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
  
    // link attributes
    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
  
  	if ($depth >=1 ) {
	    $item_output = sprintf( '%1$s<a%2$s><span></span>%3$s%4$s%5$s</a>%6$s',
	        $args->before,
	        $attributes,
	        $args->link_before,
	        apply_filters( 'the_title', $item->title, $item->ID ),
	        $args->link_after,
	        $args->after
	    );  	
  	}
  	else {
  
	    $item_output = sprintf( '%1$s<a%2$s><span>%3$s%4$s%5$s</span></a>%6$s',
	        $args->before,
	        $attributes,
	        $args->link_before,
	        apply_filters( 'the_title', $item->title, $item->ID ),
	        $args->link_after,
	        $args->after
	    );
  	}
  
    // build html
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
}
}


class mobile_nav_walker extends Walker_Nav_Menu {
	var $to_depth = -1;

    function start_lvl(&$output, $depth){
      $output .= '</option>';
    }

    function end_lvl(&$output, $depth){
      $indent = str_repeat("\t", $depth); // don't output children closing tag
    }

    function start_el(&$output, $item, $depth, $args){
			$indent = ( $depth ) ? str_repeat( "&nbsp;", $depth * 4 ) : '';
			$class_names = $value = '';
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			$class_names = ' class="' . esc_attr( $class_names ) . '"';
	
			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
	
			$value = ' value="'. $item->url .'"';
			$selected = '';
			if ($item->url == get_permalink(get_the_ID())) { $selected = ' selected="selected"'; }
			
			$output .= '<option'.$id.$value.$class_names.$selected.'>';
	
			$item_output = $args->before;
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
	
			$output .= $indent.$item_output;
    }

    function end_el(&$output, $item, $depth){
			if(substr($output, -9) != '</option>')
    		$output .= "</option>"; // replace closing </li> with the option tag
	    }
}




function get_thumbnail_src($thumb, $ch = 0) {
	if ($ch == 1) {
		preg_match ("/src='(.*)' class/",$thumb,$link);
	}
	else {
		preg_match ('/src="(.*)" class/',$thumb,$link);
	}
	if (isset($link[1])) {
		return $link[1];
	}
	else {
		return false;
	}
}

function c_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);
		
		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}		

?>
<div <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<div class="comment-bottom <?php if ($depth > 1) { echo 'depth-2'; } ?>">
	<div class="comment-container" id="div-comment-<?php comment_ID() ?>">
	<?php if ($comment->comment_approved == '0') : ?>
		<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'wpfw') ?></em>
		<br />
	<?php endif; ?>

		<div class="comment-text">
			<span class="author_date">
				<span class="author">
					<span class="avatar"><?php echo get_avatar(get_the_author_meta('ID'), '30', get_bloginfo('template_url').'/images/default_avatar.png'); ?></span><span class="prefix"><?php _e("by"); ?></span> <?php printf(__('%s', 'wpfw'), get_comment_author_link()) ?>
				</span>
				<span class="date"><span class="prefix"><?php _e("on"); ?></span> <?php comment_date(get_option("date_format")); ?></span>
			</span>
			<?php comment_text() ?>
			<span class="comment_shares">
				<?php get_template_part('template_parts/comment_shares'); ?>
			</span>
			<span class="reply button">
				<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</span>								
		</div>	
		
		<div class="cleaner"></div>
		</div>
	</div>

<?php
}


function count_sidebar_widgets($sidebar_id) {
	
	$widgets = wp_get_sidebars_widgets();
	return count($widgets[$sidebar_id]);
	
}


add_filter('body_class','wpfw_body_class');
function wpfw_body_class($classes) {
	
	$classes[] = get_php_browser();
	
	return $classes;
}

function wpfw_theme_id() {
	global $_SESSION;
	
	session_start();
	
	if ($_GET['theme']) {
		$_SESSION['theme'] = $_GET['theme'];
	}
	if ($_SESSION['theme']) { $themeid = $_SESSION['theme']; }
	if (!$themeid) { 
		$themeid = 'default';
		$_SESSION['theme'] = 'default';
	}	
	
	return $themeid;
	
}

function get_customizable_styles_old() {
	
	$options = optionsframework_options();
	
	$content  = '<style type="text/css">';
	
	foreach($options as $option){
		
		if($option['type'] == 'typography') {
			
			$val = of_get_option($option['id']);
			
			$content .= $option['tag'].' { ';
			$content .= 'font: '.$val['style'].' '.$val['size'].' "'.$val['face'].'"; ';
			$content .= 'color: '.$val['color'].'; ';
			
			if (isset($option['underline'])) {
				if ($option['underline'] == true) {
					$content .= 'text-decoration: '.$val['underline'].'; ';
				}
			}
			$content .= '} ';
			
			if (isset($option['hover'])) {
				if ($option['hover'] == true) {
					
					$content .= str_replace(",",":hover,",$option['tag']).':hover { ';
					$content .= 'color: '.$val['color_hover'].'; ';
					if (isset($option['underline'])) {
						if ($option['underline'] == true) {
							$content .= 'text-decoration: '.$val['underline_hover'].'; ';
						}
					}
					$content .= '} ';
				}
			}
		
		}
		
	}
	
	if (of_get_option("cbgpattern")) { 	
			$content .= 'body { background: url('.of_get_option("cbgpattern").')'.of_get_option("bgxpos").' '.of_get_option("bgypos").' '.of_get_option("bgrepeat").' '.of_get_option("bgcolor").'; } ';
		} else { 
			$content .= 'body { background: url('.get_template_directory_uri().'/images/'.of_get_option("bgpattern").') '.of_get_option("bgxpos").' '.of_get_option("bgypos").' '.of_get_option("bgrepeat").' '.of_get_option("bgcolor").'; }';
		}
		
		$content .= '
			
		h2#Headline {
			margin-left: '.of_get_option('website_desc_left').'; 
			margin-top: '.of_get_option('website_desc_top').'; 
		}			
			
		#HeaderContainer {
			padding-top: '.of_get_option('header_top').'; 
			padding-bottom: '.of_get_option('header_bottom').'; 
		}
	
		ul.inc, ol.inc {
			margin-left: '.of_get_option('list_left_margin').'; 
		} ';

		if (of_get_option('list_bullet_type') != 'custom image') {
		
			$content .= '
				ul.inc li{
					list-style-type: '.of_get_option('list_bullet_type').'; 
					padding-top: '.of_get_option('list_lines_margin').'; 
					padding-bottom: '.of_get_option('list_lines_margin').'; 
					padding-left: '.of_get_option('list_left_margin').'; 
				} ';
		} else {
			$content .= '
				ul.inc li {
					list-style-type: none; 
					padding-left: '.of_get_option('list_left_margin').'; 
					padding-top: '.of_get_option('list_lines_margin').'; 
					padding-bottom: '.of_get_option('list_lines_margin').'; 
					line-height: '.of_get_option('list_size').'; 
					background: url('.of_get_option('list_bullet_image').') left '.of_get_option('list_lines_margin').' no-repeat; 
			} ';
		}
		
		$content .= '
		ol.inc li {
			padding-left: '.of_get_option('list_left_margin').'; 
			padding-top: '.of_get_option('list_lines_margin').'; 
			padding-bottom: '.of_get_option('list_lines_margin').'; 
			line-height: '.of_get_option('list_size').'; 
		}
		';			
		
			
		if (of_get_option('imagestyle') == "grayscale") {
			$content .= '
				img.grayscale, .container_skitter img {
					filter: gray; 
					-webkit-filter: grayscale(1); 
				  -webkit-transition: all .6s ease; 
				  -webkit-backface-visibility: hidden; 
				}
	
				img.grayscale:hover, a.active img.grayscale, .ls-layer:hover img.grayscale, .container_skitter:hover img {
				  filter: none; 
				  -webkit-filter: grayscale(0); 
				} ';
		}
			
		if (of_get_option('imagestyle') == "sepia") {
			$content .= '
				img.grayscale, .container_skitter img {
			  	-webkit-filter: sepia(1); 
					-webkit-filter: sepia(100%);  
					-moz-filter: sepia(100%); 
					-ms-filter: sepia(100%);  
					-o-filter: sepia(100%); 
					filter: sepia(100%); 
					background-color: #5E2612; 
					filter: alpha(opacity = 50); 
					zoom:1; 
					-webkit-transition: all .6s ease; 
					-webkit-backface-visibility: hidden; 
				}

				img.grayscale:hover, a.active img.grayscale, .ls-layer:hover img.grayscale, .container_skitter:hover img {
			    filter: none; 
			    -webkit-filter: sepia(0); 
				} ';
		}
			
		if (of_get_option('imagestyle') == "color") {
			$content .= '
				img.grayscale:hover, .ls-layer:hover img.grayscale, .container_skitter:hover img {
			  	filter: alpha(opacity = 80); 
			  	opacity: 0.8; 
			  	-webkit-transition: all .6s ease; 
				} ';
		}	
	
	$content .= '</style>';
		
	echo preg_replace('/\r|\n|\t/', '', $content);
	
}

function get_customizable_styles() {

	?>
	<style>
	#Header .socials a {
		border: <?php echo of_get_option("socialiconsborder"); ?> solid <?php echo of_get_option("socialiconsbordercolor"); ?>;
		color: <?php echo of_get_option("socialiconscolor"); ?>;
		background-color: <?php echo of_get_option("socialiconsbackgroundcolor"); ?>;
		font-size: <?php echo of_get_option("socialiconssize"); ?>;
		width: <?php echo str_replace('px','',of_get_option("socialiconssize"))+str_replace('px','',of_get_option("socialiconspadding"))*2; ?>px;
		height: <?php echo str_replace('px','',of_get_option("socialiconssize"))+str_replace('px','',of_get_option("socialiconspadding"))*2; ?>px;
		line-height: <?php echo of_get_option("socialiconssize"); ?>;
	}
	#Header .socials a:hover {
		border-color: <?php echo of_get_option("socialiconsbordercolorh"); ?>;
		color: <?php echo of_get_option("socialiconscolorh"); ?>;
		background-color: <?php echo of_get_option("socialiconsbackgroundcolorh"); ?>;
	}
	
	<?php
	if (of_get_option("layout_style") == 'FullWidth') {
		?>
		#TopContentContainer, 
		#MainWrapContainer,
		#HeaderContainer,
		#FooterContainer,
		#MainMenuContainer {
			width: <?php echo of_get_option("layout_width"); ?>;
		}
		<?php
		if (strpos(of_get_option("layout_width"),'px') !== false) {
			?>
			@media (max-width: <?php echo of_get_option("layout_width"); ?>) {
				#TopContentContainer, 
				#MainWrapContainer,
				#HeaderContainer,
				#FooterContainer,
				#MainMenuContainer {
					width: 95%;
				}
			}
			<?php
		}		
	}
	else {
		?>
		#WebsiteWrap {
			width: <?php echo of_get_option("layout_width"); ?>;
		}
		<?php
		if (strpos(of_get_option("layout_width"),'px') !== false) {
			?>
			@media (max-width: <?php echo of_get_option("layout_width"); ?>) {
				#WebsiteWrap {
					width: 95%;
				}
			}
			<?php
		}		
	}

	?>
	</style><?php
	
	
}
add_action('wp_head', 'get_customizable_styles');

function get_scripts_vars() {
		
		$content = '
		<script type="text/javascript">
			var homeanimationTime = '.number_format(of_get_option("homeslidertime")*1000, 0, '', '').'; 
			var homeautoPlay = '.of_get_option("homesautoplay").'; 
			var homeautoPlayPause = '.of_get_option("homespause").'; 
			var homepauseTime = '.number_format(of_get_option("homesslidestime")*1000, 0, '', '').'; 
			var anythinghomeanimationType = "'.of_get_option('anything_homestype').'"; 
			var parallaxhomeanimationType = "'.of_get_option('parallax_homestype').'"; 
			var nivohomeanimationType = "'.of_get_option('nivo_homestype').'"; 			
			var skitterhomeanimationType = "'.of_get_option('skitter_homestype').'"; 		
			var smallanimationTime = '.number_format(of_get_option("hb_slidertime")*1000, 0, '', '').'; 
			var smallanythinghomeanimationType = "'.of_get_option('hb_anything_stype').'"; 
			var smallnivohomeanimationType = "'.of_get_option('hb_nivo_stype').'"; 
		</script>';
		echo preg_replace('/\r|\n|\t/', '', $content);
}

//add_action('wp_head', 'get_scripts_vars');

function wpfw_get_image_id($image_url) {
	global $wpdb;
	$prefix = $wpdb->prefix;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM " . $prefix . "posts" . " WHERE guid='" . $image_url . "';", ""));
	return $attachment[0];	
}
/*
function remove_page_from_query_string($query_string)
{ 
  if (isset($query_string['name']) && isset($query_string['page'])) {
    if ($query_string['name'] == 'page') {
        unset($query_string['name']);
        // 'page' in the query_string looks like '/2', so i'm spliting it out
        list($delim, $page_index) = split('/', $query_string['page']);
        $query_string['paged'] = $page_index;
    }      
    return $query_string;
  }
}
// I will kill you if you remove this. I died two days for this line 
add_filter('request', 'remove_page_from_query_string');
*/

// following are code adapted from Custom Post Type Category Pagination Fix by jdantzer
function fix_category_pagination($qs){
	if(isset($qs['category_name']) && isset($qs['paged'])){
		$qs['post_type'] = get_post_types($args = array(
			'public'   => true,
			'_builtin' => false
		));
		array_push($qs['post_type'],'post');
	}
	return $qs;
}
add_filter('request', 'fix_category_pagination');

function get_attachment_id_from_src ($image_src) {
		global $wpdb;
		
		$query = "SELECT ID FROM ".$wpdb->prefix."posts WHERE guid='".$image_src."'";
		$id = $wpdb->get_var($query);
		return $id;

	}

/* woocommerce extended */

add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.of_get_option("shop_page_nr").';' ), 20 );



function generalvideo($args, $content) {
	extract(shortcode_atts(array( 
	'width' => '',
	'height' => '',
	'src' => ''), $args));
	
	
	$checkyt = explode("youtube.com", $src);
	$checkvi = explode("vimeo.com", $src);
	if (count($checkyt) > 1) { 
		$videolink = substr($src,31,11); 
		$ret = 'iframe  width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$videolink.'" frameborder="0" allowfullscreen></iframe';			
	}
	if (count($checkvi) > 1) { 
		$videolink = substr($src,17); 
		$ret = 'iframe  width="'.$width.'" height="'.$height.'" src="http://player.vimeo.com/video/'.$videolink.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe';
	}	

	return '<'.$ret.'>';
	
}

add_shortcode("generalvideo", "generalvideo");
add_theme_support('automatic-feed-links');



function wpfw_filter_head() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'wpfw_filter_head');



function get_minipanel_vars() {
	
	if ($_POST['minipanelsubmit'] == 1) {
	
		foreach($_POST as $key => $value) {
			$_SESSION[$key] = $value;
		}	
		
	if(!$_POST['mpnewsletterbar']) { $_SESSION['mpnewsletterbar'] = 'off'; }
	if(!$_POST['mpservicesblocks']) {  $_SESSION['mpservicesblocks'] = 'off'; }
	if(!$_POST['mphomearticles']) {  $_SESSION['mphomearticles'] = 'off'; }
	if(!$_POST['mpactionbar']) {  $_SESSION['mpactionbar'] = 'off'; }
	if(!$_POST['mphomearticle']) {  $_SESSION['mphomearticle'] = 'off'; }
	if(!$_POST['mpslidingtabs']) {  $_SESSION['mpslidingtabs'] = 'off'; }
	
	}
	
	if(!$_SESSION['mpslidertype']) { $_SESSION['mpslidertype'] = of_get_option('homestype'); }
	if(!$_SESSION['mpslidermodel']) { $_SESSION['mpslidermodel'] = of_get_option('homeslidertype'); }
	if(!$_SESSION['mpsliderautoplay']) { $_SESSION['mpsliderautoplay'] = of_get_option('homesautoplay'); }
	
	if(!$_SESSION['mpbgcolor']) { $_SESSION['mpbgcolor'] = of_get_option('bgcolor'); }
	if(!$_SESSION['mppattern']) { $_SESSION['mppattern'] = of_get_option('bgpattern'); }
		
	if(!$_SESSION['mpnewsletterbar']) { $_SESSION['mpnewsletterbar'] = 'on'; }
	if(!$_SESSION['mpservicesblocks']) {  $_SESSION['mpservicesblocks'] = 'on'; }
	if(!$_SESSION['mphomearticles']) {  $_SESSION['mphomearticles'] = 'on'; }
	if(!$_SESSION['mpactionbar']) {  $_SESSION['mpactionbar'] = 'on'; }
	if(!$_SESSION['mphomearticle']) {  $_SESSION['mphomearticle'] = 'on'; }
	if(!$_SESSION['mpslidingtabs']) {  $_SESSION['mpslidingtabs'] = 'on'; }
	
	
}

function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/login-logo.png);
            padding-bottom: 30px;
            background-size: 300px;
						width: 300px;
						height: 200px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

?>