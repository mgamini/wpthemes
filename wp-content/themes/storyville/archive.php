<?php get_header(); ?>
		
<div id="index" class="main" >
			<header class="archiveshead">
			<?php if (is_category()) { ?>
				<h2>'<?php single_cat_title(); ?>' Category Archives</h2>
				<script>var params = {}; params.category = "<?php
$cat = get_the_category();
$cat = $cat[0];
echo $cat->cat_ID;
?>";</script>

			<?php } elseif(is_tag()) { ?>
				<!-- <h2>Posts Tagged '<?php single_tag_title(); ?>'</h2> -->
				<script>var params = {}; params.tag = "'<?php single_tag_title(); ?>";</script>

			<?php } elseif(is_author()) { ?>
				<h2><?php get_the_author_meta('display_name'); ?> Author Archives</h2>
				<script>var params = {}; params.author = "'<?php get_the_author_meta('display_name'); ?>";</script>

			<?php } elseif(is_day()) { ?>
				<h2><?php the_time('l, F j, Y'); ?>: Daily Archives</h2>
				<script>var params = {}; params.day = "'<?php the_time('l, F j, Y'); ?>";</script>

			<?php } elseif(is_month()) { ?>
				<h2><?php the_time('F Y'); ?> Monthly Archives</h2>
				<script>var params = {}; params.month = "'<?php the_time('F Y'); ?>";</script>

			<?php } elseif(is_year()) { ?>
				<h2><?php the_time('Y'); ?> Yearly Archives</h2>
				<script>var params = {}; params.year = "'<?php the_time('Y'); ?>";</script>

			<?php } ?>
			</header>
			
			 

			<?php $tags = get_tags();
$html = '<ul class="tags"><li><h6 class="tags-title">Filter by Tags:</h6></li>';
foreach ( $tags as $tag ) {
  $tag_link = get_tag_link( $tag->term_id );
      
  $html .= "<li><a href='{$tag_link}' title='{$tag->name}' class='{$tag->slug} tag'>";
  $html .= "{$tag->name}</a></li>";
}
$html .= '</ul>';
echo $html;
?> 
<div id="articles-container">
			<?php if ( have_posts() ) : ?>
				
				<?php while (have_posts()) : the_post(); $count++; ?>
							  <?php
							  $img = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
    $link = get_permalink();
    $title = get_the_title();
    $excerpt = get_the_excerpt();
  ?>
				  <article class="grid-item <?php if ( 0 == $count%3 ) {
				        echo 'third';
				    } ?>">
				    <figure class="post-thumb ">
				      <a href="<?php echo $link ?>" rel="bookmark" title="<?php echo $title ?>">
				        <?php if ($img != ""): ?>
         				 <?php the_post_thumbnail(); ?>
				        <?php else: ?>
				          <img src="<?php echo get_template_directory_uri(); ?>/images/placeholder.jpg"/>
				        <?php endif; ?>
				            </a>
				      </figure>
				    <div class="meta">
				      <h2 class="title">
				      <a href="<?php echo $link ?>" rel="bookmark" title="<?php echo $title ?>">
				      <?php echo $title ?>
				      </a>
				      </h2>
				      <div class='time'>
				        <time datetime="<?php echo the_time('Y-m-j'); ?>">
				        Posted on <?php echo the_time(get_option('date_format')); ?>
				        </time>
				      </div>

				    </div>
				        <div class="excerpt">
      <?php 
      $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
      $excerpt = strip_shortcodes($excerpt);
      $excerpt = strip_tags($excerpt);
      if (strlen($excerpt) > 50) {
      $excerpt = substr($excerpt, 0, 50);
      $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    }
      $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));     

      echo $excerpt; ?>
    </div>
				  
				  </article>
					
				<?php endwhile; ?>	

</div>

				<div id="navbelow" class="clearfix">
		        <div class="nav-prev"><?php previous_posts_link("&laquo; Newer Entries"); ?></div>
		        <div class="nav-next"><?php next_posts_link("Older Entries &raquo;"); ?></div>
		        				<?php include('socials.php'); ?>
				</div>
			
			<?php else : ?>
				<article id="post-not-found" class="post">
					<header class="posthead">
				  	<h2>Whoops! Looks like we can't find this post.</h2>
				  </header>
				  
				  <section class="post-content">
				  	<p>It seems like this post is missing somewhere. Double-check the URL or try navigating back via the website menu links.</p>
				  </section>
				</article>
			<?php endif; ?>
		</div> <!-- /#main -->

		<?php get_sidebar(); ?>

<script src="<?php echo get_template_directory_uri(); ?>/js/tag-filters.js"></script>
<?php get_footer(); ?>