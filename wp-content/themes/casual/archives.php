<?php
	/* Template Name: Archives */
	global $wpdb;	
	//DISTINCT YEAR(post_date) AS year, MONTH(post_date) AS month, count(ID) as posts  
	$fetch_archive = $wpdb->get_results("SELECT * FROM " . $wpdb->posts . " WHERE post_status='publish' AND post_type = 'post' GROUP BY $wpdb->posts.ID ORDER BY post_date DESC");
	$last_month = date("m Y", strtotime($fetch_archive[0]->post_date));
	get_header(); 
?>
    <div id="left-column" class="archives-page">	
        <h3 class="section-title"><?php the_title(); ?></h3>
		<div class="post-container">
			<ul class="archives_list">
            <?php
                foreach($fetch_archive as $archive_data) :
                    global $post;
                    $post = $archive_data;
                    $category_id = get_the_category($archive_data->ID);
                    $this_category = get_category($category_id[0]->term_id);
                    $this_category_link = get_category_link($category_id[0]->term_id);
                    $link = get_permalink($archive_data->ID); ?>
                    <li>

                        <a href="<?php echo get_permalink($archive_data->ID); ?>" class="post-title"><?php echo substr($archive_data->post_title, 0, 45); ?></a>
                        <a href="<?php echo get_permalink($archive_data->ID); ?>/#comments" class="comment-count" title="Comment on <?php echo get_permalink($archive_data->post_title); ?>">
                            <?php echo $archive_data->comment_count; ?> <?php _e("comments"); ?>
                        </a>
                        <span class="label">
                            <a href="<?php echo $this_category_link; ?>" title="View all posts in <?php echo $this_category->name; ?>" rel="category tag"><?php echo $this_category->name; ?></a>
                        </span>
                    </li>
                <?php
                    $last_month = date("m Y", strtotime($archive_data->post_date));
                endforeach;
            ?>
		</ul>
	</div> 	
</div>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>