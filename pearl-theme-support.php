<h1>Pearl Theme Support</h1>
 <?php settings_errors(); ?>
 
 <form method="post" action="options.php" class="pearl-general-form">
 	<?php settings_fields( 'pearl-theme-support' ); ?>
 	<?php do_settings_sections( 'nisha_pearl_theme' ); ?>
 	<?php submit_button(); ?>
 </form>