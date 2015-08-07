<?php
/**
 * Template Name: Home content
 *
 */

$pageID = 16;
$homeContent = get_post($pageID, 'ARRAY_A');

?>

<style>
    #home-description {
        margin: 30px auto 50px;
    }
    #home-description h1 {
        font-weight: bold;
    }
</style>

<div id="home-description" class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
                <?php echo get_the_post_thumbnail( $pageID, 'large'); ?>
            </div>
            <div class="col-md-6">
                <h1><?php echo $homeContent['post_title']; ?></h1>
                <h2><?php echo $homeContent['post_content']; ?></h2>
            </div>
        </div>
    </div>
</div>


<!-- Map Section -->
<div id="map"></div>


<!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

<!-- Custom Theme JavaScript -->
<script src="js/grayscale.js"></script>