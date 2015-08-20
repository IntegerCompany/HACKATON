<?php
/**
 * Template Name: Contact Page
 *
 */
?>

<!-- Map Section -->

<div id="cotact-info" class="container-fluid">
    <h1 id="contact-title" class="container"><?php _e('Contact Us', TEXTDOMAIN); ?></h1>
    <div id="contact-box">
        <ul id="contact-content">
            <li><i class="fa fa-map-marker" title="Location"></i>V.Velykoho 2 Street, Ukraine</li>
            <li><i class="fa fa-envelope" title="Email"></i>Integer.ukraine@gmail.com</li>
            <li><i class="fa fa-skype" title="Skype"></i>IntegerDevCompany</li>
            <li><i class="fa fa-phone-square" title="Phone"></i>+38099 229 93 33</li>
        </ul>
    </div>
    <div id="map" style="height: 500px;background-color: #333333"></div>
</div>

<!-- Plugin JavaScript -->
<script src="<?php echo get_template_directory_uri(); ?>/library/js/jquery.easing.min.js"></script>

<!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo get_template_directory_uri(); ?>/library/js/grayscale.min.js"></script>

<script>
    var mapOptionsPhp = {
        'latitude': '49.80947953',
        'longitude': '24.01807922',
        'markerImg': '<?php echo get_template_directory_uri(); ?>/library/images/ufo_integer.png',
    };
</script>