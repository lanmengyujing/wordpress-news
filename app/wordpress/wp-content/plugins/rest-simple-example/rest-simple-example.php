<?php
/*
Plugin Name: REST API: Simple Example
Description: Simple example demonstrating how to use the REST API.
Plugin URI:  https://plugin-planet.com/
Author:      Jing Liu
Version:     1.0
*/

// register rest route
function rest_example_register_route() {

	/*
		register_rest_route(
			string $namespace,
			string $route,
			array  $args = array(),
			bool   $override = false
		)
	*/

	register_rest_route(
		'example/v1',
		'/test',
		array(
			'methods'  => 'GET',
			'callback' => 'rest_example_special_message'
		)
	);

}
add_action( 'rest_api_init', 'rest_example_register_route' );

// add top-level administrative menu
function rest_example_add_toplevel_menu() {

	add_menu_page(
		'REST API: Simple Example',
		'REST API: Simple Example',
		'manage_options',
		'rest-example',
		'rest_example_display_settings_page',
		'dashicons-admin-generic',
		null
	);

}
add_action( 'admin_menu', 'rest_example_add_toplevel_menu' );

function rest_example_display_settings_page(){
	if ( ! current_user_can( 'manage_options' ) ) return;
	?>
		<div class="wrap">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			<div>Rest example</div>
			<input id="rest-button" class="button button-primary" type="submit" value="Get Special Message">
			<div id="rest-response"></div>
		</div>

	<?php
}

add_action( 'admin_enqueue_scripts', 'rest_example_enqueue_scripts' );
function rest_example_enqueue_scripts(){
	$url = esc_url_raw( rest_url( 'example/v1/test' ) ) ;
    var_dump(plugins_url( '/rest-simple-example.js', __FILE__ ));
    var_dump($url);
	wp_enqueue_script( "rest_script",plugins_url( '/rest-simple-example.js', __FILE__ ), array(), null, true );
	wp_localize_script( "rest_script","rest_script",array(
		'url'     => $url,
		'callback' => "rest_example_special_message",
		'nonce'   => wp_create_nonce( 'wp_rest' ),
		'success' => __( 'Success! Post created.' ),
		'failure' => __( 'Failure! Post not created.' )
	));
}


// callback function
function rest_example_special_message() {
	return '<p>This is the special message!</p>';

}
