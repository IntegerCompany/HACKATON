<?php
/**
 * Template Name: Home content
 *
 */


$pageID = 16;
$homeContent = get_post($pageID, 'ARRAY_A');

?>

<div id="home-description" class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <?php echo get_the_post_thumbnail( $pageID, 'large'); ?>
                <h1><?php echo $homeContent['post_title']; ?></h1>
                <h2><?php echo $homeContent['post_content']; ?></h2>
            </div>
        </div>
    </div>
</div>


<!-- Map Section -->

<div id="contact-info" class="container-fluid">
    <div id="pre-contact-block"></div>

    <h1 id="contact-title" class="container page-top-title"><?php _e('Contact Us', TEXTDOMAIN); ?></h1>
    <div id="contact-box">
        <ul id="contact-content">
            <li><i class="fa fa-map-marker" title="Location"></i>V.Velykoho 2 Street, Lvivl, Ukraine</li>
            <li><i class="fa fa-envelope" title="Email"></i>Integer.ukraine@gmail.com</li>
            <li><i class="fa fa-skype" title="Skype"></i>IntegerDevCompany</li>
            <li><i class="fa fa-phone-square" title="Phone"></i>+38099 229 93 33</li>
            <li>
                <a id="show-on-map"  target="_blank" href="https://maps.google.com/maps?t=m&amp;ll=49.8082222, 24.0171129&amp;q=49.8082222, 24.0171129&amp;output=classic&amp;z=16">
                    <i class="fa fa-globe"></i>Show on map
                </a>
            </li>
        </ul>
    </div>
    <div id="map" style="height: 500px;background-color: #333333"></div>
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
        'markerImg': '<?php echo get_template_directory_uri(); ?>/library/images/ufo_integer.png',
    };
</script>