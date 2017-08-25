<?php
 
 /*
 	
 @package pearltheme
 	
 	========================
 		ADMIN ENQUEUE FUNCTIONS
 	========================
 */
 
 function pearl_load_admin_scripts( $hook ){
 	//echo $hook;
 	
 	//register css admin section
 	wp_register_style( 'raleway-admin', 'https://fonts.googleapis.com/css?family=Raleway:200,300,500' );
 	wp_register_style( 'pearl_admin', get_template_directory_uri() . '/css/pearl.admin.css', array(), '1.0.0', 'all' );
 	
 	//register js admin section
 	wp_register_script( 'pearl-admin-script', get_template_directory_uri() . '/js/pearl.admin.js', array('jquery'), '1.0.0', true );
 	
 	$pages_array = array(
 		'toplevel_page_nisha_pearl',
 		'pearl_page_nisha_pearl_theme',
 		'pearl_page_nisha_pearl_theme_contact',
 		'pearl_page_nisha_pearl_css'
 	);
 	
 	//PHP 7
 	
 	if( in_array( $hook, $pages_array ) ){
 		
 		wp_enqueue_style( 'raleway-admin' );
		wp_enqueue_style( 'pearl_admin' );
 	
 	} 
 	
 	if( 'toplevel_page_nisha_pearl' == $hook ){
 		
 		wp_enqueue_media();
 		
 		wp_enqueue_script( 'pearl-admin-script' );
 		
 	}
 	
 	if ( 'pearl_page_nisha_pearl_css' == $hook ){
 		
 		wp_enqueue_style( 'ace', get_template_directory_uri() . '/css/pearl.ace.css', array(), '1.0.0', 'all' );
 		
 		wp_enqueue_script( 'ace', get_template_directory_uri() . '/js/ace/ace.js', array('jquery'), '1.2.1', true );
 		wp_enqueue_script( 'pearl-custom-css-script', get_template_directory_uri() . '/js/pearl.custom_css.js', array('jquery'), '1.0.0', true );
 	
 	}
 	
 }
 add_action( 'admin_enqueue_scripts', 'pearl_load_admin_scripts' );
 
 /*
 	
 	========================
 		FRONT-END ENQUEUE FUNCTIONS
 	========================
 */
 
 function pearl_load_scripts(){
 	
 	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6', 'all' );
 	wp_enqueue_style( 'pearl', get_template_directory_uri() . '/css/pearl.css', array(), '1.0.0', 'all' );
 	wp_enqueue_style( 'raleway', 'https://fonts.googleapis.com/css?family=Raleway:200,300,500' );
 	
 	wp_deregister_script( 'jquery' );
 	wp_register_script( 'jquery' , get_template_directory_uri() . '/js/jquery.js', false, '3.2.1', true );
 	wp_enqueue_script( 'jquery' );
 	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true );
 	wp_enqueue_script( 'pearl', get_template_directory_uri() . '/js/pearl.js', array('jquery'), '1.0.0', true );
 	
 }
 add_action( 'wp_enqueue_scripts', 'pearl_load_scripts' );
 