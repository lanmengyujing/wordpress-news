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
require_once plugin_dir_path( __FILE__ ) . 'admin/settings-register.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/settings-callbacks.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/settings-validate.php';


function myplugin_options_default() {
	return array(
		'custom_url'     => 'https://wordpress.org/',
		'custom_title'   => 'Powered by WordPress',
		'custom_style'   => 'disable',
		'custom_message' => '<p class="custom-message">My custom message</p>',
		'custom_footer'  => 'Special message for users',
		'custom_toolbar' => false,
		'custom_scheme'  => 'default',
	);
}
