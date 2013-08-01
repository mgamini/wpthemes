<?php 
function ocmx_setup()
	{
		global $wpdb, $theme_options;
		if(isset($_GET["activated"])) :
			update_option("ocmx_theme_style", $theme_options["general_site_options"][1]["default"]);
		endif;
	}
?>