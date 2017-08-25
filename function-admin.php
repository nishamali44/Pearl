<?php
 
 /*
 	
 @package pearltheme
 	
 	========================
 		ADMIN PAGE
 	========================
 */
 
 function pearl_add_admin_page() {
 	
 	//Generate pearl Admin Page
 	add_menu_page( 'pearl Theme Options', 'pearl', 'manage_options', 'nisha_pearl', 'pearl_theme_create_page', get_template_directory_uri() . '/img/pearl-icon.png', 110 );
 	
 	//Generate pearl Admin Sub Pages
 	add_submenu_page( 'nisha_pearl', 'pearl Sidebar Options', 'Sidebar', 'manage_options', 'nisha_pearl', 'pearl_theme_create_page' );
 	add_submenu_page( 'nisha_pearl', 'pearl Theme Options', 'Theme Options', 'manage_options', 'nisha_pearl_theme', 'pearl_theme_support_page' );
 	add_submenu_page( 'nisha_pearl', 'pearl Contact Form', 'Contact Form', 'manage_options', 'nisha_pearl_theme_contact', 'pearl_contact_form_page' );
 	add_submenu_page( 'nisha_pearl', 'pearl CSS Options', 'Custom CSS', 'manage_options', 'nisha_pearl_css', 'pearl_theme_settings_page');
 	
 }
 add_action( 'admin_menu', 'pearl_add_admin_page' );
 
 //Activate custom settings
 add_action( 'admin_init', 'pearl_custom_settings' );
 
 function pearl_custom_settings() {
 	//Sidebar Options
 	register_setting( 'pearl-settings-group', 'profile_picture' );
 	register_setting( 'pearl-settings-group', 'first_name' );
 	register_setting( 'pearl-settings-group', 'last_name' );
 	register_setting( 'pearl-settings-group', 'user_description' );
 	register_setting( 'pearl-settings-group', 'twitter_handler', 'pearl_sanitize_twitter_handler' );
 	register_setting( 'pearl-settings-group', 'facebook_handler' );
 	register_setting( 'pearl-settings-group', 'gplus_handler' );
 	
 	add_settings_section( 'pearl-sidebar-options', 'Sidebar Option', 'pearl_sidebar_options', 'nisha_pearl');
 	
 	add_settings_field( 'sidebar-profile-picture', 'Profile Picture', 'pearl_sidebar_profile', 'nisha_pearl', 'pearl-sidebar-options');
 	add_settings_field( 'sidebar-name', 'Full Name', 'pearl_sidebar_name', 'nisha_pearl', 'pearl-sidebar-options');
 	add_settings_field( 'sidebar-description', 'Description', 'pearl_sidebar_description', 'nisha_pearl', 'pearl-sidebar-options');
 	add_settings_field( 'sidebar-twitter', 'Twitter handler', 'pearl_sidebar_twitter', 'nisha_pearl', 'pearl-sidebar-options');
 	add_settings_field( 'sidebar-facebook', 'Facebook handler', 'pearl_sidebar_facebook', 'nisha_pearl', 'pearl-sidebar-options');
 	add_settings_field( 'sidebar-gplus', 'Google+ handler', 'pearl_sidebar_gplus', 'nisha_pearl', 'pearl-sidebar-options');
 	
 	//Theme Support Options
 	register_setting( 'pearl-theme-support', 'post_formats' );
 	register_setting( 'pearl-theme-support', 'custom_header' );
 	register_setting( 'pearl-theme-support', 'custom_background' );
 	
 	add_settings_section( 'pearl-theme-options', 'Theme Options', 'pearl_theme_options', 'nisha_pearl_theme' );
 	
 	add_settings_field( 'post-formats', 'Post Formats', 'pearl_post_formats', 'nisha_pearl_theme', 'pearl-theme-options' );
 	add_settings_field( 'custom-header', 'Custom Header', 'pearl_custom_header', 'nisha_pearl_theme', 'pearl-theme-options' );
 	add_settings_field( 'custom-background', 'Custom Background', 'pearl_custom_background', 'nisha_pearl_theme', 'pearl-theme-options' );
 	
 	//Contact Form Options
 	register_setting( 'pearl-contact-options', 'activate_contact' );
 	
 	add_settings_section( 'pearl-contact-section', 'Contact Form', 'pearl_contact_section', 'nisha_pearl_theme_contact');
 	
 	add_settings_field( 'activate-form', 'Activate Contact Form', 'pearl_activate_contact', 'nisha_pearl_theme_contact', 'pearl-contact-section' );
 	
 	//Custom CSS Options
 	register_setting( 'pearl-custom-css-options', 'pearl_css', 'pearl_sanitize_custom_css' );
 	
 	add_settings_section( 'pearl-custom-css-section', 'Custom CSS', 'pearl_custom_css_section_callback', 'nisha_pearl_css' );
 	
 	add_settings_field( 'custom-css', 'Insert your Custom CSS', 'pearl_custom_css_callback', 'nisha_pearl_css', 'pearl-custom-css-section' );
 	
 }
 
 function pearl_custom_css_section_callback() {
 	echo 'Customize pearl Theme with your own CSS';
 }
 
 function pearl_custom_css_callback() {
 	$css = get_option( 'pearl_css' );
 	$css = ( empty($css) ? '/* pearl Theme Custom CSS */' : $css );
 	echo '<div id="customCss">'.$css.'</div><textarea id="pearl_css" name="pearl_css" style="display:none;visibility:hidden;">'.$css.'</textarea>';
 }
 
 function pearl_theme_options() {
 	echo 'Activate and Deactivate specific Theme Support Options';
 }
 
 function pearl_contact_section() {
 	echo 'Activate and Deactivate the Built-in Contact Form';
 }
 
 function pearl_activate_contact() {
 	$options = get_option( 'activate_contact' );
 	$checked = ( @$options == 1 ? 'checked' : '' );
 	echo '<label><input type="checkbox" id="activate_contact" name="activate_contact" value="1" '.$checked.' /></label>';
 }
 
 function pearl_post_formats() {
 	$options = get_option( 'post_formats' );
 	$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
 	$output = '';
 	foreach ( $formats as $format ){
 		$checked = ( @$options[$format] == 1 ? 'checked' : '' );
 		$output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.' /> '.$format.'</label><br>';
 	}
 	echo $output;
 }
 
 function pearl_custom_header() {
 	$options = get_option( 'custom_header' );
 	$checked = ( @$options == 1 ? 'checked' : '' );
 	echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.' /> Activate the Custom Header</label>';
 }
 
 function pearl_custom_background() {
 	$options = get_option( 'custom_background' );
 	$checked = ( @$options == 1 ? 'checked' : '' );
 	echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.' /> Activate the Custom Background</label>';
 }
 
 // Sidebar Options Functions
 function pearl_sidebar_options() {
 	echo 'Customize your Sidebar Information';
 }
 
 function pearl_sidebar_profile() {
 	$picture = esc_attr( get_option( 'profile_picture' ) );
 	if( empty($picture) ){
 		echo '<button type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button"><span class="pearl-icon-button dashicons-before dashicons-format-image"></span> Upload Profile Picture</button><input type="hidden" id="profile-picture" name="profile_picture" value="" />';
 } else {
 		echo '<button type="button" class="button button-secondary" value="Replace Profile Picture" id="upload-button"><span class="pearl-icon-button dashicons-before dashicons-format-image"></span> Replace Profile Picture</button><input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" /> <button type="button" class="button button-secondary" value="Remove" id="remove-picture"><span class="pearl-icon-button dashicons-before dashicons-no"></span> Remove</button>';
 	}
 	
 }
 function pearl_sidebar_name() {
 	$firstName = esc_attr( get_option( 'first_name' ) );
 	$lastName = esc_attr( get_option( 'last_name' ) );
 	echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" /> <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name" />';
 }
 function pearl_sidebar_description() {
 	$description = esc_attr( get_option( 'user_description' ) );
 	echo '<input type="text" name="user_description" value="'.$description.'" placeholder="Description" /><p class="description">Write something smart.</p>';
 }
 function pearl_sidebar_twitter() {
 	$twitter = esc_attr( get_option( 'twitter_handler' ) );
 	echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter handler" /><p class="description">Input your Twitter username without the @ character.</p>';
 }
 function pearl_sidebar_facebook() {
 	$facebook = esc_attr( get_option( 'facebook_handler' ) );
 	echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook handler" />';
 }
 function pearl_sidebar_gplus() {
 	$gplus = esc_attr( get_option( 'gplus_handler' ) );
 	echo '<input type="text" name="gplus_handler" value="'.$gplus.'" placeholder="Google+ handler" />';
 }
 
 //Sanitization settings
 function pearl_sanitize_twitter_handler( $input ){
 	$output = sanitize_text_field( $input );
 	$output = str_replace('@', '', $output);
 	return $output;
 }
 
 function pearl_sanitize_custom_css( $input ){
 	$output = esc_textarea( $input );
 	return $output;
 }
 
 //Template submenu functions
 function pearl_theme_create_page() {
 	require_once( get_template_directory() . '/inc/templates/pearl-admin.php' );
 }
 
 function pearl_theme_support_page() {
 	require_once( get_template_directory() . '/inc/templates/pearl-theme-support.php' );
 }
 
 function pearl_contact_form_page() {
 	require_once( get_template_directory() . '/inc/templates/pearl-contact-form.php' );
 }
 
 function pearl_theme_settings_page() {
 	require_once( get_template_directory() . '/inc/templates/pearl-custom-css.php' );
 }
 