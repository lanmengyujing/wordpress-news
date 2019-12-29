<?php


// create the admin notice
add_action( 'admin_notices', 'user_admin_notices' );
function user_admin_notices() {
    $screen = get_current_screen();
    if ( $screen->id=== "toplevel_page_myplugin" ) {
        user_notices('User added successfully.', 'myplugin');
    } else if($screen->id === "toplevel_page_myUpdateplugin") {
        user_notices('User updated successfully.', 'myUpdateplugin');
    }
}

function user_notices($message, $plugin_name){
    if ( isset( $_GET['result'] ) ) {

        if ( is_numeric( $_GET['result'] ) ) : ?>

            <div class="notice notice-success is-dismissible">
                <p><strong><?php esc_html_e($message, $plugin_name); ?></strong></p>
            </div>

        <?php else : ?>

            <div class="notice notice-warning is-dismissible">
                <p><strong><?php echo esc_html( $_GET['result'] ); ?></strong></p>
            </div>

        <?php endif;

    }
}

