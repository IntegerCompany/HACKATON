(function($) {
   $(document).on('ready',function(){
       console.log('s = ' + $('.photo-slider').find('div').lenght );
       //if($('.photo-slider').children('div').lenght > 2) {
       if(true) {
           $('.photo-slider').slick({
               infinite: true,
               speed: 300,
               autoplay: true,
               autoplaySpeed: 2000,
               slidesToShow: 3,
               slidesToScroll: 3,
               responsive: [
                   {
                       breakpoint: 1024,
                       settings: {
                           slidesToShow: 3,
                           slidesToScroll: 3,
                           infinite: true,
                       }
                   },
                   {
                       breakpoint: 600,
                       settings: {
                           slidesToShow: 2,
                           slidesToScroll: 2
                       }
                   },
                   {
                       breakpoint: 480,
                       settings: {
                           slidesToShow: 1,
                           slidesToScroll: 1
                       }
                   }

               ]
           });
       }
   });

})( jQuery );
