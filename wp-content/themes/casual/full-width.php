<?php /* Template Name: Full Width */
get_header(); ?>
<div id="full-width">
	<?php if (have_posts()) :
		global $show_author, $post;
		$show_author = 1;
		while (have_posts()) : the_post(); setup_postdata($post);
			include(TEMPLATEPATH."/functions/fetch-post.php");
		endwhile;
	else :
		ocmx_no_posts();
	endif; ?> 
	<?php comments_template(); ?>
</div>

<?php get_footer(); ?>