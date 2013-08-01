<!doctype html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title><?php wp_title(" - ", true, "right"); ?><?php bloginfo('name'); ?></title>
  <meta name="author" content="Jake Rocheleau">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="HandheldFriendly" content="True">
  <meta name="viewport" content="width=device-width, maximum-scale=1.0">
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">
  <?php 
    $id = $post->ID;

    if ( has_post_thumbnail($id) ) {
      $postthumbsrc = wp_get_attachment_url(get_post_thumbnail_id($id));      
    } else {
      $postthumbsrc = get_template_directory_uri() . '/images/placeholder.jpg';      
    };
    echo '<script> var postthumbsrc = "' . $postthumbsrc . '";</script>'; 
    echo '<link rel="image_src" href="' . $postthumbsrc . '" />'; 
    ?>
  <?php 
    echo '<meta property="og:title" content="' . get_the_title() . '"/>';
    echo '<meta property="og:type" content="article"/>';
    echo '<meta property="og:url" content="' . get_permalink() . '"/>';
    echo '<meta property="og:site_name" content="Storyville - Stories"/>';
    ?>



  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
<!--[if lt IE 9]>
  <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' );?>
	<?php wp_head(); ?>
</head>

<body>

<nav id="n">
  <div id="nav-wrapper">
    <a href="/" id="header-logo"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt=""></a>
    <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'container' => false, 'theme_location' => 'header-menu' ) ); ?>   
    <ul id="nav-top-right">
      <li id="cartLink"><a href="http://www.storyville.com/cart.php">View Cart <img src="<?php echo get_template_directory_uri(); ?>/images/small-cart.png" /></a></li>
      <li><a href="callto:+18883233348">1.888.323.3348</a></li>
    </ul>  
  </div>
</nav>
		
	<div id="mainbody">
		<header id="header">
				<h1 ><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
		</header>
