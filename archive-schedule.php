<!---- SCHEDULE ---->
<section class="sched">
    <div class="inner">
        <div class="bg-box">
<?php $post_obj = get_post_type_object( 'schedule' );?>
            <h1 class="sec-tit wow fadeInUp"><?php echo strtoupper( $post_obj->name ); ?></h1>

            <ul class="sched-list">
<?php
$sched_posts = get_art_posts( 'schedule', 'area', '',);
if ( $sched_posts->have_posts() ) :
    while ( $sched_posts->have_posts() ) : $sched_posts->the_post();
        get_template_part( 'template-parts/archive-schedule' );
    endwhile;
    wp_reset_postdata();
endif;
?>
            </ul>
        </div>
        <div class="sched-btn">
<?php echo do_shortcode( '[inq-btn]' ); ?>
<?php echo do_shortcode( '[rsv-btn]' ); ?>
        </div>
    </div>
</section><!---- / SCHEDULE---->