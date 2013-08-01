<?php get_header(); ?>
			
<div class="main">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" class="post" role="article">
		<div class="meta">
			<h2 class="title">
			<a href="<?php echo $link ?>" rel="bookmark" title="<?php the_title(); ?>">
				<?php the_title(); ?>
			</a>
			</h2>
			<div class='time'>
				<time datetime="<?php echo the_time('Y-m-j'); ?>">
				<?php echo the_time(get_option('date_format')); ?>
				</time>
			</div>
		</div>

		
		<section class="post-content clearfix">
			<?php the_content(); ?>

		<?php the_tags('<ul class="tags"><li><h6 class="tags-title">Tags:</h6></li><li>', '</li><li>', '</li></ul>'); ?>

			<div id="navbelow">
				<div class="nav-next"><?php previous_post_link('%link', 'Older >'); ?></div>
				<div class="nav-prev"><?php next_post_link('%link', '< Newer'); ?></div> 
				<?php include('socials.php'); ?>
			</div>
		</section>

		
		
	</article><!-- /.post -->

	<?php endwhile; ?>
	
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

<?php get_footer(); ?>
