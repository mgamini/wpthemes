<?php
class popular_posts_widget extends WP_Widget {
    /** constructor */
    function popular_posts_widget() {
		$widget_ops = array('classname' => 'widget_popular_posts column', 'description' => __( "Popular Posts widget.") );
		$this->WP_Widget('popular_posts_widget', __("OCMX - Popular Posts"), $widget_ops);
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
		global $wpdb;
		if(!($instance["post_category"])) :
			$use_catId = 0;
		else :
	        $use_category = $instance["post_category"];
			$use_catId = get_category_by_slug($use_category);
		endif;
		
		$list_by = "comments";
		
		if(!($instance["display_limit"])) :
			$display_limit = "6";
		else :
			$display_limit = $instance["display_limit"];
		endif;
       	//Fetch the category for the widget
	   	$fetch_posts = $wpdb->get_results("SELECT * FROM " . $wpdb->posts . " WHERE post_status='publish' AND post_type = 'post' GROUP BY $wpdb->posts.ID ORDER BY comment_count DESC, post_date DESC LIMIT $display_limit");
		
		//Set the post Aguments and Query accordingly
		$count = 1;
		echo $before_widget; ?>
		<?php echo $before_title; ?>
			<?php echo $instance['title']; ?>
        <?php echo $after_title; ?>
        <ul>
            <?php foreach($fetch_posts as $post) :	
                $link = get_permalink($post->ID); ?>
                    <li>
                        <a href="<?php echo $link; ?>" title="<?php echo $link; ?>"><?php echo $post->post_title; ?></a>
                        <h5><?php echo date('d M Y', strtotime($post->post_date)); ?></h5>
                    </li>
            <?php endforeach; ?>
        </ul>
        <?php echo $after_widget;
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {
        $defaults = array( 'title' => '', 'list_by' => '', 'post_category' => '' , 'display_limit' => '' ); 
        $instance = wp_parse_args( (array) $instance, $defaults );
        
        $title = esc_attr($instance["title"]);
		$list_by = esc_attr(isset($instance["list_by"]));
        $post_category = esc_attr($instance["post_category"]);
		$display_limit = esc_attr($instance["display_limit"]);
?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>">Title<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('display_limit'); ?>">Post Count</label>
                <select size="1" class="widefat" id="<?php echo $this->get_field_id('display_limit'); ?>" name="<?php echo $this->get_field_name('display_limit'); ?>">
                	<?php for($i = 1; $i < 11; $i++) : ?>
	                    <option <?php if($display_limit == $i) : ?>selected="selected"<?php endif; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
			</p>
            <p><label for="<?php echo $this->get_field_id('post_category'); ?>">Specific Category</label>
               <select size="1" class="widefat" id="<?php echo $this->get_field_id("post_category"); ?>" name="<?php echo $this->get_field_name("post_category"); ?>">
                    <option <?php if(isset($post_count) == 0){echo "selected=\"selected\"";} ?> value="0">All</option>
                    <?php
							$category_args = array('hide_empty' => false);
                            $option_loop = get_categories($category_args);
                            foreach($option_loop as $option_label => $value)
                                { 	
                                    // Set the $value and $label for the options
                                    $use_value =  $value->slug;
                                    $label =  $value->cat_name;
                                    //If this option == the value we set above, select it
                                    if($use_value == $post_category)
                                        {$selected = " selected='selected' ";}
                                    else
                                        {$selected = " ";}
                    ?>
                                    <option <?php echo $selected; ?> value="<?php echo $use_value; ?>"><?php echo $label; ?></option>
                    <?php 
                                }
                    ?>
                </select>
			</p>
<?php 
	} // form

}// class

//This sample widget can then be registered in the widgets_init hook:

// register FooWidget widget
add_action('widgets_init', create_function('', 'return register_widget("popular_posts_widget");'));

?>