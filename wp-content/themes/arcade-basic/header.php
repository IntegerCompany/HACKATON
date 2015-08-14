<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main>
 * and the left sidebar conditional
 *
 * @since 1.0.0
 */
?><!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if IE]><script src="<?php echo BAVOTASAN_THEME_URL; ?>/library/js/html5.js"></script><![endif]-->
	<?php wp_head(); ?>
</head>
<?php
$bavotasan_theme_options = bavotasan_theme_options();
$space_class = '';

$is_home_page = array_search('home', get_body_class() );
?>

<body <?php body_class(); ?>>
	<a href="mailto:kryvun.roman@gmail.com<?php // echo types_render_field("contact-email"); ?>" id="write-us" target="_blank"><?php _e('write us','linkup'); ?></a>

	<div id="page" class="container-fluid mar-pad">
		<div class="row">
			<div>

		<header id="header">
			<nav id="site-navigation" class="navbar navbar-inverse navbar-fixed-top navbar-transparent" role="navigation">
				<div class="row">
					<h3 class="sr-only"><?php _e( 'Main menu', 'arcade' ); ?></h3>
					<a class="sr-only" href="#primary" title="<?php esc_attr_e( 'Skip to content', 'arcade' ); ?>"><?php _e( 'Skip to content', 'arcade' ); ?></a>

					<!--<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div> -->

					<div class="collapse navbar-collapse">

						<div class="logo-head container"><?php
								wp_reset_query();
								query_posts('page_id=41');
								if(have_posts()) { while(have_posts()) { the_post(); ?>
									<?php  the_post_thumbnail('medium');;?>
								<?php } wp_reset_query(); }
									$menu_class = ( is_rtl() ) ? ' navbar-right' : '';
									//wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '', 'menu_class' => 'nav navbar-nav font-helvetic-light head-menu' . $menu_class, 'fallback_cb' => 'bavotasan_default_menu' ) );
									wp_nav_menu(array('menu' => 'Menu 1', 'container'=>false, 'menu_class' => 'nav navbar-nav font-helvetic-light head-menu', 'theme_location'=>'primary', 'fallback_cb'=>false, 'walker' => '' ));
								?>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</nav><!-- #site-navigation -->

			 <div class="title-card-wrapper">
                <div class="title-card">
    				<div id="site-meta">
    					<h1 id="site-title">
							<?php if( is_int($is_home_page) ){
    							bloginfo( 'name' );
							} else { ?>
								<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
							<?php } ?>
    					</h1>

    					<?php if ( $bavotasan_theme_options['header_icon'] ) { ?>
    					<i class="fa <?php echo $bavotasan_theme_options['header_icon']; ?>"></i>
    					<?php } else {
    						$space_class = ' class="margin-top"';
    					} ?>

    					<h2 id="site-description"<?php echo $space_class; ?>>
    						<?php bloginfo( 'description' ); ?>
    					</h2>
						<?php
						/**
						 * You can overwrite the defeault 'See More' text by defining the 'BAVOTASAN_SEE_MORE'
						 * constant in your child theme's function.php file.
						 */
						if ( ! defined( 'BAVOTASAN_SEE_MORE' ) )
							define( 'BAVOTASAN_SEE_MORE', __( 'See More', 'arcade' ) );
						?>
    					<a href="#" id="more-site" class="btn btn-default btn-lg"><?php echo BAVOTASAN_SEE_MORE; ?></a>
    				</div>

    				<?php
						// Header image section

						if( is_int($is_home_page) ){
							$video_url = 'https://www.youtube.com/watch?v=63Rvjw-K9vM';
							echo do_shortcode('[mbYTPlayer url="'.$video_url.'" opacity="1" quality="default" ratio="auto" isinline="false" autoplay="true" startat="0" showcontrols="false" printurl="false" mute="true" loop="true" addraster="true"]');
						} else {
							bavotasan_header_images();
						}
    				?>
				</div>
			</div>

		</header>

		<main>