<?php
/**
 * The default template for displaying content
 *
 * Used for both single and front-page/index/archive/search.
 *
 * @since 1.0.0
 */
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
		<?php
		// Display a thumbnail if one exists and not on single post
		bavotasan_display_post_thumbnail();

		get_template_part( 'content', 'header' ); ?>

	    <div class="entry-content description clearfix">
			<h1 class="entry-title taggedlink">
				<?php if ( is_single() ) : ?>
					<?php the_title(); ?>
				<?php else : ?>
					<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
				<?php endif; // is_single() ?>
			</h1>
			<?php
			if ( is_singular() && ! is_front_page() ) {
				the_content(__('Read more', 'arcade'));
				the_post_thumbnail('medium');
			}
			else
				the_excerpt();
			?>
	    </div><!-- .entry-content -->
	    <?php if ( is_singular() && ! is_front_page() )
	    	get_template_part( 'content', 'footer' ); ?>
	</article><!-- #post-<?php the_ID(); ?> -->