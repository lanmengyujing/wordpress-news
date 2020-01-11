<?php
/*********************
 * in article traffic driver
*********************/

add_shortcode('in_article_traffic_driver', 'traffic_driver_shortcode_get_posts');

function traffic_driver_shortcode_get_posts( $atts ) {
	
	// get global post variable
	global $post;
	
	// define shortcode variables
	extract( shortcode_atts( array( 
		
		'posts_per_page' => 5,
		'orderby' => 'date',
		
	), $atts ) );
	
	$custom_html = '<div class="custom_short_code_example" data-posts_per_page="'. $posts_per_page .'">My Test</div>';
	// complete output variable
	// return output
	return $custom_html;
	
}

// if (is_plugin_active('shortcode-ui/shortcode-ui.php')) {
    add_action('register_shortcode_ui', 'shortcode_in_article_traffic_driver');

    function shortcode_in_article_traffic_driver()
    {
        $fields = array(
          array(
            'label'   => 'number of posts to show',
            'attr'    => 'posts_per_page',
            'type'    => 'select',
            'options' => array(
              '4' => 'short',
              '8' => 'long'
            )
          )
        );

        $shortcode_ui_args = array(
          'label'         => 'Traffic Driver',
          'listItemImage' => 'dashicons-admin-appearance',
          'post_type'     => array( 'post' ),
          'attrs'         => $fields
        );

        shortcode_ui_register_for_shortcode('in_article_traffic_driver', $shortcode_ui_args);
    }
// }


