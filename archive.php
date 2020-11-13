<?php get_header(); ?>

<!---- NEWS ---->
<section class="news">
    <div class="inner">
        <h1 class="sec-tit wow fadeInUp"><?php echo get_main_title(); ?></h1>
        <div class="news-wrap wow fadeIn">
<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        get_template_part( 'template-parts/archive' );
    endwhile;
endif;
?>
        </div>
<?php get_template_part( 'template-parts/paging' ); ?>
    </div>
</section><!---- /NEWS ---->

<?php get_footer(); ?>