<?php function ocmx_load_styles(){

	if(get_option("ocmx_tumblog_color") != "" && !is_admin()) :
		$css = "";
		if(get_option("ocmx_menu_hover_color") != "")
			$css .= ".page-menu li a:hover{background: ".get_option("ocmx_menu_hover_color")." !important;}";
		if(get_option("ocmx_menu_link-hover_color") != "")
			$css .= ".page-menu li a:hover{color: ".get_option("ocmx_menu_link-hover_color")." !important;}";
		if(get_option("ocmx_tumblog_color") != "")
			$css .= ".copy a, .widget-list a{color: ".get_option("ocmx_tumblog_color")." !important;}";
		if(get_option("ocmx_link_hover_color") != "")
			$css .= ".copy a:hover, .widget-list a:hover{color: ".get_option("ocmx_link_hover_color")." !important;}";
		if(get_option("ocmx_tumblog_color") != "")
			$css .= "a.comment-count, .tags a, #footer a, #right-column a{color: ".get_option("ocmx_tumblog_color")." !important;} .post{border-top-color: ".get_option("ocmx_tumblog_color")." !important;}";
		if(get_option("ocmx_link_hover_color") != "")
			$css .= "a.comment-count:hover, .tags a:hover, #footer a:hover, #right-column a:hover{color: ".get_option("ocmx_link_hover_color")." !important;}";
		if(get_option("ocmx_footer_link_color") != "")
			$css .= "#footer a{color: ".get_option("ocmx_footer_link_color")." !important;}";
		if(get_option("ocmx_footer_link_hover_color") != "")
			$css .= "#footer a:hover{color: ".get_option("ocmx_footer_link_hover_color")." !important;}";
		if(get_option("ocmx_tumblog_color") != "")
			$css .= ".pagination .next a:hover, .pagination .previous a:hover, .page-menu a:hover, a.post-type, .search_button{background: ".get_option("ocmx_tumblog_color")." !important;}";
		if($css != "") :
			$css = urlencode($css);
			wp_register_style('ocmx_custom_styles', get_bloginfo('template_directory')."/style.php?css=$css");
        	wp_enqueue_style('ocmx_custom_styles');
		endif;		
	endif; 
}; 
add_action("wp_print_styles", "ocmx_load_styles"); ?>