<?php
/*
Plugin Name: Options API example
Description: Options API example
Author:      Jing Liu
Version:     1.0
*/

function option_plugin_add_new_option(){
    add_option("option_plugin_options","test");   
}
// add_action("admin_init", "option_plugin_add_new_option");


function option_plugin_update_option(){
    $options = array(
        option1=>"test",
        "option2" => "name"
    );
    update_option("option_plugin_options", $options);   
}

// add_action("admin_init", "option_plugin_update_option");


function option_plugin_remove_option(){
    delete_option("option_plugin_options");   
}

// add_action("admin_init", "option_plugin_remove_option");