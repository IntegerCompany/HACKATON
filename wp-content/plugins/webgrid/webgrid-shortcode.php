<?php

function webgrid_out( $atts ) {

?>
<?php
	$table = get_option('grid_template');

    $newtable = '';

    $count = substr_count($table, 'td')/2;

    $postid = get_option('thumb-text');
    $pos = 0;
    $start = 0;
    for($i = 1; $i <= $count; $i++){
        $currentPost = get_post($postid[$i]);

        $dir = wp_upload_dir();
        $pos = stripos($table, '</td>', $pos + 5);

        $res = "<a href='".site_url().'/'.$currentPost->post_name."'><img src='" . $dir['baseurl'] . "/greed/" . get_option('thumb-' . $i) . "' " .
            "data-page='" . $currentPost->post_name . "' />" .
            "<div class='dark'>" .
            "<h3>" . $currentPost->post_title . "</h3>" .
            "</div></a>";

        $newtable .= substr($table, $start, $pos - $start) . $res;

        $start = $pos;

    }

    if(!empty($newtable)){
        $newtable .= '</td>' . substr($table, $start);
    }

	echo "<div id='grid-template' class='frontend'>".$newtable."</div>";
}

add_shortcode( 'webgrid', 'webgrid_out' );

?>