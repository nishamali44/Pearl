<h1>Pearl Custom CSS</h1>
 <?php settings_errors(); ?>
 
 <form id="save-custom-css-form" method="post" action="options.php" class="pearl-general-form">
 	<?php settings_fields( 'pearl-custom-css-options' ); ?>
 	<?php do_settings_sections( 'nisha_pearl_css' ); ?>
 	<?php submit_button(); ?>
 </form>