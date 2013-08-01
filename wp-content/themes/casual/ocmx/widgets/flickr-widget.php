<?php
class ocmx_flickr_widget extends WP_Widget {
    /** constructor */
    function ocmx_flickr_widget() {
        parent::WP_Widget(false, $name = 'OCMX - Flickr Photos', $description = 'Display your latest Flickr Photos.');	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        $flickr_key = $instance["flickr_id"];
        $flickr_count = $instance["flickr_count"];
        $flickr_src  = "http://www.flickr.com/badge_code_v2.gne?count=".$flickr_count."&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=".$flickr_key;
		echo $before_widget; ?>
				<?php echo $before_title; ?>
					<?php echo $instance['title'];?>
				<?php echo $after_title; ?>
				<div id="flickr_badge_wrapper" class="clearfix">
					<script type="text/javascript" src="<?php echo $flickr_src ?>"></script>
				</div>
        <?php echo $after_widget;
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
        $defaults = array( 'title' => '', 'flickr_id' => '', 'flickr_count' => '' ); 
        $instance = wp_parse_args( (array) $instance, $defaults );
        
        $title = esc_attr($instance["title"]);
        $flickr_id = esc_attr($instance["flickr_id"]);
        $flickr_count = esc_attr($instance["flickr_count"]);
		
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>">Title<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('flickr_id'); ?>">Flickr ID<input class="widefat" id="<?php echo $this->get_field_id('flickr_id'); ?>" name="<?php echo $this->get_field_name('flickr_id'); ?>" type="text" value="<?php echo $flickr_id; ?>" /></label></p>
			<p>Get your Flickr ID from <a href="http://idgettr.com/" target="_blank">idGettr</a></p>
           	<p>
            	<label for="<?php echo $this->get_field_id('flickr_count'); ?>">Image Count
                <select size="1" class="widefat" id="<?php echo $this->get_field_id('flickr_count'); ?>" name="<?php echo $this->get_field_name('flickr_count'); ?>">
                	<?php for($i = 3; $i < 16; $i=$i+3) : ?>
	                    <option <?php if($flickr_count == $i) : ?>selected="selected"<?php endif; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
			</p>
        <?php 
    }

} // class FooWidget

//This sample widget can then be registered in the widgets_init hook:

// register FooWidget widget
add_action('widgets_init', create_function('', 'return register_widget("ocmx_flickr_widget");'));

?>