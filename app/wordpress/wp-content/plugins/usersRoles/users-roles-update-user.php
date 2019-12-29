<?php
/*
Plugin Name: Users and Roles: Update User
Description: Example demonstrating how to manage users and roles.
Plugin URI:  https://plugin-planet.com/
Author:      Jeff Starr
Version:     1.0
*/

define('MYPLUGIN_NONCE', 'myplugin-nonce');

require_once plugin_dir_path( __FILE__ ) . 'includes/update_user_submit.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/user_notice.php';

// add top-level administrative menu
function update_user_add_toplevel_menu() {

	add_menu_page(
		esc_html__('Users and Roles: Update User', 'myUpdateplugin'),
		esc_html__('Update User', 'myUpdateplugin'),
		'manage_options',
		'myUpdateplugin',
		'update_user_display_settings_page',
		'dashicons-admin-generic',
		null
	);

}
add_action( 'admin_menu', 'update_user_add_toplevel_menu' );



// display the plugin settings page
function update_user_display_settings_page() {

	// check if user is allowed access
	if ( ! current_user_can( 'manage_options' ) ) return;

	?>

	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<form method="post">
			<h3><?php esc_html_e( 'Update User', 'myUpdateplugin' ); ?></h3>
			<p>
				<label for="email">
					<?php esc_html_e( 'Enter the user&rsquo;s email (required)', 'myUpdateplugin' ); ?>
				</label><br />
				<input class="regular-text" type="text" size="40" name="email" id="email">
			</p>
			<p>
				<label for="display-name">
					<?php esc_html_e( 'Enter a new Display Name for this user:', 'myUpdateplugin' ); ?>
				</label><br />
				<input class="regular-text" type="text" size="40" name="display-name" id="display-name">
			</p>
			<p>
				<label for="user-url">
					<?php esc_html_e( 'Enter a new Website URL for this user:', 'myUpdateplugin' ); ?>
				</label><br />
				<input class="regular-text" type="text" size="40" name="user-url" id="user-url">
			</p>

			<input type="hidden" name="MYPLUGIN_NONCE" value="<?php echo wp_create_nonce( 'MYPLUGIN_NONCE' ); ?>">
			<input type="submit" class="button button-primary" value="<?php esc_html_e( 'Update User', 'myUpdateplugin' ); ?>">
		</form>
	</div>

<?php

}


