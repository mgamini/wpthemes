<?php
/*
Template Name: All
*/
?>

<?php get_header(); ?>

<div id="index" class="main" >
<?php $tags = get_tags();
$html = '<ul class="tags"><li><h6 class="tags-title">Filter by tags:</h6></li>';
foreach ( $tags as $tag ) {
  $tag_link = get_tag_link( $tag->term_id );
      
  $html .= "<li><a href='{$tag_link}' title='{$tag->name}' class='{$tag->slug} tag'>";
  $html .= "{$tag->name}</a></li>";
}
$html .= '</ul>';
echo $html;
?>
  <?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$sticky = count(get_option('sticky_posts')); 
query_posts('showposts=' . (9 - $sticky) . '&paged=' . $paged); 
?>
<div id="articles-container">
    <?php $count = 0; ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); $count++; ?>
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
          <!-- <img src="<?php echo $img ?>"/> -->
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
      <!-- <a href="#" rel="category">
      #<?php the_category(', '); ?>
      </a> -->
<!--      <a href="<?php comments_link(); ?> ">
      <?php comments_number( 'no comments', '1 comment', '% comments' ); ?>
      </a>   -->    
      <!--<?php the_tags( '<ul class=\'tags\'><li><h6 class="tags-title">Tags:</h6></li><li>', '</li><li>', '</li></ul>' ); ?> -->
  
  </article>
  <?php endwhile; ?>
  </div>
  <div id="navbelow">
    <div class="nav-prev"><?php previous_posts_link("&laquo; Previous"); ?></div>
    <div class="nav-next"><?php next_posts_link("Next &raquo;"); ?></div>
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
  <?php wp_reset_query(); ?>
  </div> <!-- /#main -->
  <?php get_sidebar(); ?>
  <script src="<?php echo get_template_directory_uri(); ?>/js/tag-filters.js"></script>

  <?php //get_sidebar( 'responsive' ); ?>
  <?php get_footer(); ?>