<?php
/**
* Template Name: List of blogs
*
*/

get_header();
?>


<div id="blog-page" class="container">
    <div class="row">
        <div class="col-md-12">
            <h1><?php the_title(); ?></h1>
            <hr/>
            <?php /* ?><div class="breadcrumb">Home -> Blog  //TODO</div><?php //*/ ?>

            <div class="blog_grid clearfix">
        <?php $blogs = load_blogs(); ?>
                <ul>
                <?php

                $date_format = 'jS \of F Y';

        foreach ($blogs as $blog)
        {

            $date =  $blog->post_date;
            $date_published = new DateTime($date);
            ?>
                <li class="col-md-4 col-sm-6 blog-element" >
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
            <?php
        }

        ?>
                </ul>

            </div>
        </div>
    </div>
</div>


    <script>
        ;(function($) {
            $(document).ready(function(){

                var is_loading = false,
                    offset = 12,
                    no_data = false,
                    blogLength = '<?php echo count($blogs); ?>';

                function find_element()
                {
                    $('.load_here').removeClass('load_here');
                    $('.blog-element').eq( $('.blog-element').length-3 ).addClass('load_here');//3 з кінця
                }

                find_element();


                $(document).scroll(function() {
                    if (is_loading == false && no_data == false && blogLength > offset-1 )
                    {
                        if ( ($(window).scrollTop() + $(window).height()) >  $('.load_here').offset().top  )
                        {
                                //alert(123);
                                console.log(offset);

                                var ajax_data = "action=more_blogs&offset="+offset;

                                $.ajax({
                                    type: "POST",
                                    url: '<? echo get_site_url(); ?>/wp-admin/admin-ajax.php',
                                    data: ajax_data,
                                    beforeSend: function(){
                                        is_loading = true;
                                        var text = '<div class="load-container load8"><div class="loader">Loading...</div></div>';
                                        $('.blog_grid').append(text);


                                    },
                                    success: function (data) {
                                        is_loading = false;

                                        $('.load-container').remove();

                                        console.log(data);
                                        offset+=12;
                                        if (data != '') {
                                            find_element();
                                            $('.blog_grid>ul').append(data);
                                        }
                                        else {
                                            no_data = true;
                                        }

                                    }

                                });

                        }
                    }
                });
            });
        })(window.jQuery);
    </script>
<?php get_footer(); ?>