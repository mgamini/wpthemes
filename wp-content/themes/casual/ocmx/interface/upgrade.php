<?php function ocmx_upgrade_license_options(){
		global $themename; ?>
   <li class="admin-block-item">
        <div class="admin-description">
            <h4><?php _e("License Key"); ?></h4>
        </div>
        <div class="admin-content">
            <div>
                <input name="ocmx_license_key" id="ocmx_license_key" value="" type="text">
                <input name="" id="ocmx_license_button" value="Validate Key &amp; Upgrade" class="button-primary" type="button">
            </div>
            <br />
            <span class="tooltip">Use your Obox License Key to upgrade to the full version of <?php echo $themename; ?>! This license will be found in your Profile on the Obox website.</span>
        </div>
	</li>
    <li id="result" class="admin-block-item no_display">
        <div class="admin-description">
            <h4><?php _e("Progress"); ?></h4>
        </div>
        <div class="admin-content">
        	<ul class="form-options contained-forms"></ul>
        </div>
    </li>
<?php } 
add_action("ocmx_upgrade_license_options", "ocmx_upgrade_license_options"); ?>
