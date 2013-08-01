<?php
class ocmx_extended_advert_widget extends WP_Widget {
    /** constructor */
    function ocmx_extended_advert_widget() {
        parent::WP_Widget(false, $name = 'OCMX - Extended Adverts', $widget_options = 'Display Adverts in your Sidebar.');	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
		echo $before_widget; ?>
            	<div class="extended-advert">
            		<a class="detail" href="<?php echo $instance['link_url']; ?>"><?php echo $instance['title']; ?></a>
            		<?php if($instance["party_script"] != "") : 
            			echo'<a href="' . $instance['party_script'] . '"><img src="' . $instance['image_url'] .'" alt="" /></a>';
            		else : ?>
	   					<a href="<?php echo $instance['link_url']; ?>">
                        	<img src="<?php echo $instance['image_url']; ?>" alt="" />
	                        <span class="advert-name"><?php echo $instance['ad_title']; ?></span>
    	                    <span class="advert-description"><?php echo $instance['ad_excerpt']; ?></span>
                        </a>
	   				<?php endif; ?>
	   				<?php echo $instance['party_script']; ?>
   				</div>
        <?php echo $after_widget;
        
    }
    

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
        $defaults = array( 'title' => '', 'ad_excerpt' => '', 'ad_title' => '' , 'link_url' => '', 'image_url' => '', 'party_script' => '' ); 
        $instance = wp_parse_args( (array) $instance, $defaults );
        
        $title = esc_attr($instance["title"]);
        $ad_excerpt = esc_attr($instance["ad_excerpt"]);
        $ad_title = esc_attr($instance["ad_title"]);
        $link_url = esc_attr($instance["link_url"]);
        $image_url = esc_attr($instance["image_url"]);
        $party_script = esc_attr($instance["party_script"]);
		
        ?>
            
        
            <p><label for="<?php echo $this->get_field_id('title'); ?>">Title<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
            
            <p><label for="<?php echo $this->get_field_id('ad_excerpt'); ?>">Excerpt<textarea class="widefat" id="<?php echo $this->get_field_id('ad_excerpt'); ?>" name="<?php echo $this->get_field_name('ad_excerpt'); ?>"><?php echo $ad_excerpt; ?></textarea>
            </label></p>
			
			<p><label for="<?php echo $this->get_field_id('ad_title'); ?>">Ad Title<input class="widefat" id="<?php echo $this->get_field_id('ad_title'); ?>" name="<?php echo $this->get_field_name('ad_title'); ?>" type="text" value="<?php echo $ad_title; ?>" /></label></p>
			
			<p><label for="<?php echo $this->get_field_id('link_url'); ?>">Link URL<input class="widefat" id="<?php echo $this->get_field_id('link_url'); ?>" name="<?php echo $this->get_field_name('link_url'); ?>" type="text" value="<?php echo $link_url; ?>" /></label></p>
			
			<p><label for="<?php echo $this->get_field_id('image_url'); ?>">Image URL<input class="widefat" id="<?php echo $this->get_field_id('image_url'); ?>" name="<?php echo $this->get_field_name('image_url'); ?>" type="text" value="<?php echo $image_url; ?>" /></label></p>
			
			 <p><label for="<?php echo $this->get_field_id('party_script'); ?>">3rd Party Script<textarea class="widefat" id="<?php echo $this->get_field_id('party_script'); ?>" name="<?php echo $this->get_field_name('party_script'); ?>"><?php echo $party_script; ?></textarea>
            </label></p>
			
			
        <?php 
    }

} // class FooWidget

//This sample widget can then be registered in the widgets_init hook:

// register FooWidget widget
add_action('widgets_init', create_function('', 'return register_widget("ocmx_extended_advert_widget");'));

?>