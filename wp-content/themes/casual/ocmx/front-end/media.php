<?php function get_obox_image($width = 590, $height = '', $href_class = 'thumbnail', $wrap = '', $wrap_class = '', $hide_href = false, $exclude_video = false){
	global $post;
	//Set iamge HTML to nothing
	$img_html = "";
	
	//Set up which meta value we're using for the post	
	if(get_option("ocmx_thumbnail_usage") == "none") :
		return false;
	elseif(get_option("ocmx_thumbnail_usage") != "0") :
		$meta = get_option("ocmx_thumbnail_usage");
	elseif(!get_option("ocmx_thumbnail_custom") !== "") :
		$meta = get_option("ocmx_thumbnail_custom");
	else :
		$meta = "other_media";
	endif;	//Check for a thumbnail using the meta
	
	$get_thumbnail = get_post_meta($post->ID, $meta, true);
	$get_post_video = get_post_meta($post->ID, "main_video", true);
	$video_embed_link = get_post_meta($post->ID, "video_link", true);

	if ($video_embed_link != "" && $exclude_video == false) :
		if($height != "") :
			$embed_code = '[embed width="'.$width.'" height="'.$height.'"]'.$video_embed_link.'[/embed]';
		else :
			$embed_code = '[embed width="'.$width.'"]'.$video_embed_link.'[/embed]';
		endif;
		$wp_embed = new WP_Embed();
		$post_image = $wp_embed->run_shortcode($embed_code);
	elseif ($get_post_video !== "" && $exclude_video == false) :
	    $link = "";
		$post_image = preg_replace("/(width\s*=\s*[\"\'])[0-9]+([\"\'])/i", "$1 $width \" wmode=\"transparent\"", $get_post_video);
		if($height == "")
			$height = round($width/1.77, 0);
		
		$post_image = preg_replace("/(height\s*=\s*[\"\'])[0-9]+([\"\'])/i", "$1 $height $2", $post_image);
	//Begin the thumbnail check
	elseif ($meta == "wordpress" && function_exists("has_post_thumbnail") && has_post_thumbnail()) :

		if(has_post_thumbnail($post->ID)) :
			// Set the height to a huge number so that WP only sizes to the width
			if($height == "") : $height = 2000; endif;
			//Set the post Image Path
			$post_image = get_the_post_thumbnail($post->ID, array($width, $height));
		endif;
	elseif ($get_thumbnail !== "") :
		$get_effect = get_post_meta($post->ID, "other_media_effect", true);
		$post_image = "<img src=\"".get_bloginfo('template_directory')."/functions/timthumb.php?src=$get_thumbnail&amp;w=$width&amp;h=$height&amp;zc=1&amp;f=".$get_effect."\" title=\"$post->post_title\" />";	
	else :
		//There is no image, lets quit
		return false;
	endif;
	
	//Create the image HTML with the link around it	
	$link = get_permalink($post->ID);
	if($hide_href == false && $get_post_video == "" && $video_embed_link == "") :
		$img_html = "<a href=\"$link\" class=\"$href_class\">$post_image</a>";
	else :
		$img_html = $post_image;
	endif;
	
	//Class for the surrounding divs
	if($wrap_class != "") :    
    	$class = " class=\"$wrap_class\"";
    endif;
    
	if($wrap !== "") :
    	$img_html = "<$wrap".$class.">".$img_html."</$wrap>";
	else :
		$img_html;
	endif;
	
	return $img_html;
} ?>