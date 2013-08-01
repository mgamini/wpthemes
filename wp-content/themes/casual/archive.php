<?php get_header(); ?>
	<div id="left-column">
	    	<h3 class="section-title"><?php echo single_cat_title(); ?></h3>
     <ul>   
        <?php if (have_posts()) :
            global $show_author;
            $show_author = 1;
            while (have_posts()) :	the_post(); setup_postdata($post);
                get_template_part("/functions/fetch-list");
            endwhile;
        else :
            ocmx_no_posts();
        endif; ?>
     </ul>
    <?php motionpic_pagination("clearfix", "pagination clearfix"); ?>
	</div>
    	<?php get_sidebar(); ?>
<?php get_footer(); ?>