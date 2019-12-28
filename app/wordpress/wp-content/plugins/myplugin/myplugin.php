<?php
/*
Plugin Name:       My Plugin
Description:       A plugin for practice
Version:           0.0.1
Author:            Jing Liu
Author URI:        http://localhost.com/
License:           GPLv2 or later
*/

// exit if file is called directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

require_once plugin_dir_path( __FILE__ ) . 'admin/admin-menu.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/settings-page.php';

// register plugin settings
function myplugin_register_settings() {
	/*
	register_setting( 
		string   $option_group, 
		string   $option_name,  //get option from database
		callable $sanitize_callback
	);
	*/
	register_setting( 
		'myplugin_options', 
		'myplugin_options', 
		'myplugin_callback_validate_options' 
	); 

	  /*
	add_settings_section( 
		string   $id, 
		string   $title, 
		callable $callback, 
		string   $page
	);
	*/
	add_settings_section( 
		'myplugin_section_login', 
		'Customize Login Page', 
		'myplugin_callback_section_login', 
		'myplugin'
	);

	add_settings_section( 
		'myplugin_section_admin', 
		'Customize Admin Area', 
		'myplugin_callback_section_admin', 
		'myplugin'
	);
}
// validate plugin settings
function myplugin_validate_options($input) {
	// todo: add validation functionality..
	return $input;
	
}

// callback: login section
function myplugin_callback_section_login() {
	echo '<p>These settings enable you to customize the WP Login screen.</p>';
	
}

// callback: admin section
function myplugin_callback_section_admin() {
	echo '<p>These settings enable you to customize the WP Admin Area.</p>';
	
}

add_action( 'admin_init', 'myplugin_register_settings' );
