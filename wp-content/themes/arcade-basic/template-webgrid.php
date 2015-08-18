<?php
/**
 * Template Name: WebGrid
 */
get_header();
wp_head();
?>

<?php ?>
	<div class="container">
		<div class="row">
			<h1 class="text-center"><?php the_title(); ?></h1>
			<?php do_shortcode('[webgrid]'); ?>
		</div>
	</div>

<?php get_footer(); ?>