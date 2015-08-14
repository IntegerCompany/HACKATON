<?php

	define('SHORTINIT', true);

	$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
	require_once( $parse_uri[0] . 'wp-load.php' );

	require( ABSPATH . WPINC . '/formatting.php' );
	require( ABSPATH . WPINC . '/meta.php' );
	require( ABSPATH . WPINC . '/post.php' );
	wp_plugin_directory_constants();

function base64_to_jpeg($base64_string, $output_file) {
    $ifp = fopen($output_file, "wb"); 

    $data = explode(',', $base64_string);

    fwrite($ifp, base64_decode($data[1])); 
    fclose($ifp); 

    return $output_file; 
}

  $decodedData = base64_decode($_POST['image']['data']);

$addr = md5(time()).'.jpg';

base64_to_jpeg($_POST['image']['data'],'../../uploads/greed/'.$addr);//../../uploads/greed/

	update_option($_POST['name'], $addr);
?>

<img src="<?php echo '../wp-content/uploads/greed/'.$addr; ?>">

