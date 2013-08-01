<?php function ocmx_premium_access(){
	global $current_screen, $productid; ?>
	<div class="denied typography">
        <div class="select-price">
            <div class="banner-header">
                <h3>Upgrade to Premium</h3>
                <p>For only $50 you can gain access to <strong>all</strong> of these incredibly useful features! <a class="upgrade-now" href="http://www.obox-design.com/update-cart.cfm?product=<?php echo $productid; ?>10">Upgrade Now</a></p>
            
                <!-- Tabs -->
                <ul class="feature-list clearfix" id="tabs">
                    <?php  if('theme-options_page_ocmx-fonts' == $current_screen->id) : ?>
                         <li class="selected"><a href="#" rel="#tab-1">Typography Manager</a></li>                    
                    <?php else : ?>
                         <li><a href="#" rel="#tab-1">Typography Manager</a></li>
                    <?php endif; ?>
                    <?php  if('theme-options_page_ocmx-adverts' == $current_screen->id) : ?>
                         <li class="selected"><a href="#" rel="#tab-2">Advert Manager</a></li>                   
                    <?php else : ?>
                         <li><a href="#" rel="#tab-2">Advert Manager</a></li>
                    <?php endif; ?>
                    <?php  if('theme-options_page_ocmx-seo' == $current_screen->id) : ?>
                         <li class="selected"><a href="#" rel="#tab-3">SEO Manager</a></li>                   
                    <?php else : ?>
                         <li ><a href="#" rel="#tab-3">SEO Manager</a></li>
                    <?php endif; ?>
                </ul>
                
            </div>
            
            <!-- Tabs Content -->
            <ul class="feature-item clearfix">              
            <?php  if('theme-options_page_ocmx-fonts' == $current_screen->id) : ?>
                <li class="selected" id="tab-1">                     
            <?php else : ?>
                <li id="tab-1">
            <?php endif; ?>
                    <div class="copy">                    
                        <h4>Control your fonts</h4>
                        <p>Select between <strong>36</strong> standard and Google fonts and also choose your desired color &amp; font size with a neat slide controller.</p>
                    
                        <h4>Determine what goes where</h4>
                        <p>Select typography for navigation, meta data, post titles, copy and widgets.</p>
                        
                        <h4>Overview Page</h4>
                        <p>Once you are satisfied with your selections you can view them in unison on our overview page to give yourself a good idea of your combinations and selections!</p>
                        
                        <h4>Ever growing list</h4>
                        <p>The Typography Manager will constantly be updated with new fonts as they are added to Googles font list.</p>
                    </div>
                    <div class="copy-image">
                        <img src="http://cdn.obox-design.com/ocmx/typography.jpg" alt="Typography Manager" />
                    </div>
                </li>
     
                <?php  if('theme-options_page_ocmx-adverts' == $current_screen->id) : ?>
                    <li class="selected" id="tab-2">                     
                <?php else : ?>
                    <li id="tab-2">
                <?php endif; ?>

                    <div class="copy">                    
                        <h4>Cash in on your site</h4>
                        <p>Manage all the ad space on your site and make your money back on your theme in an instant with the OCMX Advert management tool.</p>
                        
                        <h4>Multiple Block sizes</h4>
                        <p>Select between 125x125 and 300x250 advert block sizes.</p>
                        
                        <h4>3rd Party advert options</h4>
                        <p>Insert 3rd party advert scripts such as Google Adsense or BuySellAds.</p>                    
                    </div>
                    <div class="copy-image">
                        <img src="http://cdn.obox-design.com/ocmx/adverts.jpg" alt="Advert Manager" />
                    </div>
                </li>
                
                <?php  if('theme-options_page_ocmx-seo' == $current_screen->id) : ?>
                    <li class="selected" id="tab-3">                     
                <?php else : ?>
                    <li id="tab-3">
                <?php endif; ?>
                
                    <div class="copy">
                        <h4>Rank high with SEO tools</h4>
                        <p>OCMX provides you with lightweight and easy to use SEO features to ensure that you rank as high as possible for your targeted keywords.</p>
                        
                        <h4>Light weight tools</h4>
                        <p>Easy to understand and modify allow for quick editing and testing.</p>                    
                    </div>
                    <div class="copy-image">
                        <img src="http://cdn.obox-design.com/ocmx/seo.jpg" alt="SEO Manager" />
                    </div>
                </li>
            </ul>
            
            <div class="membership-block ocmx-become-member">
                <h3 class="replace-cufozzle">Upgrade to premium Now!</h3>
                <p>Gain access to these extra features, dedicated support and free updates.</p>
                <a href="http://www.obox-design.com/update-cart.cfm?product=<?php echo $productid; ?>10" class="get-started">Get started for only $50</a>
            </div>
            
        </div>
    </div>
    <div class="clear"></div>
<?php } ?>