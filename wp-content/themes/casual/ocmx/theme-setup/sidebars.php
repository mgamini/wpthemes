<?php 
// Create Dynamic Sidebars
if (function_exists('register_sidebar')) :
    register_sidebar(array("name" => "Sidebar", "before_title" => "<h4 class=\"widgettitle \">", "after_title" => "</h4>", "before_widget" => "<li class=\"widget\">", "after_widget" => "</li>"));
    register_sidebar(array("name" => "Footer", "before_title" => "<h4>", "after_title" => "</h4>", "before_widget" => "<li class=\"column\">", "after_widget" => "</li>"));

endif;
?>