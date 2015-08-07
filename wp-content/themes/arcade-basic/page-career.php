<?php
/**
 * Template Name: Career
 *
 */
get_header();?>

<?php //echo do_shortcode('[mbYTPlayer url="https://www.youtube.com/watch?v=W3CDMDktEBc" opacity="1" quality="default" ratio="auto" isinline="false" autoplay="true" startat="20" showcontrols="false" printurl="true" mute="true" loop="true" addraster="false"]'); ?>


<div class="container page-carier">
	<div class="row">
		<h2 class="text-center"><?php the_title();?></h2>
		<div class="container">
			<div class="col-md-8 col-md-offset-2">
				<iframe width="100%" height="400" src="https://www.youtube.com/embed/W3CDMDktEBc?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>
	</div>
	<div class="row">
		<h2 class="text-center">Positions</h2>
		<div class="col-md-6 col-xs-12 text-center">
			<a href="#">
				<h2 class="position_title">Android</h2>
			</a>
			<p>description</p>
		</div>
		<div class="col-md-6 col-xs-12 text-center">
			<a href="#">
				<h2 class="position_title">Web</h2>
			</a>
			<p>description</p>
		</div>
	</div>
	<div class="row recruiters">
		<h2 class="text-center">Let's meet!</h2>
		<div class="col-md-4 text-center rec_grid">
			<p class="rec_img"><img class="img-responsive " src="<?php echo get_template_directory_uri(); ?>/img/Max_Vitruk.jpg" alt=""/></p>
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
			<p class="rec_img"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/Petro Tsymbalistiy.jpg" alt=""/></p>
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
			<p class="rec_img"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/Bogdan Maksymchuk.jpg" alt=""/></p>
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