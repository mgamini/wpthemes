<?php get_header(); ?>
<div id="index" class="main" >
	  <?php $count = 0; ?>

			<?php if ( have_posts() ) : ?>

				<header class="archiveshead">
					<h2>Search Results for '<?php echo esc_attr(get_search_query()); ?>'</h2>
				</header>
				

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
				        <?php echo the_time(get_option('date_format')); ?>
				        </time>
				      </div>
				    </div>
				  
				  </article>
					
				<?php endwhile; ?>	
					
				<div id="navbelow" class="clearfix">
		        <div class="nav-prev"><?php previous_posts_link("&laquo; Newer Entries"); ?></div>
		        <div class="nav-next"><?php next_posts_link("Older Entries &raquo;"); ?></div>
		            <?php include('socials.php'); ?>

				</div>
					
				<?php else : ?>
				<article class="post">
					<header class="posthead">
				  	<h2>Sorry, no results found searching '<?php echo esc_attr(get_search_query()); ?>'</h2>
				  </header>
				  
				  <section class="post-content">
				  	<p>Maybe try searching under a different keyword?</p>
				  	
				  	<p>Or head back to the <a href="<?php echo site_url(); ?>/">home page</a> and look for your content again.</p>
				  </section>
				</article>					
					
				<?php endif; ?>
			
			</div> <!-- /#main -->
		

			<?php get_sidebar(); ?>

<?php get_footer(); ?>