<?php $format = get_post_format();
if($format == "")
	$format = "aside";
	
$link = get_permalink($post->ID); ?>
<div class="post-container post-<?php echo $format ?> clearfix">
	<div class="date-container">
		<a class="icon-image" href="<?php echo $link ?>"> <?php echo $format ?> </a>
		<a class="date">
			<span class="day"><?php echo date('j', strtotime($post->post_date)); ?></span>
			<span class="month"><?php echo date('M', strtotime($post->post_date)); ?></span>
		</a>
 	</div>	
	<?php if (!function_exists("woo_tumblog_the_title")) : ?>
        <div class="post">
            <h3><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h3> 
            <div class="copy">
                <?php the_content(""); ?>
            </div>
        </div>
    <?php elseif ( has_post_format( 'aside' )) : ?>
        <div class="post">
            <h3><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h3> 
            <?php woo_tumblog_the_title($class ="", $icon = false, $before = "", $after = "", $return = true, $outer_element = "h3") ?>
            <?php woo_tumblog_content(); ?>
            <div class="copy">
                <?php the_content(""); ?>
            </div>
        </div>
    
    <?php elseif ( has_post_format( 'image' )) : ?>
        <div class="post"> 
            <?php woo_tumblog_the_title($class ="", $icon = false, $before = "", $after = "", $return = true, $outer_element = "h3") ?>
            <?php woo_tumblog_content(); ?>
            <div class="copy">
                <?php the_content(""); ?>
            </div>
        </div>
    
    <?php elseif ( has_post_format( 'link' )) : ?>		
        <div class="post"> 
            <?php woo_tumblog_the_title($class ="link-post-link", $icon = false, $before = "", $after = "", $return = false, $outer_element = "div") ?>
            <?php woo_tumblog_content(); ?>
            <div class="copy">
                <?php the_content(""); ?>
            </div>
        </div>
    
    <?php elseif ( has_post_format( 'quote' )) : ?>
        <div class="post"> 
            <?php woo_tumblog_the_title($class ="", $icon = false, $before = "", $after = "", $return = true, $outer_element = "h3") ?>
            <?php woo_tumblog_content(); ?>
            <div class="copy">
                <?php the_content(""); ?>
            </div>
        </div>
    
    <?php elseif ( has_post_format( 'video' )) : ?>
        <div class="post"> 
            <?php woo_tumblog_the_title($class ="", $icon = false, $before = "", $after = "", $return = true, $outer_element = "h3") ?>
            <?php woo_tumblog_content(); ?>
            <div class="copy">
                <?php the_content(""); ?>
            </div>
        </div>
    
    <?php elseif ( has_post_format( 'audio' )) : ?>	
        <div class="post"> 
            <?php woo_tumblog_the_title($class ="", $icon = false, $before = "", $after = "", $return = true, $outer_element = "h3") ?>
            <?php woo_tumblog_content(); ?>
            <div class="copy">
                <?php the_content(""); ?>
            </div>
        </div>
    
    <?php else : ?>
        <div class="post"> 
            <h3 class="title"><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h3>
            <?php woo_tumblog_the_title($class ="", $icon = false, $before = "", $after = "", $return = true, $outer_element = "h3") ?>
            <?php woo_tumblog_content(); ?>
            <div class="copy">
                <?php the_content(""); ?>
            </div>
        </div>
    <?php endif; ?>

</div>