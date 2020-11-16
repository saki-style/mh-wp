<?php get_header(); ?>

<!---- NEWS article---->
<article class="art">
    <div class="inner">
        <h1 class="sec-tit wow fadeInUp"><?php echo get_main_title(); ?></h1>
<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        get_template_part( 'template-parts/single' );
    endwhile;
endif;
?>
    </div>
</article><!---- /NEWS article---->

<?php get_footer(); ?>