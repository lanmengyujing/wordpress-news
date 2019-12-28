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

// display the plugin settings page
function myplugin_display_settings_page() {
	
	// check if user is allowed access
	if ( ! current_user_can( 'manage_options' ) ) return;
	?>
	
	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<form action="options.php" method="post">
			<?php
			// output security fields
			settings_fields( 'myplugin_options' );
			
			// output setting sections
			do_settings_sections( 'myplugin' );
			
			// submit button
			submit_button();
			?>
		</form>
	</div>
	<?php
}

// add top-level administrative menu
function myplugin_add_toplevel_menu() {
	/* 
		add_menu_page(
			string   $page_title, 
			string   $menu_title, 
			string   $capability, 
			string   $menu_slug, 
			callable $function = '', 
			string   $icon_url = '', 
			int      $position = null 
		)
	*/
	
	add_menu_page(
		'MyPlugin Settings Page Title',
		'MyPlugin',
		'manage_options',
		'myplugin',
		'myplugin_display_settings_page',
		'dashicons-admin-generic',
		null
	);
	
}
add_action( 'admin_menu', 'myplugin_add_toplevel_menu' );

// add sub-level administrative menu
function myplugin_add_sublevel_menu() {
	
	/*
	
	add_submenu_page(
		string   $parent_slug,
		string   $page_title,
		string   $menu_title,
		string   $capability,
		string   $menu_slug,
		callable $function = ''
	);
	
	*/
	
	add_submenu_page(
		'options-general.php',
		'MyPlugin Settings',
		'MyPlugin',
		'manage_options',
		'myplugin',
		'myplugin_display_settings_page'
	);
	
}
add_action( 'admin_menu', 'myplugin_add_sublevel_menu' );

