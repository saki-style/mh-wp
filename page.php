<?php get_header(); ?>

<section <?php body_class(); ?>>
    <div class="inner">
        <h1 class="sec-tit wow fadeInUp"><?php echo get_main_title(); ?></h1>
        <div class="bg-box _page">
<?php
if( have_posts() ):
    while ( have_posts() ): the_post();
        the_content();
    endwhile;
endif;
?>
        </div>
    </div>
</section>

<?php get_template_part( 'template-parts/archive_5' ); ?>

<?php get_footer(); ?>