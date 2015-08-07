<?php
/**
* Template Name: List of blogs
*
*/

get_header();
?>


<div class="container">
    <div class="row">
        <h1><?php the_title(); ?></h1>

        <div class="breadcrumb"></div>

        <div class="blog_grid clearfix">
    <?php
        $blogs = load_blogs();
//    echo "<pre>";
//    print_r($blogs);
//    echo "</pre>";
?>
            <ul>
            <?php
    foreach ($blogs as $blog)
    {
        $date = explode(' ', $blog->post_date);
        $date = explode('-', $date[0]);
//        $author_post_nam = get_the_author( 'user_firstname',(int)$blog->post_author );
//
//        $author_post_lName = get_the_author( 'user_lastname', (int)$blog->post_author );
//
//        echo $blog->post_author;
//        print_r(get_the_author( (int)$blog->post_author ));
        ?>
            <li class="col-md-4 blog-element" >
                <a href="<?php echo get_permalink($blog->ID); ?>">
                <div class="img_block">
                    <?php echo get_the_post_thumbnail ( $blog->ID, 'medium', '') ?>
                </div>
                <div class="title_block clearfix">
                    <h3><?php echo $blog->post_title; ?></h3>
                    <div class="publ_date"><i class="fa fa-calendar"></i>  <?php echo date('jS \of F Y', mktime(0,0,0,$date[2], $date[1], $date[0])); ?></div>
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


    <script>
        ;(function($) {
            $(document).ready(function(){

                var is_loading = false;
                var offset = 12;
                var no_data = false;

                function find_element()
                {
                    $('.load_here').removeClass('load_here');
                    $('.blog-element').eq( $('.blog-element').length-3 ).addClass('load_here');//3 з кінця
                }

                find_element();

//                $('.more_blogs').bind('click', function(){
//                    if ($(this).attr('data-attr') == "enabled")
//                    {
//                        $.ajax({
//                            type: "POST",
//                            url: '<?// echo get_site_url(); ?>///wp-admin/admin-ajax.php',
//                            data: data,
//                            success: function (data) {
//                                console.log(data);
//
//                            }
//
//                        });
//                    }
//                });


                $(document).scroll(function() {
                    if (is_loading == false && no_data == false)
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