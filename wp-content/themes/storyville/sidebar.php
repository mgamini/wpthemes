			<aside id="sidebar" role="complementary">
			<?php if ( ! dynamic_sidebar( 'Main Sidebar' ) ) : ?>
				<div class="widget">
					<?php get_search_form(); ?>
				</div>
				
<!-- 				<div class="widget">
					<h3 class="title">Archives</h3>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</div> -->
				
				<div class="widget">
					<h3 class="wtitle">Categories</h3>
					<ul>
						<?php wp_list_categories('title_li='); ?>
					</ul>
				</div>
				<div class="widget">
					<h3 class="wtitle">Most Popular</h3>
						<?php if (function_exists('wpp_get_mostpopular')) wpp_get_mostpopular(); ?>
				</div>
				<div class="widget">
					<h3 class="wtitle">Connect</h3>
<ul>
	<li><a href="https://www.facebook.com/StoryvilleCoffee">Facebook</a></li>
	<li><a href="https://twitter.com/Storyville">Twitter</a></li>
	<li><a href="https://pinterest.com/storyvilleco/">Pinterest</a></li>						
</ul>	
				</div>			
									<div class="ad">
					<img src="http://placehold.it/250x150&text=Advertisement"/>
				</div>
				<div class="ad">
					<img src="http://placehold.it/250x350&text=Advertisement"/>
				</div>
			<?php endif; ?>
			</aside>