<?php function ocmx_general_options (){	
	$ocmx_tabs = array(
					array(
						  "option_header" => "General Options",
						  "use_function" => "ocmx_fetch_options",
						  "function_args" => "general_site_options",
						  "ul_class" => "admin-block-list clearfix"
					  )
				);
	$ocmx_container = new OCMX_Container();
	$ocmx_container->load_container("General Options", $ocmx_tabs);
};

/********************************/
/* Add it to the OCMX Interface */
function ocmx_theme_update_options(){	
	$ocmx_tabs = array(
					array(
						  "option_header" => "Upgrage",
						  "use_function" => "ocmx_upgrade_license_options",
						  "function_args" => "",
						  "ul_class" => "admin-block-list clearfix"
					  )
				);
	$ocmx_container = new OCMX_Container();
	$ocmx_container->load_container("Upgrade to the Premium Version! ", $ocmx_tabs, "");
};

function ocmx_more_theme_options(){	
	$ocmx_tabs = array(
					array(
						"option_header" => "More Themes from Obox",
						"use_function" => "obox_theme_list",
						"function_args" => "",
						"ul_class" => "clearfix"
					  )
				);
	
	$ocmx_container = new OCMX_Container();
	$ocmx_container->load_container("Themes", $ocmx_tabs, "");
};
?>