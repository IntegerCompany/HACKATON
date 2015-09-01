
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

		$(".logo-head a").click(function(){
			$('.navbar-toggle').is(':hidden') ? $(".logo-head > ul").css("left", "-100%") : $colapse.hide();
			$colapse.removeClass('open in');
		});


		var topNavClass = "top-nav-collapse",
			$navFixed = $(".navbar-fixed-top"),
			siteNavClass = "black top-nav-collapse",
			$siteNav = $('#site-navigation');

		function setNavBackgound(){
			$(window).scrollTop() > 50 ? $navFixed.addClass(topNavClass) : $navFixed.removeClass(topNavClass);
			$(window).scrollTop() > 50 ? $siteNav.addClass(siteNavClass) : $siteNav.removeClass(siteNavClass);
		}

		setNavBackgound();

		$(document).ready(function(){

			$('html').niceScroll();
			$('#writeUsModal textarea').prop('rows', 5);

			var loaderImg = 'http://localhost/HACKATON/wp-content/themes/arcade-basic/img/loader-mail.gif';

			$('#writeUsModal .modal-footer img').prop('src', loaderImg);

			setNavBackgound();
			$(window).scroll(function(){ setNavBackgound(); });
		});

	})(window.jQuery);

//	jQuery(function($){});