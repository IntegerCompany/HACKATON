<?php
	define('SHORTINIT', true);

	$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
	require_once( $parse_uri[0] . 'wp-load.php' );

	require( ABSPATH . WPINC . '/formatting.php' );
	require( ABSPATH . WPINC . '/meta.php' );
	require( ABSPATH . WPINC . '/post.php' );
	wp_plugin_directory_constants();

	$postid = get_option('thumb-text');
	$currentPost = get_post($postid[$_POST['count']]);
?>

<img
	src="http://localhost/HACKATON/wp-content/uploads/greed/<?php echo get_option('thumb-'.$_POST['count']); ?>"
	data-page="<?php echo $currentPost->post_name; ?>"
/>
<span class="dark">
	<h3><?php echo $currentPost->post_title; ?></h3>
</span>