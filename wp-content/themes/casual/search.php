<?php get_header(); ?>
	<div id="left-column">
		<h3 class="section-title blue-base"><?php _e("Your Search Results for");?> "<em><?php the_search_query(); ?></em>"</h3>
     <ul>   
        <?php if (have_posts()) :
            global $show_author;
            $show_author = 1;
            while (have_posts()) :	the_post(); setup_postdata($post);
                include(TEMPLATEPATH."/functions/fetch-list.php");
            endwhile;
        else :
            ocmx_no_posts();
        endif; ?>
     </ul>
<?php motionpic_pagination("clearfix", "next-prev clearfix"); ?>
	</div>
    	<?php get_sidebar(); ?>
<?php get_footer(); ?>