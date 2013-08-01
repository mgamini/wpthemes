<?php
global $obox_meta, $theme_options;

/* Setup Post Image Sizes */
add_image_size("post", 590, 350, true);

$theme_options = array();

$theme_options["general_site_options"] =
		array(
				array("label" => "Custom Logo", "description" => "Full URL or folder path to your custom logo.", "name" => "ocmx_custom_logo", "default" => "", "id" => "upload_button", "input_type" => "file", "args" => array("width" => 90, "height" => 75)),		
				array("label" => "Favicon", "description" => "Select a favicon for your site", "name" => "ocmx_custom_favicon", "default" => "", "id" => "upload_button_favicon", "input_type" => "file", "sub_title" => "favicon", "args" => array("width" => 16, "height" => 16)),
				array("label" => "Custom Header", "description" => "Select a custom background image for your sites Header. (Recommended width 960px, height 50px) ", "name" => "ocmx_custom_header", "default" => "", "id" => "upload_button_header", "input_type" => "file", "sub_title" => "header", "args" => array("width" => 960, "height" => 50)),
				array(
					"main_section" => "Colors",
					"main_description" => "Select the color of your Tumblog tabs.",
					"sub_elements" => 
						array(
							array("label" => "Menu Background Hover", "description" => "", "name" => "ocmx_menu_hover", "default" => "#3d546c", "id" => "ocmx_menu_hover", "input_type" => "colour"),
							array("label" => "Menu Link Hover", "description" => "", "name" => "ocmx_menu_link-hover", "default" => "#fff", "id" => "ocmx_menu_link-hover", "input_type" => "colour"),
							array("label" => "Link Color", "description" => "", "name" => "ocmx_tumblog", "default" => "#86C045", "id" => "ocmx_tumblog", "input_type" => "colour"),
							array("label" => "Link Hover", "description" => "", "name" => "ocmx_link_hover", "default" => "#333333", "id" => "ocmx_link_hover", "input_type" => "colour"),
							array("label" => "Footer Link Color", "description" => "", "name" => "ocmx_footer_link", "default" => "#ffffff", "id" => "ocmx_footer_link", "input_type" => "colour"),
							array("label" => "Footer Link Hover", "description" => "", "name" => "ocmx_footer_link_hover", "default" => "#ffcc00", "id" => "ocmx_footer_link_hover", "input_type" => "colour"),
							array("label" => "", "description" => "", "name" => "Reset Colors", "default" => "", "id" => "ocmx_colour_reset", "input_type" => "button", "rel" => "_color")
						)
					),	
				array("label" => "Post Count", "description" => "Number of Posts to display on the Home Page.", "name" => "ocmx_home_page_posts", "default" => "5", "id" => "", "input_type" => "select", "options" => array("1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "10" => "10", "15" => "15", "20" => "20")),
				array("label" => "Custom RSS URL", "description" => "", "name" => "ocmx_rss_url", "default" => "", "id" => "", "input_type" => "text"),
				array("label" => "Custom Footer Text", "description" => "", "name" => "ocmx_custom_footer", "default" => "Copyright 2011. Casual was created in WordPress by Obox Themes."	, "id" => "ocmx_custom_footer", "input_type" => "memo"),
				array("label" => "Hide Obox Logo", "description" => "Hide the Obox Logo from the footer.", "name" => "ocmx_logo_hide", "default" => "false", "id" => "ocmx_logo_hide", "input_type" => "checkbox"),
				array("label" => "Site Analytics", "description" => "Enter in the Google Analytics Script here.","name" => "ocmx_googleAnalytics", "default" => "", "id" => "","input_type" => "memo")
		);
$theme_options["seo_options"] = array(
							array("label" => "Use OCMX SEO", "description" => "Select \"No\" if you are using an SEO plugin.", "name" => "ocmx_seo", "default" => "yes", "input_type" => "select", "options" => array("Yes" => "yes", "No" => "no")),
							array("label" => "Separator", "description" => "Define a new seperator character for your page titles.", "name" => "ocmx_seperator", "default" => "|", "input_type" => "text"),
							array("label" => "Site Wide Title", "description" => "Set your site's meta title.", "name" => "ocmx_meta_title", "default" =>  get_bloginfo("title"), "input_type" => "text"),
							array("label" => "Site Keywords", "description" => "", "name" => "ocmx_meta_keywords", "default" => "", "input_type" => "text"),
							array("label" => "Site Description", "description" => "Use a custom meta description.", "name" => "ocmx_meta_description", "default" => get_bloginfo("description"), "input_type" => "memo")
						
						);
$theme_options["small_ad_options"] = array(
						array(
								"label" => "Number of Small Ads", 
								"description" => "When using the select box, you must click \"Save Changes\" before the blocks are added or removed.", 
								"name" => "ocmx_small_ads", 
								"id" =>  "ocmx_small_ads",
								"prefix" => "ocmx_small_ad",
								"default" => "0", 
								"input_type" => "select", 
								"options" => array("None" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "10" => "10"), 
								"args" => array("width" => 125, "height" => "125")
							)
					  );

$theme_options["medium_ad_options"] = array( 
						array(
								"label" => "Number of Medium Ads", 
								"description" => "", 
								"name" => "ocmx_medium_ads", 
								"id" =>  "ocmx_medium_ads",
								"prefix" => "ocmx_medium_ad", 
								"default" => "0", 
								"input_type" => "select", 
								"options" => array("None" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "10" => "10"), 
								"args" => array("width" => 300, "height" => "250")
							)
						);

$theme_options["custom_advert_options"] = array( 
						array(
							"main_section" => "Header Ad",
							"main_description" => "These settings allow you to manage your custom adverts which display in the header of your site. (Recommended size for the header ad is 468px by 60px)",
							"sub_elements" => 
								array(
									array("label" => "Advert Title", "description" => "", "name" => isset($input_prefix)."header_ad_title", "default" => "", "id" =>  isset($input_prefix)."header_ad_title", "input_type" => "text"),
									array("label" => "Advert Link", "description" => "", "name" => isset($input_prefix)."header_ad_link", "default" => "", "id" =>  isset($input_prefix)."header_ad_link", "input_type" => "text"),
									array("label" => "Image URL", "description" => "", "name" => isset($input_prefix)."header_ad_image", "default" => "", "id" =>  isset($input_prefix)."header_ad_image", "input_type" => "text"),
									array("label" => "Advert Script", "description" => "", "name" => isset($input_prefix)."header_ad_buysell_id", "default" => "", "id" => isset($input_prefix)."header_buysell_id", "input_type" => "memo"),
								)
						)
					);
	

$theme_options["delete_gallery"] = array( 
						array(
								"label" => "Confirm", 
								"description" => "Are you sure you want to delete this gallery?", 
								"name" => "ocmx_delete_gallery_confirm", 
								"id" =>  "ocmx_delete_gallery_confirm",
								"default" => "0", 
								"input_type" => "select", 
								"options" => array("Yes" => "yes", "No" => "no")
							)
						);
/***************************************************************************/
/* Setup Defaults for this theme for optiosn which aren't set in this page */

update_option("ocmx_general_font_style_default", "Arvo, Georgia, \"Times New Roman\", Times, serif");
update_option("ocmx_navigation_font_style_default", "Arvo, Georgia, \"Times New Roman\", Times, serif");
update_option("ocmx_sub_navigation_font_style_default", "Arvo, Georgia, \"Times New Roman\", Times, serif");
update_option("ocmx_post_font_titles_style_default", "Arvo, Georgia, \"Times New Roman\", Times, serif");
update_option("ocmx_post_font_meta_style_default", "Arvo, Georgia, \"Times New Roman\", Times, serif");
update_option("ocmx_post_font_copy_font_style_default", "Arvo, Georgia, \"Times New Roman\", Times, serif");
update_option("ocmx_widget_font_titles_font_style_default", "Arvo, Georgia, \"Times New Roman\", Times, serif");
update_option("ocmx_widget_footer_titles_font_size_default", "Arvo, Georgia, \"Times New Roman\", Times, serif");

update_option("ocmx_general_font_color_default", "#3D536C");
update_option("ocmx_navigation_font_color_default", "#fff");
update_option("ocmx_sub_navigation_font_color_default", "#fff");
update_option("ocmx_post_titles_font_color_default", "#333");
update_option("ocmx_post_meta_font_color_default", "#888");
update_option("ocmx_post_copy_font_color_default", "#3D536C");
update_option("ocmx_widget_titles_font_color_default", "#333");
update_option("ocmx_widget_footer_titles_font_size_default", "#fff");

update_option("ocmx_general_font_size_default", "12");
update_option("ocmx_navigation_font_size_default", "12");
update_option("ocmx_sub_navigation_font_size_default", "12");
update_option("ocmx_post_titles_font_size_default", "20");
update_option("ocmx_post_meta_font_size_default", "12");
update_option("ocmx_post_copy_font_size_default", "12");
update_option("ocmx_widget_titles_font_size_default", "14");
update_option("ocmx_widget_footer_titles_font_size_default", "14");

delete_option("allow_gallery_effect"); ?>