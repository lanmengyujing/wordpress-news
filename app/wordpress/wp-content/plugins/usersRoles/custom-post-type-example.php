<?php
/*
Plugin Name: Custom Post Type example
Description: Custom Post Type example
Author:      Jing Liu
Version:     1.0
*/

function myplugin_add_custom_post_type(){
    $args = array(
        'labels'=> array("name"=>"Movies"),
        'description'=> 'Post type for Movie reviews and information.',
        'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'movies' ),
        'capability_type'    => 'post',
        'show_in_rest'       => true,
        'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    );
    register_post_type( "movies", $args );
}
add_action("init", "myplugin_add_custom_post_type");


function myplugin_add_custom_taxomomy(){
    $labels = array('name'=>"Art");
    $args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
        'show_in_rest'      => true,
		'rewrite'           => array( 'slug' => 'art' ),
	);
    register_taxonomy( "art", array('movies'), $args );
}
add_action("init", "myplugin_add_custom_taxomomy");
