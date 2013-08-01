<?php
/*
  Custom functions designed specifically for Bare Responsive theme.
  Feel free to add your own dynamic functions, or clear out this file entirely.
  
*/

register_nav_menus( array( 'header-menu' => 'Header Menu' ) );
add_theme_support( 'post-thumbnails' ); 
set_post_thumbnail_size( 200, 140, true ); 
add_image_size('grid-thumbnail', 200, 140, true);

/**
 * Setting up custom sidebars
 *
 */
if(function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Main Sidebar',
		'id' => 'main',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="wtitle">',
		'after_title' => '</h3>'
	));
}

/**
 * Customize the 'Read More' link text
 *
 */
function custom_more_link( $link, $link_text ) {
     return str_replace( $link_text, 'Read More...', $link);
}
add_filter( 'the_content_more_link', 'custom_more_link', 10, 2 );


/**
 * Remove the hash(#) from all 'Read More' links
 *
 */
function remove_more_jump($link) {
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}
add_filter('the_content_more_link', 'remove_more_jump');
add_post_type_support('post','excerpt');


// function get_by_tag($tags) {
// 	$taglist = $tags[0];
// 	for ($tag in $tags) {
// 		$taglist += '+' . $tag
// 	}
// }

function sluggify( $url ) {
    # Prep string with some basic normalization
    $url = strtolower($url);
    $url = strip_tags($url);
    $url = stripslashes($url);
    $url = html_entity_decode($url);
    # Remove quotes (can't, etc.)
    $url = str_replace('\'', '', $url);
    # Replace non-alpha numeric with hyphens
    $match = '/[^a-z0-9,]+/';
    $replace = '-';
    $url = preg_replace($match, $replace, $url);
    $url = trim($url, '-');
    return $url;
}


add_action( 'pre_get_posts', 'my_change_sort_order'); 
function my_change_sort_order($query){
    if(is_archive()):
     //If you wanted it for the archive of a custom post type use: is_post_type_archive( $post_type )
       //Set the order ASC or DESC
       $query->set( 'order', 'DESC' );
       //Set the orderby
       $query->set( 'orderby', 'date' );
    endif;    
};



/**
 * Show a single post via admin-ajax.php
 *
 * Use a url like this to call this function:
 * /wp-admin/admin-ajax.php?action=mfields_show_post&p=514
 *
 * @since     2010-12-04
 */
function mfields_ajax_show_post() {
    $tag = ( isset( $_GET['tag'] ) ) ? (string) $_GET['tag'] : false;
    $tag = sluggify($tag);

    $cat = ( isset( $_GET['category'] ) ) ? (string) $_GET['category'] : '';    
    //query_posts('tag=cats,styleguide');
    query_posts( array( 'tag' => $tag, 'cat' => $cat ) );
    if ( have_posts() ) {
        while (have_posts()) : the_post(); $count++; 
                  
            $img = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
            $link = get_permalink();
            $title = get_the_title();
            $excerpt = get_the_excerpt();

            $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
            $excerpt = strip_shortcodes($excerpt);
            $excerpt = strip_tags($excerpt);
            $excerpt = substr($excerpt, 0, 50);
            $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
            $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));  

            $isthird = ($count%3 == 0) ? 'third' : '';
            
            echo '<article class="grid-item ' . $isthird . '">';
            echo '<figure class="post-thumb ">';
            echo '<a href="' . $link . '" rel="bookmark" title="' . $title . '">';
            
            if ($img != "") {
                echo the_post_thumbnail();
            } else {
                echo '<img src="' . get_template_directory_uri() .'/images/placeholder.jpg"/>';
            }
            echo '</a></figure>';

            echo '<div class="meta"><h2 class="title">';
            echo '<a href="' . $link . '" rel="bookmark" title="' . $title . '">' . $title . '</a></h2>';
            echo '<div class="time"><time datetime="';
            echo the_time('Y-m-j');
            echo '"> Posted on ';
            echo the_time(get_option('date_format'));
            echo '</time></div></div>';
            echo '<div class="excerpt">' . $excerpt . '</div></article>';
        endwhile;
    }
    else {
        print implode('', array( 'tag' => $tag, 'category_name' => $cat ));
        print '<p>No posts</p>';
    }
    exit;
}
add_action( 'wp_ajax_show_post', 'mfields_ajax_show_post' );
add_action( 'wp_ajax_nopriv_show_post', 'mfields_ajax_show_post' );

?>