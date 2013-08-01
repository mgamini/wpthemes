<?php 
/* Theme Colour Selection */
function ocmx_site_title()
	{
		global $post;
		if(is_singular()) :
			$post_meta = get_post_meta($post->ID, "meta_title", true);
		endif;
		
		$seperator = get_option("ocmx_seperator");
		$default = get_bloginfo("name");
		echo "\n<title>".wp_title($seperator, false, "right").$default."</title>";
	}
function ocmx_meta_keywords()
	{
		global $post;
		if(is_singular() && fetch_post_tags($post->ID) !== "") :	
			echo "\n<meta name=\"keywords\" content=\"".fetch_post_tags($post->ID)."\" />";		
		endif;
		
	}
function ocmx_meta_description()
	{
		global $post;
		$post_meta = get_post_meta($post->ID, "meta_description", true);
		if(is_singular() && $post->post_excerpt !== "") :	
			echo "\n<meta name=\"description\" content=\"".trim(strip_tags($post->post_excerpt))."\" />";
		endif;
	}
?>