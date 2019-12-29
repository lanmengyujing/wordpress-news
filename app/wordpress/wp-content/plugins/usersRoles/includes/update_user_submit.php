<?php
// update user
add_action( 'admin_init', 'update_user_update_user' );

function update_user_update_user() {

	// check if nonce is valid
	if ( isset( $_POST['MYPLUGIN_NONCE'] ) && wp_verify_nonce( $_POST['MYPLUGIN_NONCE'], 'MYPLUGIN_NONCE' ) ) {

		// check if user is allowed
		if ( ! current_user_can( 'manage_options' ) ) wp_die();

		// get user email
		if ( isset( $_POST['email'] ) && ! empty( $_POST['email'] ) ) {

			$email = sanitize_email( $_POST['email'] );

		} else {

			$email = '';

		}

		// get new display name
		if ( isset( $_POST['display-name'] ) && ! empty( $_POST['display-name'] ) ) {

			$display_name = sanitize_user( $_POST['display-name'] );

		} else {

			$display_name = '';

		}

		// get new website url
		if ( isset( $_POST['user-url'] ) && ! empty( $_POST['user-url'] ) ) {

			$user_url = esc_url( $_POST['user-url'] );

		} else {

			$user_url = '';

		}

		// get the user id
		$user_id = email_exists( $email );

		// user id exists
		if ( is_numeric( $user_id ) ) {

			// define the parameters
			$userdata = array( 'ID' => $user_id, 'display_name' => $display_name, 'user_url' => $user_url );

			// update the user
			$user_id = wp_update_user( $userdata );

			// check for errors
			if ( is_wp_error( $user_id ) ) {

				// get the error message
				$user_id = $user_id->get_error_message();

			}

		} else {

			// user not found
			$user_id = __( 'User not found.', 'myUpdateplugin' );

		}

		// set the redirect url
		$location = admin_url( 'admin.php?page=myUpdateplugin&result='. urlencode( $user_id ) );

		// redirect
		wp_redirect( $location );

		exit;

	}

}



