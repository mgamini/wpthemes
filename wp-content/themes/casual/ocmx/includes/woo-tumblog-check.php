<?php function ocmx_check_tumblog(){
	if(!function_exists("woo_tumblog_the_title")) :
		add_action( 'admin_notices', 'ocmx_tumblog_warning' );
	endif;
}
function ocmx_tumblog_warning(){
	echo "<div class=\"updated fade\">".ocmx_tumblog_warning_text()."</div>";
}
function ocmx_tumblog_warning_text(){
	return "<p>Please note, you must have the <a class=\"thickbox\" href=\"".get_bloginfo("wpurl")."/wp-admin/plugin-install.php?tab=plugin-information&plugin=woo-tumblog&TB_iframe=true&width=600&height=550\">Woo Tumblog plugin</a> installed and activated to use this theme. Click <a class=\"thickbox\" href=\"".get_bloginfo("wpurl")."/wp-admin/plugin-install.php?tab=plugin-information&plugin=woo-tumblog&TB_iframe=true&width=600&height=550\">here</a> to install the plugin</p>";
}
add_action("admin_head", "ocmx_check_tumblog"); ?>