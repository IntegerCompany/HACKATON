<?php

// Register stylesheets & scripts.
add_action( 'init', 'register_plugin_styles1' );
function register_plugin_styles1() {
    wp_register_style( 'mainstyle', plugins_url( 'css/main.css', __FILE__ ), false, '1.0.0' );
    wp_enqueue_style( 'mainstyle' );
/*	wp_register_style( 'btstyle', '//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css', false, '1.0.0' );
    wp_enqueue_style( 'btstyle' );
*/
	// wp_enqueue_script( 'jquery_', plugins_url( 'js/jquery-latest.min.js', __FILE__ ), array() );
//  wp_enqueue_script( 'mainscript', plugins_url( 'js/main.js', __FILE__ ), array() );
//  wp_enqueue_script( 'bt', '//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js', array() );
}

?>