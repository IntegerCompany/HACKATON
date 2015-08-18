<?php
/**
 * The Template for displaying all single posts.
 *
 * @since 1.0.0
 */

//dfhdfghd
//sdfg/
?>

<div id="single-blog-page" class="container">
	<div class="row">
		<div class="col-md-12">
			<article class="col-md-9">
				<figure>
					<h1><?php the_title(); ?></h1>
					<?php echo get_the_post_thumbnail ( get_the_ID(), array('350','350'), '') ?>
					<hr/>
					<figcaption><?php the_content(); ?></figcaption>
				</figure>
			</article>

			<div class="col-md-3 blog_grid">
				<div class="row">
					<?php $blogs = load_blogs( get_the_ID(), $article_per_page ); ?>
					<h2 class="col-md-12"><?php _e('Last articles', TEXTDOMAIN) ?></h2>
					<ul>
						<?php

						$date_format = 'jS \of F Y';

						foreach ($blogs as $blog)
						{

							$date =  $blog->post_date;
							$date_published = new DateTime($date);
							?>
							<li class="col-md-12 col-sm-4 col-xs-6 blog-element">
								<a href="<?php echo get_permalink($blog->ID); ?>">
									<div class="img_block">
										<?php echo get_the_post_thumbnail ( $blog->ID, 'medium', '') ?>
									</div>
									<div class="title_block clearfix">
										<h3><?php echo $blog->post_title; ?></h3>
										<div class="publ_date"><i class="fa fa-calendar"></i>  <?php echo $date_published->format( $date_format ); ?></div>
										<div class="publ_author"><?php echo __('by', TEXTDOMAIN).' '.get_the_author_meta('user_nicename', (int)$blog->post_author);//.$author_post_nam.' '.$author_post_lName; ?></div>
									</div>
								</a>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>