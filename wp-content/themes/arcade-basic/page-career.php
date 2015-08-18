<?php
/**
 * Template Name: Career
 *
 */
get_header();?>

<div class="container page-carier">
	<div class="container-fluid video-text">
		<div class="row">
			<h2 class="text-center"><?php the_title();?></h2>
			<div class="container">
				<div class="col-md-8 "> <!--col-md-offset-2-->
					<iframe class="video-career" width="100%" height="400" src="https://www.youtube.com/embed/W3CDMDktEBc?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
				</div>
				<div class="col-md-4">
					<p>Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні.
						Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній
						підбірку зразків шрифтів. "Риба" не тільки успішно пережила п'ять століть, але й прижилася в електронному верстуванні,
						залишаючись по суті незмінною. Вона популяризувалась в 60-ихроках минулого сторіччя завдяки виданню зразків шрифтів Letraset,
						які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп'ютерного верстування на кшталт Aldus Pagemaker,
						які використовували різні версії Lorem Ipsum.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row media-row">
		<h2 class="text-center">Positions</h2>
		<?php $posts = get_posts("cat=3&orderby=date&numberposts=12"); ?>
		<?php if ($posts) : ?>
			<?php foreach ($posts as $post) : setup_postdata ($post); ?>
				<div class="col-md-4  text-center pos-div"><a class="career-pos-color" href="javascript:void(0);">
					<?php
					if(function_exists('add_theme_support')) {
						?>
						<h3 class="position_title" > <?php echo the_title(); ?></h3 >
						<div class="job-icon"><i class="fa fa-<?php echo  types_render_field( "job-icon" ); ?>" ></i ></div>

						<?php
						//the_post_thumbnail('medium');
						}
					?></a>
				</div>

			<?php endforeach; ?>
		<?php endif; ?>
	</div>
	<div class="row recruiters">
		<h2 class="text-center">Let's meet!</h2>
		<div class="col-md-4 text-center rec_grid">
			<p class="rec_img"><img class="img-responsive " src="<?php echo get_template_directory_uri(); ?>/img/Max_Vitruk.png" alt=""/></p>
			<p>Max Vitruk</p>
			<span>Android developer</span>
			<p>
				<a href="https://www.facebook.com/profile.php?id=100006944169188&fref=ts">
					<i class="rec fa fa-facebook"></i>
				</a>
				<a href="https://www.linkedin.com/profile/view?id=380102971">
					<i class="rec fa fa-linkedin"></i>
				</a>
				<a href="maxvitruk">
					<i class="rec fa fa-skype"></i>
				</a>
			</p>
		</div>
		<div class="col-md-4 text-center rec_grid">
			<p class="rec_img"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/Petro Tsymbalistiy.png" alt=""/></p>
			<p>Petro Tsymbalistiy</p>
			<span>Project Manager</span>
			<p>
				<a href="https://www.facebook.com/petrotsymb">
					<i class="rec fa fa-facebook"></i>
				</a>
				<a href="https://www.linkedin.com/profile/view?id=300540683">
					<i class="rec fa fa-linkedin"></i>
				</a>
				<a href="petyagrek">
					<i class="rec fa fa-skype"></i>
				</a>
			</p>
		</div>
		<div class="col-md-4 text-center rec_grid">
			<p class="rec_img"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/Bogdan Maksymchuk.png" alt=""/></p>
			<p>Bogdan Maksymchuk</p>
			<span>Team lead</span>
			<p>
				<a href="https://www.facebook.com/bogdan.maksimchuk.1">
					<i class="rec fa fa-facebook"></i>
				</a>
				<a href=": https://www.linkedin.com/profile/view?id=299868402">
					<i class="rec fa fa-linkedin"></i>
				</a>
				<a href="hereiswink">
					<i class="rec fa fa-skype"></i>
				</a>
			</p>
		</div>
	</div>
</div>

<?php
get_footer();?>