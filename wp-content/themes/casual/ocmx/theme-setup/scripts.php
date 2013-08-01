<?php
function ocmx_add_scripts()
	{
		global $themeid;
		
		//Add support for 2.9 and 3.0 functions and setup jQuery for theme
		wp_enqueue_script("jquery");
	
		
			if(!is_admin()) :
				wp_enqueue_script( "superfish", get_bloginfo("template_directory")."/scripts/superfish.js", array( "jquery" ) );
				wp_enqueue_script( "superfish-hoverint", get_bloginfo("template_directory")."/scripts/hoverIntent.js", array( "jquery" ) );
				wp_enqueue_script( $themeid."-lightbox", get_bloginfo("template_directory")."/scripts/jquery.lightbox-0.5.js", array( "jquery" ) );
				wp_enqueue_script( $themeid."-jquery", get_bloginfo("template_directory")."/scripts/".$themeid."_jquery.js", array( "jquery" ) );
				
				//Localization
				wp_localize_script( $themeid."-jquery", "ThemeAjax", array( "ajaxurl" => admin_url( "admin-ajax.php" ) ) );
			else :
				wp_enqueue_style( "slider-css", get_bloginfo("template_directory")."/ocmx/slider/jquery-ui.css");
				wp_enqueue_style( "jquery-colorpicker", get_bloginfo("template_directory")."/ocmx/colorpicker.css");
				wp_enqueue_style( "colorpicker-css", get_bloginfo("template_directory")."/ocmx/premium.css");
				
				wp_enqueue_script( "jquery-colorpicker", get_bloginfo("template_directory")."/scripts/colorpicker.js", array( "jquery" ) );
				wp_enqueue_script( "jquery-fonts", get_bloginfo("template_directory")."/scripts/fonts.js", array('jquery', 'jquery-ui-core'));
				wp_enqueue_script( "ajaxupload", get_bloginfo("template_directory")."/scripts/ajaxupload.js", array( "jquery" ) );
				wp_enqueue_script( "ocmx-jquery", get_bloginfo("template_directory")."/scripts/ocmx_jquery.js", array( "jquery" ) );
				wp_enqueue_script( "ocmx-upgrade", get_bloginfo("template_directory")."/scripts/upgrade.js", array( "jquery" ) );
				wp_localize_script( "ocmx-jquery", "ThemeAjax", array( "ajaxurl" => admin_url( "admin-ajax.php" ) ) );
			endif;			
			
			//AJAX Functions
			add_action( 'wp_ajax_nopriv_ocmx_comment-post', 'ocmx_comment_post'  );
			add_action( 'wp_ajax_ocmx_comment-post', 'ocmx_comment_post' );
			add_action( 'wp_ajax_nopriv_do_ocmx_upgrade', 'do_ocmx_upgrade');
			add_action( 'wp_ajax_do_ocmx_upgrade', 'do_ocmx_upgrade');
			add_action( 'wp_ajax_ocmx_validate_key', 'ocmx_validate_key');
			add_action( 'wp_ajax_ocmx_save-options', 'update_ocmx_options');
			add_action( 'wp_ajax_ocmx_reset-options', 'reset_ocmx_options');
			add_action( 'wp_ajax_ocmx_ajax-upload', 'ocmx_ajax_upload' );
			add_action( 'wp_ajax_ocmx_remove-image', 'ocmx_ajax_remove_image' );
	}
?>