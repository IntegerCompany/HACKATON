(function($) {
   $(document).on('ready',function(){
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
                           slidesToShow: 2,
                           slidesToScroll: 2,
                           infinite: true,
                       }
                   },
                   {
                       breakpoint: 600,
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
