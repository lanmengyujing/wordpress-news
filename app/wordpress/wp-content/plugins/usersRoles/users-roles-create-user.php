<?php
/*
Plugin Name: Users and Roles: Create User
Description: Example demonstrating how to manage users and roles.
Plugin URI:  https://plugin-planet.com/
Author:      Jing Liu
Version:     1.0
*/


require_once plugin_dir_path( __FILE__ ) . 'includes/create_user_submit.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/user_notice.php';

// add top-level administrative menu
function create_user_add_toplevel_menu() {

	add_menu_page(
		esc_html__('Users and Roles: Create User', 'myplugin'),
		esc_html__('Create User', 'myplugin'),
		'manage_options',
		'myplugin',
		'create_user_display_settings_page',
		'dashicons-admin-generic',
		null
	);

}
add_action( 'admin_menu', 'create_user_add_toplevel_menu' );



// display the plugin settings page
function create_user_display_settings_page() {

	// check if user is allowed access
	if ( ! current_user_can( 'manage_options' ) ) return;

	?>

	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<form method="post">
			<h3><?php esc_html_e( 'Add New User', 'myplugin' ); ?></h3>
			<p>
				<label for="username"><?php esc_html_e( 'Username', 'myplugin' ); ?></label><br />
				<input class="regular-text" type="text" size="40" name="username" id="username">
			</p>
			<p>
				<label for="email"><?php esc_html_e( 'Email', 'myplugin' ); ?></label><br />
				<input class="regular-text" type="text" size="40" name="email" id="email">
			</p>
			<p>
				<label for="password"><?php esc_html_e( 'Password', 'myplugin' ); ?></label><br />
				<input class="regular-text" type="text" size="40" name="password" id="password">
			</p>

			<p><?php esc_html_e( 'The user will receive this information via email.', 'myplugin' ); ?></p>

			<input type="hidden" name="myplugin-nonce" value="<?php echo wp_create_nonce( 'myplugin-nonce' ); ?>">
			<input type="submit" class="button button-primary" value="<?php esc_html_e( 'Add User', 'myplugin' ); ?>">
		</form>
	</div>

<?php

}