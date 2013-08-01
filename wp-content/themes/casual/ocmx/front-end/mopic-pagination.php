<?php function motionpic_pagination($container_class = "clearfix", $ul_class = "clearfix")
	{
		global $wp_query;
		$request = $wp_query->request;
		$showpages = 12;
		$numposts = $wp_query->found_posts;
		$startrow = 1;
	
		$pagenum = (ceil($numposts/get_option("posts_per_page")));
		
		$currentpage = get_query_var('paged');
		
		if($pagenum < $showpages) :
			$maxpages = $pagenum;
		elseif($currentpage > $showpages) :
			$startrow = ($currentpage-1);
			$maxpages = ($startrow + $showpages - 1);
			if($maxpages > $pagenum) :
				$startrow = ($startrow - ($maxpages - $pagenum));
				$maxpages = ($maxpages - ($maxpages - $pagenum));
			endif;
		else :
			$startrow = 1;
			$maxpages  = $showpages;
		endif;
		if($currentpage == 0) 
			$currentpage = 1;
		if((get_option("posts_per_page") && $numposts !== 0) && $numposts > get_option("posts_per_page")) :
	?>
    <ul class="pagination">
    	
        <?php if($currentpage == $pagenum) : ?>
        	<li class="page-count-previous">Page <?php echo $currentpage?> of <?php echo $pagenum?></li>
            <li class="previous"><?php previous_posts_link('Previous Page'); ?></li>
        <?php elseif($currentpage !== ceil($numposts/get_option("posts_per_page"))) : ?>
            <li class="next"><?php next_posts_link("Next Page"); ?></li>
            <?php if($currentpage != 1) : ?>
            	<li class="previous <?php if($currentpage != $pagenum) : ?>floatleft<?php endif; ?>"><?php previous_posts_link('Previous Page'); ?></li>
			<?php endif; ?>
			<li class="page-count-next">Page <?php echo $currentpage?> of <?php echo $pagenum?></li>
        <?php endif; ?>
    </ul>
<?php
		endif;
	} 
?>