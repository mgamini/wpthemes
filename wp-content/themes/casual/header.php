<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php 
	ocmx_site_title();
	ocmx_meta_keywords();
	ocmx_meta_description();
?>
<?php if(get_option("ocmx_custom_favicon") != "") : ?>
<link href="<?php echo get_option("ocmx_custom_favicon"); ?>" rel="icon" type="image/png" />
<?php endif; ?>
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
<?php echo theme_colour_styles(); ?>
<link href="<?php bloginfo('template_directory'); ?>/custom.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Droid+Sans+Mono' rel='stylesheet' type='text/css'>
<?php if(get_option("ocmx_rss_url")) : ?>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php echo get_option("ocmx_rss_url"); ?>" />
<?php else : ?>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<?php endif; ?>

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!--[if gte IE 7]> <script src="<?php bloginfo('template_directory'); ?>/scripts/DOMAssistantCompressed-2.7.4.js" type="text/javascript"></script> <script src="<?php bloginfo('template_directory'); ?>/scripts/ie-css3.js" type="text/javascript"></script> <![endif]-->
<?php wp_head(); ?>
</head>
<body>
<div id="header-container">
    <div id="header" class="clearfix">
	    <div class="logo">
	        <h1>
	            <a href="<?php bloginfo('url'); ?>">
	                <?php if(get_option("ocmx_custom_logo")) : ?>
	                    <img src="<?php echo get_option("ocmx_custom_logo"); ?>" alt="<?php bloginfo('name'); ?>" />
	                <?php else : ?>
	                    <img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="<?php strip_tags(bloginfo('name')); ?>" />
	                <?php endif; ?>
	            </a>
	        </h1>
	    </div>
	     <?php if (function_exists("wp_nav_menu")) :	
            wp_nav_menu(array(
                    'menu' => 'microinkdrop Menu',
                    'menu_id' => 'page_menu',
                    'menu_class' => 'page-menu clearfix',
                    'sort_column' 	=> 'menu_order',
                    'theme_location' => 'primary',
                    'container' => 'ul',
                    'fallback_cb' => 'ocmx_fallback')
            );
        endif; ?>
	</div>
</div>
        
<div id="content-container" class="clearfix">	