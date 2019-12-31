<?php
/*
Plugin Name:       My Plugin
Description:       A plugin for practice
Version:           0.0.1
Author:            Jing Liu
Author URI:        http://localhost.com/
License:           GPLv2 or later
Text Domain:       myplugin
Domain Path:      /languages
*/

// exit if file is called directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

// load text domain
function myplugin_load_textdomain() {
	load_plugin_textdomain( 'myplugin', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'myplugin_load_textdomain' );

require_once plugin_dir_path( __FILE__ ) . 'admin/admin-menu.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/settings-page.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/settings-register.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/settings-callbacks.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/settings-validate.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/core-functions.php';

add_action( 'admin_enqueue_scripts', 'my_plugin_enqueue_styles' );
function my_plugin_enqueue_styles() {
	wp_enqueue_style(
		'myplugin-admin-style',
		plugin_dir_url(dirname(__FILE__)) . 'myplugin/admin/css/settings-fields.css', 
		array(),
		false
	);

}

function myplugin_options_default() {
	return array(
		'custom_url'     => 'https://wordpress.org/',
		'custom_title'   => esc_html__('Powered by WordPress', 'myplugin'),
		'custom_style'   => 'disable',
		'custom_message' => '<p class="custom-message">'. esc_html__('My custom message', 'myplugin') .'</p>',
		'custom_footer'  => esc_html__('Special message for users', 'myplugin'),
		'custom_toolbar' => false,
		'custom_scheme'  => 'default',
	);
}


// remove options on uninstall
function myplugin_on_uninstall() {

	if ( ! current_user_can( 'activate_plugins' ) ) return;

	delete_option( 'myplugin_options' );

}
register_uninstall_hook( __FILE__, 'myplugin_on_uninstall' );