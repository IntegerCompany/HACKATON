
	(function($){
		var $colapse = $(".collapse"),
			$colapseMenu = $('.collapse > .logo-head > ul'),
			leftPos,
			DELAY = 500;

		function openMenu(leftPos){
			$colapse.toggleClass('open');
			leftPos = $colapse.hasClass('open') ? 0 : '-100%';
			$colapseMenu.animate({'left': leftPos}, DELAY);
		}

		function swipeOpenMenu(leftPos){
			leftPos == 0 ? $colapse.addClass('open') : $colapse.removeClass('open');
			$colapseMenu.animate({'left': leftPos}, DELAY);
		}

		$("#button-mobile").on("click", openMenu );
		$(document).on( "swipeleft", function(){ swipeOpenMenu('-100%'); });
		$(document).on( "swiperight", function(){ swipeOpenMenu(0); });

		function swipeHandler( leftPos ){
			$colapse.toggleClass('open');
			$colapseMenu.animate({'left': leftPos}, DELAY);
		}

		$(".navbar-toggle").on("click", function(){
			$colapse.is(":hidden") ? $colapse.slideDown("slow") : $colapse.slideUp("slow");
		});

		$(".logo-head a").click(function(event){
			$(".logo-head > ul").css("left", "-100%");
		});

		// jQuery to collapse the navbar on scroll

		$(document).ready(function(){
			var topNavClass = "top-nav-collapse",
				$navFixed = $(".navbar-fixed-top");

			function setNavBackgound(){
				$(".navbar").offset().top > 50 ? $navFixed.addClass(topNavClass) : $navFixed.removeClass(topNavClass);
			}

			$(window).scrollTop() > 50 ? $navFixed.addClass(topNavClass) : console.log('f');

			$(window).scroll(function(){ setNavBackgound(); });
		});

	})(window.jQuery);

//	jQuery(function($){});