<?php


// create the admin notice
add_action( 'admin_notices', 'create_user_admin_notices' );

function create_user_admin_notices() {

	$screen = get_current_screen();

	if ( 'toplevel_page_myplugin' === $screen->id ) {

		if ( isset( $_GET['result'] ) ) {

			if ( is_numeric( $_GET['result'] ) ) : ?>

				<div class="notice notice-success is-dismissible">
					<p><strong><?php esc_html_e('User added successfully.', 'myplugin'); ?></strong></p>
				</div>

			<?php else : ?>

				<div class="notice notice-warning is-dismissible">
					<p><strong><?php echo esc_html( $_GET['result'] ); ?></strong></p>
				</div>

			<?php endif;

		}

	}

}


