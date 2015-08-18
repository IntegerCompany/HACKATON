<?php
/**
 * @package LinkUp
 * @version 1.0
 * @author B. Maksymchuk
 */
/*
Plugin Name: WebGrid
Version: 1.0
*/

if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

define( 'WEBGRID_VERSION', '1.0' );
define( 'WEBGRID_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'WEBGRID_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( WEBGRID_PLUGIN_DIR . 'init.php' );

if ( is_admin() ) {
	require_once( WEBGRID_PLUGIN_DIR . 'webgrid-admin.php' );
}

require_once( WEBGRID_PLUGIN_DIR . 'webgrid-shortcode.php' );

?>