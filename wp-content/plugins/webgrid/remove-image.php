<?php


	define('SHORTINIT', true);

	$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
	require_once( $parse_uri[0] . 'wp-load.php' );

	require( ABSPATH . WPINC . '/formatting.php' );
	require( ABSPATH . WPINC . '/meta.php' );
	require( ABSPATH . WPINC . '/post.php' );
	wp_plugin_directory_constants();

	$addr = get_option($_POST['name']);
	delete_option($_POST['name']);

	unlink('../../uploads/greed/'.$addr);
?>

