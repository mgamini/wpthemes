<?php get_header(); ?>
	<div id="left-column">
				
		<?php if (have_posts()) :
            global $show_author, $post;
            $show_author = 1;
            while (have_posts()) : the_post(); setup_postdata($post);
                get_template_part("/functions/fetch-post");
            endwhile;
        else :
            ocmx_no_posts();
        endif; ?> 
    	<?php comments_template(); ?>
		
	</div>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>