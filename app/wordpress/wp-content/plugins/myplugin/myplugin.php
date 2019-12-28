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

}
// validate plugin settings
function myplugin_validate_options($input) {
	// todo: add validation functionality..
	return $input;
	
}

add_action( 'admin_init', 'myplugin_register_settings' );
