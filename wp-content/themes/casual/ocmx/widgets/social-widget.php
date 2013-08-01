<?php
class ocmx_social_widget extends WP_Widget {
    /** constructor */
    function ocmx_social_widget() {
        parent::WP_Widget(false, $name = 'OCMX - Social Links', $widget_options = 'Link people up to your social Profiles.');	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
		$rss = $instance["rss"];
		$cargo = $instance["cargo"];
		$behance = $instance["behance"];
		$twitter = $instance["twitter"];
		$facebook = $instance["facebook"];
		$redux = $instance["redux"];
		$delicious = $instance["delicious"];
		$magnolia = $instance["magnolia"];
		$tumblr = $instance["tumblr"];
		$posterous = $instance["posterous"];
		$flickr = $instance["flickr"];
		$yahoo = $instance["yahoo"];
		$stumble = $instance["stumble"];
		$reddit = $instance["reddit"];
		$linkedin = $instance["linkedin"];
		$friendfeed = $instance["friendfeed"];
		$lastfm = $instance["lastfm"];
		$wave = $instance["wave"];
		$evernote = $instance["evernote"];
		$backtype = $instance["backtype"];
		$dropular = $instance["dropular"];
		$ffffound = $instance["ffffound"]; ?>
			<?php echo $before_widget; ?>
				<?php echo $before_title;
                	_e("Social Links");
				echo $after_title; ?>
                <ul class="social-bookmarks clearfix">
                    <?php if ($twitter !== "") : ?><li><a href="<?php echo $twitter; ?>" class="twitter"></a></li><?php endif; ?>
                    <?php if ($facebook !== "") : ?><li><a href="<?php echo $facebook; ?>" class="facebook"></a></li><?php endif; ?>
                    <?php if ($tumblr !== "") : ?><li><a href="<?php echo $tumblr; ?>" class="tumblr"></a></li><?php endif; ?>
                    <?php if ($posterous !== "") : ?><li><a href="<?php echo $posterous; ?>" class="posterous"></a></li><?php endif; ?>
                    <?php if ($flickr !== "") : ?><li><a href="<?php echo $flickr; ?>" class="flickr"></a></li><?php endif; ?>
                    <?php if ($yahoo !== "") : ?><li><a href="<?php echo $yahoo; ?>" class="yahoo"></a></li><?php endif; ?>
                    <?php if ($delicious !== "") : ?><li><a href="<?php echo $delicious; ?>" class="delicious"></a></li><?php endif; ?>
                    <?php if ($linkedin !== "") : ?><li><a href="<?php echo $linkedin; ?>" class="linkedin"></a></li><?php endif; ?>
                    <?php if ($stumble !== "") : ?><li><a href="<?php echo $stumble; ?>" class="stumble"></a></li><?php endif; ?>
                    <?php if ($friendfeed !== "") : ?><li><a href="<?php echo $friendfeed; ?>" class="friendfeed"></a></li><?php endif; ?>
                    <?php if ($ffffound !== "") : ?><li><a href="<?php echo $ffffound; ?>" class="ffffound"></a></li><?php endif; ?>
                    <?php if ($cargo !== "") : ?><li><a href="<?php echo $cargo; ?>" class="cargo"></a></li><?php endif; ?>
                    <?php if ($behance !== "") : ?><li><a href="<?php echo $behance; ?>" class="behance"></a></li><?php endif; ?>
                    <?php if ($redux !== "") : ?><li><a href="<?php echo $redux; ?>" class="redux"></a></li><?php endif; ?>
                    <?php if ($magnolia !== "") : ?><li><a href="<?php echo $magnolia; ?>" class="magnolia"></a></li><?php endif; ?>
                    <?php if ($reddit !== "") : ?><li><a href="<?php echo $reddit; ?>" class="reddit"></a></li><?php endif; ?>
                    <?php if ($lastfm !== "") : ?><li><a href="<?php echo $lastfm; ?>" class="lastfm"></a></li><?php endif; ?>
                    <?php if ($wave !== "") : ?><li><a href="<?php echo $wave; ?>" class="wave"></a></li><?php endif; ?>
                    <?php if ($evernote !== "") : ?><li><a href="<?php echo $evernote; ?>" class="evernote"></a></li><?php endif; ?>
                    <?php if ($backtype !== "") : ?><li><a href="<?php echo $backtype; ?>" class="backtype"></a></li><?php endif; ?>
                    <?php if ($dropular !== "") : ?><li><a href="<?php echo $dropular; ?>" class="dropular"></a></li><?php endif; ?>
                    <?php if ($rss !== "") : ?><li><a href="<?php echo $rss;?>" class="rss" target="_blank">RSS</a></li><?php endif; ?>
                </ul>
			<?php echo $after_widget; ?>
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
        $title = esc_attr(isset($instance["title"]));
        $twitter_id = esc_attr(isset($instance["twitter_id"])); ?>
            <p><?php _e("Please enter the full url."); ?></p>
            <p><label for="<?php echo $this->get_field_id('twitter'); ?>">Twitter<input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php if(isset($instance["twitter"])) : echo $instance["twitter"]; endif; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('facebook'); ?>">Facebook<input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php if(isset($instance["facebook"])) : echo $instance["facebook"]; endif; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('tumblr'); ?>">Tumblr<input class="widefat" id="<?php echo $this->get_field_id('tumblr'); ?>" name="<?php echo $this->get_field_name('tumblr'); ?>" type="text" value="<?php if(isset($instance["tumblr"])) : echo $instance["tumblr"]; endif; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('posterous'); ?>">Posterous<input class="widefat" id="<?php echo $this->get_field_id('posterous'); ?>" name="<?php echo $this->get_field_name('posterous'); ?>" type="text" value="<?php if(isset($instance["posterous"])) : echo $instance["posterous"]; endif; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('flickr'); ?>">Flickr<input class="widefat" id="<?php echo $this->get_field_id('flickr'); ?>" name="<?php echo $this->get_field_name('flickr'); ?>" type="text" value="<?php if(isset($instance["flickr"])) : echo $instance["flickr"]; endif; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('yahoo'); ?>">Yahoo<input class="widefat" id="<?php echo $this->get_field_id('yahoo'); ?>" name="<?php echo $this->get_field_name('yahoo'); ?>" type="text" value="<?php if(isset($instance["yahoo"])) : echo $instance["yahoo"]; endif; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('delicious'); ?>">Delicious<input class="widefat" id="<?php echo $this->get_field_id('delicious'); ?>" name="<?php echo $this->get_field_name('delicious'); ?>" type="text" value="<?php if(isset($instance["delicious"])) : echo $instance["delicious"]; endif; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('linkedin'); ?>">LinkedIn<input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php if(isset($instance["linkedin"])) : echo $instance["linkedin"]; endif; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('stumble'); ?>">Stumble<input class="widefat" id="<?php echo $this->get_field_id('stumble'); ?>" name="<?php echo $this->get_field_name('stumble'); ?>" type="text" value="<?php if(isset($instance["stumble"])) : echo $instance["stumble"]; endif; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('friendfeed'); ?>">FriendFeed<input class="widefat" id="<?php echo $this->get_field_id('friendfeed'); ?>" name="<?php echo $this->get_field_name('friendfeed'); ?>" type="text" value="<?php if(isset($instance["friendfeed"])) : echo $instance["friendfeed"]; endif; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('ffffound'); ?>">FFFFound<input class="widefat" id="<?php echo $this->get_field_id('ffffound'); ?>" name="<?php echo $this->get_field_name('ffffound'); ?>" type="text" value="<?php if(isset($instance["ffffound"])) : echo $instance["ffffound"]; endif; ?>" /></label></p>
           	<p><label for="<?php echo $this->get_field_id('cargo'); ?>">Cargo<input class="widefat" id="<?php echo $this->get_field_id('cargo'); ?>" name="<?php echo $this->get_field_name('cargo'); ?>" type="text" value="<?php if(isset($instance["cargo"])) : echo $instance["cargo"]; endif; ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('behance'); ?>">Behance<input class="widefat" id="<?php echo $this->get_field_id('behance'); ?>" name="<?php echo $this->get_field_name('behance'); ?>" type="text" value="<?php if(isset($instance["behance"])) : echo $instance["behance"]; endif; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('redux'); ?>">redux<input class="widefat" id="<?php echo $this->get_field_id('redux'); ?>" name="<?php echo $this->get_field_name('redux'); ?>" type="text" value="<?php if(isset($instance["redux"])) : echo $instance["redux"]; endif; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('magnolia'); ?>">Magnolia<input class="widefat" id="<?php echo $this->get_field_id('magnolia'); ?>" name="<?php echo $this->get_field_name('magnolia'); ?>" type="text" value="<?php if(isset($instance["magnolia"])) : echo $instance["magnolia"]; endif; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('reddit'); ?>">Reddit<input class="widefat" id="<?php echo $this->get_field_id('reddit'); ?>" name="<?php echo $this->get_field_name('reddit'); ?>" type="text" value="<?php if(isset($instance["reddit"])) : echo $instance["reddit"]; endif; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('lastfm'); ?>">Last.fm<input class="widefat" id="<?php echo $this->get_field_id('lastfm'); ?>" name="<?php echo $this->get_field_name('lastfm'); ?>" type="text" value="<?php if(isset($instance["lastfm"])) : echo $instance["lastfm"]; endif; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('wave'); ?>">Wave<input class="widefat" id="<?php echo $this->get_field_id('wave'); ?>" name="<?php echo $this->get_field_name('wave'); ?>" type="text" value="<?php if(isset($instance["wave"])) : echo $instance["wave"]; endif; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('evernote'); ?>">Evernote<input class="widefat" id="<?php echo $this->get_field_id('evernote'); ?>" name="<?php echo $this->get_field_name('evernote'); ?>" type="text" value="<?php if(isset($instance["evernote"])) : echo $instance["evernote"]; endif; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('backtype'); ?>">Backtype<input class="widefat" id="<?php echo $this->get_field_id('backtype'); ?>" name="<?php echo $this->get_field_name('backtype'); ?>" type="text" value="<?php if(isset($instance["backtype"])) : echo $instance["backtype"]; endif; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('dropular'); ?>">Dropular<input class="widefat" id="<?php echo $this->get_field_id('dropular'); ?>" name="<?php echo $this->get_field_name('dropular'); ?>" type="text" value="<?php if(isset($instance["dropular"])) : echo $instance["dropular"]; endif; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('rss'); ?>">Feedburner<input class="widefat" id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" type="text" value="<?php if(isset($instance["rss"])) : echo $instance["rss"]; endif; ?>" /></label></p>
        <?php 
    }

} // class FooWidget

//This sample widget can then be registered in the widgets_init hook:

// register FooWidget widget
add_action('widgets_init', create_function('', 'return register_widget("ocmx_social_widget");'));

?>