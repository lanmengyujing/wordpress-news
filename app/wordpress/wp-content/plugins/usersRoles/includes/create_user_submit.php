<?php
add_action( 'admin_init', 'create_user_add_user' );
function create_user_add_user() {
	// check if nonce is valid
	if ( isset( $_POST['myplugin-nonce'] ) && wp_verify_nonce( $_POST['myplugin-nonce'], 'myplugin-nonce' ) ) {

		// check if user is allowed
		if ( ! current_user_can( 'manage_options' ) ) wp_die();

		// get submitted username
		if ( isset( $_POST['username'] ) && ! empty( $_POST['username'] ) ) {

			$username = sanitize_user( $_POST['username'] );

		} else {

			$username = '';

		}

		// get submitted email
		if ( isset( $_POST['email'] ) && ! empty( $_POST['email'] ) ) {

			$email = sanitize_email( $_POST['email'] );

		} else {

			$email = '';

		}

		// get submitted password
		if ( isset( $_POST['password'] ) && ! empty( $_POST['password'] ) ) {

			$password = $_POST['password']; // sanitized by wp_create_user()

		} else {

			$password = wp_generate_password();

		}

		// set user_id variable
		$user_id = '';

		// check if user exists
		$username_exists = username_exists( $username );
		$email_exists = email_exists( $email );

		if ( $username_exists || $email_exists ) {

			$user_id = esc_html__( 'The user already exists.', 'myplugin' );

		}

		// check non-empty values
		if ( empty( $username ) || empty( $email ) ) {

			$user_id = esc_html__( 'Required: username and email.', 'myplugin' );

		}

		// create the user
		if ( empty( $user_id ) ) {

			$user_id = wp_create_user( $username, $password, $email );

			if ( is_wp_error( $user_id ) ) {

				$user_id = $user_id->get_error_message();

			} else {

				// email password
				$subject = __( 'Welcome to WordPress!', 'myplugin' );
				$message = __( 'You can log in using your chosen username and this password: ', 'myplugin' ) . $password;

				wp_mail( $email, $subject, $message );

			}

		}

		$location = admin_url( 'admin.php?page=myplugin&result='. urlencode( $user_id ) );

		wp_redirect( $location );

		exit;

	}

}
