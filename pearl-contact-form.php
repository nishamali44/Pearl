<h1>Pearl Contact Form</h1>
 <?php settings_errors(); ?>
 
 <p>Use this <strong>shortcode</strong> to activate the Contact Form inside a Page or a Post</p>
 <p><code>[contact_form]</code></p>
 
 <form method="post" action="options.php" class="pearl-general-form">
 	<?php settings_fields( 'pearl-contact-options' ); ?>
 	<?php do_settings_sections( 'nisha_pearl_theme_contact' ); ?>
 	<?php submit_button(); ?>
 </form>