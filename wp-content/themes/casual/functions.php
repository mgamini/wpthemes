<?php  global $themename, $input_prefix;

/*****************/
/* Theme Details */

$themename = "Casual";
$themeid = "casual";
$productid = "1450";

function add_widgetized_pages(){
	global $wpdb;
$get_widget_pages = $wpdb->get_results("SELECT * FROM ".$wpdb->postmeta." WHERE `meta_key` = '_wp_page_template' AND  `meta_value` = 'widget-page.php'");
foreach($get_widget_pages as $pages) :
	$post = get_post($pages->post_id);
	register_sidebar(array("name" => $post->post_title." Body", "description" => "OCMX Home Page Widgets here."));
	register_sidebar(array("name" => $post->post_title." Sidebar", "description" => "", "before_title" => "<h4 class=\"section-title\">", "after_title" => "</h4>", "before_widget" => "<li class=\"widget\"><div class=\"content\">", "after_widget" => "</div></li>"));
endforeach;
}
add_action("init", "add_widgetized_pages");
/**********************/
/* Include OCMX files */
$include_folders = array("/ocmx/includes/", "/ocmx/theme-setup/", "/ocmx/widgets/", "/ocmx/front-end/", "/ajax/", "/ocmx/interface/");

include_once (TEMPLATEPATH."/ocmx/folder-class.php");
include_once (TEMPLATEPATH."/ocmx/load-includes.php");
/**********************/
/* "Hook" up the OCMX */

add_theme_support( 'post-thumbnails' );
add_custom_background();
update_option("ocmx_font_support", true);
add_action('init', 'ocmx_add_scripts');
add_action('after_setup_theme', 'ocmx_setup');

/***********************/
/* Add OCMX Menu Items */

function ocmx_add_admin() {
	global $wpdb;
	add_object_page("Theme Options", "Theme Options", 'edit_themes', basename(__FILE__), '', 'http://obox-design.com/images/ocmx-favicon.png');
	add_submenu_page(basename(__FILE__), "General Options", "General", "administrator", basename(__FILE__), 'ocmx_general_options');
	add_submenu_page(basename(__FILE__), "Typography", "Typography", "administrator", "ocmx-fonts", 'ocmx_premium_access');
	add_submenu_page(basename(__FILE__), "Adverts", "Adverts", "administrator",  "ocmx-adverts", 'ocmx_premium_access');
	add_submenu_page(basename(__FILE__), "SEO Options", "SEO Options", "administrator", "ocmx-seo", 'ocmx_premium_access');
	add_submenu_page(basename(__FILE__), "Upgrade to the Premium Version!", "Upgrade", "administrator", "ocmx-update", 'ocmx_theme_update_options');
	
};

add_action('admin_menu', 'ocmx_add_admin');
/********************************/
/* Add the Buy More Themes Page */
function add_themes_page(){
	add_submenu_page(basename(__FILE__), "Buy Themes", "Buy More Themes", "administrator", "ocmx-themes", 'ocmx_more_theme_options');
}
add_filter("admin_menu", "add_themes_page", 12);

/*****************/
/* Add Nav Menus */

if (function_exists('register_nav_menus')) :
	register_nav_menus( array(
		'primary' => __('Primary Navigation', '$themename')
	) );
endif;

/***********************************************************************/
/* Set the parameters which allow the /interface/ folder to be included*/

function check_allow_ocmx(){
	if(
	   	!isset($_POST["ocmx_gallery_update"]) 
		&& (strpos($_SERVER['SCRIPT_FILENAME'], "admin.php") != null || strpos($_SERVER['SCRIPT_FILENAME'], "admin-ajax.php") != null && !isset($_POST['action']))
		&& is_user_logged_in()
	) :
		return true;
	else:
		return false;
	endif;
}

/*******************************/
/* Integrate goo.gl Shortlinks */

function googl_shortlink($url, $post_id) {
	global $post;
	if (!$post_id && $post) $post_id = $post->ID;

	if ($post->post_status != 'publish')
		return "";

	$shortlink = get_post_meta($post_id, '_googl_shortlink', true);
	if ($shortlink)
		return $shortlink;

	$permalink = get_permalink($post_id);

	$http = new WP_Http();
	$headers = array('Content-Type' => 'application/json');
	$result = $http->request('https://www.googleapis.com/urlshortener/v1/url', array( 'method' => 'POST', 'body' => '{"longUrl": "' . $permalink . '"}', 'headers' => $headers));
	if(is_array($result)) :
		$result = json_decode($result['body']);
		$shortlink = $result->id;
	endif;
	if ($shortlink) {
		add_post_meta($post_id, '_googl_shortlink', $shortlink, true);
		return $shortlink;
	}
	else {
		return $url;
	}
}

add_filter('get_shortlink', 'googl_shortlink', 9, 2);


/************************************************/
/* Fallback Function for WordPress Custom Menus */

function ocmx_fallback() {
	echo '<ul id="page_menu" class="page-menu clearfix">';
	wp_list_pages('title_li=&');
	echo '</ul>';
}

/******************************************************************************/
/* Each theme has their own "No Posts" styling, so it's kept in functions.php */

function ocmx_no_posts(){ ?>
	<li class="post transparent-container">					
    <div class="content clearfix">
        <h3 class="post-title"><a href="#"><?php _e("Page Not Found"); ?></a></h3>
        <div class="post-meta clearfix"></div>
        <div class="copy <?php echo $image_class; ?>">
             <?php _e("The page you are looking for does not exist"); ?>
        </div>
	</div>
</li>
<?php 
}
?>