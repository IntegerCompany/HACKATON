<?php
/**
 * The template for displaying the footer.

 * Contains footer content and the closing of the main and #page div elements.
 */
$bavotasan_theme_options = bavotasan_theme_options();
?>
	</main><!-- main -->

	<footer id="footer" role="contentinfo">
		<a href="mailto:kryvun.roman@gmail.com" id="write-us-mob" target="_blank" style="position: relative;">write us</a>
		<div id="footer-content" class="container">
			<div class="row">
				<div class="copyright col-lg-12">
					<span class="pull-left"><?php printf( __( 'Copyright &copy; %s %s. All Rights Reserved.', 'arcade' ), date( 'Y' ), ' <a href="' . home_url() . '">' . get_bloginfo( 'name' ) .'</a>' ); ?></br></br>
						<a href="http://lviv.travel/">Lviv</a>, Ukraine.
					</span>
					<span class= "pull-center" id="lang-switch"><?php echo qtranxf_generateLanguageSelectCode('text'); ?></span>
					<span class= "pull-right">
						<a class="social" href="javascript:void(0);" target="_blank">
						     <div class="front">
								<i class="fa fa-facebook"></i>
						     </div>
						     <div class="back">
								<i class="fa fa-facebook"></i>
						     </div>
						</a>

						<a class="social social-linkedin" href="javascript:void(0);" target="_blank">
						     <div class="front">
								<i class="fa fa-linkedin"></i>
						     </div>
						     <div class="back">
								<i class="fa fa-linkedin"></i>
						     </div>
						</a>

						<a class="social social-skype" href="javascript:void(0);" target="_blank">
						     <div class="front">
								<i class="fa fa-skype"></i>
						     </div>
						     <div class="back">
								<i class="fa fa-skype"></i>
						     </div>
						</a>
					</span>

				</div><!-- .col-lg-12 -->
			</div><!-- .row -->
		</div><!-- #footer-content.container -->
	</footer><!-- #footer -->
</div><!-- #page -->
</div>
</div>



<?php wp_footer(); ?>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
	(function($){
		var $colapse = $(".collapse"),
			$colapseMenu = $('.collapse > .logo-head > ul'),
			leftPos,
			DELAY = 500;

		$( document ).on( "swipe", openMenu );
		$("button").on("click",openMenu );

		function openMenu(){
			$colapse.toggleClass('open');
			leftPos = $colapse.hasClass('open') ? '0%' : '-100%';
			$colapseMenu.animate({'left': leftPos}, DELAY);
		}


		$(".navbar-toggle").on("click",openMiddleMenu);
		function openMiddleMenu(){

//			var displayPos;
					//$colapse.toggleClass('open-middle-menu');
//					displayPos = $colapse.hasClass('open-middle-menu')? 'block':'none';

			//$colapse.slideToggle("600");

			if ($('$colapse').is(":hidden")) {
				$('$colapse').slideDown("slow");
			} else {
				$('$colapse').slideUp("slow");
			}



			//console.log('displayPos = ' + displayPos);


//			if($colapseMenu.css("display", "none")){
//				$colapseMenu.css("display", "block");
//			}else{
//				$colapseMenu.css("display", "block");
//			}
		}
		$(".logo-head a").click(function(event){
			$("#menu-menu-1").css("left", "-100%");
		});

	})(window.jQuery);

	jQuery(function($){});
</script>
</body>
</html>