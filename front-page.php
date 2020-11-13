<?php get_header(); ?>

<!---- INTRODUCTION ---->
<section class="intro">
<?php
$intro_wraps = get_child_pages();
if( $intro_wraps->have_posts() ):
    while( $intro_wraps->have_posts() ) : $intro_wraps->the_post();
?>
    <div class="inner">
        <div class="bg-box">
            <h1 class="sec-tit wow fadeInUp"><?php echo get_main_title(); ?></h1>
            <p class="intro-lead"><?php echo get_the_excerpt(); ?></p>
            <div class="intro-wrap">
<?php echo get_the_content(); ?>
            </div>
        </div>
    </div>
<?php
    endwhile;
    wp_reset_postdata();
endif;
?>
</section><!---- /INTRODUCTION ---->

<?php get_template_part( 'template-parts/archive_5' ); ?>
        
<!---- STORY ---->
<section class="story">
<?php
$story_page = get_page_by_path( 'story' );
$post = $story_page;
setup_postdata( $post );
?>
    <div class="story-box" <?php echo do_shortcode( '[bg-image id="' . get_field( 'image_main' ) . '"]' ); ?>>
        <h1 class="sec-tit wow fadeInUp"><?php echo get_main_title(); ?></h1>
        <div class="inner">
            <p class="story-txt"><?php echo nl2br( get_field( 'content_top' ) ); ?></p>
<?php echo do_shortcode( '[btn class="story" link="story"]もっと詳しく[/btn]' ); ?>
        </div>
<?php
wp_reset_postdata();
?>
    </div>
</section><!---- /STORY ---->
        
<!---- COMMENTS ---->
<section class="cmt">
    <div class="inner">
<?php
$cmt_page = get_page_by_path( 'comments' );
$post = $cmt_page;
setup_postdata( $post );
?>
        <h1 class="sec-tit wow fadeInUp"><?php echo get_main_title(); ?></h1>
        <p class="cmt-lead"><?php echo get_the_excerpt(); ?></p>
<?php
$cmt_rep = SCF::get( 'cmt_rep' );
foreach ($cmt_rep as $fields ) {
    include 'template-parts/comments_rep.php';
}
?>
<?php
wp_reset_postdata();
?>
    </div>
</section><!---- /COMMENTS ---->

<!---- CAST ---->
<section class="cast">
<?php
$cast_obj = get_page_by_path( 'cast' );
$post = $cast_obj;
setup_postdata( $post );
?>
    <h1 class="sec-tit wow fadeInUp"><?php echo get_main_title(); ?></h1>
<?php wp_reset_postdata();?>
<?php
$cast_wraps = get_child_pages(1, $cast_obj->ID);
if( $cast_wraps->have_posts() ):
    while( $cast_wraps->have_posts() ) : $cast_wraps->the_post();
?>
    <div class="cast-wrap">
        <div class="inner">
            <ul class="cast-list">
<?php
$cast = SCF::get('cast');
foreach ($cast as $fields ) {
    include 'template-parts/cast.php';
}
?>
            </ul>
<?php echo do_shortcode( '[btn class="link" link="cast"]もっと見る[/btn]' ); ?>
        </div>
    </div>
<?php
    endwhile;
    wp_reset_postdata();
endif;
?>
</section><!---- /CAST ---->

<?php get_footer(); ?>