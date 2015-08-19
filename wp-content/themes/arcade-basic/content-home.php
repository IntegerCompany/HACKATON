<?php
/**
 * Template Name: Home content
 *
 */


$pageID = 16;
$homeContent = get_post($pageID, 'ARRAY_A');

?>

<style>
    .basic h1, .basic h2, .basic h3, .basic h4, .basic h5, .basic h6,
    body.basic {
        color: #EEEEEE;
    }
    main {
        background-color: #0f0f0f;
    }
    #home-description {
        padding: 80px 0 0;
    }
    #home-description h1 {
        font-weight: bold;
    }
    .home #header .title-card-wrapper{
        background-color: rgba(0, 0, 0, 0.3);
        box-shadow: inset 0px -50px 150px 0px rgb(8, 8, 8);
    }
    #cotact-info{
        padding-top: 50px;
    }
</style>

<div id="home-description" class="container">
    <div class="col-md-12">
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
</div>


<!-- Map Section -->

<div id="cotact-info" class="container-fluid">
    <div id="map" style="height: 500px;"></div>
</div>

<!-- Plugin JavaScript -->
<script src="<?php echo get_template_directory_uri(); ?>/library/js/jquery.easing.min.js"></script>

<!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo get_template_directory_uri(); ?>/library/js/grayscale.js"></script>

<script>
    var mapOptionsPhp = {
        'latitude': '49.80947953',
        'longitude': '24.01807922',
        'markerImg': '<?php echo get_template_directory_uri(); ?>/library/images/map-marker.png',
    };
</script>