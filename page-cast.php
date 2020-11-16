<?php get_header(); ?>

<!---- CAST ---->
<section class="cast">
    <h1 class="sec-tit wow fadeInUp"><?php echo get_main_title(); ?></h1>
<?php
$cast_wraps = get_child_pages();
if( $cast_wraps->have_posts() ):
    while( $cast_wraps->have_posts() ) : $cast_wraps->the_post();
?>
    <div class="cast-wrap">
        <div class="inner">
            <ul class="cast-list">
<?php
$cast = SCF::get( 'cast' );
foreach ($cast as $fields ) {
    include 'template-parts/cast.php';
}
?>
            </ul>
        </div>
    </div>
<?php
    endwhile;
    wp_reset_postdata();
endif;
?>
</section><!---- /CAST ---->

<?php get_footer(); ?>