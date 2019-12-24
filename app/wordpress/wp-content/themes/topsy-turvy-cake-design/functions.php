<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
      get_stylesheet_directory_uri() . '/style.css',
      array('parent-style'),
      wp_get_theme()->get('Version')
    );
}

function twentynineteen_posted_by() {
  printf('');
}

function add_secondary_menu(){
  register_nav_menus(
    array(
      'menu-2' => __( 'Secondary', 'twentynineteen' ),
    )
  );
}

function hide_widgets(){
  //   remove_action( 'widgets_init', 'twentynineteen_widgets_init' );
}

function modify_parent_functionalities(){
  add_secondary_menu();
  hide_widgets();
}
add_action( 'after_setup_theme', "modify_parent_functionalities");