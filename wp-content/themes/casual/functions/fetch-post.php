<?php $format = get_post_format();
if($format == "")
	$format = "aside";
$link = get_permalink($post->ID);
$post_image = get_the_post_thumbnail($post->ID, 'full'); ?>
<div class="post-container post-<?php echo $format ?> clearfix">
	<div class="date-container">
		<a class="icon-image" href="<?php echo $link ?>"> <?php echo $format ?> </a>
		<a class="date">
			<span class="day"><?php echo date('j', strtotime($post->post_date)); ?></span>
			<span class="month"><?php echo date('M', strtotime($post->post_date)); ?></span>
		</a>
 	</div>	
	<?php if (!function_exists("woo_tumblog_the_title")) : ?>
        <div class="post post-<?php echo $format ?>"> 
            <h3 class="title"><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h3>
            <div class="copy">
                <?php the_content(""); ?>
            </div>
        </div>
    <?php elseif ( has_post_format( 'aside' )) : ?>
        <div class="post post-<?php echo $format ?>"> 
            <h3 class="title"><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h3>
            <?php woo_tumblog_the_title($class ="", $icon = false, $before = "", $after = "", $return = true, $outer_element = "h3") ?>
            <?php woo_tumblog_content(); ?>
            <div class="copy">
                <?php the_content(""); ?>
            </div>
        </div>
    
    <?php elseif ( has_post_format( 'image' )) : ?>
        <div class="post post-<?php echo $format ?>"> 
            <?php woo_tumblog_the_title($class ="", $icon = false, $before = "", $after = "", $return = true, $outer_element = "h3") ?>
            <?php woo_tumblog_content(); ?>
            <div class="copy">
                <?php the_content(""); ?>
            </div>
        </div>
    
    <?php elseif ( has_post_format( 'link' )) : ?>
        
        <div class="post post-<?php echo $format ?>"> 
            <?php woo_tumblog_the_title($class ="link-post-link", $icon = false, $before = "", $after = "", $return = false, $outer_element = "div") ?>
            <?php woo_tumblog_content(); ?>
            <div class="copy">
                <?php the_content(""); ?>
            </div>
        </div>
    
    <?php elseif ( has_post_format( 'quote' )) : ?>
        <div class="post post-<?php echo $format ?>"> 
            <?php woo_tumblog_the_title($class ="", $icon = false, $before = "", $after = "", $return = true, $outer_element = "h3") ?>
            <?php woo_tumblog_content(); ?>
            <div class="copy">
                <?php the_content(""); ?>
            </div>
        </div>
    
    <?php elseif ( has_post_format( 'video' )) : ?>
        <div class="post post-<?php echo $format ?>"> 
            <?php woo_tumblog_the_title($class ="", $icon = false, $before = "", $after = "", $return = true, $outer_element = "h3") ?>
            <?php woo_tumblog_content(); ?>
            <div class="copy">
                <?php the_content(""); ?>
            </div>
        </div>
    
    <?php elseif ( has_post_format( 'audio' )) : ?>
        <div class="post post-<?php echo $format ?>"> 
            <?php woo_tumblog_the_title($class ="", $icon = false, $before = "", $after = "", $return = true, $outer_element = "h3") ?>
            <?php woo_tumblog_content(); ?>
            <div class="copy">
                <?php the_content(""); ?>
            </div>
        </div>
    
    <?php else : ?>
    
        <div class="post post-<?php echo $format ?>"> 
            <h3 class="title"><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h3>
            <div class="page-image">
                <?php echo $post_image ?>
            </div>
            <div class="copy">
                <?php the_content(""); ?>
            </div>
        </div>
    
    <?php endif; ?>
        
</div>

<div class="meta-container-block">
    <ul class="post-meta">                        
        <li class="meta-block">
            <?php  if(has_tag()): ?>
                    <ul class="tags">
                        <?php the_tags('<li><strong>Tags:</strong></li><li>','</li><li>','</li>'); ?>
                    </ul>
            <?php endif; ?>
            <a href="<?php echo $link; ?>#comments" class="comment-count"><?php comments_number(' No Comments',' 1 Comment',' % Comments'); ?></a>
        </li>
        <li class="meta-block">
            <ul class="social">
                <li>
                    <a href="http://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a>
                </li>
                <li>
                    <iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo $link; ?>&amp;layout=button_count&amp;show_faces=true&amp;width=110&amp;action=like&amp;colorscheme=light&amp;height=21" style="border: medium none; overflow: hidden; width: 110px; height: 30px;" allowtransparency="true" frameborder="0" scrolling="no"></iframe>
                </li>
            </ul>
           <div class="short-url">
               <strong>Short Url</strong>
               <input type="text" value="<?php echo wp_get_shortlink($post->ID); ?>" />
           </div>
        </li>                        
    </ul>
</div>