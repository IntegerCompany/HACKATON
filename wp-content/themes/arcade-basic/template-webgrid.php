<?php
/**
 * Template Name: WebGrid
 */
get_header();
?>

<?php ?>
	<div class="container">
		<div class="row">
			<div id="primary">
				<h1 class="text-center"><?php the_title(); ?></h1>
				<?php do_shortcode('[webgrid]'); ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>