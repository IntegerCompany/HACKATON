<?php

get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-top-title"><?php the_title(); ?></h1>
        </div>
    </div>
    <div class="row staff-block">
        <div class="col-md-12 minux-left">

            <?php query_posts(array('post_type' => 'staff_post'));
            $mypost = array('post_type' => 'staff_post', "category_name" => "staff", 'posts_per_page' => '-1');
            $loop = new WP_Query($mypost);
            function get_meta($slug)
            {
                echo esc_html(get_post_meta(get_the_ID(), $slug, true));
            }

            while ($loop->have_posts()) : $loop->the_post();

            ?>
            <div class="col-md-4 col-sm-6 col-xs-12 block-profile">
                <?php the_post_thumbnail(); ?>
                <div class="block-profile-inside text-right">
                    <div class="name-staff "><?php the_title(); ?>
                        <h5 class="position-staff"><?php get_meta("staff_position"); ?></h5>
                    </div>

                    <?php the_content(); ?>
                    <div class="staff-social">
                        <a href="<?php get_meta("staff_linkedin"); ?>"><i class="fa fa-linkedin"></i></a>
                        <a href="<?php get_meta("staff_google"); ?>"><i class="fa fa-google-plus"></i></a>
                        <a href="<?php get_meta("staff_facebook"); ?>"><i class="fa fa-facebook"></i></a>

                    </div>

                </div>
            </div>
        <?php endwhile; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-top-title"><?php _e('Our office','staffPagePlugin')?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 photo-slider minux-left">
            <?php $mypost = array('post_type' => 'staff_post', "category_name" => "office");
            $loop = new WP_Query($mypost);
            while ($loop->have_posts()) : $loop->the_post();?>
                <div class="col-md-4 col-sm-6 col-xs-12 slide-block"><?php the_post_thumbnail(); ?></div>
            <?php endwhile; ?>
        </div>
    </div>

</div>


<?php wp_reset_query(); ?>
<?php get_footer(); ?>
