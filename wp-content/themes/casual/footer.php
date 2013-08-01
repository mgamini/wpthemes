</div>

 <div id="footer-container">
        <div id="footer" class="clearfix">
            <ul class="footer-three-column clearfix">
                <?php if (function_exists('dynamic_sidebar')) :
                    dynamic_sidebar(2);
                endif; ?>
            </ul>
            <div class="footer-text">
                <p><?php echo stripslashes(get_option("ocmx_custom_footer")); ?></p>
                <?php if(get_option("ocmx_logo_hide") != "true") : ?>
                    <div class="obox-credit">
                    	<p><a href="http://www.obox-design.com/wordpress-themes/tumblog.cfm">Tumblog WordPress Themes</a> by <a href="http://www.obox-design.com"><img src="<?php bloginfo("template_directory"); ?>/images/obox-logo.png" alt="Theme created by Obox" /></a></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php wp_footer(); ?>
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<?php 
	if(get_option("ocmx_googleAnalytics")) :
		echo stripslashes(get_option("ocmx_googleAnalytics"));
	endif;
?>

</body>
</html>